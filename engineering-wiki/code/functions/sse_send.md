# sse_send()

> [!NOTE]
> Defined in 4 places (each behind a function_exists() check, or in files never loaded together): [api/forms/ai_generate.php](/code/files/api/forms/ai_generate.php.md), [api/knowledge/writeup_stream.php](/code/files/api/knowledge/writeup_stream.php.md), [api/tickets/ai_cleanup_reply.php](/code/files/api/tickets/ai_cleanup_reply.php.md), [api/tickets/ai_merge_summary.php](/code/files/api/tickets/ai_merge_summary.php.md)

```php
function sse_send(string $event, array $data): void
```

Defined in [api/forms/ai_generate.php](/code/files/api/forms/ai_generate.php.md), line 43.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$event` | `string` |  |  |
| `$data` | `array` |  |  |

**Returns:** `void`

## Called from

- [api/forms/ai_generate.php](/code/files/api/forms/ai_generate.php.md)
- [api/knowledge/writeup_stream.php](/code/files/api/knowledge/writeup_stream.php.md)
- [api/tickets/ai_cleanup_reply.php](/code/files/api/tickets/ai_cleanup_reply.php.md)
- [api/tickets/ai_merge_summary.php](/code/files/api/tickets/ai_merge_summary.php.md)

