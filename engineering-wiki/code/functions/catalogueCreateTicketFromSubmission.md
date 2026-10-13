# catalogueCreateTicketFromSubmission()

Raise the ticket an approved request becomes.

Deliberately mirrors api/self-service/create_ticket.php — the CORRECT portal path:
requester resolved by users.id (never an email string), company taken from the
requester's own record, status 'Open', the install's default priority. The body is
the submitted answers rendered as an escaped table, so a customer's field values can
never inject markup into the analyst's reading pane.

```php
function catalogueCreateTicketFromSubmission(PDO $conn, array $sub, array $overrides = []): array
```

Defined in [includes/catalogue_approvals.php](/code/files/includes/catalogue_approvals.php.md), line 212.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$sub` | `array` |  |  |
| `$overrides` | `array` | `[]` |  |

**Returns:** array [int ticketId, string ticketNumber]

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 226 | `catalogueCreateTicketFromSubmission` | read [users](/code/tables/users.md) |  |
| 230 | `catalogueCreateTicketFromSubmission` | **insert** [users](/code/tables/users.md) (`email`, `display_name`, `created_at`) |  |
| 237 | `catalogueCreateTicketFromSubmission` | read [users](/code/tables/users.md) |  |
| 296 | `catalogueCreateTicketFromSubmission` | **insert** [tickets](/code/tables/tickets.md) (`ticket_number`, `subject`, `status_id`, `priority_id`, `department_id`, `ticket_type_id`, `assigned_team_id`, `assigned_analyst_id`, `user_id`, `tenant_id`, `created_datetime`, `updated_datetime`) |  |
| 313 | `catalogueCreateTicketFromSubmission` | **insert** [emails](/code/tables/emails.md) (`subject`, `from_address`, `from_name`, `to_recipients`, `received_datetime`, `body_preview`, `body_content`, `body_type`, `has_attachments`, `importance`, `is_read`, `ticket_id`) |  |
| 323 | `catalogueCreateTicketFromSubmission` | **insert** [ticket_audit](/code/tables/ticket_audit.md) (`ticket_id`, `analyst_id`, `field_name`, `old_value`, `new_value`, `created_datetime`) |  |

## Calls

[catalogueOverrideOrDefault()](/code/functions/catalogueOverrideOrDefault.md), [catalogueSubmissionBodyHtml()](/code/functions/catalogueSubmissionBodyHtml.md), [getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [isMultiTenant()](/code/functions/isMultiTenant.md), [ticketSensitivityApplyDefaults()](/code/functions/ticketSensitivityApplyDefaults.md)

## Called from

- [includes/catalogue_approvals.php](/code/files/includes/catalogue_approvals.php.md) - in [catalogueApprovalDecide()](/code/functions/catalogueApprovalDecide.md), [catalogueRaiseTicketFromSubmissionId()](/code/functions/catalogueRaiseTicketFromSubmissionId.md)

## Traps

> [!WARNING]
> **Line 291, in `catalogueCreateTicketFromSubmission`:** the install's numbering, never a number made here - see `messagingGenerateTicketNumber()` for what went wrong when it was.

