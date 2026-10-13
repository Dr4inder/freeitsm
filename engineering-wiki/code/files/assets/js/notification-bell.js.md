# assets/js/notification-bell.js

> JavaScript - 345 lines

The notification bell - ONE script for both the analyst app (discussion #55) and the self-service portal (discussion #62).

NotificationBell.init({
      list:       URL returning { unread, notifications } (and just { unread }
                  with count_only=1),
      markRead:   URL taking { ids } or { all },
      clear:      URL taking { ids } or { all, include_unread },
      linkPrefix: prepended to each notification's relative link,
      seenKey:    sessionStorage key for the chime's baseline
  });

The markup comes from `notificationBellMarkup()` (includes/notification_bell.php)
and the look from assets/css/notification-bell.css. Everything below moved
here from includes/waffle-menu.php unchanged apart from the URLs, so the two
bells cannot drift: a fix to one is a fix to both.

Needs window.t (i18n.js) for the common.notifications.* strings, and uses
showConfirm / showToast when present.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `ago(utc)` | 41 |  |
| `describe(n)` | 53 |  |
| `render(items)` | 61 |  |
| `paintBadge(unread)` | 88 |  |
| `recordSeen(unread)` | 102 |  |
| `chimeIfNew(unread)` | 105 |  |
| `desktopNotify()` | 128 |  |
| `poll()` | 175 |  |
| `open()` | 182 |  |
| `clearOne(id, item)` | 243 |  |
| `doClearAll(includeUnread)` | 318 |  |

