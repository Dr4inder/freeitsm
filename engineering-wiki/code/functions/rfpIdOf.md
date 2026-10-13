# rfpIdOf()

The RFP a child row belongs to. `$kind` names the table the id is for; every one carries rfp_id except section history (through its section).

```php
function rfpIdOf(PDO $conn, string $kind, int $id): ?int
```

Defined in [includes/rfp_scope.php](/code/files/includes/rfp_scope.php.md), line 72.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$kind` | `string` |  |  |
| `$id` | `int` |  |  |

**Returns:** `?int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 75 | `rfpIdOf` | read [rfps](/code/tables/rfps.md) |  |
| 76 | `rfpIdOf` | read [rfp_documents](/code/tables/rfp_documents.md) |  |
| 77 | `rfpIdOf` | read [rfp_extracted_requirements](/code/tables/rfp_extracted_requirements.md) |  |
| 78 | `rfpIdOf` | read [rfp_consolidated_requirements](/code/tables/rfp_consolidated_requirements.md) |  |
| 79 | `rfpIdOf` | read [rfp_conflicts](/code/tables/rfp_conflicts.md) |  |
| 80 | `rfpIdOf` | read [rfp_output_sections](/code/tables/rfp_output_sections.md) |  |
| 81 | `rfpIdOf` | read [rfp_document_sections](/code/tables/rfp_document_sections.md) |  |
| 82 | `rfpIdOf` | read [rfp_invited_suppliers](/code/tables/rfp_invited_suppliers.md) |  |

## Called from

- [includes/rfp_scope.php](/code/files/includes/rfp_scope.php.md) - in [rfpGate()](/code/functions/rfpGate.md)

