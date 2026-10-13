# defaultSignatureForAnalyst()

The one that gets inserted without being asked for, or null.

⚠️ Falls back to the FIRST signature when none is flagged. Otherwise an analyst who
deletes the signature that happened to be the default silently gets none inserted
from then on, and would have to work out why on their own.

```php
function defaultSignatureForAnalyst(PDO $conn, int $analystId): ?array
```

Defined in [includes/signatures.php](/code/files/includes/signatures.php.md), line 113.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `?array`

## Calls

[signaturesForAnalyst()](/code/functions/signaturesForAnalyst.md)

*Nothing calls this function by name.*

