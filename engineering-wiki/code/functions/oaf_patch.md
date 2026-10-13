# oaf_patch()

Brings a schema node into line with one live value, in place: follows `$ref` into the shared component schemas, marks nullable where the value is null, types a typeless node, adds missing object properties and drops required fields the response does not have.

Counts every change in the global `$patches`, so the script can say whether anything was
fixed.

```php
function oaf_patch(&$node, $data, &$schemas, $depth = 0)
```

Defined in [api/v1/dev/openapi_fix.php](/code/files/api/v1/dev/openapi_fix.php.md), line 63.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$node` |  |  |  |
| `$data` |  |  |  |
| `$schemas` |  |  |  |
| `$depth` |  | `0` |  |

## Calls

[oaf_infer()](/code/functions/oaf_infer.md)

## Called from

- [api/v1/dev/openapi_fix.php](/code/files/api/v1/dev/openapi_fix.php.md) - in [oaf_patch()](/code/functions/oaf_patch.md)

