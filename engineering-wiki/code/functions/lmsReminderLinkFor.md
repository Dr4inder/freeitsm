# lmsReminderLinkFor()

The public address of the right training page for this kind of learner.

Built from the configured public URL rather than BASE_URL for the same reason
the portal's verification and password-reset links are: these emails are sent
by a cron, where there is no browser request to work a hostname out from, and
a link that lands on the wrong host reads as a phishing attempt.

```php
function lmsReminderLinkFor(string $learnerType): string
```

Defined in [includes/lms_reminders.php](/code/files/includes/lms_reminders.php.md), line 321.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$learnerType` | `string` |  |  |

**Returns:** `string`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 326 | `lmsReminderLinkFor` | read [system_settings](/code/tables/system_settings.md) |  |

## Calls

[connectToDatabase()](/code/functions/connectToDatabase.md)

## Called from

- [includes/lms_reminders.php](/code/files/includes/lms_reminders.php.md) - in [lmsReminderMessage()](/code/functions/lmsReminderMessage.md)

