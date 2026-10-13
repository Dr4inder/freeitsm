# lmsReminderMessage()

Subject and HTML body for one reminder.

```php
function lmsReminderMessage(array $row): array
```

Defined in [includes/lms_reminders.php](/code/files/includes/lms_reminders.php.md), line 274.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$row` | `array` |  |  |

**Returns:** `array`

## Calls

[fmt_naive_date_for_email()](/code/functions/fmt_naive_date_for_email.md), [lmsReminderLinkFor()](/code/functions/lmsReminderLinkFor.md)

## Called from

- [api/lms/reminder_settings.php](/code/files/api/lms/reminder_settings.php.md)
- [includes/lms_reminders.php](/code/files/includes/lms_reminders.php.md) - in [lmsRemindersRun()](/code/functions/lmsRemindersRun.md)

