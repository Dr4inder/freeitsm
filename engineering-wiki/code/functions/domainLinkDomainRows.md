# domainLinkDomainRows()

Domains by id, shaped for a list on another module's page.

```php
function domainLinkDomainRows(PDO $conn, array $ids): array
```

Defined in [includes/domains/links.php](/code/files/includes/domains/links.php.md), line 309.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ids` | `array` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 314 | `domainLinkDomainRows` | read [domains](/code/tables/domains.md), read [domain_statuses](/code/tables/domain_statuses.md) |  |

## Calls

[entityLink()](/code/functions/entityLink.md)

## Called from

- [includes/domains/links.php](/code/files/includes/domains/links.php.md) - in [domainsLinkedTo()](/code/functions/domainsLinkedTo.md), [domainLinkPickDomains()](/code/functions/domainLinkPickDomains.md), [domainsForContract()](/code/functions/domainsForContract.md)

