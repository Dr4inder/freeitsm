# brandingLoginKey()

`form_position` → the settings key it is stored under, for this screen.

```php
function brandingLoginKey(string $field, string $scope = 'login'): string
```

Defined in [includes/branding.php](/code/files/includes/branding.php.md), line 223.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$field` | `string` |  |  |
| `$scope` | `string` | `'login'` |  |

**Returns:** `string`

## Calls

[brandingScopes()](/code/functions/brandingScopes.md), [brandingScopeValid()](/code/functions/brandingScopeValid.md)

## Called from

- [api/system/save_branding.php](/code/files/api/system/save_branding.php.md)
- [includes/branding.php](/code/files/includes/branding.php.md) - in [brandingLoginDesign()](/code/functions/brandingLoginDesign.md)

