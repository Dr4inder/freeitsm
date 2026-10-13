# logApiResponse()

Helper function to log errors/responses

```php
function logApiResponse($conn, $hostId, $message)
```

Defined in [api/external/software-inventory/submit/index.php](/code/files/api/external/software-inventory/submit/index.php.md), line 120.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` |  |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$hostId` |  |  |  |
| `$message` |  |  |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 122 | `logApiResponse` | **insert** [software_inventory_log](/code/tables/software_inventory_log.md) (`host_id`, `api_response`) |  |

## Called from

- [api/external/software-inventory/submit/index.php](/code/files/api/external/software-inventory/submit/index.php.md)

