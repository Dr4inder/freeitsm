# leaseDate()

Validates an optional YYYY-MM-DD date; blank gives null, anything else invalid throws a validation error naming `$label`.

```php
function leaseDate($v, string $label): ?string
```

Defined in [includes/leases.php](/code/files/includes/leases.php.md), line 142.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` |  |  |  |
| `$label` | `string` |  |  |

**Returns:** `?string`

## Called from

- [includes/leases.php](/code/files/includes/leases.php.md) - in [leaseScheduleSave()](/code/functions/leaseScheduleSave.md), [leaseAssetUpdate()](/code/functions/leaseAssetUpdate.md)

