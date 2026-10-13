# landingIsValid()

Is this a landing key we recognise? Everything from outside goes through here.

```php
function landingIsValid($key): bool
```

Defined in [includes/landing.php](/code/files/includes/landing.php.md), line 54.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$key` |  |  |  |

**Returns:** `bool`

## Calls

[landingTargets()](/code/functions/landingTargets.md)

## Called from

- [api/system/save_branding.php](/code/files/api/system/save_branding.php.md)
- [includes/landing.php](/code/files/includes/landing.php.md) - in [landingInstallDefault()](/code/functions/landingInstallDefault.md), [landingResolve()](/code/functions/landingResolve.md), [landingRefreshCookieFromPreference()](/code/functions/landingRefreshCookieFromPreference.md), [landingOnPreferenceSaved()](/code/functions/landingOnPreferenceSaved.md)

