# TeamsProvider

> Class in [includes/messaging/TeamsProvider.php](/code/files/includes/messaging/TeamsProvider.php.md), line 59

## Methods

| Method | What it does |
|---|---|
| [verifyWebhook()](#verifywebhook) | Checks an inbound Bot Framework activity: the bearer JWT's signature, issuer and audience (the app id), and that its service URL is an allowed Microsoft host matching the token. |
| [hostAllowed()](#hostallowed) | An https URL whose host is one of `$hosts` (exact, or a suffix starting with a dot). |
| [splitAddress()](#splitaddress) | "<serviceUrl>\|<conversationId>" -> [serviceUrl, conversationId]. A bare id uses the default region. |
| [parseInbound()](#parseinbound) | Turns a Teams activity into inbound messages - a CSAT rating press or a message in a one-to-one chat. |
| [sendRatingRequest()](#sendratingrequest) | The rating question as an Adaptive Card with five buttons, 1 to 5. A press comes back as a message whose value carries csat.r (response id) and csat.v (rating). |
| [sendMessage()](#sendmessage) | Sends a text reply into the Teams conversation and returns the activity id. |
| [sendMedia()](#sendmedia) | Teams shows an image sent as an attachment with contentUrl. That URL must be a public https address — `messagingOutboundMediaUrl()` provides one, which is why images are the only kind this sends. Other files are refused with a plain message, not sent as a broken attachment. |
| [downloadMedia()](#downloadmedia) | Inbound images: fetch with the bot's token — Teams does not serve them anonymously. |
| [testConnection()](#testconnection) | Checks the bot credentials by getting an access token, and returns the app id. |
| [appId()](#appid) | The channel's Microsoft app (bot) id. |
| [accessToken()](#accesstoken) | Azure AD client-credentials token for the Bot Framework scope. |
| [lookupUser()](#lookupuser) | Who a Teams user is: ['name' => …, 'email' => …], either may be ''. Bot Framework's "get conversation member" - the bot's own token, no Microsoft Graph permission. Used to file their tickets under the person FreeITSM already knows (messagingResolveRequesterByEmail()). Never throws. |
| [postActivity()](#postactivity) | Posts an activity to a conversation through its Bot Framework service URL and returns the new activity id. |
| [botFrameworkKeys()](#botframeworkkeys) | Bot Framework's published signing keys, cached for a day. The key set is public and rotates rarely, so a cache file holds nothing secret. |

### verifyWebhook

*public* - line 87

Checks an inbound Bot Framework activity: the bearer JWT's signature, issuer and audience (the app id), and that its service URL is an allowed Microsoft host matching the token.

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

*private static* - line 125

An https URL whose host is one of `$hosts` (exact, or a suffix starting with a dot).

```php
function hostAllowed(string $url, array $hosts): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$url` | `string` |  |  |
| `$hosts` | `array` |  |  |

### splitAddress

*private static* - line 141

"<serviceUrl>|<conversationId>" -> [serviceUrl, conversationId]. A bare id uses the default region.

```php
function splitAddress(string $to): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$to` | `string` |  |  |

### parseInbound

*public* - line 157

Turns a Teams activity into inbound messages - a CSAT rating press or a message in a one-to-one chat.

Group chats and channels are ignored, since one conversation there is shared by many
people.

```php
function parseInbound(string $rawBody, array $params): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$rawBody` | `string` |  |  |
| `$params` | `array` |  |  |

### sendRatingRequest

*public* - line 229

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

*public* - line 255

Sends a text reply into the Teams conversation and returns the activity id.

```php
function sendMessage(string $to, string $body): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$to` | `string` |  |  |
| `$body` | `string` |  |  |

### sendMedia

*public* - line 269

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

*public* - line 289

Inbound images: fetch with the bot's token — Teams does not serve them anonymously.

```php
function downloadMedia(array $item): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$item` | `array` |  |  |

### testConnection

*public* - line 313

Checks the bot credentials by getting an access token, and returns the app id.

```php
function testConnection(): string
```

### appId

*private* - line 322

The channel's Microsoft app (bot) id.

```php
function appId(): string
```

### accessToken

*private* - line 329

Azure AD client-credentials token for the Bot Framework scope.

```php
function accessToken(): string
```

### lookupUser

*public* - line 370

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

*private* - line 405

Posts an activity to a conversation through its Bot Framework service URL and returns the new activity id.

Throws when the address is incomplete, the host is not allowed, or Teams rejects the
message.

```php
function postActivity(string $to, array $activity): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$to` | `string` |  |  |
| `$activity` | `array` |  |  |

### botFrameworkKeys

*private* - line 428

Bot Framework's published signing keys, cached for a day. The key set is public and rotates rarely, so a cache file holds nothing secret.

```php
function botFrameworkKeys(): array
```

