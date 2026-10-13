# projectScaleLabels()

The words to show for a scale: the saved ones, or the translated defaults.

```php
function projectScaleLabels(PDO $conn, string $scale): array
```

Defined in [includes/projects/settings.php](/code/files/includes/projects/settings.php.md), line 376.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$scale` | `string` |  |  |

**Returns:** `array`

## Calls

[projectScaleDefaults()](/code/functions/projectScaleDefaults.md), [projectScaleParse()](/code/functions/projectScaleParse.md), [projectScaleSize()](/code/functions/projectScaleSize.md), [projectSetting()](/code/functions/projectSetting.md)

## Called from

- [api/projects/export.php](/code/files/api/projects/export.php.md)
- [api/projects/lookups.php](/code/files/api/projects/lookups.php.md)
- [api/projects/settings.php](/code/files/api/projects/settings.php.md) - in [projectSettingsForScreen()](/code/functions/projectSettingsForScreen.md)
- [includes/report_packs/blocks_projects.php](/code/files/includes/report_packs/blocks_projects.php.md) - in [rpProjectsRisks()](/code/functions/rpProjectsRisks.md)
- [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md) - in `ProjectToolsService::issueToTicket`

