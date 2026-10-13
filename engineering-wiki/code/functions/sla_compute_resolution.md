# sla_compute_resolution()

Compute resolution-time SLA state. The clock stops at ticket close time (read from tickets.closed_datetime or the first audit row that lands on a status with is_closed = 1).

```php
function sla_compute_resolution(
    array $ticket,
    array $priority,
    array $calendar,
    array $timeline
): array
```

Defined in [includes/sla.php](/code/files/includes/sla.php.md), line 198.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$ticket` | `array` |  |  |
| `$priority` | `array` |  |  |
| `$calendar` | `array` |  |  |
| `$timeline` | `array` |  |  |

**Returns:** `array`

## Calls

[sla_elapsed_business_minutes()](/code/functions/sla_elapsed_business_minutes.md)

## Called from

- [includes/sla.php](/code/files/includes/sla.php.md) - in [sla_get_state()](/code/functions/sla_get_state.md)

