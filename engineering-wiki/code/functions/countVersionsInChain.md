# countVersionsInChain()

Walk back to the root of the chain, then count members. Capped to avoid pathological loops.

```php
function countVersionsInChain($conn, $leafId)
```

Defined in [api/network-mapper/list_diagrams.php](/code/files/api/network-mapper/list_diagrams.php.md), line 66.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` |  |  |  |
| `$leafId` |  |  |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 71 | `countVersionsInChain` | read [network_diagrams](/code/tables/network_diagrams.md) |  |
| 86 | `countVersionsInChain` | read [network_diagrams](/code/tables/network_diagrams.md) |  |

## Called from

- [api/network-mapper/list_diagrams.php](/code/files/api/network-mapper/list_diagrams.php.md)

