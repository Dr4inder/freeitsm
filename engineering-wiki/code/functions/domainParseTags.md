# domainParseTags()

"v=DMARC1; p=reject; rua=mailto:x" → ['v'=>'DMARC1','p'=>'reject','rua'=>'mailto:x']

```php
function domainParseTags(string $record): array
```

Defined in [includes/domains/checks.php](/code/files/includes/domains/checks.php.md), line 293.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$record` | `string` |  |  |

**Returns:** `array`

## Called from

- [includes/domains/checks.php](/code/files/includes/domains/checks.php.md) - in [domainRunChecks()](/code/functions/domainRunChecks.md)

