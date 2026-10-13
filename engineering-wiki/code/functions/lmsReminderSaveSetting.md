# lmsReminderSaveSetting()

Write one setting.

```php
function lmsReminderSaveSetting(PDO $conn, string $key, string $value): void
```

Defined in [includes/lms_reminders.php](/code/files/includes/lms_reminders.php.md), line 93.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$key` | `string` |  |  |
| `$value` | `string` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 95 | `lmsReminderSaveSetting` | **insert** [system_settings](/code/tables/system_settings.md) (`setting_key`, `setting_value`, `updated_datetime`) |  |

## Called from

- [api/lms/reminder_settings.php](/code/files/api/lms/reminder_settings.php.md)
- [includes/lms_reminders.php](/code/files/includes/lms_reminders.php.md) - in [lmsRemindersRun()](/code/functions/lmsRemindersRun.md)

