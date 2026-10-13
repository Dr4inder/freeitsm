# messagingUserLabel()

"Alice Real <alice@example.com>" - for audit entries.

```php
function messagingUserLabel(PDO $conn, int $userId): string
```

Defined in [includes/messaging/ingest.php](/code/files/includes/messaging/ingest.php.md), line 743.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$userId` | `int` |  |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 745 | `messagingUserLabel` | read [users](/code/tables/users.md) |  |

## Called from

- [includes/messaging/ingest.php](/code/files/includes/messaging/ingest.php.md) - in [messagingTelegramLinkPhone()](/code/functions/messagingTelegramLinkPhone.md)

