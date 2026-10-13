# sla_elapsed_business_minutes()

Walk the status timeline, summing business minutes in intervals where the status was NOT pausing. Bounded between [start, end].

```php
function sla_elapsed_business_minutes(
    array $timeline,
    DateTimeImmutable $start,
    DateTimeImmutable $end,
    array $calendar
): int
```

Defined in [includes/sla.php](/code/files/includes/sla.php.md), line 237.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$timeline` | `array` |  |  |
| `$start` | `DateTimeImmutable` |  |  |
| `$end` | `DateTimeImmutable` |  |  |
| `$calendar` | `array` |  |  |

**Returns:** `int`

## Calls

[sla_business_minutes()](/code/functions/sla_business_minutes.md)

## Called from

- [includes/sla.php](/code/files/includes/sla.php.md) - in [sla_compute_response()](/code/functions/sla_compute_response.md), [sla_compute_resolution()](/code/functions/sla_compute_resolution.md)

