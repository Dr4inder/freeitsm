# brandingScopeValid()

Returns the scope when it is one of the branded screens (login, portal, home), otherwise 'login'.

```php
function brandingScopeValid(string $scope): string
```

Defined in [includes/branding.php](/code/files/includes/branding.php.md), line 129.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$scope` | `string` |  |  |

**Returns:** `string`

## Calls

[brandingScopes()](/code/functions/brandingScopes.md)

## Called from

- [includes/branding.php](/code/files/includes/branding.php.md) - in [brandingLoginFields()](/code/functions/brandingLoginFields.md), [brandingLoginKey()](/code/functions/brandingLoginKey.md), [brandingLoginDesign()](/code/functions/brandingLoginDesign.md)

