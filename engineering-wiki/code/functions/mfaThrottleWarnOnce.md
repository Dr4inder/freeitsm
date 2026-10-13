# mfaThrottleWarnOnce()

Log the missing-column case once per request rather than on every keystroke, so a un-migrated install leaves one readable line instead of a flooded log.

```php
function mfaThrottleWarnOnce(Exception $e): void
```

Defined in [includes/mfa_throttle.php](/code/files/includes/mfa_throttle.php.md), line 197.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$e` | `Exception` |  |  |

**Returns:** `void`

## Called from

- [includes/mfa_throttle.php](/code/files/includes/mfa_throttle.php.md) - in [mfaThrottleMinutesRemaining()](/code/functions/mfaThrottleMinutesRemaining.md), [mfaThrottleRecordFailure()](/code/functions/mfaThrottleRecordFailure.md), [mfaThrottleReset()](/code/functions/mfaThrottleReset.md)

