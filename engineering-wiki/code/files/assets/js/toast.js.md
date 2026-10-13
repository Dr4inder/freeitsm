# assets/js/toast.js

> JavaScript - 128 lines

Global Toast Notification System

Position + animation are per-analyst preferences stored in
user_preferences (keys: toast_position, toast_animation). They're
pushed onto window.TOAST_POSITION / window.TOAST_ANIMATION by the
shared waffle-menu.php at page-render time so toast.js doesn't have
to AJAX for them. localStorage stays as a fallback for any pre-#432
browsers that still have the values cached locally.

Usage: showToast('Message text', 'success') — types: success, error, warning, info

## Functions

| Function | Line | What it does |
|---|--:|---|
| `getPosition()` | 65 |  |
| `getAnimation()` | 69 |  |
| `getContainer()` | 73 |  |
| `showToast(message, type, ms)` | 92 | `ms` is optional and defaults to the usual 4 seconds, so every existing two-argument call behaves exactly as before. It exists because some messages are not acknowledgements but instructions — "the address book has a different number, import again to see theirs" cannot be read, understood and acted on inside four seconds, and a toast that vanishes mid-sentence is the same as not having shown it. |
| `onclick()` | 111 |  |
| `requestAnimationFrame(function()` | 116 |  |
| `requestAnimationFrame(function()` | 117 |  |
| `setTimeout(function()` | 122 |  |

## Loaded by

- [asset-management/manager-access.php](/code/files/asset-management/manager-access.php.md)
- [asset-management/users.php](/code/files/asset-management/users.php.md)
- [index.php](/code/files/index.php.md)
- [system/ai/index.php](/code/files/system/ai/index.php.md)
- [system/cost-centres/index.php](/code/files/system/cost-centres/index.php.md)
- [system/feature-bingo/index.php](/code/files/system/feature-bingo/index.php.md)
- [system/managers/index.php](/code/files/system/managers/index.php.md)
- [system/photo-album/index.php](/code/files/system/photo-album/index.php.md)
- [system/roles/index.php](/code/files/system/roles/index.php.md)
- [system/self-service/index.php](/code/files/system/self-service/index.php.md)
- [system/sso/carddav.php](/code/files/system/sso/carddav.php.md)
- [system/sso/provider.php](/code/files/system/sso/provider.php.md)
- [tickets/manager-access.php](/code/files/tickets/manager-access.php.md)

