# spreadsheetWriteXlsx()

A one-sheet .xlsx. Every cell is an inline TEXT cell, never a number - that is the point (see the file header). The header row is bold and frozen.

```php
function spreadsheetWriteXlsx(
    string $sheetName,
    array $header,
    array $rows,
    array $widths = []
): string
```

Defined in [includes/spreadsheet.php](/code/files/includes/spreadsheet.php.md), line 145.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$sheetName` | `string` |  |  |
| `$header` | `array` |  |  |
| `$rows` | `array` |  |  |
| `$widths` | `array` | `[]` | optional column widths in characters |

**Returns:** `string`

## Calls

[spreadsheetCleanText()](/code/functions/spreadsheetCleanText.md), [spreadsheetZipStore()](/code/functions/spreadsheetZipStore.md)

## Called from

- [api/projects/export.php](/code/files/api/projects/export.php.md)
- [api/system/cost_centres.php](/code/files/api/system/cost_centres.php.md)

