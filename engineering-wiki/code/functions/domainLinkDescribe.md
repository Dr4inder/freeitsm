# domainLinkDescribe()

One linked record, shaped for display: id, label, sub-line, link, and kind-specific extras.

```php
function domainLinkDescribe(PDO $conn, string $kind, array $ids): array
```

Defined in [includes/domains/links.php](/code/files/includes/domains/links.php.md), line 132.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$kind` | `string` |  |  |
| `$ids` | `array` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 138 | `domainLinkDescribe` | read [cmdb_objects](/code/tables/cmdb_objects.md), read [cmdb_classes](/code/tables/cmdb_classes.md) |  |
| 143 | `domainLinkDescribe` | read [status_services](/code/tables/status_services.md) |  |
| 149 | `domainLinkDescribe` | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 157 | `domainLinkDescribe` | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |

## Calls

[entityLink()](/code/functions/entityLink.md)

## Called from

- [includes/domains/links.php](/code/files/includes/domains/links.php.md) - in [domainLinks()](/code/functions/domainLinks.md), [domainLinkSearch()](/code/functions/domainLinkSearch.md)

