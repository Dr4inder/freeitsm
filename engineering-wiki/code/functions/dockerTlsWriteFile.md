# dockerTlsWriteFile()

Write a file by renaming a temp copy over it, so a reader never sees half of one.

```php
function dockerTlsWriteFile(string $path, string $contents, int $mode): void
```

Defined in [includes/docker_tls.php](/code/files/includes/docker_tls.php.md), line 276.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$path` | `string` |  |  |
| `$contents` | `string` |  |  |
| `$mode` | `int` |  |  |

**Returns:** `void`

## Called from

- [includes/docker_tls.php](/code/files/includes/docker_tls.php.md) - in [dockerTlsGenerate()](/code/functions/dockerTlsGenerate.md)

