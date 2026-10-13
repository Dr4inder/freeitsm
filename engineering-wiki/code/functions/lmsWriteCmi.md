# lmsWriteCmi()

Upsert one CMI element. The unique key on (progress_id, element) does the work.

```php
function lmsWriteCmi(PDO $conn, int $progressId, string $element, string $value): void
```

Defined in [api/lms/native_progress.php](/code/files/api/lms/native_progress.php.md), line 54.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$progressId` | `int` |  |  |
| `$element` | `string` |  |  |
| `$value` | `string` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 55 | `lmsWriteCmi` | **insert** [lms_cmi_data](/code/tables/lms_cmi_data.md) (`progress_id`, `element`, `value`, `created_datetime`, `updated_datetime`) |  |

## Called from

- [api/lms/native_progress.php](/code/files/api/lms/native_progress.php.md)

