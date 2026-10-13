# oav_validate()

Validates a live value against an OpenAPI schema (`$ref`, allOf, nullable) and returns every problem as "path: message" - type mismatches, missing required properties and response fields the schema does not document.

```php
function oav_validate($data, $schema, $components, $path = 'data', $depth = 0)
```

Defined in [api/v1/dev/openapi_verify.php](/code/files/api/v1/dev/openapi_verify.php.md), line 49.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$data` |  |  |  |
| `$schema` |  |  |  |
| `$components` |  |  |  |
| `$path` |  | `'data'` |  |
| `$depth` |  | `0` |  |

## Calls

[oav_resolveRef()](/code/functions/oav_resolveRef.md)

## Called from

- [api/v1/dev/openapi_verify.php](/code/files/api/v1/dev/openapi_verify.php.md) - in [oav_validate()](/code/functions/oav_validate.md)

