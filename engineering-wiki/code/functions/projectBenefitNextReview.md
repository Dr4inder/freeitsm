# projectBenefitNextReview()

The next review after `$from`, `$months` on; null when it does not repeat.

```php
function projectBenefitNextReview(string $from, ?int $months): ?string
```

Defined in [includes/projects/benefits.php](/code/files/includes/projects/benefits.php.md), line 122.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$from` | `string` |  |  |
| `$months` | `?int` |  |  |

**Returns:** `?string`

## Called from

- [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md) - in `ProjectToolsService::saveBenefit`, `ProjectToolsService::addBenefitMeasure`

