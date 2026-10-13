# browser-extension/background.js

> JavaScript - 171 lines

FreeITSM Watchtower — Background Service Worker Polls the Watchtower API on a schedule and updates the badge

## Functions

| Function | Line | What it does |
|---|--:|---|
| `setupAlarm()` | 42 |  |
| `fetchDashboard()` | 50 |  |
| `computeAttentionCount(data)` | 130 |  |
| `hasUrgent(data)` | 165 |  |

## API endpoints it calls

- [api/watchtower/get_dashboard_ext.php](/code/files/api/watchtower/get_dashboard_ext.php.md)

