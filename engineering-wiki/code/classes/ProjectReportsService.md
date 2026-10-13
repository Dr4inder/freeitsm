# ProjectReportsService

> Class in [includes/services/project_reports.php](/code/files/includes/services/project_reports.php.md), line 30

## Methods

| Method | What it does |
|---|---|
| [ready()](#ready) | True when the project_reports table exists (after Database Verification). |
| [listFor()](#listfor) | Reports (not briefings), newest first, with who wrote and approved them. |
| [latestBriefing()](#latestbriefing) | The project's most recent AI briefing, or null. |
| [shape()](#shape) | A project_reports row as the API returns it. |
| [briefing()](#briefing) | The Overview's briefing: the latest, or a fresh one if it is older than the cooldown. |
| [draftWithAi()](#draftwithai) | Draft a report with the AI. Saved as a draft for a person to edit and approve. |
| [save()](#save) | Write a report by hand (no id) or edit a draft (id). |
| [approve()](#approve) | Approve a draft. The project manager's, the creator's or a Projects manager's. |
| [delete()](#delete) | Delete a draft (anyone who may change the project) or an approved report (those who may approve). |
| [scheduleReady()](#scheduleready) | Have the 3.3.0 columns arrived (projects.report_schedule, project_reports.sent_*)? |
| [schedule()](#schedule) | The project's schedule: {schedule: off\|weekly\|fortnightly\|monthly, kind}. |
| [setSchedule()](#setschedule) | Set it - anyone who may change the project. |
| [recipients()](#recipients) | Who a report can be sent to from the project itself: its members with an email address - analysts, the analysts in a member team, and People - and the project manager. Each once, by address. |
| [send()](#send) | Email an APPROVED report (3.3.0) - the people who may approve it may send it, to any addresses (the page offers the project's members). Sent one by one through the system mailbox (ssSendSystemEmail, logged as "Project report"). Returns ['sent' => [...], 'failed' => [...]]; what was sent is recorded on the report and in the history. |
| [emailHtml()](#emailhtml) | The email: the report as the page shows it (the same three marks), in plain inline styles. |
| [markdownHtml()](#markdownhtml) | Escape, then headings, bullets and **bold** - the marks the AI is told to use (projects-reports.js `md()`). |
| [runSchedules()](#runschedules) | Scheduled drafts (3.3.0), from `projectAlertsScan()`: each ACTIVE project with a schedule gets one draft per period - weekly (ISO week), fortnightly (each even-numbered ISO week's pair) or monthly - drafted by the AI when it is set up, otherwise a draft holding the facts to write from. Never approved by itself: the project manager is told (project.report_drafted) and approves, edits or deletes it. One per period on the ledger, however often the scan runs. |
| [periodKey()](#periodkey) | This period's ledger fingerprint, or null when this is not a drafting period (fortnightly, odd weeks). |
| [draftScheduled()](#draftscheduled) | One scheduled draft: the AI's when it is set up and answers, otherwise the facts. |
| [load()](#load) | Loads one report (not a briefing) of the project; throws not found otherwise. |

### ready

*public static* - line 36

True when the project_reports table exists (after Database Verification).

```php
function ready(PDO $conn): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 38 | `ProjectReportsService::ready` | read [project_reports](/code/tables/project_reports.md) |  |

**Called from:** [api/projects/reports.php](/code/files/api/projects/reports.php.md)

### listFor

*public static* - line 42

Reports (not briefings), newest first, with who wrote and approved them.

```php
function listFor(PDO $conn, int $projectId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 46 | `ProjectReportsService::listFor` | read [project_reports](/code/tables/project_reports.md), read [analysts](/code/tables/analysts.md) |  |

**Called from:** [api/projects/reports.php](/code/files/api/projects/reports.php.md)

### latestBriefing

*public static* - line 60

The project's most recent AI briefing, or null.

```php
function latestBriefing(PDO $conn, int $projectId): ?array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 63 | `ProjectReportsService::latestBriefing` | read [project_reports](/code/tables/project_reports.md), read [analysts](/code/tables/analysts.md) |  |

**Called from:** [api/projects/reports.php](/code/files/api/projects/reports.php.md)

### shape

*private static* - line 73

A project_reports row as the API returns it.

```php
function shape(array $r): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$r` | `array` |  |  |

### briefing

*public static* - line 87

The Overview's briefing: the latest, or a fresh one if it is older than the cooldown.

```php
function briefing(PDO $conn, ActorContext $ctx, int $projectId, bool $refresh): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$refresh` | `bool` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 96 | `ProjectReportsService::briefing` | **delete** [project_reports](/code/tables/project_reports.md) |  |
| 97 | `ProjectReportsService::briefing` | **insert** [project_reports](/code/tables/project_reports.md) (`project_id`, `kind`, `title`, `body`, `status`, `ai_drafted`, `ai_model`, `created_by_id`, `created_datetime`, `updated_datetime`) |  |

**Called from:** [api/projects/reports.php](/code/files/api/projects/reports.php.md)

### draftWithAi

*public static* - line 104

Draft a report with the AI. Saved as a draft for a person to edit and approve.

```php
function draftWithAi(
    PDO $conn,
    ActorContext $ctx,
    int $projectId,
    string $kind,
    int $days = 14
): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$kind` | `string` |  |  |
| `$days` | `int` | `14` |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 113 | `ProjectReportsService::draftWithAi` | **insert** [project_reports](/code/tables/project_reports.md) (`project_id`, `kind`, `title`, `body`, `status`, `ai_drafted`, `ai_model`, `created_by_id`, `created_datetime`, `updated_datetime`) |  |

**Called from:** [api/projects/reports.php](/code/files/api/projects/reports.php.md)

### save

*public static* - line 122

Write a report by hand (no id) or edit a draft (id).

```php
function save(PDO $conn, ActorContext $ctx, int $projectId, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 136 | `ProjectReportsService::save` | **update** [project_reports](/code/tables/project_reports.md) (`title`, `body`, `ai_edited`, `updated_by_id`, `updated_datetime`) |  |
| 142 | `ProjectReportsService::save` | **insert** [project_reports](/code/tables/project_reports.md) (`project_id`, `kind`, `title`, `body`, `status`, `ai_drafted`, `created_by_id`, `created_datetime`, `updated_datetime`) |  |

**Called from:** [api/projects/reports.php](/code/files/api/projects/reports.php.md)

### approve

*public static* - line 151

Approve a draft. The project manager's, the creator's or a Projects manager's.

```php
function approve(PDO $conn, ActorContext $ctx, int $projectId, int $id): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 160 | `ProjectReportsService::approve` | **update** [project_reports](/code/tables/project_reports.md) (`status`, `approved_by_id`, `approved_datetime`) |  |

**Called from:** [api/projects/reports.php](/code/files/api/projects/reports.php.md)

### delete

*public static* - line 166

Delete a draft (anyone who may change the project) or an approved report (those who may approve).

```php
function delete(PDO $conn, ActorContext $ctx, int $projectId, int $id): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 177 | `ProjectReportsService::delete` | **delete** [project_reports](/code/tables/project_reports.md) |  |

**Called from:** [api/projects/reports.php](/code/files/api/projects/reports.php.md)

### scheduleReady

*public static* - line 189

Have the 3.3.0 columns arrived (projects.report_schedule, project_reports.sent_*)?

```php
function scheduleReady(PDO $conn): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 193 | `ProjectReportsService::scheduleReady` | read [projects](/code/tables/projects.md) |  |
| 193 | `ProjectReportsService::scheduleReady` | read [project_reports](/code/tables/project_reports.md) |  |

### schedule

*public static* - line 200

The project's schedule: {schedule: off|weekly|fortnightly|monthly, kind}.

```php
function schedule(PDO $conn, int $projectId): ?array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 203 | `ProjectReportsService::schedule` | read [projects](/code/tables/projects.md) |  |

**Called from:** [api/projects/reports.php](/code/files/api/projects/reports.php.md)

### setSchedule

*public static* - line 210

Set it - anyone who may change the project.

```php
function setSchedule(
    PDO $conn,
    ActorContext $ctx,
    int $projectId,
    string $schedule,
    string $kind
): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$schedule` | `string` |  |  |
| `$kind` | `string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 219 | `ProjectReportsService::setSchedule` | **update** [projects](/code/tables/projects.md) (`report_schedule`, `report_schedule_kind`) |  |

**Called from:** [api/projects/reports.php](/code/files/api/projects/reports.php.md)

### recipients

*public static* - line 228

Who a report can be sent to from the project itself: its members with an email address - analysts, the analysts in a member team, and People - and the project manager. Each once, by address.

```php
function recipients(PDO $conn, int $projectId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 237 | `ProjectReportsService::recipients` | read [projects](/code/tables/projects.md), read [analysts](/code/tables/analysts.md) |  |
| 242 | `ProjectReportsService::recipients` | read [analyst_teams](/code/tables/analyst_teams.md), read [analysts](/code/tables/analysts.md) |  |

**Called from:** [api/projects/reports.php](/code/files/api/projects/reports.php.md)

### send

*public static* - line 259

Email an APPROVED report (3.3.0) - the people who may approve it may send it, to any addresses (the page offers the project's members). Sent one by one through the system mailbox (ssSendSystemEmail, logged as "Project report"). Returns ['sent' => [...], 'failed' => [...]]; what was sent is recorded on the report and in the history.

```php
function send(
    PDO $conn,
    ActorContext $ctx,
    int $projectId,
    int $id,
    array $emails,
    string $note = ''
): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$ctx` | `ActorContext` |  | Who is acting, which companies they may reach, ui or api, and their language. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$id` | `int` |  |  |
| `$emails` | `array` |  |  |
| `$note` | `string` | `''` |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 293 | `ProjectReportsService::send` | **update** [project_reports](/code/tables/project_reports.md) (`sent_datetime`, `sent_by_id`, `sent_to`) |  |

**Called from:** [api/projects/reports.php](/code/files/api/projects/reports.php.md)

### emailHtml

*public static* - line 301

The email: the report as the page shows it (the same three marks), in plain inline styles.

```php
function emailHtml(array $project, array $report, string $sender, string $note): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$project` | `array` |  |  |
| `$report` | `array` |  |  |
| `$sender` | `string` |  |  |
| `$note` | `string` |  |  |

### markdownHtml

*public static* - line 315

Escape, then headings, bullets and **bold** - the marks the AI is told to use (projects-reports.js `md()`).

```php
function markdownHtml(string $text): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$text` | `string` |  |  |

### runSchedules

*public static* - line 340

Scheduled drafts (3.3.0), from `projectAlertsScan()`: each ACTIVE project with a schedule gets one draft per period - weekly (ISO week), fortnightly (each even-numbered ISO week's pair) or monthly - drafted by the AI when it is set up, otherwise a draft holding the facts to write from. Never approved by itself: the project manager is told (project.report_drafted) and approves, edits or deletes it. One per period on the ledger, however often the scan runs.

```php
function runSchedules(PDO $conn, ?int $projectId = null): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `?int` | `null` | The id of the project. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 343 | `ProjectReportsService::runSchedules` | read [projects](/code/tables/projects.md), read [analysts](/code/tables/analysts.md) |  |
| 349 | `ProjectReportsService::runSchedules` | **insert** [workflow_scheduled_emissions](/code/tables/workflow_scheduled_emissions.md) (`trigger_event`, `entity_key`, `fingerprint`, `emitted_datetime`) |  |

**Called from:** [includes/projects/alerts.php](/code/files/includes/projects/alerts.php.md)

### periodKey

*public static* - line 377

This period's ledger fingerprint, or null when this is not a drafting period (fortnightly, odd weeks).

```php
function periodKey(string $schedule, ?int $now = null): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$schedule` | `string` |  |  |
| `$now` | `?int` | `null` |  |

### draftScheduled

*private static* - line 390

One scheduled draft: the AI's when it is set up and answers, otherwise the facts.

```php
function draftScheduled(PDO $conn, array $p): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$p` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 411 | `ProjectReportsService::draftScheduled` | **insert** [project_reports](/code/tables/project_reports.md) (`project_id`, `kind`, `title`, `body`, `status`, `ai_drafted`, `ai_model`, `created_by_id`, `created_datetime`, `updated_datetime`) |  |

### load

*private static* - line 420

Loads one report (not a briefing) of the project; throws not found otherwise.

```php
function load(PDO $conn, int $projectId, int $id): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$projectId` | `int` |  | The id of the project. *([standard](/handbook/standard-parameters.md))* |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 422 | `ProjectReportsService::load` | read [project_reports](/code/tables/project_reports.md) |  |

