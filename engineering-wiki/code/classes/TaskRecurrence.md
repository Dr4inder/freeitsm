# TaskRecurrence

> Class in [includes/services/task_recurrence.php](/code/files/includes/services/task_recurrence.php.md), line 36

Task recurrence — the date engine and the spawning of occurrences.

Discussion #94 (dschipfel): recurring tasks in the style of Microsoft Planner.

── The model ────────────────────────────────────────────────────────────────
A recurrence is a SERIES, not a template. The rule lives in one row of
task_recurrences; every task the series produces carries recurrence_id (the
series) and recurrence_master_id (the FIRST task of the series, so any
occurrence can point a reader back to where it started).

That mirrors how people describe it - "this task repeats" - rather than
introducing a hidden template task that is not real work and would show up in
every list, count and report that was written before recurrence existed.

── Two ways to repeat, and they are genuinely different ─────────────────────
  'completion'  the next occurrence is created when this one is COMPLETED,
                counted from the completion date. A monthly backup check you
                finish four days late should next be due a month after you did
                it, not a month after it was theoretically due. This is what
                Planner does and what most people mean.
  'schedule'    occurrences appear on fixed dates whether or not the previous
                one was finished. A compliance review happens on the 1st
                whether or not last month's was signed off, and the fact that
                last month's is still open is the point.

The distinction matters because 'schedule' can produce a backlog and
'completion' cannot. Only 'schedule' needs anything to run in the background.

⚠️ All arithmetic here is on DATES, never datetimes. A due date is a calendar
day, not an instant: "the 1st" means the 1st wherever the reader is. Passing a
datetime through this would reintroduce GH #116 by another route.

## Methods

