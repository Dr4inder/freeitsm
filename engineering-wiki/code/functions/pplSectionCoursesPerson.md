# pplSectionCoursesPerson()

A person's Courses card: each course with its status pill, progress (or completion date) and deadline, overdue ones marked.

```php
function pplSectionCoursesPerson(array $s): string
```

Defined in [people/includes/render.php](/code/files/people/includes/render.php.md), line 145.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$s` | `array` |  |  |

**Returns:** `string`

## Calls

[fmt_date()](/code/functions/fmt_date.md), [peopleBareDate()](/code/functions/peopleBareDate.md), [pplCard()](/code/functions/pplCard.md), [pplE()](/code/functions/pplE.md), [pplPill()](/code/functions/pplPill.md), [t()](/code/functions/t.md)

## Called from

- [people/includes/render.php](/code/files/people/includes/render.php.md) - in [pplSections()](/code/functions/pplSections.md)

