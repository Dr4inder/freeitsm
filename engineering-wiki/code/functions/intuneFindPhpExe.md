# intuneFindPhpExe()

Locate a usable PHP CLI binary so the web request can spawn a worker. Tries: explicit setting → PHP_BINARY's directory → known WAMP layout → 'php' from PATH. Returns the path or throws if nothing works.

```php
function intuneFindPhpExe(?string $override): string
```

Defined in [includes/intune.php](/code/files/includes/intune.php.md), line 526.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$override` | `?string` |  |  |

**Returns:** `string`

## Called from

- [includes/intune.php](/code/files/includes/intune.php.md) - in [intuneSpawnGenericWorker()](/code/functions/intuneSpawnGenericWorker.md)

