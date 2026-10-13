# peopleCompanyMatch()

" AND <col> = ?" for one company - NULL counts as the Default company's.

```php
function peopleCompanyMatch(PDO $conn, int $tenantId, string $qualified): array
```

Defined in [includes/people.php](/code/files/includes/people.php.md), line 47.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$tenantId` | `int` |  |  |
| `$qualified` | `string` |  |  |

**Returns:** `array`

## Calls

[getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [isMultiTenant()](/code/functions/isMultiTenant.md)

## Called from

- [includes/people.php](/code/files/includes/people.php.md) - in [peopleListRows()](/code/functions/peopleListRows.md), [companyDetail()](/code/functions/companyDetail.md), [peopleTickets()](/code/functions/peopleTickets.md), [peopleAssets()](/code/functions/peopleAssets.md), [peopleDomains()](/code/functions/peopleDomains.md), [peopleProjects()](/code/functions/peopleProjects.md), [peopleCoursesForCompany()](/code/functions/peopleCoursesForCompany.md), [peopleForms()](/code/functions/peopleForms.md)

