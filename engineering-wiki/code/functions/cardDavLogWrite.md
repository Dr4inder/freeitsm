# cardDavLogWrite()

Record one write-back attempt.

🔴 THE ATTEMPT, NOT THE SUCCESS — and this is the whole point. An import
records every run and every person it touched. Write-back, the half that
changes SOMEBODY ELSE'S data, recorded nothing until this existed, so
"it isn't writing" had no evidence behind it at all. The three answers the
operator needs to tell apart are *we never tried*, *the server said no*, and
*we refused on purpose because their copy had changed* — and only the last
one is FreeITSM working as intended.

🔑 `$response` is stored VERBATIM (truncated, not summarised). A DAV server
puts the real reason in an XML error body, and paraphrasing it throws away the
one thing that can diagnose a server nobody here can log in to.

⚠️ NEVER THROWS. This is called on the failure path of a feature that is
itself already reported as failed; a logging error must not become the thing
the analyst sees instead.

```php
function cardDavLogWrite(
    PDO $conn,
    int $providerId,
    ?int $userId,
    string $displayName,
    string $outcome,
    array $fields,
    ?int $status,
    string $response,
    string $message,
    ?int $analystId
): void
```

Defined in [includes/carddav_write.php](/code/files/includes/carddav_write.php.md), line 569.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$providerId` | `int` |  |  |
| `$userId` | `?int` |  |  |
| `$displayName` | `string` |  |  |
| `$outcome` | `string` |  |  |
| `$fields` | `array` |  |  |
| `$status` | `?int` |  |  |
| `$response` | `string` |  |  |
| `$message` | `string` |  |  |
| `$analystId` | `?int` |  | The analyst doing this - normally the one signed in. *([standard](/handbook/standard-parameters.md))* |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 575 | `cardDavLogWrite` | **insert** [carddav_write_log](/code/tables/carddav_write_log.md) (`provider_id`, `user_id`, `display_name`, `outcome`, `fields`, `http_status`, `server_response`, `message`, `triggered_by_analyst_id`, `created_datetime`) |  |

## Called from

- [includes/carddav_create.php](/code/files/includes/carddav_create.php.md) - in [cardDavCreateContact()](/code/functions/cardDavCreateContact.md)
- [includes/carddav_write.php](/code/files/includes/carddav_write.php.md) - in [cardDavPushPersonChanges()](/code/functions/cardDavPushPersonChanges.md)

