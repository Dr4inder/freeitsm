# cmdb/browse.js

> JavaScript - 356 lines

CMDB Browse page — class sidebar + object table. Click a class to filter; click a row to open the object detail page.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `escapeHtml(s)` | 13 |  |
| `showInlineToast(msg, isError = false)` | 16 |  |
| `postJson(url, body)` | 20 |  |
| `loadClasses()` | 33 |  |
| `renderClassList()` | 52 |  |
| `selectClass(id)` | 63 |  |
| `loadObjects(searchOverride = null)` | 73 |  |
| `renderObjects()` | 90 |  |
| `formatDate(s)` | 126 |  |
| `onSearchInput()` | 134 |  |
| `openObject(id)` | 139 |  |
| `openNewObjectModal()` | 148 |  |
| `closeNewObjectModal()` | 170 |  |
| `renderRequiredFieldEditors(reqProps)` | 175 |  |
| `renderFieldEditor(p)` | 189 |  |
| `wireRefAutocomplete(prop)` | 225 |  |
| `renderResults()` | 234 |  |
| `pick(r)` | 255 |  |
| `collectRequiredFieldValues()` | 294 |  |
| `createObject()` | 318 |  |

## API endpoints it calls

- [api/cmdb/get_classes.php](/code/files/api/cmdb/get_classes.php.md)
- [api/cmdb/get_objects.php](/code/files/api/cmdb/get_objects.php.md)
- [api/cmdb/get_class_properties.php](/code/files/api/cmdb/get_class_properties.php.md)
- [api/cmdb/search_objects.php](/code/files/api/cmdb/search_objects.php.md)
- [api/cmdb/save_object.php](/code/files/api/cmdb/save_object.php.md)

## Loaded by

- [cmdb/index.php](/code/files/cmdb/index.php.md)

