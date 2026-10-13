# MattermostProvider

> Class in [includes/messaging/MattermostProvider.php](/code/files/includes/messaging/MattermostProvider.php.md), line 36

## Methods

| Method | What it does |
|---|---|
| [verifyWebhook()](#verifywebhook) | Checks an inbound webhook: a CSAT button press must carry a valid signature, anything else the channel's webhook token. |
| [parseInbound()](#parseinbound) | Turns a Mattermost webhook into inbound messages - a CSAT rating press, or a post in the channel. |
| [sendMessage()](#sendmessage) | Posts a text reply in the conversation's thread and returns the post id. |
| [sendRatingRequest()](#sendratingrequest) | The rating question with five buttons, in the customer's thread. Each button calls this install's webhook with its context, signed with the webhook token, so a press cannot be forged. |
| [csatSignature()](#csatsignature) | HMAC over the response id and rating, keyed by the webhook token. |
| [buttonCallbackUrl()](#buttoncallbackurl) | This channel's webhook URL, the one Mattermost calls back for button presses. |
| [sendMedia()](#sendmedia) | Upload the file to the support channel, then post it in the customer's thread. |
| [testConnection()](#testconnection) | Checks the bot token by reading the bot user, and returns a "Connected as `@name`" message. |
| [splitAddress()](#splitaddress) | "<channelId>:<postId>" -> [channelId, postId]. |
| [postInThread()](#postinthread) | Post into the thread the address names, under that thread's root. |
| [rootOf()](#rootof) | The root of the thread a post is in. TRAP: Mattermost refuses a root_id that is itself a reply, and the outgoing webhook never says which a post is - so ask, rather than threading under whatever post came in last. |
| [webhookField()](#webhookfield) | A field from the webhook body: form-encoded (Mattermost's default) or JSON. |
| [serverUrl()](#serverurl) | The channel's Mattermost server address without a trailing slash; throws when it is missing or not http(s). |
| [apiUrl()](#apiurl) | A Mattermost API v4 address for `$path`. |
| [authHeader()](#authheader) | The bearer Authorization header for the bot token; throws when there is no token. |
| [api()](#api) | A JSON REST call. Throws with Mattermost's own message on failure. |
| [lookupUser()](#lookupuser) | Who a Mattermost user is: ['name' => …, 'email' => …], either may be ''. Used to file their tickets under the person FreeITSM already knows - see `messagingResolveRequesterByEmail()` in ingest.php. Never throws. |
| [botIdOrEmpty()](#botidorempty) | The bot's own user id, or '' if Mattermost cannot be asked right now (then nothing is dropped). |
| [setBotIdForTest()](#setbotidfortest) | Test hook: set the bot id without asking a server. |

### verifyWebhook

*public* - line 48

Checks an inbound webhook: a CSAT button press must carry a valid signature, anything else the channel's webhook token.

Refuses everything when the channel has no token yet.

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

*public* - line 66

Turns a Mattermost webhook into inbound messages - a CSAT rating press, or a post in the channel.

```php
function parseInbound(string $rawBody, array $params): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$rawBody` | `string` |  |  |
| `$params` | `array` |  |  |

### sendMessage

*public* - line 126

Posts a text reply in the conversation's thread and returns the post id.

```php
function sendMessage(string $to, string $body): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$to` | `string` |  |  |
| `$body` | `string` |  |  |

### sendRatingRequest

*public* - line 136

The rating question with five buttons, in the customer's thread. Each button calls this install's webhook with its context, signed with the webhook token, so a press cannot be forged.

```php
function sendRatingRequest(string $to, string $text, int $responseId): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$to` | `string` |  |  |
| `$text` | `string` |  |  |
| `$responseId` | `int` |  |  |

### csatSignature

*private* - line 156

HMAC over the response id and rating, keyed by the webhook token.

```php
function csatSignature(array $context): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$context` | `array` |  |  |

### buttonCallbackUrl

*private* - line 163

This channel's webhook URL, the one Mattermost calls back for button presses.

```php
function buttonCallbackUrl(): string
```

### sendMedia

*public* - line 170

Upload the file to the support channel, then post it in the customer's thread.

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

### testConnection

*public* - line 190

Checks the bot token by reading the bot user, and returns a "Connected as `@name`" message.

```php
function testConnection(): string
```

### splitAddress

*private* - line 203

"<channelId>:<postId>" -> [channelId, postId].

```php
function splitAddress(string $to): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$to` | `string` |  |  |

### postInThread

*private* - line 215

Post into the thread the address names, under that thread's root.

```php
function postInThread(string $to, array $fields): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$to` | `string` |  |  |
| `$fields` | `array` |  |  |

### rootOf

*private* - line 227

The root of the thread a post is in. TRAP: Mattermost refuses a root_id that is itself a reply, and the outgoing webhook never says which a post is - so ask, rather than threading under whatever post came in last.

```php
function rootOf(string $postId): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$postId` | `string` |  |  |

### webhookField

*private* - line 238

A field from the webhook body: form-encoded (Mattermost's default) or JSON.

```php
function webhookField(string $rawBody, array $params, string $key): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$rawBody` | `string` |  |  |
| `$params` | `array` |  |  |
| `$key` | `string` |  |  |

### serverUrl

*private* - line 251

The channel's Mattermost server address without a trailing slash; throws when it is missing or not http(s).

```php
function serverUrl(): string
```

### apiUrl

*private* - line 261

A Mattermost API v4 address for `$path`.

```php
function apiUrl(string $path): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$path` | `string` |  |  |

### authHeader

*private* - line 267

The bearer Authorization header for the bot token; throws when there is no token.

```php
function authHeader(): string
```

### api

*private* - line 277

A JSON REST call. Throws with Mattermost's own message on failure.

```php
function api(string $method, string $path, $body = null): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$method` | `string` |  |  |
| `$path` | `string` |  |  |
| `$body` |  | `null` |  |

### lookupUser

*public* - line 306

Who a Mattermost user is: ['name' => …, 'email' => …], either may be ''. Used to file their tickets under the person FreeITSM already knows - see `messagingResolveRequesterByEmail()` in ingest.php. Never throws.

TRAP: the email is returned ONLY when Mattermost says it is verified.
  A server can allow sign-up without proving the address, and an
  unverified email is just text anyone typed: someone registering as
  ceo@yourcompany.com would have their chats filed under the real CEO.
  An empty email (the server hides addresses from this bot) is normal -
  the person simply gets a named contact instead.

```php
function lookupUser(string $userId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$userId` | `string` |  |  |

### botIdOrEmpty

*private* - line 323

The bot's own user id, or '' if Mattermost cannot be asked right now (then nothing is dropped).

```php
function botIdOrEmpty(): string
```

### setBotIdForTest

*public static* - line 337

Test hook: set the bot id without asking a server.

```php
function setBotIdForTest(int $channelId, string $botId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$channelId` | `int` |  |  |
| `$botId` | `string` |  |  |

