# api/webchat/widget.js

> JavaScript - 406 lines

FreeITSM web chat widget loader.

Dropped onto any website via the embed snippet:
  <script src=".../api/webchat/widget.js" data-freeitsm-widget="wc_..."></script>

It reads its own key + API base from the script tag, pulls the widget's look-and-feel
from config.php, and renders a floating launcher + chat panel inside a Shadow DOM (so
the host site's CSS can't touch it and vice-versa). Messages go to send.php; analyst
replies arrive by polling poll.php. The per-conversation token lives in sessionStorage,
so a page navigation within the visit keeps the same chat.

Vanilla JS, no dependencies, no cookies.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `api(path)` | 41 |  |
| `esc(s)` | 43 |  |
| `styles()` | 57 |  |
| `build()` | 118 |  |
| `el(sel)` | 133 |  |
| `scrollDown()` | 135 |  |
| `showTyping()` | 140 |  |
| `hideTyping()` | 153 |  |
| `escBarHtml()` | 159 |  |
| `renderChatShell()` | 167 |  |
| `hideEscBar()` | 193 |  |
| `renderIntro()` | 198 |  |
| `addMessage(m, scroll)` | 210 |  |
| `onEscalate(mode)` | 229 |  |
| `loadConfig()` | 251 |  |
| `onStart(e)` | 262 |  |
| `onSend(e)` | 289 |  |
| `poll()` | 330 |  |
| `startPolling()` | 364 |  |
| `stopPolling()` | 369 |  |
| `openPanel()` | 372 |  |
| `closePanel()` | 389 |  |

