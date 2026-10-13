# projectTicketSpike()

Have this many linked tickets been raised in the last 7 days? (Projects -> Settings -> Health)

```php
function projectTicketSpike(array $stats, array $cfg): bool
```

Defined in [includes/projects/read.php](/code/files/includes/projects/read.php.md), line 164.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$stats` | `array` |  |  |
| `$cfg` | `array` |  |  |

**Returns:** `bool`

## Called from

- [includes/projects/read.php](/code/files/includes/projects/read.php.md) - in [projectAutoHealth()](/code/functions/projectAutoHealth.md), [projectDecorate()](/code/functions/projectDecorate.md)

