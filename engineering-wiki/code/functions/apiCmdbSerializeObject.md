# apiCmdbSerializeObject()

Shapes a CMDB object row for the API - name, company, class, parent, planned flag and dates.

```php
function apiCmdbSerializeObject(array $r): array
```

Defined in [api/v1/resources/cmdb.php](/code/files/api/v1/resources/cmdb.php.md), line 169.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$r` | `array` |  |  |

**Returns:** `array`

## Calls

[apiIsoDate()](/code/functions/apiIsoDate.md)

## Called from

- [api/v1/resources/cmdb.php](/code/files/api/v1/resources/cmdb.php.md) - in [apiCmdbObjectsGet()](/code/functions/apiCmdbObjectsGet.md), [apiCmdbObjectsCreate()](/code/functions/apiCmdbObjectsCreate.md), [apiCmdbObjectsUpdate()](/code/functions/apiCmdbObjectsUpdate.md)

