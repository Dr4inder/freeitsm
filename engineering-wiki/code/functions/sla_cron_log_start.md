# sla_cron_log_start()

Helper — record a run row. Returns the inserted id (or null if logging fails).

```php
function sla_cron_log_start(PDO $conn, bool $isCli, ?string $clientIp): ?int
```

Defined in [cron/sla_breach_check.php](/code/files/cron/sla_breach_check.php.md), line 46.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$isCli` | `bool` |  |  |
| `$clientIp` | `?string` |  |  |

**Returns:** `?int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 48 | `sla_cron_log_start` | **insert** [sla_cron_runs](/code/tables/sla_cron_runs.md) (`started_at`, `invocation`, `client_ip`, `outcome`) |  |

## Called from

- [cron/sla_breach_check.php](/code/files/cron/sla_breach_check.php.md)

