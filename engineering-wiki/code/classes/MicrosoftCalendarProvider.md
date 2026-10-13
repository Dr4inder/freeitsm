# MicrosoftCalendarProvider

> Class in [includes/calendar_sync/MicrosoftCalendarProvider.php](/code/files/includes/calendar_sync/MicrosoftCalendarProvider.php.md), line 28

## Methods

| Method | What it does |
|---|---|
| [supports()](#supports) |  |
| [token()](#token) | An app-only access token, cached on the connection until it expires. |
| [verifyConnection()](#verifyconnection) | Mint a token. If that succeeds the credentials are right and Calendars.ReadWrite was granted and consented; nothing else can be true and this fail. |
| [call()](#call) | One Graph call. Returns [httpCode, decodedBody]. |
| [toGraphEvent()](#tographevent) | Translate our canonical event into Graph's shape. |
| [createEvent()](#createevent) |  |
| [updateEvent()](#updateevent) |  |
| [deleteEvent()](#deleteevent) |  |
| [pollChanges()](#pollchanges) | Read changes back out of the mailbox with a Graph delta query. |
| [toLocal()](#tolocal) | Graph's {dateTime,timeZone} to a naive wall clock in `$tz`. |
| [callAbsolute()](#callabsolute) | A GET against a URL Graph gave us (nextLink / deltaLink are absolute). |
| [createSubscription()](#createsubscription) |  |
| [renewSubscription()](#renewsubscription) |  |
| [deleteSubscription()](#deletesubscription) |  |
| [expiryToLocal()](#expirytolocal) | Graph's UTC expiry to the naive local datetime the column stores. |
| [verifyTarget()](#verifytarget) |  |
| [briefly()](#briefly) | Graph error bodies are long and carry request ids. Keep enough to diagnose without putting a wall of JSON in last_error, which is 500 characters and is shown to a human. |

### supports

*public* - line 35

```php
function supports(string $capability): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$capability` | `string` |  |  |

### token

*private* - line 54

An app-only access token, cached on the connection until it expires.

App-only tokens carry no refresh token — when one expires we simply ask
for another. The 300-second margin is so a token that is valid when we
check cannot expire mid-request.

```php
function token(): string
```

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 100 | `MicrosoftCalendarProvider::token` | **update** [calendar_connections](/code/tables/calendar_connections.md) (`token_data`) |  |

### verifyConnection

*public* - line 119

Mint a token. If that succeeds the credentials are right and Calendars.ReadWrite was granted and consented; nothing else can be true and this fail.

```php
function verifyConnection(): void
```

### call

*private* - line 127

One Graph call. Returns [httpCode, decodedBody].

```php
function call(string $method, string $path, ?array $body = null): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$method` | `string` |  |  |
| `$path` | `string` |  |  |
| `$body` | `?array` | `null` |  |

### toGraphEvent

*private* - line 161

Translate our canonical event into Graph's shape.

⚠️ TWO THINGS GRAPH IS STRICT ABOUT, and both are easy to get wrong:

1. dateTime must carry NO zone suffix, with the zone named separately in
   timeZone. Our stored values are naive wall-clock precisely so that "2pm"
   means 2pm — appending a Z would reinterpret every one of them as UTC and
   land the event an hour out for half the year.

2. isAllDay REQUIRES both ends at midnight and the end EXCLUSIVE — the day
   after the last day. We store all-day as 00:00–23:59:59 so that readers
   ignoring the flag still see a sensible block, so it has to be converted
   here. Sending 23:59:59 with isAllDay:true is rejected outright.

```php
function toGraphEvent(array $event): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$event` | `array` |  |  |

### createEvent

*public* - line 194

```php
function createEvent(string $calendarAddress, array $event): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$calendarAddress` | `string` |  |  |
| `$event` | `array` |  |  |

### updateEvent

*public* - line 205

```php
function updateEvent(string $calendarAddress, string $remoteEventId, array $event): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$calendarAddress` | `string` |  |  |
| `$remoteEventId` | `string` |  |  |
| `$event` | `array` |  |  |

### deleteEvent

*public* - line 223

```php
function deleteEvent(string $calendarAddress, string $remoteEventId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$calendarAddress` | `string` |  |  |
| `$remoteEventId` | `string` |  |  |

### pollChanges

*public* - line 254

Read changes back out of the mailbox with a Graph delta query.

🔑 DELTA, NOT SUBSCRIPTIONS. Change notifications need a publicly
reachable HTTPS endpoint Microsoft can call, plus renewal before it
expires — impossible for the many FreeITSM installs that are internal
only. A delta query is an ordinary outbound GET on a cron: same
information, no inbound firewall hole.

⚠️ calendarView/delta needs a WINDOW, and it is the expanded view. The
window is deliberately narrow — recent past to a few months ahead — since
a wider one makes the first sync enormous for no benefit; nobody edits
last year's appointments.

```php
function pollChanges(string $calendarAddress, ?string $token): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$calendarAddress` | `string` |  |  |
| `$token` | `?string` |  |  |

### toLocal

*private* - line 314

Graph's {dateTime,timeZone} to a naive wall clock in `$tz`.

```php
function toLocal(array $slot, string $tz): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$slot` | `array` |  |  |
| `$tz` | `string` |  |  |

### callAbsolute

*private* - line 323

A GET against a URL Graph gave us (nextLink / deltaLink are absolute).

```php
function callAbsolute(string $url): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$url` | `string` |  |  |

### createSubscription

*public* - line 349

```php
function createSubscription(string $calendarAddress, string $notifyUrl, string $secret): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$calendarAddress` | `string` |  |  |
| `$notifyUrl` | `string` |  |  |
| `$secret` | `string` |  |  |

### renewSubscription

*public* - line 368

```php
function renewSubscription(string $subscriptionId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$subscriptionId` | `string` |  |  |

### deleteSubscription

*public* - line 384

```php
function deleteSubscription(string $subscriptionId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$subscriptionId` | `string` |  |  |

### expiryToLocal

*private* - line 392

Graph's UTC expiry to the naive local datetime the column stores.

```php
function expiryToLocal(?string $utc): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$utc` | `?string` |  |  |

### verifyTarget

*public* - line 400

```php
function verifyTarget(string $calendarAddress): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$calendarAddress` | `string` |  |  |

### briefly

*private* - line 415

Graph error bodies are long and carry request ids. Keep enough to diagnose without putting a wall of JSON in last_error, which is 500 characters and is shown to a human.

```php
function briefly(?string $raw): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$raw` | `?string` |  |  |

