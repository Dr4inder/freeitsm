# spreadsheetZipOpen()

Read a zip's central directory. Returns [bytes, [name => entry]].

```php
function spreadsheetZipOpen(string $path): array
```

Defined in [includes/spreadsheet.php](/code/files/includes/spreadsheet.php.md), line 356.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$path` | `string` |  |  |

**Returns:** `array`

## Called from

- [includes/spreadsheet.php](/code/files/includes/spreadsheet.php.md) - in [spreadsheetReadXlsx()](/code/functions/spreadsheetReadXlsx.md)

