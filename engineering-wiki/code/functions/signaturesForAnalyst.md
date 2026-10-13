# signaturesForAnalyst()

Every signature belonging to one analyst, default first.

```php
function signaturesForAnalyst(PDO $conn, int $analystId): array
```

Defined in [includes/signatures.php](/code/files/includes/signatures.php.md), line 90.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 93 | `signaturesForAnalyst` | read [analyst_signatures](/code/tables/analyst_signatures.md) |  |

## Called from

- [api/myaccount/get_signatures.php](/code/files/api/myaccount/get_signatures.php.md)
- [includes/signatures.php](/code/files/includes/signatures.php.md) - in [defaultSignatureForAnalyst()](/code/functions/defaultSignatureForAnalyst.md)

