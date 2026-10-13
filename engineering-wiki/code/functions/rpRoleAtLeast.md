# rpRoleAtLeast()

True if `$role` is at least `$need` ('view' < 'edit' < 'owner').

```php
function rpRoleAtLeast(?string $role, string $need): bool
```

Defined in [includes/report_packs/access.php](/code/files/includes/report_packs/access.php.md), line 106.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$role` | `?string` |  |  |
| `$need` | `string` |  |  |

**Returns:** `bool`

## Called from

- [api/reporting/packs/save.php](/code/files/api/reporting/packs/save.php.md)

