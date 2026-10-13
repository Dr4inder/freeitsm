# apiSoftwareAppsGet()

GET /software/apps/{id} — app + licences + compliance numbers

```php
function apiSoftwareAppsGet(PDO $conn, array $apiKey, array $params, array $body): void
```

Defined in [api/v1/resources/software.php](/code/files/api/v1/resources/software.php.md), line 131.

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
| 136 | `apiSoftwareAppsGet` | read [software_licences](/code/tables/software_licences.md) |  |

## Calls

[apiIsoDate()](/code/functions/apiIsoDate.md), [apiRespond()](/code/functions/apiRespond.md), [apiSoftwareInstallCount()](/code/functions/apiSoftwareInstallCount.md), [apiSoftwareLoadApp()](/code/functions/apiSoftwareLoadApp.md)

*Nothing calls this function by name.*

