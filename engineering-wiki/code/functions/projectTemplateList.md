# projectTemplateList()

Every template. `$all` = false: only what the new-project picker offers (built-ins not hidden, saved ones active). true: for the Settings tab.

```php
function projectTemplateList(PDO $conn, bool $all = false): array
```

Defined in [includes/projects/templates.php](/code/files/includes/projects/templates.php.md), line 343.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$all` | `bool` | `false` |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 353 | `projectTemplateList` | read [project_templates](/code/tables/project_templates.md), read [analysts](/code/tables/analysts.md) |  |

## Calls

[projectBuiltinTemplates()](/code/functions/projectBuiltinTemplates.md), [projectSetting()](/code/functions/projectSetting.md), [projectTemplateNormalise()](/code/functions/projectTemplateNormalise.md), [projectTemplatesReady()](/code/functions/projectTemplatesReady.md), [projectTemplateSummary()](/code/functions/projectTemplateSummary.md)

## Called from

- [api/projects/lookups.php](/code/files/api/projects/lookups.php.md)
- [api/projects/templates.php](/code/files/api/projects/templates.php.md)

