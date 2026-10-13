# brandingLoginCss()

The design as CSS custom properties.

🔑 String concatenation is safe HERE and only here, because every value
reaching this function has already been through `brandingLoginValidate()`: a
colour matched `#rrggbb`, a direction was one of five words, a number was
clamped. Nothing else may be interpolated into CSS.

```php
function brandingLoginCss(array $d): string
```

Defined in [includes/branding.php](/code/files/includes/branding.php.md), line 307.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$d` | `array` |  |  |

**Returns:** `string`

## Called from

- [index.php](/code/files/index.php.md)
- [self-service/login.php](/code/files/self-service/login.php.md)

