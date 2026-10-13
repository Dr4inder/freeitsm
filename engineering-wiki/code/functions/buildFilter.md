# buildFilter()

Resolve a filter type + value into a SQL WHERE fragment + bound params. All filter types are validated against this whitelist; nothing user-supplied goes into the SQL string directly.

```php
function buildFilter(string $filter, string $value, ?string &$friendly): array
```

Defined in [api/intune/dashboard_drilldown.php](/code/files/api/intune/dashboard_drilldown.php.md), line 51.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$filter` | `string` |  |  |
| `$value` | `string` |  |  |
| `$friendly` | `?string` |  |  |

**Returns:** `array`

## Called from

- [api/intune/dashboard_drilldown.php](/code/files/api/intune/dashboard_drilldown.php.md)

