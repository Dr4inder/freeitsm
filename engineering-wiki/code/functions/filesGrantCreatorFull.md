# filesGrantCreatorFull()

```php
function filesGrantCreatorFull(PDO $conn, int $analystId, int $folderId): void
```

Defined in [api/files/transfer.php](/code/files/api/files/transfer.php.md), line 170.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$folderId` | `int` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 172 | `filesGrantCreatorFull` | **insert** [files_permissions](/code/tables/files_permissions.md) (`folder_id`, `principal_type`, `principal_id`, `level`, `granted_by`, `granted_datetime`) |  |

## Called from

- [api/files/transfer.php](/code/files/api/files/transfer.php.md) - in [filesTransferFolder()](/code/functions/filesTransferFolder.md)

