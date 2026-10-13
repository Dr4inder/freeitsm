# warbotToolAllowed()

May this analyst use this tool? The capability, and - for a tool that names one (3.3.0, the Projects tools) - access to the module whose data it reads. The older tools name no module and are unchanged: whether the war room is install-wide is the open question in `warbotToolSearchKnowledge()` below.

```php
function warbotToolAllowed(PDO $conn, int $analystId, array $t): bool
```

Defined in [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md), line 333.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$t` | `array` |  |  |

**Returns:** `bool`

## Calls

[analystCanAccessModule()](/code/functions/analystCanAccessModule.md), [analystHasCapability()](/code/functions/analystHasCapability.md)

## Called from

- [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md) - in [warbotToolsFor()](/code/functions/warbotToolsFor.md), [warbotRunTool()](/code/functions/warbotRunTool.md)

