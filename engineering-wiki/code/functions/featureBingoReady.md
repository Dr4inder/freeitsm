# featureBingoReady()

Has Database Verification created the "Not for us" table yet?

```php
function featureBingoReady(PDO $conn): bool
```

Defined in [includes/feature_bingo.php](/code/files/includes/feature_bingo.php.md), line 250.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Returns:** `bool`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 252 | `featureBingoReady` | read [feature_bingo_dismissed](/code/tables/feature_bingo_dismissed.md) |  |

## Called from

- [api/system/feature_bingo.php](/code/files/api/system/feature_bingo.php.md)

