# apiSoftwareLicencesList()

GET /software/licences

```php
function apiSoftwareLicencesList(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/software.php](/code/files/api/v1/resources/software.php.md), line 286.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$apiKey` | `array` |  |  |
| `$params` | `array` |  |  |
| `$body` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 335 | `apiSoftwareLicencesList` | read [software_licences](/code/tables/software_licences.md), read [software_inventory_apps](/code/tables/software_inventory_apps.md) |  |

## Calls

[apiError()](/code/functions/apiError.md), [apiPagination()](/code/functions/apiPagination.md), [apiRespond()](/code/functions/apiRespond.md), [apiSoftwareLicenceSelect()](/code/functions/apiSoftwareLicenceSelect.md), [naive_today_sql()](/code/functions/naive_today_sql.md)

*Nothing calls this function by name.*

