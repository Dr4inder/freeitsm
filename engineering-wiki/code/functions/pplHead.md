# pplHead()

The <head> every People page shares. `$extraCss`: page stylesheets, linked BEFORE mobile.css so the mobile layer still wins its ties (Techniques §9).

```php
function pplHead(
    string $title,
    array $namespaces = ['common', 'people'],
    array $extraCss = []
): void
```

Defined in [people/includes/render.php](/code/files/people/includes/render.php.md), line 245.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$title` | `string` |  |  |
| `$namespaces` | `array` | `['common', 'people']` |  |
| `$extraCss` | `array` | `[]` |  |

**Returns:** `void`

## Calls

[pageTitle()](/code/functions/pageTitle.md), [pplE()](/code/functions/pplE.md)

## Called from

- [people/companies.php](/code/files/people/companies.php.md)
- [people/company.php](/code/files/people/company.php.md)
- [people/contact.php](/code/files/people/contact.php.md)
- [people/help.php](/code/files/people/help.php.md)
- [people/index.php](/code/files/people/index.php.md)
- [people/person.php](/code/files/people/person.php.md)
- [people/supplier.php](/code/files/people/supplier.php.md)
- [people/suppliers.php](/code/files/people/suppliers.php.md)

