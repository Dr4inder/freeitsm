# leaseSave()

Create or update a lease. `$in`: id?, name, reference, supplier_id, cost_centre_id, contract_id, notice_days, notes, company_id (create; or a move while it has no assets).

```php
function leaseSave(PDO $conn, ActorContext $ctx, array $in): int
```

Defined in [includes/leases.php](/code/files/includes/leases.php.md), line 168.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$in` | `array` |  |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 185 | `leaseSave` | read [lease_assets](/code/tables/lease_assets.md), read [lease_schedules](/code/tables/lease_schedules.md) |  |
| 199 | `leaseSave` | read [suppliers](/code/tables/suppliers.md) |  |
| 243 | `leaseSave` | **update** [leases](/code/tables/leases.md) (`tenant_id`, `name`, `reference`, `supplier_id`, `cost_centre_id`, `contract_id`, `notice_days`, `notes`, `updated_datetime`) |  |
| 249 | `leaseSave` | **insert** [leases](/code/tables/leases.md) (`tenant_id`, `name`, `reference`, `supplier_id`, `cost_centre_id`, `contract_id`, `notice_days`, `notes`, `created_by`, `created_datetime`, `updated_datetime`) |  |
| 254 | `leaseSave` | **insert** [lease_schedules](/code/tables/lease_schedules.md) (`lease_id`, `name`, `display_order`) |  |

## Calls

[analystCanAccessTenant()](/code/functions/analystCanAccessTenant.md), [contractCanView()](/code/functions/contractCanView.md), [contractTenantOf()](/code/functions/contractTenantOf.md), [costCentreCheck()](/code/functions/costCentreCheck.md), [getActiveTenantId()](/code/functions/getActiveTenantId.md), [getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [isMultiTenant()](/code/functions/isMultiTenant.md), [leaseLoad()](/code/functions/leaseLoad.md), [leaseSyncCalendar()](/code/functions/leaseSyncCalendar.md), [leaseTenant()](/code/functions/leaseTenant.md), [leaseText()](/code/functions/leaseText.md)

## Called from

- [api/assets/leases/save.php](/code/files/api/assets/leases/save.php.md)

