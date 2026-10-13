# wtScopeClause()

A SQL fragment restricting `$column` to the chosen scope, plus its parameters. Returns ['', []] for "everyone", so a caller can concatenate unconditionally.

⚠️ The column is INTERPOLATED, so it must never come from a request. Every
caller passes a literal — `t.assigned_analyst_id`, `c.assigned_to_id` — and
that is the only safe way to use this.

```php
function wtScopeClause(PDO $conn, int $analystId, string $scope, string $column): array
```

Defined in [includes/watchtower_settings.php](/code/files/includes/watchtower_settings.php.md), line 232.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |
| `$scope` | `string` |  |  |
| `$column` | `string` |  |  |

**Returns:** `array`

## Calls

[wtTeamAnalystIds()](/code/functions/wtTeamAnalystIds.md)

## Called from

- [includes/watchtower_queries.php](/code/files/includes/watchtower_queries.php.md) - in [getWatchtowerData()](/code/functions/getWatchtowerData.md)

