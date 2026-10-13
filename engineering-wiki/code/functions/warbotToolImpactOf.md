# warbotToolImpactOf()

impact_of: the first CMDB object whose name matches, and everything related to it one hop away in either direction, worded with the relationship's verb. Not the full blast radius - that walk stays in the CMDB module.

```php
function warbotToolImpactOf(PDO $conn, array $args, int $analystId): string
```

Defined in [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md), line 576.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$args` | `array` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 582 | `warbotToolImpactOf` | read [cmdb_objects](/code/tables/cmdb_objects.md) |  |
| 595 | `warbotToolImpactOf` | read [cmdb_object_relationships](/code/tables/cmdb_object_relationships.md), read [cmdb_relationship_types](/code/tables/cmdb_relationship_types.md), read [cmdb_objects](/code/tables/cmdb_objects.md) |  |

*Nothing calls this function by name.*

