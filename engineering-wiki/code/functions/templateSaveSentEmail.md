# templateSaveSentEmail()

Save the sent template email to the emails table.

```php
function templateSaveSentEmail(
    PDO $conn,
    int $ticketId,
    array $mailbox,
    string $to,
    string $subject,
    string $body
): void
```

Defined in [includes/template_email.php](/code/files/includes/template_email.php.md), line 710.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ticketId` | `int` |  |  |
| `$mailbox` | `array` |  |  |
| `$to` | `string` |  |  |
| `$subject` | `string` |  |  |
| `$body` | `string` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 712 | `templateSaveSentEmail` | **insert** [emails](/code/tables/emails.md) (`subject`, `from_address`, `from_name`, `to_recipients`, `received_datetime`, `body_content`, `body_type`, `ticket_id`, `is_initial`, `direction`, `mailbox_id`) |  |
| 729 | `templateSaveSentEmail` | **update** [tickets](/code/tables/tickets.md) (`updated_datetime`) |  |

## Called from

- [includes/template_email.php](/code/files/includes/template_email.php.md) - in [sendTemplateEmail()](/code/functions/sendTemplateEmail.md)
- [workflow/includes/engine.php](/code/files/workflow/includes/engine.php.md) - in `WorkflowEngine::action_send_email`

