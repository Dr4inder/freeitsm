# assets/js/war-room.js

> JavaScript - 1139 lines

War room — the client half.

🔒 EVERY PIECE OF MESSAGE TEXT IS INSERTED WITH textContent. Never innerHTML,
never a template string built from a message body, never an attachment's
filename dropped into markup. A chat box that renders other people's text as
HTML is a stored-XSS hole that every analyst walks into during an incident,
which is the worst possible moment for it. There is no sanitiser here on
purpose: not producing HTML is stronger than cleaning it afterwards.

⚠️ NOTHING ON THIS PAGE MAY LOAD FROM THE INTERNET. No CDN, no font, no remote
image. If it cannot be served from this box, it does not belong here.

The poll is the module's heartbeat: it fetches new messages, records presence,
reports who else is here, and refreshes the channel list with its unread
counts — one request rather than four. See api/war-room/poll.php for why it is
a poll and not an EventSource.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `insertedForm(person)` | 53 | What the picker actually types into the box for this person. |
| `t(key, vars)` | 73 |  |
| `el(tag, className, text)` | 80 |  |
| `clear(node)` | 86 |  |
| `localTime(utc)` | 89 | Local time from the server's UTC string, via the app's shared tz helper. |
| `bytes(n)` | 95 |  |
| `renderChannels()` | 109 |  |
| `addChannelButton(c)` | 121 |  |
| `currentChannel()` | 143 |  |
| `applyChannelHeader()` | 148 |  |
| `switchChannel(id)` | 164 |  |
| `renderMessage(m)` | 184 |  |
| `renderBodyWithMentions(node, text)` | 271 | Write a message body into `node`, marking the `@names` inside it. |
| `nameKnown(name)` | 303 |  |
| `mentionsMe(name)` | 310 |  |
| `guessKind(name)` | 316 | Only used to decide thumbnail vs link; the server decides what is served. |
| `appendMessages(list)` | 321 |  |
| `renderPresence(p)` | 356 |  |
| `poll()` | 379 |  |
| `startPolling()` | 402 |  |
| `renderPending()` | 409 |  |
| `acContext()` | 453 | The `@word` being typed at the caret, or null. |
| `acRender()` | 467 |  |
| `acHide()` | 498 |  |
| `acAccept(i)` | 500 |  |
| `mentionBeforeCaret()` | 526 | The mention immediately before the caret, if there is one. |
| `openEdit(m)` | 617 |  |
| `openDelete(m)` | 641 |  |
| `messageAction(action, payload)` | 660 |  |
| `send()` | 683 |  |
| `addressesWarbot(text)` | 738 |  |
| `askWarbot(messageId)` | 742 |  |
| `openPanel(title)` | 771 |  |
| `closePanel()` | 777 |  |
| `run()` | 800 |  |
| `openModal(title)` | 919 |  |
| `closeModal()` | 925 |  |
| `field(parent, labelText, node)` | 932 |  |
| `post(action, payload, onOk, failKey)` | 938 |  |
| `draw(filter)` | 1028 |  |

## Loaded by

- [war-room/index.php](/code/files/war-room/index.php.md)

