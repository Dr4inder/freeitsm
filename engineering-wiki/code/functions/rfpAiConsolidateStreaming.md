# rfpAiConsolidateStreaming()

Streaming variant of Pass 2 consolidation. Behaves like `rfpAiConsolidate()` but forwards token deltas + usage updates to a caller-supplied callback so the browser can render live output.

The callback signature is fn(string `$eventType`, array `$data`): void
forwarded straight from `rfpAiCallAnthropicStreaming()`. The caller
(typically an SSE endpoint) is responsible for relaying these as
SSE events to the browser.

Returns the same shape as `rfpAiConsolidate()`: { payload, tokens_in,
tokens_out, cache_read, cache_write, duration_ms }.

```php
function rfpAiConsolidateStreaming(
    PDO $conn,
    int $rfpId,
    array $extractedRows,
    callable $onEvent
): array
```

Defined in [includes/rfp_ai.php](/code/files/includes/rfp_ai.php.md), line 810.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$rfpId` | `int` |  |  |
| `$extractedRows` | `array` |  |  |
| `$onEvent` | `callable` |  |  |

**Returns:** `array`

## Calls

[rfpAiCallAnthropicStreaming()](/code/functions/rfpAiCallAnthropicStreaming.md), [rfpAiLogAction()](/code/functions/rfpAiLogAction.md)

## Called from

- [api/rfp-builder/run_consolidation.php](/code/files/api/rfp-builder/run_consolidation.php.md)

