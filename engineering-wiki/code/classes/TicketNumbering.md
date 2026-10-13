# TicketNumbering

> Class in [includes/ticket_numbering.php](/code/files/includes/ticket_numbering.php.md), line 30

## Methods

| Method | What it does |
|---|---|
| [settings()](#settings) |  |
| [forget()](#forget) | Forget the cached settings — after a save, and between tests. |
| [withSettings()](#withsettings) | Run with a specific configuration — used by the live preview and tests. |
| [config()](#config) |  |
| [next()](#next) | The next ticket number. |
| [windCounterTo()](#windcounterto) | Move a counter forward to at least `$value`. Never backwards. |
| [randomNumber()](#randomnumber) | Today's format: three letters, three digits, five digits. |
| [render()](#render) | Substitute the tokens. |
| [typeCode()](#typecode) | A short code for a ticket type, for {TYPE}. |
| [resolveTenant()](#resolvetenant) | A ticket's company, with NULL read as what it actually means. |
| [companyCode()](#companycode) | A short code for a company, for {COMPANY}. |
| [codeFor()](#codefor) | The effective code for a company row — what {COMPANY} would render. |
| [cleanCode()](#cleancode) | Letters and digits, upper case, at most 12 — the shape a code may take. |
| [codeClashes()](#codeclashes) | Companies that would produce the SAME ticket numbers as each other. |
| [claimNext()](#claimnext) | Take the next number from the right counter, atomically. |
| [counterKey()](#counterkey) | Which counter a ticket draws from. |
| [inUse()](#inuse) | Is this number already taken — by a live ticket OR by history? |
| [findTicketId()](#findticketid) | The ticket id for a number — current OR any it has ever had. |
| [preview()](#preview) | What the next few numbers would look like under a given configuration, without writing anything. Drives the live preview in settings. |
| [validateFormat()](#validateformat) | Sanity-check a format before it is saved. |
| [planRenumber()](#planrenumber) | Work out what a renumber would do, and refuse it if the answer is unsafe. Writes nothing. |
| [assertPlanSafe()](#assertplansafe) | The guard that does not depend on me having thought of the cause. |
| [applyRenumber()](#applyrenumber) | Carry out a plan from `planRenumber()`. |

### settings

*public static* - line 72

```php
function settings(PDO $conn): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 81 | `TicketNumbering::settings` | read [system_settings](/code/tables/system_settings.md) |  |

**Called from:** [api/tickets/numbering_renumber.php](/code/files/api/tickets/numbering_renumber.php.md)

### forget

*public static* - line 96

Forget the cached settings — after a save, and between tests.

```php
function forget(): void
```

**Called from:** [api/tickets/numbering_renumber.php](/code/files/api/tickets/numbering_renumber.php.md)

### withSettings

*public static* - line 106

Run with a specific configuration — used by the live preview and tests.

```php
function withSettings(?array $settings): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$settings` | `?array` |  |  |

### config

*private static* - line 111

```php
function config(PDO $conn): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

### next

*public static* - line 128

The next ticket number.

```php
function next(PDO $conn, ?int $ticketTypeId = null, ?int $tenantId = null): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ticketTypeId` | `?int` | `null` | used by the per_type scope and {TYPE} |
| `$tenantId` | `?int` | `null` | used by the per_company scope |

**Called from:** [api/self-service/create_ticket.php](/code/files/api/self-service/create_ticket.php.md), [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md), [includes/catalogue_approvals.php](/code/files/includes/catalogue_approvals.php.md), [includes/messaging/ingest.php](/code/files/includes/messaging/ingest.php.md), [includes/services/tickets.php](/code/files/includes/services/tickets.php.md), [includes/ticket_merge.php](/code/files/includes/ticket_merge.php.md), [includes/ticket_split.php](/code/files/includes/ticket_split.php.md), [workflow/includes/engine.php](/code/files/workflow/includes/engine.php.md)

### windCounterTo

*private static* - line 176

Move a counter forward to at least `$value`. Never backwards.

Shared by the collision jump above and by `applyRenumber()`, so there is one
statement in the codebase that decides what "wind a counter on" means.

```php
function windCounterTo(PDO $conn, string $key, int $value): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$key` | `string` |  |  |
| `$value` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 179 | `TicketNumbering::windCounterTo` | **insert** [ticket_number_counters](/code/tables/ticket_number_counters.md) (`counter_key`, `next_value`) |  |

### randomNumber

*private static* - line 185

Today's format: three letters, three digits, five digits.

```php
function randomNumber(PDO $conn): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

### render

*public static* - line 204

Substitute the tokens.

🔑 `{####}` pads to at least four digits and NEVER truncates — the width
is a floor, so an install that outgrows it just gets longer numbers.

```php
function render(
    string $format,
    int $seq,
    ?PDO $conn = null,
    ?int $ticketTypeId = null,
    ?DateTimeImmutable $at = null,
    ?int $tenantId = null
): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$format` | `string` |  |  |
| `$seq` | `int` |  |  |
| `$conn` | `?PDO` | `null` |  |
| `$ticketTypeId` | `?int` | `null` |  |
| `$at` | `?DateTimeImmutable` | `null` |  |
| `$tenantId` | `?int` | `null` |  |

**Called from:** [includes/services/asset_tags.php](/code/files/includes/services/asset_tags.php.md)

### typeCode

*private static* - line 238

A short code for a ticket type, for {TYPE}.

Derived from the name rather than stored: an install that never uses
{TYPE} should not have to fill in a column, and one that does gets
something sensible without configuring anything. "Incident" -> INC.

```php
function typeCode(?PDO $conn, ?int $ticketTypeId): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `?PDO` |  |  |
| `$ticketTypeId` | `?int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 244 | `TicketNumbering::typeCode` | read [ticket_types](/code/tables/ticket_types.md) |  |

### resolveTenant

*public static* - line 273

A ticket's company, with NULL read as what it actually means.

🔴 A NULL `tenant_id` DOES NOT MEAN "no company". Throughout FreeITSM it
means the DEFAULT company — the silent one a single-company install never
sees. Ed's own install has 16 tickets stored that way alongside 84 stored
with the default company's real id, because the two have been written by
different code paths over the years.

Left unresolved, those 16 would draw from a counter of their own AND
render {COMPANY} as nothing, so per-company numbering would produce
"-00001" for them while their neighbours got "DEF-00001". Resolving here,
once, at the two places a number is decided, is what keeps the two halves
of the same company on the same sequence.

```php
function resolveTenant(?PDO $conn, ?int $tenantId): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `?PDO` |  |  |
| `$tenantId` | `?int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 281 | `TicketNumbering::resolveTenant` | read [tenants](/code/tables/tenants.md) |  |

### companyCode

*private static* - line 303

A short code for a company, for {COMPANY}.

🔑 THE CODE IS SET, NOT GUESSED. `tenants.ticket_code` is what an
administrator typed and can see; only when it is empty does FreeITSM
derive one, so an install that never thinks about this still gets
something sensible.

⚠️ A DERIVED CODE CAN COLLIDE. "Acme Ltd" and "Acme Group" both derive
ACM, and under per-company counting that means two companies producing
the same ticket numbers. Deriving is a convenience, never a guarantee —
`codeClashes()` is what proves an install is safe, and the numbering screen
refuses per-company counting until it is.

```php
function companyCode(?PDO $conn, ?int $tenantId): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `?PDO` |  |  |
| `$tenantId` | `?int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 309 | `TicketNumbering::companyCode` | read [tenants](/code/tables/tenants.md) |  |
| 316 | `TicketNumbering::companyCode` | read [tenants](/code/tables/tenants.md) |  |

### codeFor

*public static* - line 333

The effective code for a company row — what {COMPANY} would render.

Separate from `companyCode()` so the settings screen can show somebody the
code they are about to get before anything is saved, using the very same
rule that will be applied for real.

```php
function codeFor(array $tenant): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$tenant` | `array` |  |  |

**Called from:** [api/system/get_tenants.php](/code/files/api/system/get_tenants.php.md)

### cleanCode

*public static* - line 349

Letters and digits, upper case, at most 12 — the shape a code may take.

```php
function cleanCode(string $raw): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$raw` | `string` |  |  |

**Called from:** [api/system/save_tenant.php](/code/files/api/system/save_tenant.php.md)

### codeClashes

*public static* - line 365

Companies that would produce the SAME ticket numbers as each other.

🔴 Two companies sharing a code is not a cosmetic problem under
per-company counting: each counts from 1, both render the same string,
and `tickets.ticket_number` is unique across the whole install — so the
second company's tickets would burn numbers climbing over the first
company's, and the sequence people were promised would be a fiction.

```php
function codeClashes(PDO $conn): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Returns:** array<string, string[]> code => company names sharing it

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 368 | `TicketNumbering::codeClashes` | read [tenants](/code/tables/tenants.md) |  |

**Called from:** [api/tickets/numbering_preview.php](/code/files/api/tickets/numbering_preview.php.md)

### claimNext

*private static* - line 397

Take the next number from the right counter, atomically.

⚠️ ON DUPLICATE KEY UPDATE with `LAST_INSERT_ID()` is the trick that makes
this safe: the read and the increment are one statement, so two tickets
created in the same instant cannot take the same number. A SELECT then an
UPDATE would race, and the collision would only appear under load.

```php
function claimNext(PDO $conn, array $cfg, ?int $ticketTypeId, ?int $tenantId): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$cfg` | `array` |  |  |
| `$ticketTypeId` | `?int` |  |  |
| `$tenantId` | `?int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 403 | `TicketNumbering::claimNext` | **insert** [ticket_number_counters](/code/tables/ticket_number_counters.md) (`counter_key`, `next_value`) |  |

### counterKey

*public static* - line 427

Which counter a ticket draws from.

The reset period is part of the KEY rather than a stored date: a yearly
reset is simply a different counter each year, so nothing has to notice
midnight on the 31st of December or run a job to zero anything.

```php
function counterKey(
    array $cfg,
    ?int $ticketTypeId,
    ?int $tenantId,
    ?DateTimeImmutable $at = null
): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$cfg` | `array` |  |  |
| `$ticketTypeId` | `?int` |  |  |
| `$tenantId` | `?int` |  |  |
| `$at` | `?DateTimeImmutable` | `null` |  |

### inUse

*public static* - line 456

Is this number already taken — by a live ticket OR by history?

🔑 History counts. A number that once belonged to a renumbered ticket must
never be handed to a different one, or a reply to an old email would land
on somebody else's ticket. That is worse than not matching at all.

```php
function inUse(PDO $conn, string $number): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$number` | `string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 458 | `TicketNumbering::inUse` | read [tickets](/code/tables/tickets.md) |  |
| 464 | `TicketNumbering::inUse` | read [ticket_number_history](/code/tables/ticket_number_history.md) |  |

### findTicketId

*public static* - line 479

The ticket id for a number — current OR any it has ever had.

This is what makes renumbering safe. It is the same principle merges
already use (`resolveMergedTicket`): an old identifier keeps working
forever, because the emails quoting it do.

```php
function findTicketId(PDO $conn, string $number): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$number` | `string` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 481 | `TicketNumbering::findTicketId` | read [tickets](/code/tables/tickets.md) |  |
| 488 | `TicketNumbering::findTicketId` | read [ticket_number_history](/code/tables/ticket_number_history.md) |  |

**Called from:** [api/tickets/check_mailbox_email.php](/code/files/api/tickets/check_mailbox_email.php.md)

### preview

*public static* - line 519

What the next few numbers would look like under a given configuration, without writing anything. Drives the live preview in settings.

```php
function preview(array $cfg, int $count = 3): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$cfg` | `array` |  |  |
| `$count` | `int` | `3` |  |

**Called from:** [api/tickets/numbering_preview.php](/code/files/api/tickets/numbering_preview.php.md)

### validateFormat

*public static* - line 548

Sanity-check a format before it is saved.

```php
function validateFormat(string $format, string $scope = "global"): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$format` | `string` |  |  |
| `$scope` | `string` | `"global"` |  |

**Returns:** string[] problems, empty when the format is usable

**Called from:** [api/tickets/numbering_preview.php](/code/files/api/tickets/numbering_preview.php.md)

### planRenumber

*public static* - line 615

Work out what a renumber would do, and refuse it if the answer is unsafe. Writes nothing.

```php
function planRenumber(PDO $conn, array $cfg, ?array $rows = null): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$cfg` | `array` |  |  |
| `$rows` | `?array` | `null` | the tickets to plan over. Defaults to ALL of them, which is what the tool does; tests pass a set of their own so a run cannot rewrite the real estate. |

**Returns:** array{total:int, changing:int, skipped:int, planned:array, seqs:array, next_after:?string}

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 631 | `TicketNumbering::planRenumber` | read [tickets](/code/tables/tickets.md) |  |

**Called from:** [api/tickets/numbering_renumber.php](/code/files/api/tickets/numbering_renumber.php.md)

### assertPlanSafe

*private static* - line 711

The guard that does not depend on me having thought of the cause.

🔴 A renumber that writes two tickets the same reference is the worst
outcome this tool has: replies would land on whichever row matched first,
for ever. `validateFormat()` already refuses the causes that are knowable
from the settings alone — but a {TYPE} that renders empty because that
type was deleted years ago is not one of them.

So the plan is checked for what it IS, not for how it was built.

```php
function assertPlanSafe(PDO $conn, array $planned): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$planned` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 736 | `TicketNumbering::assertPlanSafe` | read [ticket_number_history](/code/tables/ticket_number_history.md) |  |

### applyRenumber

*public static* - line 759

Carry out a plan from `planRenumber()`.

⚠️ ONE TRANSACTION for the whole run. A half-renumbered estate would have
two schemes in it and a counter that matched neither.

```php
function applyRenumber(PDO $conn, array $plan): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$plan` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 764 | `TicketNumbering::applyRenumber` | **insert** [ticket_number_history](/code/tables/ticket_number_history.md) (`ticket_id`, `ticket_number`, `reason`) |  |
| 766 | `TicketNumbering::applyRenumber` | **update** [tickets](/code/tables/tickets.md) (`ticket_number`) |  |

**Called from:** [api/tickets/numbering_renumber.php](/code/files/api/tickets/numbering_renumber.php.md)

