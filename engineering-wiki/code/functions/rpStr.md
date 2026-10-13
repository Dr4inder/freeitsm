# rpStr()

A string cut to `$max` characters, with control and zero-width characters removed.

```php
function rpStr($v, int $max): string
```

Defined in [includes/report_packs/design.php](/code/files/includes/report_packs/design.php.md), line 93.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` |  |  |  |
| `$max` | `int` |  |  |

**Returns:** `string`

## Called from

- [api/reporting/packs/create.php](/code/files/api/reporting/packs/create.php.md)
- [api/reporting/packs/save.php](/code/files/api/reporting/packs/save.php.md)
- [includes/report_packs/design.php](/code/files/includes/report_packs/design.php.md) - in [rpCleanDoc()](/code/functions/rpCleanDoc.md), [rpCleanDesign()](/code/functions/rpCleanDesign.md)

