# apiNmChainIds()

The whole version chain containing `$diagramId`: root first. Caps mirror the UI (200 up / 500 total).

```php
function apiNmChainIds(PDO $conn, int $diagramId): array
```

Defined in [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md), line 117.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$diagramId` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 120 | `apiNmChainIds` | read [network_diagrams](/code/tables/network_diagrams.md) |  |
| 131 | `apiNmChainIds` | read [network_diagrams](/code/tables/network_diagrams.md) |  |

## Called from

- [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md) - in [apiNmVersionsList()](/code/functions/apiNmVersionsList.md)

