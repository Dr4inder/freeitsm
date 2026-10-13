# assets/js/notification-sound.js

> JavaScript - 106 lines

Notification chime — per-analyst preference `notification_sound`.

The sounds are synthesised with the Web Audio API rather than shipped as
audio files. A two-note bell is a handful of oscillator nodes, so generating
it means no binary asset to serve, cache-bust or license, and offering
several distinct sounds costs nothing extra.

window.NOTIFICATION_SOUND is written by `renderWaffleMenuJS()` from the saved
preference. 'off' — the default — means silence, and is why every consumer
can call `playNotificationSound()` unconditionally.

Consumers: the notification bell and the war-room mention alerts, both in
includes/waffle-menu.php, plus the preview on the Preferences page.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `context()` | 33 |  |
| `playNotificationSound(key)` | 51 | Play a chime. |
| `warm()` | 90 |  |

