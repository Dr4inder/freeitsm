# renderWarRoomAlerts()

Renders the header's War Room alert button and panel, which poll api/war-room/alerts.php every minute and stay hidden until something is waiting. Not polled on the War Room page itself; desktop popups only when the analyst's warroom_desktop_alerts preference is on.

```php
function renderWarRoomAlerts($path_prefix)
```

Defined in [includes/waffle-menu.php](/code/files/includes/waffle-menu.php.md), line 1252.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$path_prefix` |  |  |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1262 | `renderWarRoomAlerts` | read [user_preferences](/code/tables/user_preferences.md) |  |

## Calls

[connectToDatabase()](/code/functions/connectToDatabase.md)

## Called from

- [includes/waffle-menu.php](/code/files/includes/waffle-menu.php.md) - in [renderHeaderRight()](/code/functions/renderHeaderRight.md)

