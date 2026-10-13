# rpCatalogue()

The toolbox and handler schemas as the designer needs them, filtered to what this viewer may use. Blocks they cannot use are still DESCRIBED (so a shared pack can show "needs Contracts") but marked unavailable.

```php
function rpCatalogue(PDO $conn, int $analystId): array
```

Defined in [includes/report_packs/blocks.php](/code/files/includes/report_packs/blocks.php.md), line 389.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `array`

## Calls

[analystCanAccessModule()](/code/functions/analystCanAccessModule.md), [rpHandlers()](/code/functions/rpHandlers.md), [rpModuleName()](/code/functions/rpModuleName.md), [rpOptionSource()](/code/functions/rpOptionSource.md), [rpToolboxItems()](/code/functions/rpToolboxItems.md), [t()](/code/functions/t.md)

## Called from

- [api/reporting/packs/catalogue.php](/code/files/api/reporting/packs/catalogue.php.md)

