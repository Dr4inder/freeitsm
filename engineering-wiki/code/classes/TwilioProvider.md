# TwilioProvider

> Class in [includes/messaging/TwilioProvider.php](/code/files/includes/messaging/TwilioProvider.php.md), line 21

## Methods

| Method | What it does |
|---|---|
| [verifyWebhook()](#verifywebhook) |  |
| [parseInbound()](#parseinbound) |  |
| [sendMessage()](#sendmessage) |  |
| [sendMedia()](#sendmedia) | Twilio's Messages API takes no upload at all — it fetches the media itself from a URL you give it (MediaUrl), fire-and-forget, sometime after this call returns. `$publicUrl` (messagingOutboundMediaUrl()) is therefore REQUIRED here, unlike Meta/Telegram which take the bytes directly; `$filePath` is unused. |
| [sendTemplate()](#sendtemplate) |  |
| [downloadMedia()](#downloadmedia) |  |
| [testConnection()](#testconnection) |  |
| [stripPrefix()](#stripprefix) | Drop Twilio's "whatsapp:" channel prefix, leaving the bare number. |
| [ensurePlus()](#ensureplus) |  |

### verifyWebhook

*public* - line 23

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

*public* - line 41

```php
function parseInbound(string $rawBody, array $params): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$rawBody` | `string` |  |  |
| `$params` | `array` |  |  |

### sendMessage

*public* - line 73

```php
function sendMessage(string $to, string $body): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$to` | `string` |  |  |
| `$body` | `string` |  |  |

### sendMedia

*public* - line 111

Twilio's Messages API takes no upload at all — it fetches the media itself from a URL you give it (MediaUrl), fire-and-forget, sometime after this call returns. `$publicUrl` (messagingOutboundMediaUrl()) is therefore REQUIRED here, unlike Meta/Telegram which take the bytes directly; `$filePath` is unused.

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

*public* - line 149

```php
function sendTemplate(string $to, array $template, array $vars): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$to` | `string` |  |  |
| `$template` | `array` |  |  |
| `$vars` | `array` |  |  |

### downloadMedia

*public* - line 193

```php
function downloadMedia(array $item): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$item` | `array` |  |  |

### testConnection

*public* - line 224

```php
function testConnection(): string
```

### stripPrefix

*private* - line 258

Drop Twilio's "whatsapp:" channel prefix, leaving the bare number.

```php
function stripPrefix(string $addr): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$addr` | `string` |  |  |

### ensurePlus

*private* - line 267

```php
function ensurePlus(string $number): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$number` | `string` |  |  |

