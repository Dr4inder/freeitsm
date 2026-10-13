# browser-extension/popup.js

> JavaScript - 373 lines

FreeITSM Watchtower — Popup Script

## Functions

| Function | Line | What it does |
|---|--:|---|
| `showNotConfigured()` | 56 |  |
| `showError(msg)` | 68 |  |
| `escapeHtml(s)` | 76 | Status names now reach the popup and are written into innerHTML. They are free text an admin types on a server this extension is pointed at, so they are escaped rather than trusted. |
| `hideError()` | 81 |  |
| `updateTimestamp(iso)` | 85 |  |
| `renderDashboard(data)` | 105 |  |
| `renderMorningChecks(mc)` | 122 |  |
| `renderTickets(tk)` | 157 |  |
| `renderChanges(ch)` | 188 |  |
| `renderServiceStatus(ss)` | 212 |  |
| `renderCalendar(cal)` | 244 |  |
| `renderContracts(ct)` | 263 |  |
| `renderKnowledge(kb)` | 295 |  |
| `renderAssets(as)` | 319 |  |
| `renderTasks(tk)` | 344 |  |

