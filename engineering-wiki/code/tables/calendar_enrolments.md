# calendar_enrolments

## Columns

| Column | Definition | Notes |
|---|---|---|
| `id` | `INT NOT NULL AUTO_INCREMENT` |  |
| `analyst_id` | `INT NOT NULL` |  |
| `mode` | `VARCHAR(10) NOT NULL DEFAULT 'off'` | off \| push \| feed — ONE choice, or you see every ticket twice. |
| `task_mode` | `VARCHAR(10) NOT NULL DEFAULT 'off'` | What of a TASK reaches the calendar: off \| work \| due \| both (#75).  🔑 SEPARATE FROM `mode`, which decides HOW things get there (a push, a feed, or nothing). This decides WHAT. Folding them into one value would need eight combinations to say two independent things, and turning tickets off would silently take tasks with them.  ⚠️ Defaults to 'off'. Existing analysts asked for their scheduled ticket work; nobody asked for their task list to appear in Outlook overnight, and a calendar that fills itself up is a calendar people disconnect. |
| `connection_id` | `INT NULL` |  |
| `calendar_address` | `VARCHAR(255) NULL` |  |
| `credentials` | `LONGTEXT NULL` |  |
| `subscription_id` | `VARCHAR(255) NULL` |  |
| `subscription_expires` | `DATETIME NULL` |  |
| `subscription_secret` | `VARCHAR(128) NULL` |  |
| `delta_token` | `TEXT NULL` |  |
| `delta_synced_datetime` | `DATETIME NULL` |  |
| `last_sync_datetime` | `DATETIME NULL` |  |
| `last_error` | `VARCHAR(500) NULL` |  |
| `created_datetime` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP` |  |
| `updated_datetime` | `DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [api/system/calendar_sync.php](/code/files/api/system/calendar_sync.php.md):93 | `csTakeBack` | update | `mode`, `calendar_address`, `credentials`, `connection_id`, `delta_token`, `delta_synced_datetime`, `subscription_id`, `subscription_expires`, `subscription_secret`, `last_error` |  |
| [api/system/calendar_sync.php](/code/files/api/system/calendar_sync.php.md):117 | `csAdoptOrphans` | update | `connection_id` |  |
| [api/system/calendar_sync.php](/code/files/api/system/calendar_sync.php.md):485 |  | insert | `analyst_id`, `calendar_address`, `mode` |  |
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md):3916 |  | delete |  |  |
| [api/tickets/calendar_enrolment.php](/code/files/api/tickets/calendar_enrolment.php.md):131 | `enrolSwitchConnection` | update | `connection_id` |  |
| [api/tickets/calendar_enrolment.php](/code/files/api/tickets/calendar_enrolment.php.md):151 | `enrolSwitchConnection` | update | `connection_id`, `mode`, `calendar_address`, `credentials`, `delta_token`, `delta_synced_datetime`, `subscription_id`, `subscription_expires`, `subscription_secret`, `last_error` |  |
| [api/tickets/calendar_enrolment.php](/code/files/api/tickets/calendar_enrolment.php.md):240 |  | update | `mode`, `calendar_address`, `credentials`, `delta_token`, `delta_synced_datetime`, `last_error`, `updated_datetime` |  |
| [api/tickets/calendar_enrolment.php](/code/files/api/tickets/calendar_enrolment.php.md):330 |  | insert | `analyst_id`, `mode`, `connection_id`, `calendar_address`, `credentials` |  |
| [api/tickets/calendar_enrolment.php](/code/files/api/tickets/calendar_enrolment.php.md):459 |  | insert | `analyst_id`, `mode`, `task_mode`, `connection_id` |  |
| [includes/calendar_sync/pull.php](/code/files/includes/calendar_sync/pull.php.md):90 | `calendarSyncPullForAnalyst` | update | `delta_token`, `delta_synced_datetime` |  |
| [includes/calendar_sync/pull.php](/code/files/includes/calendar_sync/pull.php.md):473 | `calendarStoreSubscription` | update | `subscription_id`, `subscription_expires`, `subscription_secret`, `last_error` |  |
| [includes/calendar_sync/pull.php](/code/files/includes/calendar_sync/pull.php.md):487 | `calendarClearSubscription` | update | `subscription_id`, `subscription_expires`, `subscription_secret` |  |
| [includes/calendar_sync/push.php](/code/files/includes/calendar_sync/push.php.md):477 | `calendarSyncRecordError` | insert | `analyst_id`, `mode`, `last_error` |  |
| [includes/calendar_sync/push.php](/code/files/includes/calendar_sync/push.php.md):493 | `calendarSyncClearError` | update | `last_error`, `last_sync_datetime` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/calendar/graph_notify.php](/code/files/api/calendar/graph_notify.php.md) | L93 |  |
| [api/system/calendar_sync.php](/code/files/api/system/calendar_sync.php.md) | csUsage L55, csTakeBack L84, L181, L182, L196, L208 |  |
| [includes/calendar_sync/calendar_sync.php](/code/files/includes/calendar_sync/calendar_sync.php.md) | calendarSyncEnrolment L307 |  |
| [includes/calendar_sync/pull.php](/code/files/includes/calendar_sync/pull.php.md) | calendarSyncPullAll L332, calendarSyncEnsureAllSubscriptions L501 |  |

