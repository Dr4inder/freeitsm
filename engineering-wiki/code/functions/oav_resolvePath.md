# oav_resolvePath()

Turns a path template into a real path by replacing each {id} with the first id its parent collection returns - null when there is no row to use. Ids are cached per collection.

```php
function oav_resolvePath($template, $base, $key)
```

Defined in [api/v1/dev/openapi_verify.php](/code/files/api/v1/dev/openapi_verify.php.md), line 87.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$template` |  |  |  |
| `$base` |  |  |  |
| `$key` |  |  |  |

## Calls

[oav_get()](/code/functions/oav_get.md)

## Called from

- [api/v1/dev/openapi_verify.php](/code/files/api/v1/dev/openapi_verify.php.md)

