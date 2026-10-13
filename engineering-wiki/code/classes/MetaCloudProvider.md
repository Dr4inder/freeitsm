# MetaCloudProvider

> Class in [includes/messaging/MetaCloudProvider.php](/code/files/includes/messaging/MetaCloudProvider.php.md), line 21

## Methods

| Method | What it does |
|---|---|
| [verifyChallenge()](#verifychallenge) |  |
| [verifyWebhook()](#verifywebhook) |  |
| [parseInbound()](#parseinbound) |  |
| [sendMessage()](#sendmessage) |  |
| [sendMedia()](#sendmedia) | Two Graph API calls: upload the bytes to get a media id, then send a message referencing it. `$filePath` is used directly (multipart upload); `$publicUrl` is Twilio's requirement, not Meta's, and is ignored here. |
| [sendTemplate()](#sendtemplate) |  |
| [downloadMedia()](#downloadmedia) |  |
| [testConnection()](#testconnection) |  |
| [ensurePlus()](#ensureplus) |  |

### verifyChallenge

*public* - line 28

```php
function verifyChallenge(array $get): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$get` | `array` |  |  |

### verifyWebhook

*public* - line 40

```php
function verifyWebhook(string $rawBody, array $headers, array $params, string $url): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$rawBody` | `string` |  |  |
| `$headers` | `array` |  |  |
| `$params` | `array` |  |  |
| `$url` | `string` |  |  |

### parseInbound

*public* - line 51

```php
function parseInbound(string $rawBody, array $params): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$rawBody` | `string` |  |  |
| `$params` | `array` |  |  |

### sendMessage

*public* - line 99

```php
function sendMessage(string $to, string $body): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$to` | `string` |  |  |
| `$body` | `string` |  |  |

### sendMedia

*public* - line 135

Two Graph API calls: upload the bytes to get a media id, then send a message referencing it. `$filePath` is used directly (multipart upload); `$publicUrl` is Twilio's requirement, not Meta's, and is ignored here.

```php
function sendMedia(
    string $to,
    string $filePath,
    string $mimeType,
    string $caption = '',
    string $publicUrl = '',
    string $filename = ''
): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$to` | `string` |  |  |
| `$filePath` | `string` |  |  |
| `$mimeType` | `string` |  |  |
| `$caption` | `string` | `''` |  |
| `$publicUrl` | `string` | `''` |  |
| `$filename` | `string` | `''` |  |

### sendTemplate

*public* - line 198

```php
function sendTemplate(string $to, array $template, array $vars): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$to` | `string` |  |  |
| `$template` | `array` |  |  |
| `$vars` | `array` |  |  |

### downloadMedia

*public* - line 245

```php
function downloadMedia(array $item): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$item` | `array` |  |  |

### testConnection

*public* - line 282

```php
function testConnection(): string
```

### ensurePlus

*private* - line 308

```php
function ensurePlus(string $number): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$number` | `string` |  |  |

