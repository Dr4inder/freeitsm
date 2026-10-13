# assetFieldOptions()

Dropdown options for a field, memoised for the life of the request.

```php
function assetFieldOptions(PDO $conn, int $fieldId): array
```

Defined in [api/assets/get_asset_custom_fields.php](/code/files/api/assets/get_asset_custom_fields.php.md), line 30.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$fieldId` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 35 | `assetFieldOptions` | read [asset_field_options](/code/tables/asset_field_options.md) |  |

## Called from

- [api/assets/get_asset_custom_fields.php](/code/files/api/assets/get_asset_custom_fields.php.md)

