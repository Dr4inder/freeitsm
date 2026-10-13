# filesTransferFolder()

```php
function filesTransferFolder(PDO $conn, int $analystId, string $mode, int $id, int $target): void
```

Defined in [api/files/transfer.php](/code/files/api/files/transfer.php.md), line 101.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$mode` | `string` |  |  |
| `$id` | `int` |  |  |
| `$target` | `int` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 122 | `filesTransferFolder` | **update** [files_folders](/code/tables/files_folders.md) (`parent_id`, `name`, `updated_by`, `updated_datetime`) |  |

## Calls

[filesAudit()](/code/functions/filesAudit.md), [filesCopyFolderTree()](/code/functions/filesCopyFolderTree.md), [filesFreeName()](/code/functions/filesFreeName.md), [filesGrantCreatorFull()](/code/functions/filesGrantCreatorFull.md)

## Called from

- [api/files/transfer.php](/code/files/api/files/transfer.php.md)

