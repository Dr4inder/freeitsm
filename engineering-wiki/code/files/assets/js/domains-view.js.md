# assets/js/domains-view.js

> JavaScript - 623 lines

Domains — one domain's page (domains/view.php).

## Functions

| Function | Line | What it does |
|---|--:|---|
| `load()` | 19 |  |
| `loadLookups()` | 29 |  |
| `renderHero()` | 34 | ---------------------------------------------------------------- hero |
| `row(k, v, mono)` | 64 | ---------------------------------------------------------------- overview |
| `yn(v)` | 68 |  |
| `renderOverview()` | 70 |  |
| `authCodeCell()` | 121 |  |
| `renderSecurity()` | 129 |  |
| `renderCerts()` | 147 | ---------------------------------------------------------------- certificates |
| `renderLookalikes()` | 173 | ---------------------------------------------------------------- look-alikes |
| `renderHistory()` | 195 | ---------------------------------------------------------------- history |
| `loadConnections()` | 227 |  |
| `connIcon(paths)` | 233 |  |
| `riskHtml()` | 237 |  |
| `contractHtml()` | 258 |  |
| `rowHtml(kind, r)` | 268 |  |
| `renderConnections()` | 277 |  |
| `connSearch(input)` | 305 |  |
| `wireConnections()` | 318 |  |
| `switchTab(tab)` | 374 | ---------------------------------------------------------------- actions |
| `busy(btn, fn)` | 379 |  |
| `wire()` | 384 |  |
| `peopleLink(page, id, name)` | 433 | ------------------------------------- who: tech contact + customer (#162) The technical contact is a supplier contact OR one of your analysts; the customer is a person OR a supplier, optionally with one of its contacts. |
| `techCell()` | 438 |  |
| `customerCell()` | 443 |  |
| `customerLabel()` | 456 |  |
| `fillTech()` | 465 |  |
| `opt(v, label)` | 467 |  |
| `group(label, items)` | 468 |  |
| `openEdit()` | 486 |  |
| `setCustomer(key, label)` | 521 | --------------------------------- customer: person (#153) or supplier (#162) eCustomerId holds "user:5", "supplier:3" or "contact:9" - one kind only. |
| `hideCustomers()` | 527 |  |
| `searchCustomers()` | 529 |  |
| `item(key, label, sub)` | 548 |  |
| `heading(text)` | 556 |  |
| `customerKeys(e)` | 569 |  |
| `saveEdit()` | 591 |  |

## Loaded by

- [domains/view.php](/code/files/domains/view.php.md)

