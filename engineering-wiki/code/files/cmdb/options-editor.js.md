# cmdb/options-editor.js

> JavaScript - 234 lines

CMDB shared dropdown-options editor.

Used by both the Settings page property modal and the floating
Edit-Property modal on the object detail page. Renders one row per option:
value text input + colour swatch + ⬆⬇ reorder + × delete, plus an "Add"
button below the list.

API:
  renderOptionsEditor(containerId, initialOptions)
    containerId — element to render into
    initialOptions — array of either:
        strings (legacy: ["Low", "Medium"])
      or
        {value, colour} objects (new: [{value:"Low", colour:"#22c55e"}, ...])

  collectOptionsFromEditor(containerId) -> [{value, colour}]
    Reads the current rows back as a normalised array of objects with the
    hex colour or null. Empty values are dropped.

No external dependencies.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `escapeHtmlAttr(s)` | 25 |  |
| `normalizeInitial(opts)` | 29 |  |
| `renderRow(value, colour, index)` | 40 |  |
| `injectStylesOnce()` | 57 |  |
| `wireRowHandlers(container)` | 147 |  |
| `renderOptionsEditor(containerId, initialOptions)` | 195 |  |
| `collectOptionsFromEditor(containerId)` | 219 |  |

## Loaded by

- [cmdb/object.php](/code/files/cmdb/object.php.md)
- [cmdb/settings/index.php](/code/files/cmdb/settings/index.php.md)

