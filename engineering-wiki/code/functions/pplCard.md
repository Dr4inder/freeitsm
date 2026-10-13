# pplCard()

One section card: a heading with its count, then a table or "Nothing yet".

```php
function pplCard(
    string $key,
    string $title,
    int $count,
    array $head,
    array $rows,
    bool $more = false,
    string $extra = ''
): string
```

Defined in [people/includes/render.php](/code/files/people/includes/render.php.md), line 43.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$key` | `string` |  |  |
| `$title` | `string` |  |  |
| `$count` | `int` |  |  |
| `$head` | `array` |  |  |
| `$rows` | `array` |  |  |
| `$more` | `bool` | `false` |  |
| `$extra` | `string` | `''` |  |

**Returns:** `string`

## Calls

[pplE()](/code/functions/pplE.md), [t()](/code/functions/t.md)

## Called from

- [people/includes/render.php](/code/files/people/includes/render.php.md) - in [pplSectionTickets()](/code/functions/pplSectionTickets.md), [pplSectionAssets()](/code/functions/pplSectionAssets.md), [pplSectionContracts()](/code/functions/pplSectionContracts.md), [pplSectionDomains()](/code/functions/pplSectionDomains.md), [pplSectionCoursesPerson()](/code/functions/pplSectionCoursesPerson.md), [pplSectionCoursesCompany()](/code/functions/pplSectionCoursesCompany.md), [pplSectionForms()](/code/functions/pplSectionForms.md), [pplSectionProjects()](/code/functions/pplSectionProjects.md), [pplSectionContractorTasks()](/code/functions/pplSectionContractorTasks.md)

