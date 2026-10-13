# projectProposalNamedApprover()

The named approver, when the setting names one and they are still an active analyst.

```php
function projectProposalNamedApprover(PDO $conn): ?int
```

Defined in [includes/projects/intake.php](/code/files/includes/projects/intake.php.md), line 53.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Returns:** `?int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 58 | `projectProposalNamedApprover` | read [analysts](/code/tables/analysts.md) |  |

## Calls

[projectSetting()](/code/functions/projectSetting.md)

## Called from

- [includes/projects/intake.php](/code/files/includes/projects/intake.php.md) - in [projectCanDecideProposal()](/code/functions/projectCanDecideProposal.md), [projectProposalApprovers()](/code/functions/projectProposalApprovers.md)

