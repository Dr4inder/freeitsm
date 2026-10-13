# rpCleanOpts()

Validate a block's options against its handler's schema. Unknown keys are dropped, out-of-range values clamped, missing ones defaulted - so the data function, the PDF and the saved design all see the same, legal values.

```php
function rpCleanOpts(string $handler, $opts): array
```

Defined in [includes/report_packs/blocks.php](/code/files/includes/report_packs/blocks.php.md), line 326.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$handler` | `string` |  |  |
| `$opts` |  |  |  |

**Returns:** `array`

## Calls

[rpHandlers()](/code/functions/rpHandlers.md)

## Called from

- [includes/report_packs/blocks.php](/code/files/includes/report_packs/blocks.php.md) - in [rpBlockData()](/code/functions/rpBlockData.md)
- [includes/report_packs/design.php](/code/files/includes/report_packs/design.php.md) - in [rpCleanDesign()](/code/functions/rpCleanDesign.md)

