# MetaCloudProvider

> Class in [includes/messaging/MetaCloudProvider.php](/code/files/includes/messaging/MetaCloudProvider.php.md), line 21

## Methods

| Method | What it does |
|---|---|
| [verifyChallenge()](#verifychallenge) | Answers Meta's webhook subscription check: returns the challenge when the verify token matches, else null. |
| [verifyWebhook()](#verifywebhook) | Checks the X-Hub-Signature-256 HMAC of the raw body against the app secret. |
| [parseInbound()](#parseinbound) | Turns a WhatsApp Cloud API webhook into inbound messages - text, or media to download later with the caption as the body. |
| [sendMessage()](#sendmessage) | Sends a WhatsApp text message through the Graph API and returns Meta's message id. |
| [sendMedia()](#sendmedia) | Two Graph API calls: upload the bytes to get a media id, then send a message referencing it. `$filePath` is used directly (multipart upload); `$publicUrl` is Twilio's requirement, not Meta's, and is ignored here. |
| [sendTemplate()](#sendtemplate) | Sends an approved WhatsApp template, with `$vars` as the body parameters, and returns Meta's message id. |
| [downloadMedia()](#downloadmedia) | Downloads an inbound media item: resolves its id to a URL, then fetches the bytes with the access token. |
| [testConnection()](#testconnection) | Checks the phone number id and access token by reading the number from the Graph API, sending nothing. |
| [ensurePlus()](#ensureplus) | Puts a single leading + on a phone number; blank stays blank. |

### verifyChallenge

*public* - line 32

Answers Meta's webhook subscription check: returns the challenge when the verify token matches, else null.

```php
function verifyChallenge(array $get): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$get` | `array` |  |  |

### verifyWebhook

*public* - line 45

Checks the X-Hub-Signature-256 HMAC of the raw body against the app secret.

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

*public* - line 60

Turns a WhatsApp Cloud API webhook into inbound messages - text, or media to download later with the caption as the body.

```php
function parseInbound(string $rawBody, array $params): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$rawBody` | `string` |  |  |
| `$params` | `array` |  |  |

### sendMessage

*public* - line 109

Sends a WhatsApp text message through the Graph API and returns Meta's message id.

```php
function sendMessage(string $to, string $body): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$to` | `string` |  |  |
| `$body` | `string` |  |  |

### sendMedia

*public* - line 145

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

*public* - line 214

Sends an approved WhatsApp template, with `$vars` as the body parameters, and returns Meta's message id.

Needed to message someone outside the 24-hour service window.

```php
function sendTemplate(string $to, array $template, array $vars): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$to` | `string` |  |  |
| `$template` | `array` |  |  |
| `$vars` | `array` |  |  |

### downloadMedia

*public* - line 265

Downloads an inbound media item: resolves its id to a URL, then fetches the bytes with the access token.

```php
function downloadMedia(array $item): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$item` | `array` |  |  |

### testConnection

*public* - line 306

Checks the phone number id and access token by reading the number from the Graph API, sending nothing.

```php
function testConnection(): string
```

### ensurePlus

*private* - line 333

Puts a single leading + on a phone number; blank stays blank.

```php
function ensurePlus(string $number): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$number` | `string` |  |  |

