# selfServiceMailboxes()

```php
function selfServiceMailboxes(PDO $conn, int $userId): array
```

Defined in [includes/self_service_mailboxes.php](/code/files/includes/self_service_mailboxes.php.md), line 31.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$userId` | `int` |  |  |

**Returns:** array<int,array{id:int,name:string,target_mailbox:string,shared:bool}> keyed by mailbox id, the user's own company's first, then shared.

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 33 | `selfServiceMailboxes` | read [target_mailboxes](/code/tables/target_mailboxes.md) |  |
| 36 | `selfServiceMailboxes` | read [users](/code/tables/users.md) |  |

## Calls

[decryptValue()](/code/functions/decryptValue.md), [isMultiTenant()](/code/functions/isMultiTenant.md)

## Called from

- [api/self-service/create_ticket.php](/code/files/api/self-service/create_ticket.php.md)
- [api/self-service/get_mailboxes.php](/code/files/api/self-service/get_mailboxes.php.md)

