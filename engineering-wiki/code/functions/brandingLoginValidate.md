# brandingLoginValidate()

One value, validated against its declared type. Anything that does not fit becomes the default — never an error, because this runs on the login page.

```php
function brandingLoginValidate(string $field, $raw, array $spec)
```

Defined in [includes/branding.php](/code/files/includes/branding.php.md), line 233.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$field` | `string` |  |  |
| `$raw` |  |  |  |
| `$spec` | `array` |  |  |

## Calls

[brandingPathIsSafe()](/code/functions/brandingPathIsSafe.md)

## Called from

- [api/system/save_branding.php](/code/files/api/system/save_branding.php.md)
- [includes/branding.php](/code/files/includes/branding.php.md) - in [brandingLoginDesign()](/code/functions/brandingLoginDesign.md)

