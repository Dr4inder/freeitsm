# sla_cron_log_finish()

Completes this run's sla_cron_runs row with its end time, duration, outcome, counts and notes; does nothing when the start row was never written.

```php
function sla_cron_log_finish(
    PDO $conn,
    ?int $runId,
    string $outcome,
    array $counts = [],
    ?string $notes = null
): void
```

Defined in [cron/sla_breach_check.php](/code/files/cron/sla_breach_check.php.md), line 60.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$runId` | `?int` |  |  |
| `$outcome` | `string` |  |  |
| `$counts` | `array` | `[]` |  |
| `$notes` | `?string` | `null` |  |

**Returns:** `void`

**Writes:** sla_cron_runs(ended_at, duration_ms, outcome, sent_count, skipped_count, error_count, notes) - the run log shown in SLA settings

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 63 | `sla_cron_log_finish` | **update** [sla_cron_runs](/code/tables/sla_cron_runs.md) (`ended_at`, `duration_ms`, `outcome`, `sent_count`, `skipped_count`, `error_count`, `notes`) |  |

## Called from

- [cron/sla_breach_check.php](/code/files/cron/sla_breach_check.php.md)

