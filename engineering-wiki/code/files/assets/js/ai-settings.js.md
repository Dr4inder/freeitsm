# assets/js/ai-settings.js

> JavaScript - 270 lines

Drives the reusable AI settings panel (includes/ai_settings_panel.php).

Auto-initialises every [data-ai-panel] on the page: hydrates from
api/system/ai/get_settings.php, swaps the model suggestions when the
provider changes (curated list for Anthropic/OpenAI, live OpenRouter
catalogue with pricing for OpenRouter), and saves/tests via the shared
endpoints. No per-module code — the namespace + endpoints come from
data-attributes on the panel element.

The model picker is a self-contained dropdown (NOT a native <datalist>):
a long OpenRouter list rendered via <datalist> made the browser scroll the
overflow:hidden page body when focused, pushing the header off-screen. This
custom menu is absolutely positioned inside the panel with its own capped
scroll, so it can never move the page.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `tr(key, fallback)` | 20 |  |
| `toast(msg, type)` | 30 |  |
| `esc(s)` | 34 |  |
| `fmtPrice(perToken)` | 40 |  |
| `initPanel(panel)` | 47 |  |
| `setResult(text, cls)` | 75 |  |
| `renderMenu()` | 81 |  |
| `showMenu()` | 97 |  |
| `hideMenu()` | 98 |  |
| `setCuratedModels(provider)` | 113 |  |
| `loadOpenRouterModels()` | 118 |  |
| `applyProviderUi(provider, opts)` | 136 |  |

## Loaded by

- [cmdb/settings/index.php](/code/files/cmdb/settings/index.php.md)
- [forms/settings/index.php](/code/files/forms/settings/index.php.md)
- [knowledge/settings/index.php](/code/files/knowledge/settings/index.php.md)
- [projects/settings/index.php](/code/files/projects/settings/index.php.md)
- [tickets/settings/index.php](/code/files/tickets/settings/index.php.md)
- [war-room/settings/index.php](/code/files/war-room/settings/index.php.md)
- [workflow/settings/index.php](/code/files/workflow/settings/index.php.md)

