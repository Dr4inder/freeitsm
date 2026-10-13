# projectTargetValueNames()

Names for list values in rules (status 6 => Retired), keyed "field:id".

```php
function projectTargetValueNames(PDO $conn, array $targets): array
```

Defined in [includes/projects/targets.php](/code/files/includes/projects/targets.php.md), line 238.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$targets` | `array` |  |  |

**Returns:** `array`

## Called from

- [includes/projects/targets.php](/code/files/includes/projects/targets.php.md) - in [projectTargetsDetail()](/code/functions/projectTargetsDetail.md)
- [includes/projects/templates.php](/code/files/includes/projects/templates.php.md) - in [projectTemplateCapture()](/code/functions/projectTemplateCapture.md)

