# filesAudit()

```php
function filesAudit(
    PDO $conn,
    int $analystId,
    string $action,
    array $t = [],
    array $detail = []
): void
```

Defined in [includes/files/audit.php](/code/files/includes/files/audit.php.md), line 32.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$action` | `string` |  |  |
| `$t` | `array` | `[]` | ['folder_id'=>?, 'item_id'=>?, 'version_id'=>?, 'path'=>?] - path is worked out from folder_id (+ item name) when omitted. |
| `$detail` | `array` | `[]` |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 46 | `filesAudit` | read [analysts](/code/tables/analysts.md) |  |
| 51 | `filesAudit` | **insert** [files_audit](/code/tables/files_audit.md) (`analyst_id`, `analyst_name`, `action`, `folder_id`, `item_id`, `version_id`, `target_path`, `detail`, `ip_address`, `user_agent`, `created_datetime`) |  |

## Called from

- [api/files/download.php](/code/files/api/files/download.php.md)
- [api/files/folder.php](/code/files/api/files/folder.php.md)
- [api/files/item.php](/code/files/api/files/item.php.md)
- [api/files/list.php](/code/files/api/files/list.php.md)
- [api/files/permissions.php](/code/files/api/files/permissions.php.md)
- [api/files/properties.php](/code/files/api/files/properties.php.md)
- [api/files/search.php](/code/files/api/files/search.php.md)
- [api/files/settings.php](/code/files/api/files/settings.php.md)
- [api/files/shortcut.php](/code/files/api/files/shortcut.php.md)
- [api/files/transfer.php](/code/files/api/files/transfer.php.md) - in [filesTransferItem()](/code/functions/filesTransferItem.md), [filesTransferFolder()](/code/functions/filesTransferFolder.md)
- [api/files/upload.php](/code/files/api/files/upload.php.md)
- [api/files/view.php](/code/files/api/files/view.php.md)
- [includes/files/api_bootstrap.php](/code/files/includes/files/api_bootstrap.php.md) - in [filesNeed()](/code/functions/filesNeed.md)

