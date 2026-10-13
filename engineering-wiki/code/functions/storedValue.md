# storedValue()

Describe what is actually stored, keeping the three "blank" cases apart: the column is absent, the value is NULL, or the value is an empty string.

```php
function storedValue(array $row, string $col, array $apCols, bool $maskIt = false)
```

Defined in [api/system/debug-tools/D011_directory_sync_readiness.php](/code/files/api/system/debug-tools/D011_directory_sync_readiness.php.md), line 288.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$row` | `array` |  |  |
| `$col` | `string` |  |  |
| `$apCols` | `array` |  |  |
| `$maskIt` | `bool` | `false` |  |

## Calls

[mask()](/code/functions/mask.md)

## Called from

- [api/system/debug-tools/D011_directory_sync_readiness.php](/code/files/api/system/debug-tools/D011_directory_sync_readiness.php.md)

