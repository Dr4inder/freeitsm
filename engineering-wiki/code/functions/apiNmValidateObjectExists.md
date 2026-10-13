# apiNmValidateObjectExists()

```php
function apiNmValidateObjectExists(PDO $conn, int $objectId, ?array $apiKey = null): void
```

Defined in [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md), line 255.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$objectId` | `int` |  |  |
| `$apiKey` | `?array` | `null` |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 256 | `apiNmValidateObjectExists` | read [cmdb_objects](/code/tables/cmdb_objects.md) |  |

## Calls

[apiError()](/code/functions/apiError.md), [apiKeyCanAccessTenantRow()](/code/functions/apiKeyCanAccessTenantRow.md)

## Called from

- [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md) - in [apiNmValidateNodeInput()](/code/functions/apiNmValidateNodeInput.md)

