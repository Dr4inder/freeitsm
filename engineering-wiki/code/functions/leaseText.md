# leaseText()

Trims optional text and cuts it to `$max` characters; blank gives null.

```php
function leaseText($v, int $max): ?string
```

Defined in [includes/leases.php](/code/files/includes/leases.php.md), line 154.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` |  |  |  |
| `$max` | `int` |  |  |

**Returns:** `?string`

## Called from

- [includes/leases.php](/code/files/includes/leases.php.md) - in [leaseSave()](/code/functions/leaseSave.md), [leaseScheduleSave()](/code/functions/leaseScheduleSave.md), [leaseAssetUpdate()](/code/functions/leaseAssetUpdate.md)

