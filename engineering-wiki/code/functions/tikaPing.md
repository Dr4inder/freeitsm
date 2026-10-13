# tikaPing()

Is the service answering? Used by the settings screen's Test button, and NOWHERE in the indexing path — a health check before every attachment would be an extra HTTP round trip per file. There, the extraction attempt IS the check.

```php
function tikaPing(PDO $conn, string $overrideUrl = ''): array
```

Defined in [includes/search/tika.php](/code/files/includes/search/tika.php.md), line 184.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$overrideUrl` | `string` | `''` |  |

**Returns:** array{ok:bool,detail:string}

## Calls

[sslApplyCurl()](/code/functions/sslApplyCurl.md), [tikaUrl()](/code/functions/tikaUrl.md)

## Called from

- [api/system/tika_settings.php](/code/files/api/system/tika_settings.php.md)

