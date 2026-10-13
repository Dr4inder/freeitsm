# projectBenefitNotifyIds()

Who is reminded about a benefit's review (project_benefit_notify).

```php
function projectBenefitNotifyIds(PDO $conn, ?int $ownerId, ?int $pmId): array
```

Defined in [includes/projects/benefits.php](/code/files/includes/projects/benefits.php.md), line 131.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ownerId` | `?int` |  |  |
| `$pmId` | `?int` |  |  |

**Returns:** `array`

## Calls

[projectSetting()](/code/functions/projectSetting.md)

## Called from

- [includes/projects/benefits.php](/code/files/includes/projects/benefits.php.md) - in [projectAlertsBenefits()](/code/functions/projectAlertsBenefits.md)

