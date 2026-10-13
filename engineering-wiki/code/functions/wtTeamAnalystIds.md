# wtTeamAnalystIds()

The analyst ids "team" covers: everyone on any team this analyst belongs to, including themselves.

⚠️ Returns just the analyst on an install with no teams, rather than an empty
list. An empty IN () is a syntax error, and "team" for somebody in no team
sensibly means themselves — not nobody.

```php
function wtTeamAnalystIds(PDO $conn, int $analystId): array
```

Defined in [includes/watchtower_settings.php](/code/files/includes/watchtower_settings.php.md), line 162.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$analystId` | `int` |  |  |

**Returns:** `array`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 167 | `wtTeamAnalystIds` | read [analyst_teams](/code/tables/analyst_teams.md) |  |

## Called from

- [includes/watchtower_settings.php](/code/files/includes/watchtower_settings.php.md) - in [wtMorningCheckScope()](/code/functions/wtMorningCheckScope.md), [wtScopeClause()](/code/functions/wtScopeClause.md)

