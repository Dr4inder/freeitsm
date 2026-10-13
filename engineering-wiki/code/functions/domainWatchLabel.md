# domainWatchLabel()

The plain-English name of a watched field for the change e-mail (registrar, locks, DNSSEC, name servers, MX, SPF, DMARC).

```php
function domainWatchLabel(string $field): string
```

Defined in [includes/domains/alerts.php](/code/files/includes/domains/alerts.php.md), line 341.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$field` | `string` |  |  |

**Returns:** `string`

## Called from

- [includes/domains/alerts.php](/code/files/includes/domains/alerts.php.md) - in [domainAlertOnChange()](/code/functions/domainAlertOnChange.md)

