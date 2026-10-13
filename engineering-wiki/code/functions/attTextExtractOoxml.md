# attTextExtractOoxml()

Text out of a docx/xlsx/pptx. Returns null if the archive cannot be opened.

⚠️ Every guard here is because the file came from a stranger. The limits are
checked against the archive's DECLARED sizes before a single entry is read, so
a bomb is refused rather than survived.

```php
function attTextExtractOoxml(
    string $path,
    string $ext,
    int $maxUnzipped = ATT_TEXT_MAX_UNZIPPED_BYTES,
    int $maxEntries = ATT_TEXT_MAX_ZIP_ENTRIES
): ?string
```

Defined in [includes/search/extract.php](/code/files/includes/search/extract.php.md), line 175.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$path` | `string` |  |  |
| `$ext` | `string` |  |  |
| `$maxUnzipped` | `int` | `ATT_TEXT_MAX_UNZIPPED_BYTES` |  |
| `$maxEntries` | `int` | `ATT_TEXT_MAX_ZIP_ENTRIES` |  |

**Returns:** `?string`

## Calls

[attTextNormalise()](/code/functions/attTextNormalise.md)

## Called from

- [includes/search/extract.php](/code/files/includes/search/extract.php.md) - in [attTextExtractFile()](/code/functions/attTextExtractFile.md)

