# assets/js/files-desktop.js

> JavaScript - 1959 lines

Files — the desktop's apps: desktop icons, the start menu, Explorer windows, uploads, the clipboard, Permissions, Properties, Recent, Search, Personalise, Help, and the phone list view.

Windows, menus and dialogs come from files-wm.js (window.FilesWM); icons from
files-icons.js. Everything the server knows comes from api/files/ - and the
server decides every permission. The levels this file reads only decide which
menu items are offered; a hidden button is a courtesy, never the protection.

Levels (includes/files/acl.php): 1 View, 2 Download, 3 Upload, 4 Modify, 5 Full control.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `api(path, body, method)` | 31 |  |
| `badReply(status, text)` | 48 | A reply that was not JSON, said in words. "HTTP 200" alone told nobody anything: the usual cause is a PHP warning printed ahead of the JSON (with display_errors on) or a proxy's own page, so show the start of what came back. |
| `hasWildcard(q)` | 61 | A name test for what someone typed. With * or ? it is a Windows-style wildcard over the WHOLE name (*.png ends in .png, report* starts with report); without, it is "contains". Case never matters. The same rules as api/files/search.php, which does this for the Search window. |
| `nameMatcher(q)` | 62 |  |
| `fail(e)` | 68 |  |
| `fmtSize(n)` | 69 |  |
| `fmtWhen(s)` | 76 |  |
| `typeName(name)` | 77 |  |
| `debounce(fn, ms)` | 88 |  |
| `h(tag, cls, html)` | 92 |  |
| `svgIcon(path)` | 98 |  |
| `geoFor(kind)` | 129 |  |
| `changed(folderIds)` | 133 |  |
| `setClip(mode, entries, from)` | 139 |  |
| `paste(target)` | 145 | Paste is a drop that came via the clipboard: files and folders through transfer.php, shortcuts through shortcut.php 'place' (dropEntries). |
| `transfer(mode, entries, from, target)` | 151 |  |
| `shortcutIcon(targetType, targetName, px)` | 159 | A target's icon with the shortcut arrow over its corner. |
| `shortcutMenu(type, id, canHere, disabled)` | 168 | "Create shortcut >" for a file or folder: beside it, or on my desktop. |
| `createShortcut(type, id, where, folderId)` | 174 |  |
| `openShortcutTarget(s, inExplorer)` | 190 | Open what a shortcut points to. A folder opens in `inExplorer` when given (else a new window); a file in the viewer; a Knowledge article in Knowledge, in a new tab - where Knowledge's own permissions apply again. |
| `previewArticle(id)` | 201 | A Knowledge article in a desktop window, with a button to open it in Knowledge itself (new tab). ⚠️ Knowledge stores bodies as raw HTML and does not sanitise them, so the body goes into a SANDBOXED frame - no scripts, no same-origin access - never into the desktop's own DOM. |
| `pickArticle(where, folderId)` | 222 | "Shortcut to article…" - pick a Knowledge article, then place a shortcut to it. |
| `shortcutLocation(s)` | 248 | Open the folder holding a shortcut's target, with the target selected. |
| `viewFile(itemId, versionId)` | 254 | Open a file in the viewer (files-viewer.js). Every open is a 'view' in the audit trail. |
| `download(itemId, versionId)` | 262 |  |
| `Explorer(folderId, opts)` | 274 |  |
| `toRef(e)` | 622 |  |
| `finish(commit)` | 667 |  |
| `move(e)` | 846 |  |
| `up()` | 862 |  |
| `kind(ev)` | 895 |  |
| `dropEntries(payload, target, copy)` | 936 | Entries dropped on a folder (target; 0 = the top level). Files and folders move or copy through transfer.php; shortcuts - from a folder or from the desktop - through shortcut.php 'place'. The server checks every one. |
| `dropOnDesktop(payload, copy)` | 960 | Entries dropped on the desktop. Nothing is STORED on the desktop, so a file or folder dropped there becomes a desktop shortcut to it (Windows' "Create shortcuts here"); a shortcut dragged from a folder moves to the desktop - or, with Ctrl, is copied there and stays in the folder too. |
| `move(e)` | 1008 |  |
| `up()` | 1009 |  |
| `Tree(ex)` | 1018 |  |
| `pick(folderId)` | 1105 |  |
| `add(files, folderId)` | 1107 |  |
| `pump()` | 1121 |  |
| `askConflict(u, name)` | 1132 |  |
| `run(u, onConflict)` | 1151 |  |
| `sendChunks(u, chunk)` | 1178 |  |
| `next(offset)` | 1180 |  |
| `cancel(u)` | 1203 |  |
| `openWindow(quiet)` | 1212 |  |
| `statusText(u)` | 1227 |  |
| `pct(u)` | 1238 |  |
| `paintOne(u)` | 1240 |  |
| `paint()` | 1247 |  |
| `paintTray()` | 1268 |  |
| `openPermissions(folderId)` | 1284 |  |
| `load()` | 1293 |  |
| `render()` | 1304 |  |
| `save()` | 1417 |  |
| `openProperties(type, id)` | 1447 |  |
| `openLocation(folderId, itemKey)` | 1520 | Open the folder a file lives in, with the file selected. |
| `resultsTable(container, rows)` | 1524 |  |
| `openRecent()` | 1555 |  |
| `openSearch()` | 1563 |  |
| `openPersonalise()` | 1584 |  |
| `setColour(c)` | 1604 |  |
| `openHelp(section)` | 1623 | Help, optionally at one section (an id in files/help.php, e.g. 'upload_errors'). |
| `appByKey(k)` | 1650 |  |
| `renderDesktopIcons()` | 1652 |  |
| `loadDesktopShortcuts()` | 1682 |  |
| `renderDesktopShortcuts(box)` | 1685 |  |
| `dragKind(ev)` | 1748 |  |
| `closeStart()` | 1798 |  |
| `openStart()` | 1799 |  |
| `load(id)` | 1886 |  |
| `render()` | 1891 |  |

## Loaded by

- [files/index.php](/code/files/files/index.php.md)

## Traps

> [!WARNING]
> **Line 1777:** a file from the computer dropped where nothing accepts it (a

