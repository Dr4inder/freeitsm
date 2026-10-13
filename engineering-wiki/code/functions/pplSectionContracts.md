# pplSectionContracts()

The Contracts card: contract, the other party (unless `$withParty` is false), status and end date, with inactive contracts marked.

```php
function pplSectionContracts(array $s, bool $withParty = true, ?string $title = null): string
```

Defined in [people/includes/render.php](/code/files/people/includes/render.php.md), line 111.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$s` | `array` |  |  |
| `$withParty` | `bool` | `true` |  |
| `$title` | `?string` | `null` |  |

**Returns:** `string`

## Calls

[peopleBareDate()](/code/functions/peopleBareDate.md), [pplCard()](/code/functions/pplCard.md), [pplE()](/code/functions/pplE.md), [pplLink()](/code/functions/pplLink.md), [pplPill()](/code/functions/pplPill.md), [t()](/code/functions/t.md)

## Called from

- [people/includes/render.php](/code/files/people/includes/render.php.md) - in [pplSections()](/code/functions/pplSections.md)
- [people/supplier.php](/code/files/people/supplier.php.md)

