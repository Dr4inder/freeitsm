# mailboxFetchAddresses()

Fetch ALL email addresses for the signed-in (delegated) mailbox — primary SMTP, UPN and every alias (proxyAddresses). This is how we tell that e.g. ed@ is just an alias of the edmozley@ mailbox: the token only carries the UPN, so we have to ask Graph for the alias list. Needs the lightweight User.Read scope; returns [] if it isn't granted (older mailboxes) so the caller can fall back to the token claim.

```php
function mailboxFetchAddresses($accessToken)
```

Defined in [includes/mailbox_graph.php](/code/files/includes/mailbox_graph.php.md), line 126.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$accessToken` |  |  |  |

## Calls

[sslApplyCurl()](/code/functions/sslApplyCurl.md)

## Called from

- [includes/mailbox_graph.php](/code/files/includes/mailbox_graph.php.md) - in [mailboxIdentityRecord()](/code/functions/mailboxIdentityRecord.md)

