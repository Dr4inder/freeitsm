# documentCanViewParent()

Can this analyst see one specific parent record?

Used for the exact, one-row question: may this document be downloaded, may it
be attached here. Checks the module gate first (cheap, and the coarse rule),
then the module's own record-level check where it has one.

```php
function documentCanViewParent(
    PDO $conn,
    int $analystId,
    ?array $allowedModules,
    string $type,
    int $parentId
): bool
```

Defined in [includes/documents.php](/code/files/includes/documents.php.md), line 375.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$allowedModules` | `?array` |  |  |
| `$type` | `string` |  |  |
| `$parentId` | `int` |  |  |

**Returns:** `bool`

## Calls

[documentEntityDef()](/code/functions/documentEntityDef.md)

## Called from

- [api/documents/attach.php](/code/files/api/documents/attach.php.md)
- [api/documents/find.php](/code/files/api/documents/find.php.md)
- [api/documents/list.php](/code/files/api/documents/list.php.md)
- [api/documents/save.php](/code/files/api/documents/save.php.md)
- [api/documents/unlink.php](/code/files/api/documents/unlink.php.md)
- [api/system/global_search.php](/code/files/api/system/global_search.php.md)
- [includes/documents.php](/code/files/includes/documents.php.md) - in [documentCanView()](/code/functions/documentCanView.md), [documentVisibleParents()](/code/functions/documentVisibleParents.md)

