# filesCopyItemRow()

A new file row whose single version shares the source's current bytes.

```php
function filesCopyItemRow(PDO $conn, int $analystId, array $it, int $target, string $name): int
```

Defined in [api/files/transfer.php](/code/files/api/files/transfer.php.md), line 86.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$it` | `array` |  |  |
| `$target` | `int` |  |  |
| `$name` | `string` |  |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 88 | `filesCopyItemRow` | **insert** [files_items](/code/tables/files_items.md) (`folder_id`, `name`, `size_bytes`, `mime_type`, `created_by`, `created_datetime`) |  |
| 93 | `filesCopyItemRow` | **insert** [files_versions](/code/tables/files_versions.md) (`item_id`, `version_no`, `storage_path`, `size_bytes`, `mime_type`, `sha256`, `uploaded_by`, `uploaded_datetime`) |  |
| 96 | `filesCopyItemRow` | **update** [files_items](/code/tables/files_items.md) (`current_version_id`) |  |

## Called from

- [api/files/transfer.php](/code/files/api/files/transfer.php.md) - in [filesTransferItem()](/code/functions/filesTransferItem.md), [filesCopyFolderTree()](/code/functions/filesCopyFolderTree.md)

