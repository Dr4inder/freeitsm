# leaseDelete()

Delete a lease, its schedules and its asset rows. The assets themselves keep the lease dates they were given - deleting a record of the agreement does not rewrite what the asset says happened.

```php
function leaseDelete(PDO $conn, ActorContext $ctx, int $id): void
```

Defined in [includes/leases.php](/code/files/includes/leases.php.md), line 263.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$id` | `int` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 266 | `leaseDelete` | **delete** [leases](/code/tables/leases.md) |  |

## Calls

[documentsDetachParent()](/code/functions/documentsDetachParent.md), [leaseLoad()](/code/functions/leaseLoad.md), [leaseSyncCalendar()](/code/functions/leaseSyncCalendar.md)

## Called from

- [api/assets/leases/delete.php](/code/files/api/assets/leases/delete.php.md)

