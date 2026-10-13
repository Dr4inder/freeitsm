# domainImportResolveNames()

CSV columns carry names; the service wants ids. status / owner / registrar are matched by name (case-insensitive); an unmatched name is dropped rather than failing the row — the domain is still worth having.

```php
function domainImportResolveNames(PDO $conn, array $fields, array $row): array
```

Defined in [api/domains/bulk_add.php](/code/files/api/domains/bulk_add.php.md), line 54.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$fields` | `array` |  |  |
| `$row` | `array` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 57 | `domainImportResolveNames` | read [domain_statuses](/code/tables/domain_statuses.md) |  |
| 58 | `domainImportResolveNames` | read [analysts](/code/tables/analysts.md) |  |
| 59 | `domainImportResolveNames` | read [suppliers](/code/tables/suppliers.md) |  |

## Called from

- [api/domains/bulk_add.php](/code/files/api/domains/bulk_add.php.md)

