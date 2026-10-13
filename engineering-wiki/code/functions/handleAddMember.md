# handleAddMember()

Add one person, with an optional last day of access.

⚠️ Members are added and removed ONE AT A TIME rather than by posting a
replacement list. A replace-all would have to re-insert every row, which
silently resets each member's `expires_at` and the date they were added — so
editing a group to add one person would quietly give six other people
permanent access. The LMS group editor does exactly that; it gets away with it
only because its membership carries no expiry to lose.

```php
function handleAddMember(PDO $conn, int $analystId, array $input): void
```

Defined in [api/tickets/user_groups.php](/code/files/api/tickets/user_groups.php.md), line 340.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$input` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 351 | `handleAddMember` | read [knowledge_user_groups](/code/tables/knowledge_user_groups.md) |  |
| 359 | `handleAddMember` | read [analysts](/code/tables/analysts.md) |  |
| 364 | `handleAddMember` | read [users](/code/tables/users.md) |  |
| 380 | `handleAddMember` | **insert** [knowledge_user_group_members](/code/tables/knowledge_user_group_members.md) (`group_id`, `member_type`, `member_id`, `expires_at`, `created_datetime`) |  |

## Calls

[activeTenantFilter()](/code/functions/activeTenantFilter.md), [groupExpiryToUtc()](/code/functions/groupExpiryToUtc.md)

## Called from

- [api/tickets/user_groups.php](/code/files/api/tickets/user_groups.php.md)

