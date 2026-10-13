# TwilioProvider

> Class in [includes/messaging/TwilioProvider.php](/code/files/includes/messaging/TwilioProvider.php.md), line 21

## Methods

| Method | What it does |
|---|---|
| [verifyWebhook()](#verifywebhook) | Checks the X-Twilio-Signature header: an HMAC-SHA1 of the URL and the sorted POST fields, keyed with the auth token. |
| [parseInbound()](#parseinbound) | Turns a Twilio WhatsApp webhook into an inbound message with its media URLs; status callbacks give nothing. |
| [sendMessage()](#sendmessage) | Sends a WhatsApp text message through Twilio and returns the message SID. |
| [sendMedia()](#sendmedia) | Twilio's Messages API takes no upload at all — it fetches the media itself from a URL you give it (MediaUrl), fire-and-forget, sometime after this call returns. `$publicUrl` (messagingOutboundMediaUrl()) is therefore REQUIRED here, unlike Meta/Telegram which take the bytes directly; `$filePath` is unused. |
| [sendTemplate()](#sendtemplate) | Sends an approved WhatsApp template by its Content SID, with `$vars` as numbered content variables, and returns the message SID. |
| [downloadMedia()](#downloadmedia) | Downloads an inbound media item with account authentication, naming the file after its Media SID. |
| [testConnection()](#testconnection) | Checks the Account SID and Auth Token by reading the account, sending nothing; notes when no WhatsApp number is set. |
| [stripPrefix()](#stripprefix) | Drop Twilio's "whatsapp:" channel prefix, leaving the bare number. |
| [ensurePlus()](#ensureplus) | Puts a single leading + on a phone number. |

### verifyWebhook

*public* - line 27

Checks the X-Twilio-Signature header: an HMAC-SHA1 of the URL and the sorted POST fields, keyed with the auth token.

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

*public* - line 49

Turns a Twilio WhatsApp webhook into an inbound message with its media URLs; status callbacks give nothing.

```php
function parseInbound(string $rawBody, array $params): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$rawBody` | `string` |  |  |
| `$params` | `array` |  |  |

### sendMessage

*public* - line 82

Sends a WhatsApp text message through Twilio and returns the message SID.

```php
function sendMessage(string $to, string $body): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$to` | `string` |  |  |
| `$body` | `string` |  |  |

### sendMedia

*public* - line 120

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

*public* - line 162

Sends an approved WhatsApp template by its Content SID, with `$vars` as numbered content variables, and returns the message SID.

```php
function sendTemplate(string $to, array $template, array $vars): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$to` | `string` |  |  |
| `$template` | `array` |  |  |
| `$vars` | `array` |  |  |

### downloadMedia

*public* - line 207

Downloads an inbound media item with account authentication, naming the file after its Media SID.

```php
function downloadMedia(array $item): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$item` | `array` |  |  |

### testConnection

*public* - line 242

Checks the Account SID and Auth Token by reading the account, sending nothing; notes when no WhatsApp number is set.

```php
function testConnection(): string
```

### stripPrefix

*private* - line 276

Drop Twilio's "whatsapp:" channel prefix, leaving the bare number.

```php
function stripPrefix(string $addr): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$addr` | `string` |  |  |

### ensurePlus

*private* - line 286

Puts a single leading + on a phone number.

```php
function ensurePlus(string $number): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$number` | `string` |  |  |

