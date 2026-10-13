# rpOptionSource()

Choices for a 'multi' option's source (the Properties pane's checkboxes).

```php
function rpOptionSource(PDO $conn, string $source, int $analystId = 0): array
```

Defined in [includes/report_packs/blocks.php](/code/files/includes/report_packs/blocks.php.md), line 373.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$source` | `string` |  |  |
| `$analystId` | `int` | `0` |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 380 | `rpOptionSource` | read [status_services](/code/tables/status_services.md) |  |

## Calls

[rpProjectChoices()](/code/functions/rpProjectChoices.md)

## Called from

- [includes/report_packs/blocks.php](/code/files/includes/report_packs/blocks.php.md) - in [rpCatalogue()](/code/functions/rpCatalogue.md)

