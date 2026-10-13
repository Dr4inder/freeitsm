# filesNeed()

Refuse unless the caller holds `$need` on the folder. Below View the folder does not exist for them, so the answer is "not found" - the same words a deleted or made-up id gets. A refusal at a level they CAN see is audited as 'denied'.

```php
function filesNeed(PDO $conn, int $analystId, int $folderId, int $need, string $what = ''): int
```

Defined in [includes/files/api_bootstrap.php](/code/files/includes/files/api_bootstrap.php.md), line 73.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$folderId` | `int` |  |  |
| `$need` | `int` |  |  |
| `$what` | `string` | `''` |  |

**Returns:** `int`

## Calls

[filesApiFail()](/code/functions/filesApiFail.md), [filesAudit()](/code/functions/filesAudit.md)

## Called from

- [api/files/folder.php](/code/files/api/files/folder.php.md)
- [api/files/permissions.php](/code/files/api/files/permissions.php.md)
- [api/files/properties.php](/code/files/api/files/properties.php.md)
- [api/files/shortcut.php](/code/files/api/files/shortcut.php.md)
- [api/files/transfer.php](/code/files/api/files/transfer.php.md)
- [api/files/upload.php](/code/files/api/files/upload.php.md)
- [includes/files/api_bootstrap.php](/code/files/includes/files/api_bootstrap.php.md) - in [filesNeedItem()](/code/functions/filesNeedItem.md)

