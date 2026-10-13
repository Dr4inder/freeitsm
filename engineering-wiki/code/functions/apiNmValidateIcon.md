# apiNmValidateIcon()

```php
function apiNmValidateIcon(PDO $conn, string $iconKey): string
```

Defined in [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md), line 285.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$iconKey` | `string` |  |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 286 | `apiNmValidateIcon` | read [cmdb_icons](/code/tables/cmdb_icons.md) |  |

## Calls

[apiError()](/code/functions/apiError.md)

## Called from

- [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md) - in [apiNmValidateNodeInput()](/code/functions/apiNmValidateNodeInput.md), [apiNmNodesUpdate()](/code/functions/apiNmNodesUpdate.md)

