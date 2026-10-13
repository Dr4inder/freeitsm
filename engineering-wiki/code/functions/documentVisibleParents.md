# documentVisibleParents()

Everywhere a document is attached — that this caller may see.

⚠️ THE FILTER IS THE POINT, not a nicety. Listing a parent the caller cannot
see would disclose that a contract exists, and its title, to somebody with no
access to Contracts at all. So a hidden parent is omitted silently rather than
shown as "1 other record", which would leak the same fact more quietly.

```php
function documentVisibleParents(
    PDO $conn,
    int $analystId,
    ?array $allowedModules,
    int $documentId
): array
```

Defined in [includes/documents.php](/code/files/includes/documents.php.md), line 530.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$allowedModules` | `?array` |  |  |
| `$documentId` | `int` |  |  |

**Returns:** array<int,array{parent_type:string,parent_id:int,label:string,name:?string,url:?string}>

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 535 | `documentVisibleParents` | read [document_links](/code/tables/document_links.md) |  |

## Calls

[documentCanViewParent()](/code/functions/documentCanViewParent.md), [documentEntityDef()](/code/functions/documentEntityDef.md), [documentParentName()](/code/functions/documentParentName.md)

## Called from

- [api/documents/find.php](/code/files/api/documents/find.php.md)
- [api/documents/links.php](/code/files/api/documents/links.php.md)

