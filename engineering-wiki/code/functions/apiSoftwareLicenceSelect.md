# apiSoftwareLicenceSelect()

```php
function apiSoftwareLicenceSelect(): string
```

Defined in [api/v1/resources/software.php](/code/files/api/v1/resources/software.php.md), line 207.

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 208 | `apiSoftwareLicenceSelect` | read [software_inventory_detail](/code/tables/software_inventory_detail.md), read [software_licences](/code/tables/software_licences.md), read [software_inventory_apps](/code/tables/software_inventory_apps.md), read [analysts](/code/tables/analysts.md) |  |

## Called from

- [api/v1/resources/software.php](/code/files/api/v1/resources/software.php.md) - in [apiLoadLicence()](/code/functions/apiLoadLicence.md), [apiSoftwareLicencesList()](/code/functions/apiSoftwareLicencesList.md)

