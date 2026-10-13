# domainSettingValidate()

Validate and normalise one incoming value. Returns the value to store, or throws InvalidArgumentException with a message fit to show the operator.

```php
function domainSettingValidate(string $key, $raw): string
```

Defined in [includes/domains/settings.php](/code/files/includes/domains/settings.php.md), line 179.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$key` | `string` |  |  |
| `$raw` |  |  |  |

**Returns:** `string`

## Calls

[domainParseDays()](/code/functions/domainParseDays.md), [domainSettingDefinitions()](/code/functions/domainSettingDefinitions.md)

## Called from

- [api/domains/settings.php](/code/files/api/domains/settings.php.md)

