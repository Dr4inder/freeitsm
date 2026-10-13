# recentTrailWithinGap()

Are two visits close enough in time to belong to the same sitting?

```php
function recentTrailWithinGap(string $earlier, string $later): bool
```

Defined in [includes/recent_trail.php](/code/files/includes/recent_trail.php.md), line 359.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$earlier` | `string` |  |  |
| `$later` | `string` |  |  |

**Returns:** `bool`

## Called from

- [includes/recent_trail.php](/code/files/includes/recent_trail.php.md) - in [entityRecentTrail()](/code/functions/entityRecentTrail.md)

