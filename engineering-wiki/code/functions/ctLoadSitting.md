# ctLoadSitting()

```php
function ctLoadSitting(PDO $conn, int $id): array
```

Defined in [api/lms/tests.php](/code/files/api/lms/tests.php.md), line 56.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$id` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 58 | `ctLoadSitting` | read [lms_ct_sittings](/code/tables/lms_ct_sittings.md), read [lms_ct_tests](/code/tables/lms_ct_tests.md) |  |

## Calls

[ctFail()](/code/functions/ctFail.md)

## Called from

- [api/lms/tests.php](/code/files/api/lms/tests.php.md)

