# sla_compute_response()

Compute response-time SLA state. The clock stops at the first response, where "first response" is defined per the sla_first_response_definition setting. v1 supports 'status_change' (first audit row that moves status away from the default) for all three options — outbound-email detection is deferred to a follow-up (see docs/sla.md).

```php
function sla_compute_response(
    PDO $conn,
    array $ticket,
    array $priority,
    array $calendar,
    array $timeline,
    array $settings
): array
```

Defined in [includes/sla.php](/code/files/includes/sla.php.md), line 160.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ticket` | `array` |  |  |
| `$priority` | `array` |  |  |
| `$calendar` | `array` |  |  |
| `$timeline` | `array` |  |  |
| `$settings` | `array` |  |  |

**Returns:** `array`

## Calls

[sla_elapsed_business_minutes()](/code/functions/sla_elapsed_business_minutes.md)

## Called from

- [includes/sla.php](/code/files/includes/sla.php.md) - in [sla_get_state()](/code/functions/sla_get_state.md)

