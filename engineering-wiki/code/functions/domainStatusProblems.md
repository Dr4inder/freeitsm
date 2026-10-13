# domainStatusProblems()

What is wrong with this domain right now, as far as Service Status is concerned. Each: kind ('expired' | 'cert'), fingerprint (the date), date.

```php
function domainStatusProblems(PDO $conn, array $row): array
```

Defined in [includes/domains/status_link.php](/code/files/includes/domains/status_link.php.md), line 62.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$row` | `array` |  |  |

**Returns:** `array`

## Calls

[domainSettings()](/code/functions/domainSettings.md)

## Called from

- [includes/domains/status_link.php](/code/files/includes/domains/status_link.php.md) - in [domainStatusState()](/code/functions/domainStatusState.md), [domainStatusRaise()](/code/functions/domainStatusRaise.md), [domainStatusRun()](/code/functions/domainStatusRun.md)

