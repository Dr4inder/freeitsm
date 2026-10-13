# mailboxBackfillIdentity()

Populate authenticated_as / authenticated_addresses for a delegated Microsoft mailbox that doesn't have them yet (signed in before we recorded identity, or before alias capture). Returns the (possibly updated) `$mailbox`. No-op for Google and app-only.

```php
function mailboxBackfillIdentity($conn, $mailbox, $accessToken)
```

Defined in [includes/mailbox_graph.php](/code/files/includes/mailbox_graph.php.md), line 210.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` |  |  |  |
| `$mailbox` |  |  |  |
| `$accessToken` |  |  |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 219 | `mailboxBackfillIdentity` | **update** [target_mailboxes](/code/tables/target_mailboxes.md) (`authenticated_as`, `authenticated_addresses`) |  |

## Calls

[mailboxIdentityRecord()](/code/functions/mailboxIdentityRecord.md)

## Called from

- [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md)

