# oaf_resolvePath()

Turns a path template into a real path by replacing each {id} with the first id its parent collection returns - null when there is no row to use. Ids are cached per collection.

```php
function oaf_resolvePath($template, $base, $key)
```

Defined in [api/v1/dev/openapi_fix.php](/code/files/api/v1/dev/openapi_fix.php.md), line 104.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$template` |  |  |  |
| `$base` |  |  |  |
| `$key` |  |  |  |

## Calls

[oaf_get()](/code/functions/oaf_get.md)

## Called from

- [api/v1/dev/openapi_fix.php](/code/files/api/v1/dev/openapi_fix.php.md)

