# peopleDomains()

Domains the person is the customer for / the company holds.

```php
function peopleDomains(PDO $conn, int $analystId, array $who): array
```

Defined in [includes/people.php](/code/files/includes/people.php.md), line 412.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$who` | `array` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 423 | `peopleDomains` | read [domains](/code/tables/domains.md), read [domain_statuses](/code/tables/domain_statuses.md) |  |

## Calls

[domainCustomerReady()](/code/functions/domainCustomerReady.md), [entityLink()](/code/functions/entityLink.md), [peopleCompanyMatch()](/code/functions/peopleCompanyMatch.md), [peopleScope()](/code/functions/peopleScope.md)

## Called from

- [includes/people.php](/code/files/includes/people.php.md) - in [personDetail()](/code/functions/personDetail.md), [companyDetail()](/code/functions/companyDetail.md)

