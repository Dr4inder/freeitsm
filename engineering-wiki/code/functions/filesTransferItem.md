# filesTransferItem()

RuntimeException = a refusal to report for this one entry.

```php
function filesTransferItem(PDO $conn, int $analystId, string $mode, int $id, int $target): void
```

Defined in [api/files/transfer.php](/code/files/api/files/transfer.php.md), line 57.

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
| 73 | `filesTransferItem` | **update** [files_items](/code/tables/files_items.md) (`folder_id`, `name`, `updated_by`, `updated_datetime`) |  |

## Calls

[filesAudit()](/code/functions/filesAudit.md), [filesCopyItemRow()](/code/functions/filesCopyItemRow.md), [filesFreeName()](/code/functions/filesFreeName.md), [filesItem()](/code/functions/filesItem.md)

## Called from

- [api/files/transfer.php](/code/files/api/files/transfer.php.md)

