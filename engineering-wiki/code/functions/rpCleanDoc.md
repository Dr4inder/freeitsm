# rpCleanDoc()

Check a rich-text document. Anything unrecognised is dropped, not kept.

```php
function rpCleanDoc($doc, int &$budget): array
```

Defined in [includes/report_packs/design.php](/code/files/includes/report_packs/design.php.md), line 105.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$doc` |  |  |  |
| `$budget` | `int` |  |  |

**Returns:** `array`

## Calls

[rpColour()](/code/functions/rpColour.md), [rpNum()](/code/functions/rpNum.md), [rpPick()](/code/functions/rpPick.md), [rpStr()](/code/functions/rpStr.md)

## Called from

- [includes/report_packs/design.php](/code/files/includes/report_packs/design.php.md) - in [rpCleanDesign()](/code/functions/rpCleanDesign.md)

