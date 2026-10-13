# assets/js/project-links.js

> JavaScript - 117 lines

The Projects panel other modules show (3.2.0): the projects a record - an asset, a change, a ticket, a contract, a CMDB item, a knowledge article or (3.3.0) a problem - is part of, each in its own colour with its health and progress, plus "Add to a project" and unlink.

ProjectLinks.mount(hostEl, {
      kind:  'asset' | 'change' | 'ticket' | 'contract' | 'cmdb' | 'article' | 'problem',
      id:    the record's id,
      base:  BASE_URL,
      cardClass / headClass / titleClass: the host page's own card classes,
      bare:  true when the host draws its own heading - just the body,
      editable: false to list only,
      hideEmpty: true to draw nothing at all when there is nothing linked,
  });

Every rule - Projects plus the other module, both ends visible, same company,
and Projects -> Settings -> General for who may change a project - lives in
includes/projects/links.php. A host page only mounts this for an analyst who
can open Projects, so nothing here has to ask.

Words use window.tf() with English fallbacks, so a host page does not have to
export the whole 'projects' translation namespace to show one panel.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `L(k, en, p)` | 30 |  |
| `esc(v)` | 31 |  |
| `toast(m, k)` | 32 |  |
| `call(base, path, body)` | 39 |  |
| `row(p, editable, base)` | 47 |  |
| `mount(host, o)` | 61 |  |
| `draw()` | 67 |  |
| `load()` | 79 |  |

## Loaded by

- [asset-management/index.php](/code/files/asset-management/index.php.md)
- [cmdb/object.php](/code/files/cmdb/object.php.md)
- [contracts/view.php](/code/files/contracts/view.php.md)
- [knowledge/index.php](/code/files/knowledge/index.php.md)

