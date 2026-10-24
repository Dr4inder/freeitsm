<?php
/* 🔴 NEVER OVER THE WEB. See tests/README.md. */
if (PHP_SAPI !== 'cli') { http_response_code(404); exit; }

/**
 * Domains checks when DNS cannot be asked: a lookup that FAILED must never be
 * reported as a record that is MISSING.
 *
 *   php tests/domains-dns-failures.php
 *
 * Reported by a user, October 2026: every domain showed "No SPF record" and "No
 * DMARC record" although both were there - the server could not reach its DNS
 * resolver, and the checks read "no answer" as "no record". Now a failed lookup
 * is reported once, as itself, the checks that needed it say nothing, and no
 * grade is given; and the Automatic resolver tries the other DNS-over-HTTPS
 * service and then the server's own before giving up.
 *
 * Needs the internet. Uses dnssec-failed.org - a public test domain whose DNSSEC
 * is deliberately broken, so validating resolvers (Google, Cloudflare) refuse to
 * answer for it - as a real, repeatable failed lookup; and google.com as the
 * positive control. Touches no database rows.
 */

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/domains/checks.php';

$pass = 0; $fail = 0; $skip = 0;
function ok(string $what, bool $cond, string $detail = ''): void {
    global $pass, $fail;
    if ($cond) { $pass++; echo "  PASS  {$what}\n"; }
    else       { $fail++; echo "  FAIL  {$what}" . ($detail !== '' ? "  <- {$detail}" : '') . "\n"; }
}
function skip(string $what, string $why): void { global $skip; $skip++; echo "  SKIP  {$what} ({$why})\n"; }

$row = fn(string $name) => ['domain_name' => $name, 'purpose' => 'primary', 'registry_statuses' => '', 'expiry_date' => null,
    'transfer_lock' => null, 'registry_lock' => 0, 'renewal_mode' => 'auto', 'nameservers' => '', 'dnssec' => null,
    'dkim_selectors' => '', 'ssl_hosts' => ''];
$keys = fn(array $res) => array_column($res['findings'], 'key');

echo "\nDomains checks when DNS cannot be asked\n" . str_repeat('=', 72) . "\n";

$probe = domainDns('dnssec-failed.org', 'TXT', 'google');
if ($probe['ok']) {
    skip('every failed-lookup check', 'Google answered for dnssec-failed.org, so there is no failure to test with');
} else {
    echo "\nA lookup that fails (Google refuses dnssec-failed.org)\n";
    $res = domainRunChecks($row('dnssec-failed.org'), ['domain_dns_resolver' => 'google', 'domain_ssl_warn_days' => 21]);
    $k = $keys($res);
    ok('no "No SPF record" for an SPF that could not be looked up', !in_array('spf_missing', $k, true), implode(',', $k));
    ok('no "No DMARC record" either', !in_array('dmarc_missing', $k, true));
    ok('no "no MX", "no DKIM found", "MTA-STS off" or "no name servers" drawn from a failure',
       !array_intersect(['mx_none', 'dkim_unknown', 'mta_sts_off', 'tls_rpt_off', 'dns_no_ns', 'web_no_host', 'spf_broken_include'], $k), implode(',', $k));
    $f = array_values(array_filter($res['findings'], fn($x) => $x['key'] === 'dns_lookup_failed'))[0] ?? null;
    ok('the failure is reported once, as itself, with the error', $f && count(array_keys($k, 'dns_lookup_failed')) === 1
       && $f['params']['count'] > 0 && strpos($f['params']['error'], 'status 2') !== false && strpos($f['params']['names'], 'dnssec-failed.org') !== false, json_encode($f));
    ok('...and it costs the domain no points - it is not the domain\'s fault', $f && $f['weight'] === 0);
    ok('no grade is given from the checks that happened to work', $res['grade'] === null && $res['score'] === null, var_export($res['grade'], true));
    ok('the change-detection snapshot holds nothing for what was not seen (read as "unknown", never "removed")',
       $res['snapshot']['spf'] === '' && $res['snapshot']['dmarc'] === '' && $res['snapshot']['mx'] === []);
    $title = (require __DIR__ . '/../lang/en/domains.php');
    $has = false;
    array_walk_recursive($title, function ($v, $key) use (&$has) { if ($key === 'title' && strpos((string)$v, 'DNS lookups could not be answered') !== false) $has = true; });
    ok('the finding has words', $has);

    echo "\nThe Automatic resolver tries again\n";
    $sys = domainDnsSystem('dnssec-failed.org', 'A');
    if (PHP_OS_FAMILY !== 'Windows') {
        skip('Automatic on Windows falls back past DNS-over-HTTPS', 'not Windows - Automatic is the system resolver here');
    } elseif (!$sys['ok']) {
        skip('Automatic on Windows falls back past DNS-over-HTTPS', "this machine's own resolver refuses it too");
    } else {
        $a = domainDns('dnssec-failed.org', 'A', 'auto');
        ok('Automatic on Windows: Google and Cloudflare refuse, the server\'s own resolver answers', $a['ok'] && $a['records'] === $sys['records'], json_encode($a));
        $g = domainDns('dnssec-failed.org', 'A', 'cloudflare');
        ok('...but a DNS-over-HTTPS service chosen on purpose is respected - no quiet substitute', !$g['ok']);
    }
}

echo "\nPOSITIVE CONTROL - a domain whose lookups work (google.com)\n";
$res = domainRunChecks($row('google.com'), ['domain_dns_resolver' => 'auto', 'domain_ssl_warn_days' => 21]);
$k = $keys($res);
if (in_array('dns_lookup_failed', $k, true)) {
    skip('positive control', 'this machine cannot reach DNS at all just now');
} else {
    ok('SPF is found', (bool)array_intersect(['spf_hardfail', 'spf_softfail', 'spf_neutral'], $k), implode(',', $k));
    ok('DMARC is found', (bool)array_intersect(['dmarc_reject', 'dmarc_quarantine', 'dmarc_monitor_only'], $k));
    ok('...and it is graded', $res['grade'] !== null && is_int($res['score']));
}

echo "\n" . str_repeat('=', 72) . "\n$pass passed, $fail failed" . ($skip ? ", $skip skipped" : '') . "\n";
exit($fail ? 1 : 0);
