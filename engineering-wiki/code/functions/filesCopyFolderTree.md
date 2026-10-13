# filesCopyFolderTree()

```php
function filesCopyFolderTree(
    PDO $conn,
    int $analystId,
    int $srcId,
    ?int $parentId,
    string $name
): int
```

Defined in [api/files/transfer.php](/code/files/api/files/transfer.php.md), line 146.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$srcId` | `int` |  |  |
| `$parentId` | `?int` |  |  |
| `$name` | `string` |  |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 148 | `filesCopyFolderTree` | **insert** [files_folders](/code/tables/files_folders.md) (`parent_id`, `name`, `inherit_permissions`, `created_by`, `created_datetime`) |  |
| 156 | `filesCopyFolderTree` | read [files_items](/code/tables/files_items.md) |  |

## Calls

[filesCopyItemRow()](/code/functions/filesCopyItemRow.md)

## Called from

- [api/files/transfer.php](/code/files/api/files/transfer.php.md) - in [filesTransferFolder()](/code/functions/filesTransferFolder.md), [filesCopyFolderTree()](/code/functions/filesCopyFolderTree.md)

