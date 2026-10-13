# assets/js/address-book-add.js

> JavaScript - 87 lines

"Add to address book" for a person who is not in one (#133).

Shared by Tickets → Users and Assets → Users, so the two screens cannot
disagree about when it is offered or what it says. The server decides both:
this only draws what api/tickets/address_book_add.php returns, and asks
before writing - a new contact in somebody's address book is not a thing to
do on a single click.

  AddressBookAdd.mount(hostElement, userId, personName, apiBase, onDone)

## Functions

| Function | Line | What it does |
|---|--:|---|
| `confirmText(book, person)` | 18 |  |
| `add(book, userId, person, apiBase, onDone, btn)` | 28 |  |
| `mount(host, userId, person, apiBase, onDone)` | 62 | Draw the button(s) into `host` if this person can be added anywhere. One address book: one button naming it. Several: one each. None, or a person who is already linked: nothing at all. |

## Loaded by

- [asset-management/users.php](/code/files/asset-management/users.php.md)
- [tickets/users.php](/code/files/tickets/users.php.md)

