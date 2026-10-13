# projectTemplateSummary()

What the picker shows about a template: counts, without the whole plan.

```php
function projectTemplateSummary(
    string $key,
    string $name,
    ?string $desc,
    array $c,
    bool $builtin,
    bool $active = true
): array
```

Defined in [includes/projects/templates.php](/code/files/includes/projects/templates.php.md), line 325.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$key` | `string` |  |  |
| `$name` | `string` |  |  |
| `$desc` | `?string` |  |  |
| `$c` | `array` |  |  |
| `$builtin` | `bool` |  |  |
| `$active` | `bool` | `true` |  |

**Returns:** `array`

## Called from

- [includes/projects/templates.php](/code/files/includes/projects/templates.php.md) - in [projectTemplateList()](/code/functions/projectTemplateList.md)

