# sse()

> [!NOTE]
> Defined in 5 places (each behind a function_exists() check, or in files never loaded together): [api/rfp-builder/generate_framing.php](/code/files/api/rfp-builder/generate_framing.php.md), [api/rfp-builder/generate_section.php](/code/files/api/rfp-builder/generate_section.php.md), [api/rfp-builder/restyle_framing.php](/code/files/api/rfp-builder/restyle_framing.php.md), [api/rfp-builder/restyle_section.php](/code/files/api/rfp-builder/restyle_section.php.md), [api/rfp-builder/run_consolidation.php](/code/files/api/rfp-builder/run_consolidation.php.md)

Sends one server-sent event (an event name and a JSON data line) and flushes it to the browser straight away.

```php
function sse(string $event, array $data): void
```

Defined in [api/rfp-builder/generate_framing.php](/code/files/api/rfp-builder/generate_framing.php.md), line 44.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$event` | `string` |  |  |
| `$data` | `array` |  |  |

**Returns:** `void`

## Called from

- [api/rfp-builder/generate_framing.php](/code/files/api/rfp-builder/generate_framing.php.md)
- [api/rfp-builder/generate_section.php](/code/files/api/rfp-builder/generate_section.php.md)
- [api/rfp-builder/restyle_framing.php](/code/files/api/rfp-builder/restyle_framing.php.md)
- [api/rfp-builder/restyle_section.php](/code/files/api/rfp-builder/restyle_section.php.md)
- [api/rfp-builder/run_consolidation.php](/code/files/api/rfp-builder/run_consolidation.php.md)

