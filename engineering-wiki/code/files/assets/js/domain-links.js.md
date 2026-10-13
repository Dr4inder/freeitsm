# assets/js/domain-links.js

> JavaScript - 166 lines

The Domains panel other modules show (3.0.0): the domains linked to a CMDB object, a knowledge article or a contract, with unlink and "link a domain".

DomainLinks.mount(hostEl, {
      kind:  'cmdb' | 'article' | 'contract',
      id:    the record's id,
      base:  BASE_URL,
      cardClass / headClass / titleClass: the host page's own card classes,
      editable: false to list only
      hideEmpty: true to show nothing at all when nothing is linked
      onChange: called after a link is made or removed
      bare: true when the host page draws its own heading - just the body
  });

Every rule - who may see or make a link, same company, the other module's own
permissions - is server-side in includes/domains/links.php. A host page only
mounts this for an analyst who can open Domains, so nothing here has to ask.

Labels come from the 'domains' translation namespace, which the host page
exports alongside its own.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `T(k, p)` | 27 |  |
| `esc(v)` | 28 |  |
| `fmt(d)` | 29 |  |
| `call(base, path, body)` | 36 |  |
| `toast(m, k)` | 43 |  |
| `pill(days)` | 45 |  |
| `money(amount, cur)` | 52 |  |
| `mount(host, o)` | 57 |  |
| `load()` | 61 |  |
| `search(input)` | 95 |  |
| `link(domainId, add)` | 113 |  |

## Loaded by

- [cmdb/object.php](/code/files/cmdb/object.php.md)
- [contracts/view.php](/code/files/contracts/view.php.md)
- [knowledge/index.php](/code/files/knowledge/index.php.md)

