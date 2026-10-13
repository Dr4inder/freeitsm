# lmsCtFindSitting()

The sitting a raw token opens, or null. Malformed tokens never reach the database.

```php
function lmsCtFindSitting(PDO $conn, string $raw): ?array
```

Defined in [includes/lms/competency_tests.php](/code/files/includes/lms/competency_tests.php.md), line 273.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$raw` | `string` |  |  |

**Returns:** `?array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 276 | `lmsCtFindSitting` | read [lms_ct_sittings](/code/tables/lms_ct_sittings.md) |  |

## Called from

- [api/lms/test_public.php](/code/files/api/lms/test_public.php.md)
- [lms/test.php](/code/files/lms/test.php.md)