| Method | What it does |
|---|---|
| [blankRule()](#blankrule) | A rule with nothing filled in - every field the engine understands. |
| [nextDate()](#nextdate) | The next date in the series strictly AFTER `$from`. |
| [nextWeekly()](#nextweekly) | Weekly, optionally on named days. |
| [nextMonthly()](#nextmonthly) | Monthly, either on a day number or on the nth weekday. |
| [nextYearly()](#nextyearly) | Yearly. Same two shapes as monthly, a chosen month at a time. |
| [dayOfMonth()](#dayofmonth) | A day number within the month `$first` belongs to. -1 means the last day. Anything past the end of a short month CLAMPS to its last day: "the 31st" in a 30-day month means the 30th, not the 1st of the month after, which is what naive date arithmetic produces. |
| [nthWeekdayOf()](#nthweekdayof) | The nth given weekday of the month `$first` belongs to - "the 2nd Tuesday", "the last Friday". `$nth` of -1 means the last one. |
| [isExhausted()](#isexhausted) | Has the series finished? Checked BEFORE creating, so a series that ends "after 6 occurrences" produces six and not seven. |
| [mkDate()](#mkdate) | A YYYY-MM-DD string as a UTC date, or null when it is not one. |
| [ruleForTask()](#rulefortask) | The rule a task belongs to, or null. |
| [onTaskClosed()](#ontaskclosed) | A task has just been completed. If it repeats on completion, make the next one and return its id. |
| [runDue()](#rundue) | Produce every occurrence now due on a fixed schedule. Returns the ids made. |
| [project()](#project) | Dates a FIXED SCHEDULE will land on between two dates, without creating anything. |
| [deactivate()](#deactivate) | Switches a recurrence off. |
| [occurrenceExistsFor()](#occurrenceexistsfor) | Does this series already have a top-level occurrence due on that date? |
| [clampInt()](#clampint) | Keep a value inside a range, or null. |
| [ruleFromInput()](#rulefrominput) | Build a rule from whatever the browser sent, discarding anything invalid. |
| [previewRule()](#previewrule) | Every date a rule will produce, for showing somebody BEFORE they commit. |
| [startForDue()](#startfordue) | The day work on an occurrence due `$due` can BEGIN. |
| [taskRow()](#taskrow) | Loads one task row, or null. |
| [latestOccurrence()](#latestoccurrence) | The newest top-level task made by the recurrence, or null. |
| [createOccurrence()](#createoccurrence) | Copy `$sourceTaskId` into a new task due on `$due`, honouring the rule's copy_* flags, and count it against the series. |
| [defaultOpenStatusId()](#defaultopenstatusid) | The status a new occurrence starts in: the configured default, but only among OPEN statuses. |

### blankRule

*public static* - line 42

A rule with nothing filled in - every field the engine understands.

```php
function blankRule(): array
```

### nextDate

*public static* - line 71

The next date in the series strictly AFTER `$from`.

`$from` is the anchor: the completion date for 'completion' mode, or the
previous occurrence's due date for 'schedule'. Returns Y-m-d, or null if
the rule cannot produce one (an empty weekly weekday set, say).

Every branch is "move the anchor forward, then land on a valid day",
never "add days and hope" - which is what makes month ends and nth
weekdays behave.

```php
function nextDate(array $rule, string $from): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$rule` | `array` |  |  |
| `$from` | `string` |  |  |

**Called from:** [api/tasks/recurrence_preview.php](/code/files/api/tasks/recurrence_preview.php.md), [api/tasks/save_recurrence.php](/code/files/api/tasks/save_recurrence.php.md)

### nextWeekly

*private static* - line 102

Weekly, optionally on named days.

With no days named it is simply every N weeks on the same weekday. With
days named, the next named day is found by walking forward - and when the
week runs out, jumping to the start of the week N weeks on, so "every 2
weeks on Mon and Thu" does not quietly become every week.

```php
function nextWeekly(DateTimeImmutable $d, int $step, string $weekdays): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$d` | `DateTimeImmutable` |  |  |
| `$step` | `int` |  |  |
| `$weekdays` | `string` |  |  |

### nextMonthly

*private static* - line 124

Monthly, either on a day number or on the nth weekday.

```php
function nextMonthly(DateTimeImmutable $d, int $step, array $r): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$d` | `DateTimeImmutable` |  |  |
| `$step` | `int` |  |  |
| `$r` | `array` |  |  |

### nextYearly

*private static* - line 139

Yearly. Same two shapes as monthly, a chosen month at a time.

```php
function nextYearly(DateTimeImmutable $d, int $step, array $r): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$d` | `DateTimeImmutable` |  |  |
| `$step` | `int` |  |  |
| `$r` | `array` |  |  |

### dayOfMonth

*private static* - line 158

A day number within the month `$first` belongs to. -1 means the last day. Anything past the end of a short month CLAMPS to its last day: "the 31st" in a 30-day month means the 30th, not the 1st of the month after, which is what naive date arithmetic produces.

```php
function dayOfMonth(DateTimeImmutable $first, int $dom): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$first` | `DateTimeImmutable` |  |  |
| `$dom` | `int` |  |  |

### nthWeekdayOf

*private static* - line 173

The nth given weekday of the month `$first` belongs to - "the 2nd Tuesday", "the last Friday". `$nth` of -1 means the last one.

A month has either four or five of any weekday, so a rule asking for the
5th falls back to the last rather than spilling into the next month.

```php
function nthWeekdayOf(DateTimeImmutable $first, int $nth, int $weekday): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$first` | `DateTimeImmutable` |  |  |
| `$nth` | `int` |  |  |
| `$weekday` | `int` |  |  |

### isExhausted

*public static* - line 196

Has the series finished? Checked BEFORE creating, so a series that ends "after 6 occurrences" produces six and not seven.

```php
function isExhausted(array $rule, string $nextDate): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$rule` | `array` |  |  |
| `$nextDate` | `string` |  |  |

### mkDate

*private static* - line 210

A YYYY-MM-DD string as a UTC date, or null when it is not one.

```php
function mkDate(string $ymd): ?DateTimeImmutable
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$ymd` | `string` |  |  |

### ruleForTask

*public static* - line 221

The rule a task belongs to, or null.

```php
function ruleForTask(PDO $conn, int $taskId): ?array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$taskId` | `int` |  | The id of the task. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 224 | `TaskRecurrence::ruleForTask` | read [task_recurrences](/code/tables/task_recurrences.md), read [tasks](/code/tables/tasks.md) |  |

### onTaskClosed

*public static* - line 246

A task has just been completed. If it repeats on completion, make the next one and return its id.

Called from BOTH ways a task can close - saving a status change, and
dragging the card on the board. `moveTask()` is documented "No workflow
event" and dispatches nothing, so hooking only the save path would have
meant a task that repeats when you tick it and silently does not when you
drag it, which is the worst of both.

Never throws. A recurrence that cannot be produced must not take the
completion down with it: the person finished their work and that has to be
recorded whatever happens next.

```php
function onTaskClosed(PDO $conn, int $taskId): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$taskId` | `int` |  | The id of the task. *([standard](/handbook/standard-parameters.md))* |

**Called from:** [includes/services/tasks.php](/code/files/includes/services/tasks.php.md)

### runDue

*public static* - line 276

Produce every occurrence now due on a fixed schedule. Returns the ids made.

Deliberately catches up rather than skipping: a series whose worker has not
run for a week produces the occurrences it owed, because a missed
compliance review is a fact somebody needs to see, not something to quietly
forget. Capped per series per run so a rule left dormant for two years
cannot create six hundred tasks in one go.

```php
function runDue(
    PDO $conn,
    ?string $today = null,
    int $capPerSeries = 24,
    ?array $onlyRecurrenceIds = null
): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$today` | `?string` | `null` |  |
| `$capPerSeries` | `int` | `24` |  |
| `$onlyRecurrenceIds` | `?array` | `null` |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 302 | `TaskRecurrence::runDue` | read [task_recurrences](/code/tables/task_recurrences.md) |  |
| 354 | `TaskRecurrence::runDue` | **update** [task_recurrences](/code/tables/task_recurrences.md) (`next_due_date`) |  |

**Called from:** [cron/task_recurrence.php](/code/files/cron/task_recurrence.php.md)

### project

*public static* - line 381

Dates a FIXED SCHEDULE will land on between two dates, without creating anything.

The calendar's job is to show what is coming, and until this existed it
could only show what already existed - which on a fixed schedule is one
occurrence at a time, because the rest are not created until their dates
arrive. Setting up "every Monday, five times" and seeing a single entry is
a fair reason to think the feature is broken.

So these are PROJECTIONS: real dates from the real rule, drawn faintly,
with no rows behind them. That keeps both halves honest - the board stays
clear of work that does not exist yet, and the calendar still shows the
plan.

⚠️ ONLY 'schedule' series. A series that repeats on completion has no
future to project: its next date is counted from the day somebody finishes
the current one, which has not happened. Drawing a guess there would be
inventing information, and it would move every time somebody was a day
late.

```php
function project(PDO $conn, string $from, string $to, int $capPerSeries = 60): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$from` | `string` |  |  |
| `$to` | `string` |  |  |
| `$capPerSeries` | `int` | `60` |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 385 | `TaskRecurrence::project` | read [task_recurrences](/code/tables/task_recurrences.md), read [tasks](/code/tables/tasks.md) |  |

**Called from:** [api/tasks/projected.php](/code/files/api/tasks/projected.php.md)

### deactivate

*private static* - line 440

Switches a recurrence off.

```php
function deactivate(PDO $conn, int $recurrenceId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$recurrenceId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 442 | `TaskRecurrence::deactivate` | **update** [task_recurrences](/code/tables/task_recurrences.md) (`is_active`, `updated_datetime`) |  |

### occurrenceExistsFor

*private static* - line 447

Does this series already have a top-level occurrence due on that date?

```php
function occurrenceExistsFor(PDO $conn, int $recurrenceId, string $due): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$recurrenceId` | `int` |  |  |
| `$due` | `string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 450 | `TaskRecurrence::occurrenceExistsFor` | read [tasks](/code/tables/tasks.md) |  |

### clampInt

*private static* - line 459

Keep a value inside a range, or null.

```php
function clampInt($v, int $min, int $max): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$v` |  |  |  |
| `$min` | `int` |  |  |
| `$max` | `int` |  |  |

### ruleFromInput

*public static* - line 473

Build a rule from whatever the browser sent, discarding anything invalid.

⚠️ ONE home, because two endpoints read this shape: saving a rule, and
previewing one that has not been saved yet. A preview built from
differently-sanitised input would show dates the worker will not produce,
and a preview that lies is worse than no preview at all.

```php
function ruleFromInput(array $in): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$in` | `array` |  |  |

**Called from:** [api/tasks/recurrence_preview.php](/code/files/api/tasks/recurrence_preview.php.md), [api/tasks/save_recurrence.php](/code/files/api/tasks/save_recurrence.php.md)

### previewRule

*public static* - line 528

Every date a rule will produce, for showing somebody BEFORE they commit.

"Every second Tuesday of the month, 5 times" is not a sentence most people
can turn into dates in their head, and until they can, the only way to
find out what a repeat does is to save it and wait. So this walks the rule
with the same engine the worker uses and hands back the list.

Occurrence 1 is the task in front of you, which is why it carries the
task's own dates rather than computed ones — the series is seeded from its
due date and it counts towards "5 times".

⚠️ A repeat set to fire AFTER COMPLETION gets one entry and no more. Its
next date is counted from the day somebody actually finishes, which has
not happened, so a list would be a guess dressed up as a schedule. The
caller is told the mode and says so in words instead.

```php
function previewRule(array $rule, array $task, int $limit = 25): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$rule` | `array` |  |  |
| `$task` | `array` |  |  |
| `$limit` | `int` | `25` |  |

**Called from:** [api/tasks/recurrence_preview.php](/code/files/api/tasks/recurrence_preview.php.md)

### startForDue

*public static* - line 588

The day work on an occurrence due `$due` can BEGIN.

A repeat keeps the gap between starting and being due, because "start a
week before it is due" is part of the plan rather than an accident of the
first occurrence. A fortnight of work due on the 31st therefore starts on
the 17th.

⚠️ That gap is also why the worker cannot wait for the due date. An
occurrence created on the day it is due would be born a fortnight past the
day it should have been started — a two-week bar lying entirely in the
past, that nobody ever had a chance to do. See `runDue()`.

Returns null when the source has no start date, or none worth keeping.
That is a point-in-time task, and it correctly appears on its due date.

```php
function startForDue(array $task, string $due): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$task` | `array` |  |  |
| `$due` | `string` |  |  |

### taskRow

*private static* - line 611

Loads one task row, or null.

```php
function taskRow(PDO $conn, int $id): ?array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 613 | `TaskRecurrence::taskRow` | read [tasks](/code/tables/tasks.md) |  |

### latestOccurrence

*private static* - line 620

The newest top-level task made by the recurrence, or null.

```php
function latestOccurrence(PDO $conn, int $recurrenceId): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$recurrenceId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 623 | `TaskRecurrence::latestOccurrence` | read [tasks](/code/tables/tasks.md) |  |

### createOccurrence

*private static* - line 640

Copy `$sourceTaskId` into a new task due on `$due`, honouring the rule's copy_* flags, and count it against the series.

What is NEVER copied: the completed timestamp, and the status. A new
occurrence starts open even if the series was completed into some other
status - spawning one straight into a closed status would make it look
done on arrival, and in completion mode could loop.

```php
function createOccurrence(PDO $conn, int $sourceTaskId, array $rule, string $due): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$sourceTaskId` | `int` |  |  |
| `$rule` | `array` |  |  |
| `$due` | `string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 642 | `TaskRecurrence::createOccurrence` | read [tasks](/code/tables/tasks.md) |  |
| 655 | `TaskRecurrence::createOccurrence` | **insert** [tasks](/code/tables/tasks.md) (`title`, `description`, `status_id`, `priority_id`, `start_date`, `due_date`, `assigned_analyst_id`, `assigned_team_id`, `ticket_id`, `change_id`, `contract_id`, `tenant_id`) |  |
| 686 | `TaskRecurrence::createOccurrence` | **insert** [task_tag_map](/code/tables/task_tag_map.md) (`task_id`, `tag_id`) |  |
| 695 | `TaskRecurrence::createOccurrence` | read [tasks](/code/tables/tasks.md) |  |
| 700 | `TaskRecurrence::createOccurrence` | **insert** [tasks](/code/tables/tasks.md) (`title`, `status_id`, `priority_id`, `assigned_analyst_id`, `assigned_team_id`, `parent_task_id`, `tenant_id`, `created_by_id`, `created_datetime`, `updated_datetime`) |  |
| 720 | `TaskRecurrence::createOccurrence` | **insert** [document_links](/code/tables/document_links.md) (`document_id`, `parent_type`, `parent_id`, `linked_by_id`, `created_datetime`) |  |
| 741 | `TaskRecurrence::createOccurrence` | **update** [task_recurrences](/code/tables/task_recurrences.md) (`occurrences_created`, `updated_datetime`) |  |

### defaultOpenStatusId

*private static* - line 759

The status a new occurrence starts in: the configured default, but only among OPEN statuses.

TasksService::lookupDefault deliberately does not filter on is_closed,
because an admin who makes a closed status the default has said what they
meant. That reasoning does not carry here - a recurrence that arrives
already closed is not work anybody will do, and on completion mode it
would complete itself.

```php
function defaultOpenStatusId(PDO $conn): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 762 | `TaskRecurrence::defaultOpenStatusId` | read [task_statuses](/code/tables/task_statuses.md) |  |

