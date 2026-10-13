# pplSectionForms()

The Forms card: form, when submitted, who by (company page), approval state and the ticket it raised.

```php
function pplSectionForms(array $s, bool $person): string
```

Defined in [people/includes/render.php](/code/files/people/includes/render.php.md), line 172.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$s` | `array` |  |  |
| `$person` | `bool` |  |  |

**Returns:** `string`

## Calls

[fmt_datetime()](/code/functions/fmt_datetime.md), [pplCard()](/code/functions/pplCard.md), [pplE()](/code/functions/pplE.md), [pplLink()](/code/functions/pplLink.md), [t()](/code/functions/t.md)

## Called from

- [people/includes/render.php](/code/files/people/includes/render.php.md) - in [pplSections()](/code/functions/pplSections.md)

