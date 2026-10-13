# sla_emit_workflow_event()

Emit the time-based workflow event for an SLA warning / breach.

`$trigger` is the SLA module's own vocabulary ('warning' / 'breach'); the
workflow trigger names are `sla.warning` / `sla.breached`.

FINGERPRINT = the SLA target in minutes. That is what makes this re-arm
correctly: change a ticket's priority and its SLA target changes with it, so
the new deadline is a new fingerprint and is allowed to breach and fire again.
Fingerprinting on the ticket alone would suppress the second escalation
forever — the workflow would go quiet exactly when the ticket got more urgent.

The full ticket is loaded into the payload so an escalation can act on the
ticket itself (reassign, reprioritise, message about it) — not just announce
that a number went red.

```php
function sla_emit_workflow_event(
    PDO $conn,
    int $ticketId,
    string $targetType,
    string $trigger,
    array $target
): void
```

Defined in [includes/sla_notifications.php](/code/files/includes/sla_notifications.php.md), line 138.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ticketId` | `int` |  |  |
| `$targetType` | `string` |  |  |
| `$trigger` | `string` |  |  |
| `$target` | `array` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 153 | `sla_emit_workflow_event` | read [tickets](/code/tables/tickets.md) |  |
| 166 | `sla_emit_workflow_event` | read [emails](/code/tables/emails.md) |  |

## Calls

[workflowEmitOnce()](/code/functions/workflowEmitOnce.md)

## Called from

- [includes/sla_notifications.php](/code/files/includes/sla_notifications.php.md) - in [sla_run_breach_check()](/code/functions/sla_run_breach_check.md)

