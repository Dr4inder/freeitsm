# slackManifestJson()

The manifest as the JSON string a person pastes into Slack. Pretty-printed because a human reads it before pasting, and unescaped slashes because an escaped URL (https:\/\/…) looks broken and invites "fixing".

```php
function slackManifestJson(string $webhookUrl, string $appName = 'FreeITSM'): string
```

Defined in [includes/messaging/slack_manifest.php](/code/files/includes/messaging/slack_manifest.php.md), line 104.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$webhookUrl` | `string` |  |  |
| `$appName` | `string` | `'FreeITSM'` |  |

**Returns:** `string`

## Calls

[slackBuildManifest()](/code/functions/slackBuildManifest.md)

## Called from

- [api/messaging/slack_manifest.php](/code/files/api/messaging/slack_manifest.php.md)

