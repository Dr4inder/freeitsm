# includes/mfa_throttle.php

> PHP - 207 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [mfaThrottleTable()](/code/functions/mfaThrottleTable.md) | 63 | Guard the table name. Returns the safe literal or null. Interpolating a caller-supplied table into SQL is how a helper like this turns into an injection point, so the name never travels — only the choice does. |
| [mfaThrottleSetting()](/code/functions/mfaThrottleSetting.md) | 69 | One system_settings read, with its own guard. Mirrors `getSecuritySetting()` in auth/login.php. |
| [mfaThrottleThreshold()](/code/functions/mfaThrottleThreshold.md) | 89 | How many wrong codes before the code step locks? |
| [mfaThrottleLockoutMinutes()](/code/functions/mfaThrottleLockoutMinutes.md) | 96 | How long the code step stays locked, in minutes. |
| [mfaThrottleMinutesRemaining()](/code/functions/mfaThrottleMinutesRemaining.md) | 106 | Is this account's code step locked right now? Returns whole minutes remaining, or 0 when it is free to try. Degrades to 0 when the columns are absent. |
| [mfaThrottleRecordFailure()](/code/functions/mfaThrottleRecordFailure.md) | 135 | Record one wrong code. Returns: ['locked' => bool, 'minutes' => int, 'attempts' => int, 'threshold' => int, 'tracked' => bool] |
| [mfaThrottleReset()](/code/functions/mfaThrottleReset.md) | 179 | A correct code was entered: clear the count and any lock. |
| [mfaThrottleWarnOnce()](/code/functions/mfaThrottleWarnOnce.md) | 197 | Log the missing-column case once per request rather than on every keystroke, so a un-migrated install leaves one readable line instead of a flooded log. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 72 | `mfaThrottleSetting` | read [system_settings](/code/tables/system_settings.md) |  |

## How it hangs together

**Included by:** [api/myaccount/verify_login_otp.php](/code/files/api/myaccount/verify_login_otp.php.md), [api/self-service/verify_login_otp.php](/code/files/api/self-service/verify_login_otp.php.md)

