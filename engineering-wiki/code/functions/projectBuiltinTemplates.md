# projectBuiltinTemplates()

The templates that ship with FreeITSM. English, like the seeded roles.

```php
function projectBuiltinTemplates(): array
```

Defined in [includes/projects/templates.php](/code/files/includes/projects/templates.php.md), line 67.

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 106 | `projectBuiltinTemplates` | read [assets](/code/tables/assets.md) |  |

## Called from

- [includes/projects/templates.php](/code/files/includes/projects/templates.php.md) - in [projectTemplateList()](/code/functions/projectTemplateList.md), [projectTemplateLoad()](/code/functions/projectTemplateLoad.md)
- [includes/services/project_templates.php](/code/files/includes/services/project_templates.php.md) - in `ProjectTemplatesService::setBuiltinHidden`

