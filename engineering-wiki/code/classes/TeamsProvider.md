# TeamsProvider

> Class in [includes/messaging/TeamsProvider.php](/code/files/includes/messaging/TeamsProvider.php.md), line 59

## Methods

| Method | What it does |
|---|---|
| [verifyWebhook()](#verifywebhook) |  |
| [hostAllowed()](#hostallowed) | An https URL whose host is one of `$hosts` (exact, or a suffix starting with a dot). |
| [splitAddress()](#splitaddress) | "<serviceUrl>\|<conversationId>" -> [serviceUrl, conversationId]. A bare id uses the default region. |
| [parseInbound()](#parseinbound) |  |
| [sendRatingRequest()](#sendratingrequest) | The rating question as an Adaptive Card with five buttons, 1 to 5. A press comes back as a message whose value carries csat.r (response id) and csat.v (rating). |
| [sendMessage()](#sendmessage) |  |
| [sendMedia()](#sendmedia) | Teams shows an image sent as an attachment with contentUrl. That URL must be a public https address — `messagingOutboundMediaUrl()` provides one, which is why images are the only kind this sends. Other files are refused with a plain message, not sent as a broken attachment. |
| [downloadMedia()](#downloadmedia) | Inbound images: fetch with the bot's token — Teams does not serve them anonymously. |
| [testConnection()](#testconnection) |  |
| [appId()](#appid) |  |
| [accessToken()](#accesstoken) | Azure AD client-credentials token for the Bot Framework scope. |
| [lookupUser()](#lookupuser) | Who a Teams user is: ['name' => …, 'email' => …], either may be ''. Bot Framework's "get conversation member" - the bot's own token, no Microsoft Graph permission. Used to file their tickets under the person FreeITSM already knows (messagingResolveRequesterByEmail()). Never throws. |
| [postActivity()](#postactivity) |  |
| [botFrameworkKeys()](#botframeworkkeys) | Bot Framework's published signing keys, cached for a day. The key set is public and rotates rarely, so a cache file holds nothing secret. |

### verifyWebhook

*public* - line 82

```php
function verifyWebhook(string $rawBody, array $headers, array $params, string $url): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$rawBody` | `string` |  |  |
| `$headers` | `array` |  |  |
| `$params` | `array` |  |  |
| `$url` | `string` |  |  |

### hostAllowed

*private static* - line 120

An https URL whose host is one of `$hosts` (exact, or a suffix starting with a dot).

```php
function hostAllowed(string $url, array $hosts): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$url` | `string` |  |  |
| `$hosts` | `array` |  |  |

### splitAddress

*private static* - line 136

"<serviceUrl>|<conversationId>" -> [serviceUrl, conversationId]. A bare id uses the default region.

```php
function splitAddress(string $to): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$to` | `string` |  |  |

### parseInbound

*public* - line 145

```php
function parseInbound(string $rawBody, array $params): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$rawBody` | `string` |  |  |
| `$params` | `array` |  |  |

### sendRatingRequest

*public* - line 217

The rating question as an Adaptive Card with five buttons, 1 to 5. A press comes back as a message whose value carries csat.r (response id) and csat.v (rating).

```php
function sendRatingRequest(string $to, string $text, int $responseId): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$to` | `string` |  |  |
| `$text` | `string` |  |  |
| `$responseId` | `int` |  |  |

### sendMessage

*public* - line 242

```php
function sendMessage(string $to, string $body): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$to` | `string` |  |  |
| `$body` | `string` |  |  |

### sendMedia

*public* - line 256

Teams shows an image sent as an attachment with contentUrl. That URL must be a public https address — `messagingOutboundMediaUrl()` provides one, which is why images are the only kind this sends. Other files are refused with a plain message, not sent as a broken attachment.

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

### downloadMedia

*public* - line 276

Inbound images: fetch with the bot's token — Teams does not serve them anonymously.

```php
function downloadMedia(array $item): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$item` | `array` |  |  |

### testConnection

*public* - line 299

```php
function testConnection(): string
```

### appId

*private* - line 307

```php
function appId(): string
```

### accessToken

*private* - line 314

Azure AD client-credentials token for the Bot Framework scope.

```php
function accessToken(): string
```

### lookupUser

*public* - line 355

Who a Teams user is: ['name' => …, 'email' => …], either may be ''. Bot Framework's "get conversation member" - the bot's own token, no Microsoft Graph permission. Used to file their tickets under the person FreeITSM already knows (messagingResolveRequesterByEmail()). Never throws.

The email comes from the organisation's own Microsoft 365 directory, and
`verifyWebhook()` only lets in people from the channel's own tenant, so it
is an address the organisation issued. `email` first; the sign-in name
(userPrincipalName) only when it is shaped like an address, which in most
tenants it is the same thing.

```php
function lookupUser(string $to, string $memberId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$to` | `string` |  |  |
| `$memberId` | `string` |  |  |

### postActivity

*private* - line 383

```php
function postActivity(string $to, array $activity): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$to` | `string` |  |  |
| `$activity` | `array` |  |  |

### botFrameworkKeys

*private* - line 406

Bot Framework's published signing keys, cached for a day. The key set is public and rotates rarely, so a cache file holds nothing secret.

```php
function botFrameworkKeys(): array
```

