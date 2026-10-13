# assets/js/documents.js

> JavaScript - 602 lines

Documents panel — attach files or DMS links to any record (discussion #76).

ONE component for every module. Mount it and give it a parent:

    FreeITSMDocuments.mount(element, {
        parentType: 'contract',
        parentId:   42,
        apiBase:    '../api/documents/',
        canEdit:    true
    });

The component knows nothing about any module, and no module knows anything
about how documents are stored or authorised. The server decides both — see
includes/documents.php.

⚠️ window.t IS GUARDED HERE. The notification bell called it bare and broke on
the one page that did not load i18n.js, and because the throw happened above
the try, it never even made its request (GH #78). Same pattern as calendar.js
and war-room.js: fall back to English rather than take the page down.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `t(key, params)` | 63 |  |
| `esc(s)` | 78 |  |
| `bytes(n)` | 84 |  |
| `safeHref(url)` | 92 | Only ever produce an href we built, from a scheme we checked. |
| `icon(kind)` | 96 |  |
| `Panel(el, opts)` | 102 |  |
| `uploadFiles(api, parentType, parentId, files)` | 332 | Upload files against a parent, one request per file. |
| `closeInfo()` | 502 |  |
| `onInfoKey(e)` | 507 |  |
| `showInfo(apiBase, documentId, baseUrl)` | 509 |  |
| `mount(el, opts)` | 583 |  |
| `upload(parentType, parentId, files, apiBase)` | 597 | Attach already-chosen files to a parent, without a panel. |

