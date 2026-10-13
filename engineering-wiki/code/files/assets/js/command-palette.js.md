# assets/js/command-palette.js

> JavaScript - 405 lines

Command palette (⌘/Ctrl-K).

A global launcher available on every analyst page. Opens with Cmd-K (Mac) or
Ctrl-K, lets you jump straight to any module you can access, run a couple of
quick actions, and search tickets / CMDB items / assets by name.

The page injects two globals before this loads (see renderWaffleMenuJS in
includes/waffle-menu.php):
  window.CP_BASE     — BASE_URL, prefixed to every navigation target.
  window.CP_MODULES  — [{ key, name, path, icon }] already filtered to the
                       modules this analyst may see, so the palette never
                       offers a destination the waffle launcher wouldn't.

Entity search goes to api/system/global_search.php, which applies the same
module + company scoping server-side.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `cp(key, english, params)` | 28 |  |
| `typeLabel(type)` | 65 |  |
| `esc(s)` | 112 |  |
| `build()` | 118 |  |
| `open()` | 148 |  |
| `close()` | 157 |  |
| `isOpen()` | 164 |  |
| `score(text, q)` | 168 |  |
| `matchedModules(q)` | 175 |  |
| `matchedCommands(q)` | 184 |  |
| `render(serverResults)` | 192 |  |
| `pluralType(type)` | 294 |  |
| `row(idx, iconSvg, title, sub, tag, extra)` | 320 |  |
| `setActive(ix)` | 332 |  |
| `paintActive()` | 337 |  |
| `move(delta)` | 348 |  |
| `onKeydown(e)` | 354 |  |
| `onInput()` | 367 |  |
| `doSearch(q)` | 379 |  |

## API endpoints it calls

- [api/system/global_search.php](/code/files/api/system/global_search.php.md)

