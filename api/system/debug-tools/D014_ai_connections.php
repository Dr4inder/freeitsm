<?php
/**
 * Debug Tool D014 — AI connections: what is sent and what comes back
 *
 * Answers one question end to end: "an AI feature's Test button fails — what
 * exactly did FreeITSM send, and what exactly did the provider say?"
 *
 * Began as the Azure OpenAI tool (discussion #86). GH #171 widened it to every
 * provider, because the question asked there - "is there a way to inspect the
 * payload and response without dev tools?" - has the same answer for all of
 * them: NO, not in the browser. The call is made by the SERVER; the browser only
 * ever talks to FreeITSM, which is why dev tools show no api-key header. This
 * tool records the server's own exchange (aiProviderTraceStart) and prints it.
 * The id stays D014 so links already given out in #86 still land here.
 *
 * READ-ONLY apart from the live calls, which spend a few tokens exactly as the
 * Test button does. For a failing Azure deployment it may make up to four more,
 * one per alternative API version, stopping at the first that works.
 *
 * ⚠️ PRINTS NO SECRETS. The key is shown as its first four characters and a
 * length wherever it would appear - headers, address, body or answer.
 *
 * Input: ns (optional) - one feature. Without it, every feature with a key is
 * tested, one call per distinct setup (features sharing a key and model are
 * one connection, so they are called once).
 *
 * Output: plain text, section-delimited with === HEADERS === for easy skimming.
 */

@session_start();

$DIAG_ID   = 'D014';
$DIAG_NAME = 'AI connections - what is sent and what comes back';

require_once __DIR__ . '/../../../config.php';
require_once __DIR__ . '/../../../includes/functions.php';

// Debug tools are administrators-only (issue #34). Fail closed.
try {
    $__dbgAdmin = !empty($_SESSION['analyst_id']) && analystIsAdmin(connectToDatabase(), (int)$_SESSION['analyst_id']);
} catch (Throwable $e) {
    $__dbgAdmin = false;
}
if (!$__dbgAdmin) {
    http_response_code(403);
    if (!headers_sent()) header('Content-Type: text/plain; charset=utf-8');
    echo "Administrator access required.\n";
    exit;
}
session_write_close();

require_once __DIR__ . '/../../../includes/ai_settings.php';

