# inboxDisplayForAnalyst()

What THIS analyst should see: their own choice, else the install default.

Deliberately never throws and never returns an invalid shape. A display
preference must not be able to break the inbox — the worst outcome available
here is showing somebody the wrong chips.

```php
function inboxDisplayForAnalyst(PDO $conn, int $analystId): array
```

Defined in [includes/inbox_display.php](/code/files/includes/inbox_display.php.md), line 152.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 162 | `inboxDisplayForAnalyst` | read [user_preferences](/code/tables/user_preferences.md) |  |

## Calls

[inboxDisplayInstallDefault()](/code/functions/inboxDisplayInstallDefault.md), [inboxDisplayNormalise()](/code/functions/inboxDisplayNormalise.md)

## Called from

- [tickets/index.php](/code/files/tickets/index.php.md)
- [tickets/settings/index.php](/code/files/tickets/settings/index.php.md)

