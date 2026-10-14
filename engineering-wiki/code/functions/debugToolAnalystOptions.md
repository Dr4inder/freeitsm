# debugToolAnalystOptions()

D018's analyst picker: "you" first, then every active analyst. An empty list (database unreachable) still leaves "you", so the page always renders.

```php
function debugToolAnalystOptions(): array
```

Defined in [system/debug-tools/includes/tools.php](/code/files/system/debug-tools/includes/tools.php.md), line 482.

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 486 | `debugToolAnalystOptions` | read [analysts](/code/tables/analysts.md) |  |

## Calls

[connectToDatabase()](/code/functions/connectToDatabase.md)

## Called from

- [system/debug-tools/includes/tools.php](/code/files/system/debug-tools/includes/tools.php.md) - in [getDebugTools()](/code/functions/getDebugTools.md)