$sections = [];
function addSection(&$sections, $title, $body) {
    if (is_array($body)) $body = implode("\n", $body);
    $sections[] = "=== {$title} ===\n" . rtrim($body, "\n");
}
function emit_and_exit($sections) {
    if (!headers_sent()) header('Content-Type: text/plain; charset=utf-8');
    echo implode("\n\n", $sections) . "\n";
    exit;
}
/** First four characters and a length — enough to tell a wrong key from no key. */
function keyHint(string $k): string {
    if ($k === '') return '(none saved)';
    return substr($k, 0, 4) . '… (' . strlen($k) . ' characters)';
}
/** Replace the key wherever it appears with its hint. */
function redactKey(string $s, string $key): string {
    return $key === '' ? $s : str_replace($key, '[key ' . keyHint($key) . ']', $s);
}
/** JSON pretty-printed for reading; anything else as it came, trimmed to a length. */
function prettyBody(?string $s, int $max = 4000): string {
    if ($s === null || $s === '') return '(empty)';
    $j = json_decode($s, true);
    if ($j !== null) $s = json_encode($j, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    return strlen($s) > $max ? substr($s, 0, $max) . "\n… (" . strlen($s) . ' characters in all)' : $s;
}
function indent(string $s, string $pad = '  '): string {
    return $pad . str_replace("\n", "\n" . $pad, $s);
}
/** Print one recorded HTTP exchange. */
function traceLines(array $t, string $key, int $n): array {
    $out = [];
    $out[] = "--- Request {$n}" . ($t['attempt'] > 1 ? " (retry {$t['attempt']} after a busy or failed answer)" : '') . ' ---';
    $out[] = 'POST ' . redactKey($t['url'], $key);
    foreach ($t['headers'] as $h) $out[] = '  ' . redactKey($h, $key);
    $out[] = 'Body:';
    $out[] = indent(redactKey(prettyBody($t['body']), $key));
    $out[] = '';
    if ($t['response'] === null) {
        $out[] = "--- Answer {$n}: no answer after {$t['ms']}ms - " . ($t['error'] ?: 'network error') . ' ---';
    } else {
        $out[] = "--- Answer {$n}: HTTP {$t['code']} after {$t['ms']}ms ---";
        $out[] = indent(redactKey(prettyBody($t['response']), $key));
    }
    $out[] = '';
    return $out;
}
/** The address and key of a setup, so features sharing one are called once. */
function setupKey(array $cfg): string {
    return implode('|', [$cfg['provider'], $cfg['provider'] === 'azure' ? '' : $cfg['model'],
        $cfg['azure_endpoint'] ?? '', $cfg['azure_deployment'] ?? '', $cfg['azure_api_version'] ?? '',
        hash('sha256', (string)$cfg['api_key']), !empty($cfg['verify_ssl']) ? 1 : 0]);
}
function providerLabel(string $p): string {
    return ['anthropic' => 'Anthropic', 'openai' => 'OpenAI', 'openrouter' => 'OpenRouter', 'azure' => 'Azure OpenAI'][$p] ?? $p;
}

$conn     = connectToDatabase();
$registry = aiSettingsRegistry();
$only     = trim((string)($_GET['ns'] ?? ''));
if ($only !== '' && !isset($registry[$only])) {
    addSection($sections, 'VERDICT', 'Unknown feature "' . $only . '".');
    emit_and_exit($sections);
}

// ---- 1. EVERY FEATURE AND ITS PROVIDER ---------------------------------
$setups = [];   // setupKey => ['cfg' => ..., 'labels' => [...]]
$lines  = [];
foreach ($registry as $ns => $entry) {
    try {
        $cfg = aiSettingsLoad($conn, $ns);
    } catch (Throwable $e) {
        $lines[] = sprintf('%-24s  could not be read: %s', $entry['label'], $e->getMessage());
        continue;
    }
    $what = $cfg['provider'] === 'azure'
        ? 'deployment "' . $cfg['azure_deployment'] . '"'
        : 'model ' . $cfg['model'];
    $lines[] = sprintf('%-24s  %-12s  %s%s', $entry['label'], providerLabel($cfg['provider']), $what,
        $cfg['api_key'] === '' ? '   (no key saved)' : '');
    if (($only === '' || $only === $ns) && $cfg['api_key'] !== '') {
        $k = setupKey($cfg);
        if (!isset($setups[$k])) $setups[$k] = ['cfg' => $cfg, 'labels' => []];
        $setups[$k]['labels'][] = $entry['label'];
    }
}
addSection($sections, 'AI FEATURES AND THEIR PROVIDERS', $lines);

if (!$setups) {
    addSection($sections, 'VERDICT', $only !== ''
        ? $registry[$only]['label'] . ' has no API key saved, so there is nothing to call. Save a key in its AI settings first.'
        : 'No AI feature has an API key saved, so there is nothing to call. Each module\'s AI settings has its own key.');
    emit_and_exit($sections);
}

$verdicts = [];
foreach ($setups as $setup) {
    $cfg    = $setup['cfg'];
    $key    = (string)$cfg['api_key'];
    $title  = implode(', ', $setup['labels']);
    $azure  = $cfg['provider'] === 'azure';

    // ---- 2. THE SETUP, AND WHAT LOOKS WRONG BEFORE ANYTHING IS SENT ----
    $c = ['Provider          : ' . providerLabel($cfg['provider'])];
    $notes = [];
    if ($azure) {
        $ver = trim((string)$cfg['azure_api_version']);
        $c[] = 'Endpoint as saved : ' . ($cfg['azure_endpoint'] ?: '(empty - REQUIRED)');
        $c[] = 'Deployment        : ' . ($cfg['azure_deployment'] ?: '(empty - REQUIRED)');
        $c[] = 'API version       : ' . ($ver !== '' ? $ver : '(empty - uses ' . AI_AZURE_DEFAULT_API_VERSION . ')');
        if (!aiAzureApiVersionLooksValid($ver)) {
            $notes[] = '"' . $ver . '" does not look like an Azure API version. The date shown beside a';
            $notes[] = 'model in the portal (gpt-5-nano\'s is 2025-08-07) is the MODEL\'s version. The API';
            $notes[] = 'version is at the end of the deployment\'s Target URI (api-version=...), or enter v1.';
        }
        $host = strtolower((string)parse_url((string)$cfg['azure_endpoint'], PHP_URL_HOST));
        if ($host !== '' && !preg_match('/\.(openai\.azure\.com|services\.ai\.azure\.com|cognitiveservices\.azure\.com)$/', $host)) {
            $notes[] = 'The endpoint host "' . $host . '" is not one Azure OpenAI normally uses';
            $notes[] = '(*.openai.azure.com, *.services.ai.azure.com or *.cognitiveservices.azure.com).';
            $notes[] = 'Fine if it is a gateway in front of Azure; otherwise check it.';
        }
    } else {
        $c[] = 'Model             : ' . ($cfg['model'] ?: '(empty - REQUIRED)');
    }
    $c[] = 'API key           : ' . keyHint($key);
    $c[] = 'Verify SSL        : ' . (!empty($cfg['verify_ssl']) ? 'on' : 'OFF');
    if ($notes) { $c[] = ''; $c[] = 'BEFORE SENDING:'; foreach ($notes as $n) $c[] = '  ' . $n; }
    addSection($sections, 'SETUP - ' . $title, $c);

    // ---- 3. THE LIVE CALL, EVERY BYTE OF IT ---------------------------
    $out = [];
    $msg = '';
    $res = null;
    aiProviderTraceStart();
    try {
        $res = aiProviderChat($cfg, [
            'system'     => 'You are a connection test. Reply with the single word: OK',
            'user'       => 'Reply with the single word: OK',
            'max_tokens' => 16,
        ]);
    } catch (Throwable $e) {
        $msg = $e->getMessage();
    }
    $trace = aiProviderTraceTake();
    if (!$trace) $out[] = 'Nothing was sent: ' . redactKey($msg, $key);
    foreach ($trace as $i => $t) $out = array_merge($out, traceLines($t, $key, $i + 1));
    if (count($trace) > 1 && $res !== null) {
        $out[] = 'The model refused a setting by name and FreeITSM put it right and asked again';
        $out[] = '(max_tokens -> max_completion_tokens, or temperature left at the model\'s default).';
        $out[] = 'That happens on every call to this model and needs nothing from you.';
        $out[] = '';
    }
    if ($res !== null) {
        $out[] = 'RESULT   : SUCCESS - "' . trim((string)$res['content']) . '", '
               . (int)$res['tokens_in'] . ' tokens in, ' . (int)$res['tokens_out'] . ' out, ' . (int)$res['duration_ms'] . 'ms';
        if (trim((string)$res['content']) === '') {
            $out[] = '';
            $out[] = 'The call worked but the answer was EMPTY (finish_reason "' . (string)($res['finish_reason'] ?? '?') . '").';
            $out[] = 'A model that reasons first can spend this test\'s small budget before writing';
            $out[] = 'anything. The connection itself is fine.';
        }
        $verdicts[] = $title . ': works';
    } else {
        $out[] = 'RESULT   : FAILED - ' . redactKey($msg, $key);
        $why = aiExplainFailure($cfg, $msg);
        if ($why !== '') { $out[] = ''; $out[] = 'READING  : ' . wordwrap($why, 78, "\n           "); }
        $verdicts[] = $title . ': FAILED';
    }
    addSection($sections, 'REQUEST AND RESPONSE - ' . $title, $out);

    // ---- 4. AZURE: WHICH API VERSION DOES THIS DEPLOYMENT ACCEPT? -------
    /* A 404 or 400 from Azure is most often the API version, and the portal does
       not say which ones a deployment accepts. Asking is cheaper than guessing:
       one tiny call per candidate, and the first that answers is the fix. */
    if ($azure && $res === null && preg_match('/\(HTTP (400|404)\)/', $msg)) {
        $current    = strtolower(trim((string)$cfg['azure_api_version']));
        $candidates = array_values(array_filter(
            [AI_AZURE_DEFAULT_API_VERSION, '2024-10-21', '2025-04-01-preview', 'v1'],
            function ($v) use ($current) { return $v !== $current && !($current === '' && $v === AI_AZURE_DEFAULT_API_VERSION); }
        ));
        $p = [];
        $works = '';
        foreach ($candidates as $v) {
            try {
                aiProviderChat(array_merge($cfg, ['azure_api_version' => $v]), [
                    'system' => 'You are a connection test. Reply with the single word: OK',
                    'user'   => 'Reply with the single word: OK', 'max_tokens' => 16,
                ]);
                $p[] = sprintf('  %-20s WORKS', $v);
                $works = $v;
                break;   // one answer is the fix - no need to spend more
            } catch (Throwable $e) {
                $p[] = sprintf('  %-20s %s', $v, substr(redactKey($e->getMessage(), $key), 0, 110));
            }
        }
        $p[] = '';
        if ($works !== '') {
            $fix = $works === AI_AZURE_DEFAULT_API_VERSION
                ? 'clear the API version box (blank uses ' . $works . ')'
                : 'set the API version to ' . $works;
            $p[] = 'FIX: ' . $fix . ' in this feature\'s AI settings, then Save and Test.';
            $verdicts[count($verdicts) - 1] .= ' - ' . $fix;
        } else {
            $p[] = 'None of these answered either, so the API version is not the problem: check the';
            $p[] = 'endpoint is the resource that holds this deployment, and the deployment name.';
        }
        addSection($sections, 'OTHER API VERSIONS TRIED - ' . $title, $p);
    }
}

addSection($sections, 'VERDICT', $verdicts);
addSection($sections, 'IF YOU ARE REPORTING THIS', [
    'Paste this whole output into a GitHub issue at https://github.com/edmozley/freeitsm/issues.',
    'It contains no API key - only its first four characters and a length - and no ticket',
    'content: the only prompt sent is the fixed connection test shown above.',
]);

emit_and_exit($sections);
