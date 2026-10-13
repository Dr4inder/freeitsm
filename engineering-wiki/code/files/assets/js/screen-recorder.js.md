# assets/js/screen-recorder.js

> JavaScript - 311 lines

Screen recording for the self-service portal — the ONE implementation.

WHY THIS FILE EXISTS
--------------------
Recording started life on the new-ticket form. Letting people record while
REPLYING needed the same ~250 lines: capture, MIME negotiation, the countdown,
the preview, the claim-or-discard decision, the upload. Copying it would have
meant two recorders drifting apart — one growing a fix for a browser quirk the
other never gets, which is exactly how the HTML sanitiser ended up protecting
the portal and not the inbox.

It pairs with:
  self-service/includes/record-modal.php  — the markup (ids matched here)
  assets/css/self-service.css             — .rec-modal and friends
  api/self-service/upload_recording.php   — the pending upload

The module owns the modal and the capture; the PAGE owns what happens to a
claimed recording (attach to a new ticket / to a reply), which arrives via the
onClaimed callback. That is the whole seam between them.

ONE modal per page — it binds by element id, matching the single partial.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `onClaimed()` | 30 |  |
| `el(id)` | 44 |  |
| `t(key, params)` | 46 |  |
| `escapeHtml(text)` | 50 |  |
| `formatDuration(seconds)` | 56 |  |
| `notifyError(message)` | 62 |  |
| `isSupported()` | 77 | iOS Safari has no getDisplayMedia at all. Callers hide their Record button rather than letting someone press it and meet a confusing failure. |
| `hasUnclaimed()` | 82 | A captured-but-unclaimed recording — what the submit guard asks about. |
| `isRecording()` | 86 |  |
| `open()` | 90 |  |
| `close()` | 106 | Closing DISCARDS an unclaimed recording — cancelling should not silently leave something attached. That is the opposite of the submit guard, which blocks: there they were heading onward and might lose work; here they have explicitly said no. |
| `pickRecorderMime()` | 115 |  |
| `start()` | 134 |  |
| `ondataavailable(e)` | 167 |  |
| `onstop()` | 170 |  |
| `stop()` | 205 |  |
| `showPreview()` | 209 |  |
| `discard()` | 224 |  |
| `use()` | 249 | Upload and hand the result to the page. |
| `init(options)` | 290 |  |

