# KnowledgeAclCache

> Class in [includes/knowledge/visibility.php](/code/files/includes/knowledge/visibility.php.md), line 719

Per-request memo for the four things the access list needs to look up: the permission model, whether any rules exist at all, the rules themselves, and the folder tree. Read once per request rather than once per query — a page that lists articles and then fetches one would otherwise ask four times over.

A holder class rather than `static` inside each function for one reason: a
`static` cannot be cleared from outside, and two callers genuinely need it
cleared — the test harness, which changes permissions and asks again in the
same process, and any long-running worker. A cache nobody can invalidate is
a cache that will eventually answer with yesterday's permissions.

## Methods

| Method | What it does |
|---|---|
| [get()](#get) | The cached value for `$key`, or null when nothing is cached. |
| [set()](#set) | Stores and returns the value, so callers can `return set(...)`. |
| [clear()](#clear) | Empties the per-request cache. |

### get

*public static* - line 728

The cached value for `$key`, or null when nothing is cached.

```php
function get(string $key)
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$key` | `string` |  |  |

**Returns:** mixed|null null = not cached (distinct from a cached null)

**Called from:** [includes/knowledge/visibility.php](/code/files/includes/knowledge/visibility.php.md)

### set

*public static* - line 734

Stores and returns the value, so callers can `return set(...)`.

```php
function set(string $key, $value)
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$key` | `string` |  |  |
| `$value` |  |  |  |

**Called from:** [includes/knowledge/visibility.php](/code/files/includes/knowledge/visibility.php.md)

### clear

*public static* - line 741

Empties the per-request cache.

```php
function clear(): void
```

**Called from:** [includes/knowledge/visibility.php](/code/files/includes/knowledge/visibility.php.md)

