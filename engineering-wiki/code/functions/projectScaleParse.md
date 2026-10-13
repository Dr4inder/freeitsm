# projectScaleParse()

Read a stored scale. A JSON array is the format; a comma-separated string is what the first 3.2.0 builds wrote, read the same way so nothing needs migrating (it is rewritten as JSON the next time the tab is saved).

```php
function projectScaleParse(string $stored): array
```

Defined in [includes/projects/settings.php](/code/files/includes/projects/settings.php.md), line 358.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$stored` | `string` |  |  |

**Returns:** `array`

## Called from

- [includes/projects/settings.php](/code/files/includes/projects/settings.php.md) - in [projectSettingValidate()](/code/functions/projectSettingValidate.md), [projectScaleLabels()](/code/functions/projectScaleLabels.md)

