# NotificationsService

> Class in [includes/services/notifications.php](/code/files/includes/services/notifications.php.md), line 42

## Methods

| Method | What it does |
|---|---|
| [portalUser()](#portaluser) | A portal user as a recipient. Anything else passed where a recipient is expected is an analyst id, so every existing caller is unchanged. |
| [who()](#who) | [table, id column, id, is portal] for a recipient. The ONLY place that choice is made. |
| [duringBulk()](#duringbulk) | Run `$fn` with bulk suppression on, restoring the previous state whatever happens. |
| [inBulk()](#inbulk) | True while a `duringBulk()` call is running. |
| [types()](#types) | Which event types put something in the bell, and whether they do so by default. The value is the DEFAULT — every one of these is switchable per analyst under Preferences. |
| [typeEnabled()](#typeenabled) | True when this analyst wants this type in their bell. |
| [preferences()](#preferences) | The analyst's per-type overrides, as [event_type => bool]. |
| [effectivePreferences()](#effectivepreferences) | The full effective map for the settings UI: every type with its current state. |
| [notify()](#notify) | Write a notification, applying every noise rule. |
| [unreadCount()](#unreadcount) | Unread count for the badge. Cheap — this is polled by every open tab. |
| [listFor()](#listfor) | Newest first. Unread first is deliberately NOT done — recency is the useful order. |
| [linkFor()](#linkfor) | Where clicking a notification goes. |
| [portalLinkFor()](#portallinkfor) | Where a portal user's notification goes. Only tickets so far; the ticket page itself decides - through `portalTicketAccess()` - whether they may see it, so a stale notification can never be a way in. |
| [markRead()](#markread) | Mark specific ids read. Scoped to the analyst, so ids from elsewhere do nothing. |
| [markAllRead()](#markallread) | Marks every unread notification for the recipient (an analyst, or a portal user) as read and returns how many. |
| [clear()](#clear) | Remove specific notifications outright (discussion #111). |
| [clearAll()](#clearall) | Empty the panel. |
| [clip()](#clip) | Trimmed text cut to `$max` characters, or null when blank. |

### portalUser

*public static* - line 70

A portal user as a recipient. Anything else passed where a recipient is expected is an analyst id, so every existing caller is unchanged.

```php
function portalUser(int $userId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$userId` | `int` |  |  |

**Called from:** [api/self-service/notifications.php](/code/files/api/self-service/notifications.php.md)

### who

*private static* - line 76

[table, id column, id, is portal] for a recipient. The ONLY place that choice is made.

```php
function who($recipient): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$recipient` |  |  |  |

### duringBulk

*public static* - line 88

Run `$fn` with bulk suppression on, restoring the previous state whatever happens.

```php
function duringBulk(callable $fn)
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$fn` | `callable` |  |  |

**Called from:** [api/tickets/bulk_delete_tickets.php](/code/files/api/tickets/bulk_delete_tickets.php.md), [api/tickets/bulk_update_tickets.php](/code/files/api/tickets/bulk_update_tickets.php.md)

### inBulk

*public static* - line 103

True while a `duringBulk()` call is running.

```php
function inBulk(): bool
```

**Called from:** [includes/notifications_router.php](/code/files/includes/notifications_router.php.md)

### types

*public static* - line 117

Which event types put something in the bell, and whether they do so by default. The value is the DEFAULT — every one of these is switchable per analyst under Preferences.

On by default only where the answer to "would you want to be interrupted
for this?" is plainly yes. Everything else is available but quiet, because
a bell that is right 60% of the time gets ignored 100% of the time.

```php
function types(): array
```

**Called from:** [includes/notifications_router.php](/code/files/includes/notifications_router.php.md)

### typeEnabled

*public static* - line 222

True when this analyst wants this type in their bell.

```php
function typeEnabled(PDO $conn, int $analystId, string $eventType): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$eventType` | `string` |  |  |

**Called from:** [includes/notifications_router.php](/code/files/includes/notifications_router.php.md)

### preferences

*public static* - line 240

The analyst's per-type overrides, as [event_type => bool].

Stored as one JSON preference rather than one row per type: it is read on
every event written, and a single row keeps that to one lookup.

```php
function preferences(PDO $conn, int $analystId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 244 | `NotificationsService::preferences` | read [user_preferences](/code/tables/user_preferences.md) |  |

### effectivePreferences

*public static* - line 260

The full effective map for the settings UI: every type with its current state.

```php
function effectivePreferences(PDO $conn, int $analystId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |

**Called from:** [system/preferences/index.php](/code/files/system/preferences/index.php.md)

### notify

*public static* - line 281

Write a notification, applying every noise rule.

Returns the notification id, or null when the rules said no — which is the
common case and is not an error.

`$in`: analyst_id (or portal_user_id), event_type, entity_type, entity_id,
     entity_ref, title, body, actor_id, actor_name

```php
function notify(PDO $conn, array $in): ?int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$in` | `array` |  |  |

**Called from:** [includes/managers.php](/code/files/includes/managers.php.md), [includes/notifications_router.php](/code/files/includes/notifications_router.php.md)

### unreadCount

*public static* - line 373

Unread count for the badge. Cheap — this is polled by every open tab.

```php
function unreadCount(PDO $conn, $recipient): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$recipient` |  |  |  |

**Called from:** [api/notifications/clear.php](/code/files/api/notifications/clear.php.md), [api/notifications/get_notifications.php](/code/files/api/notifications/get_notifications.php.md), [api/notifications/mark_read.php](/code/files/api/notifications/mark_read.php.md), [api/self-service/notifications.php](/code/files/api/self-service/notifications.php.md)

### listFor

*public static* - line 388

Newest first. Unread first is deliberately NOT done — recency is the useful order.

```php
function listFor(PDO $conn, $recipient, int $limit = self::LIST_LIMIT): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$recipient` |  |  |  |
| `$limit` | `int` | `self::LIST_LIMIT` |  |

**Called from:** [api/notifications/get_notifications.php](/code/files/api/notifications/get_notifications.php.md), [api/self-service/notifications.php](/code/files/api/self-service/notifications.php.md)

### linkFor

*public static* - line 422

Where clicking a notification goes.

Relative to the app root. Tickets deep-link to the ticket in the inbox;
anything without a known destination returns null and the bell renders it
as text rather than a dead link.

```php
function linkFor(string $entityType, int $entityId): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$entityType` | `string` |  |  |
| `$entityId` | `int` |  |  |

**Called from:** [includes/notifications_router.php](/code/files/includes/notifications_router.php.md)

### portalLinkFor

*public static* - line 440

Where a portal user's notification goes. Only tickets so far; the ticket page itself decides - through `portalTicketAccess()` - whether they may see it, so a stale notification can never be a way in.

```php
function portalLinkFor(string $entityType, int $entityId): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$entityType` | `string` |  |  |
| `$entityId` | `int` |  |  |

### markRead

*public static* - line 446

Mark specific ids read. Scoped to the analyst, so ids from elsewhere do nothing.

```php
function markRead(PDO $conn, $recipient, array $ids): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$recipient` |  |  |  |
| `$ids` | `array` |  |  |

**Called from:** [api/notifications/mark_read.php](/code/files/api/notifications/mark_read.php.md), [api/self-service/notifications.php](/code/files/api/self-service/notifications.php.md)

### markAllRead

*public static* - line 466

Marks every unread notification for the recipient (an analyst, or a portal user) as read and returns how many.

```php
function markAllRead(PDO $conn, $recipient): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$recipient` |  |  |  |

**Called from:** [api/notifications/mark_read.php](/code/files/api/notifications/mark_read.php.md), [api/self-service/notifications.php](/code/files/api/self-service/notifications.php.md)

### clear

*public static* - line 490

Remove specific notifications outright (discussion #111).

A hard DELETE, deliberately. This table is a display cache for the bell and
nothing else in the app reads it — the durable record of what happened lives
in the workflow events and the entity's own audit trail. So a dismissed row
preserves nothing, and a soft-delete column would buy a migration plus a
filter on every read in exchange for that nothing.

Scoped to the analyst for the same reason `markRead()` is: ids belonging to
somebody else match nothing rather than erroring, which keeps a stale open
tab harmless.

```php
function clear(PDO $conn, $recipient, array $ids): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$recipient` |  |  |  |
| `$ids` | `array` |  |  |

**Called from:** [api/notifications/clear.php](/code/files/api/notifications/clear.php.md), [api/self-service/notifications.php](/code/files/api/self-service/notifications.php.md)

### clearAll

*public static* - line 513

Empty the panel.

⚠️ `$includeUnread` defaults to FALSE, and that default IS the safety catch.
Clearing is irreversible, and the rows most worth keeping are precisely the
ones nobody has looked at yet — so unless the analyst deliberately ticks the
box in the confirmation, unread news survives a Clear all.

```php
function clearAll(PDO $conn, $recipient, bool $includeUnread = false): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$recipient` |  |  |  |
| `$includeUnread` | `bool` | `false` |  |

**Called from:** [api/notifications/clear.php](/code/files/api/notifications/clear.php.md), [api/self-service/notifications.php](/code/files/api/self-service/notifications.php.md)

### clip

*private static* - line 526

Trimmed text cut to `$max` characters, or null when blank.

```php
function clip($value, int $max): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$value` |  |  |  |
| `$max` | `int` |  |  |

