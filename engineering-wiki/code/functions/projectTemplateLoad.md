# projectTemplateLoad()

[name, content] for a key, or null when there is no such (usable) template.

```php
function projectTemplateLoad(PDO $conn, string $key, bool $evenHidden = false): ?array
```

Defined in [includes/projects/templates.php](/code/files/includes/projects/templates.php.md), line 366.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$key` | `string` |  |  |
| `$evenHidden` | `bool` | `false` |  |

**Returns:** `?array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 376 | `projectTemplateLoad` | read [project_templates](/code/tables/project_templates.md) |  |

## Calls

[projectBuiltinTemplates()](/code/functions/projectBuiltinTemplates.md), [projectSetting()](/code/functions/projectSetting.md), [projectTemplateNormalise()](/code/functions/projectTemplateNormalise.md), [projectTemplatesReady()](/code/functions/projectTemplatesReady.md)

## Called from

- [includes/services/project_templates.php](/code/files/includes/services/project_templates.php.md) - in `ProjectTemplatesService::createFromTemplate`

