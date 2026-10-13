# peopleCoursesForPerson()

The person's courses - exactly what their own My courses page shows.

```php
function peopleCoursesForPerson(PDO $conn, int $userId): array
```

Defined in [includes/people.php](/code/files/includes/people.php.md), line 497.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$userId` | `int` |  |  |

**Returns:** `array`

## Calls

[lmsMyCourses()](/code/functions/lmsMyCourses.md)

## Called from

- [includes/people.php](/code/files/includes/people.php.md) - in [personDetail()](/code/functions/personDetail.md)

