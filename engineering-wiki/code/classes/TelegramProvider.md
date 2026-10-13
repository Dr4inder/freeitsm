# TelegramProvider

> Class in [includes/messaging/TelegramProvider.php](/code/files/includes/messaging/TelegramProvider.php.md), line 29

## Methods

| Method | What it does |
|---|---|
| [verifyWebhook()](#verifywebhook) | Checks the secret token Telegram sends in the X-Telegram-Bot-Api-Secret-Token header; no secret configured means refuse. |
| [parseInbound()](#parseinbound) | Turns a Telegram update into inbound messages - a CSAT rating press, or a new or edited message. |
| [extractMedia()](#extractmedia) | Pull the largest/only file out of whichever media field is present. |
| [sendMessage()](#sendmessage) | Sends a text message to a chat and returns Telegram's message id. |
| [parseRatingPress()](#parseratingpress) | A rating press (PR #166): one normalised entry carrying 'csat' for ingest.php. |
| [sendRatingRequest()](#sendratingrequest) | Show the 1–5 buttons under the rating question. |
| [closeRatingRequest()](#closeratingrequest) | Swap the rating buttons for the answer: the question stays, a line saying what they chose goes under it, and the keyboard goes (editMessageText without reply_markup removes it). The toast from `answerCallbackQuery()` fades in seconds; this is the record the customer keeps, and it leaves no buttons that would silently do nothing if tapped again. |
| [answerCallbackQuery()](#answercallbackquery) | Stop the button's loading spinner and show a short toast. Best-effort: a failure here must never undo a rating that has already been saved. |
| [requestContact()](#requestcontact) | Ask the chat to share their phone number, via Telegram's native "Share phone number" button (a reply keyboard with request_contact, not an inline button — that's what makes Telegram hand back a verified contact object rather than free-typed, unverifiable text). |
| [sendTemplate()](#sendtemplate) | Telegram has no provider-hosted, pre-approved template system (there is no 24h window to work around), so a "template" here is just this app's own stored body with {{n}} placeholders rendered and sent as a normal message. |
| [downloadMedia()](#downloadmedia) | Downloads an inbound file: resolves its file id to a path, then fetches the bytes. |
| [sendMedia()](#sendmedia) | Send a local file to a chat. Photos go through sendPhoto (Telegram renders them inline, recompressing — exactly what an analyst expects "attach a picture" to look like in the chat); everything else goes through sendDocument (sent byte-for-byte, no recompression, no dimension limits beyond the flat 50MB bot API cap). |
| [setWebhook()](#setwebhook) | Tell Telegram where to deliver this bot's messages, and the secret it must send back with each one (verifyWebhook() checks it). |
| [testConnection()](#testconnection) | Checks the bot token with getMe and returns the bot's name. |

### verifyWebhook

*public* - line 41

Checks the secret token Telegram sends in the X-Telegram-Bot-Api-Secret-Token header; no secret configured means refuse.

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

*public* - line 55

Turns a Telegram update into inbound messages - a CSAT rating press, or a new or edited message.

```php
function parseInbound(string $rawBody, array $params): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$rawBody` | `string` |  |  |
| `$params` | `array` |  |  |

### extractMedia

*private* - line 138

Pull the largest/only file out of whichever media field is present.

```php
function extractMedia(array $message): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$message` | `array` |  |  |

### sendMessage

*public* - line 165

Sends a text message to a chat and returns Telegram's message id.

```php
function sendMessage(string $to, string $body): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$to` | `string` |  |  |
| `$body` | `string` |  |  |

### parseRatingPress

*private* - line 195

A rating press (PR #166): one normalised entry carrying 'csat' for ingest.php.

```php
function parseRatingPress(array $cb): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$cb` | `array` |  |  |

### sendRatingRequest

*public* - line 228

Show the 1–5 buttons under the rating question.

```php
function sendRatingRequest(string $to, string $text, int $responseId): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$to` | `string` |  |  |
| `$text` | `string` |  |  |
| `$responseId` | `int` |  |  |

### closeRatingRequest

*public* - line 264

Swap the rating buttons for the answer: the question stays, a line saying what they chose goes under it, and the keyboard goes (editMessageText without reply_markup removes it). The toast from `answerCallbackQuery()` fades in seconds; this is the record the customer keeps, and it leaves no buttons that would silently do nothing if tapped again.

Best-effort, like the toast: the rating is already saved.

```php
function closeRatingRequest(
    string $chatId,
    string $messageId,
    string $question,
    string $answerLine
): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$chatId` | `string` |  |  |
| `$messageId` | `string` |  |  |
| `$question` | `string` |  |  |
| `$answerLine` | `string` |  |  |

### answerCallbackQuery

*public* - line 286

Stop the button's loading spinner and show a short toast. Best-effort: a failure here must never undo a rating that has already been saved.

```php
function answerCallbackQuery(string $callbackQueryId, string $text): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$callbackQueryId` | `string` |  |  |
| `$text` | `string` |  |  |

### requestContact

*public* - line 312

Ask the chat to share their phone number, via Telegram's native "Share phone number" button (a reply keyboard with request_contact, not an inline button — that's what makes Telegram hand back a verified contact object rather than free-typed, unverifiable text).

One-time keyboard: it disappears from their client after one tap, so it
doesn't linger once the identity gate (ingest.php) has what it needs.

```php
function requestContact(
    string $chatId,
    string $promptText,
    string $buttonText = 'Share phone number'
): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$chatId` | `string` |  |  |
| `$promptText` | `string` |  |  |
| `$buttonText` | `string` | `'Share phone number'` |  |

### sendTemplate

*public* - line 350

Telegram has no provider-hosted, pre-approved template system (there is no 24h window to work around), so a "template" here is just this app's own stored body with {{n}} placeholders rendered and sent as a normal message.

```php
function sendTemplate(string $to, array $template, array $vars): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$to` | `string` |  |  |
| `$template` | `array` |  |  |
| `$vars` | `array` |  |  |

### downloadMedia

*public* - line 360

Downloads an inbound file: resolves its file id to a path, then fetches the bytes.

```php
function downloadMedia(array $item): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$item` | `array` |  |  |

### sendMedia

*public* - line 404

Send a local file to a chat. Photos go through sendPhoto (Telegram renders them inline, recompressing — exactly what an analyst expects "attach a picture" to look like in the chat); everything else goes through sendDocument (sent byte-for-byte, no recompression, no dimension limits beyond the flat 50MB bot API cap).

Uploaded as multipart/form-data through the shared `httpMultipart()`.

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

### setWebhook

*public* - line 451

Tell Telegram where to deliver this bot's messages, and the secret it must send back with each one (verifyWebhook() checks it).

Added at merge time to replace a copy-paste `curl …/setWebhook` command in
the settings dialog. That command put the bot token in the admin's browser
and shell history, and asked an IT manager to run a terminal command. Here
the token never leaves the server.

drop_pending_updates is deliberately NOT set: messages sent while the bot
was unregistered should still arrive once it is.

```php
function setWebhook(string $url, string $secret): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$url` | `string` |  |  |
| `$secret` | `string` |  |  |

**Returns:** string Telegram's own description, e.g. "Webhook was set"

### testConnection

*public* - line 492

Checks the bot token with getMe and returns the bot's name.

Also reads the webhook info and warns when the webhook is not connected or does not
receive every update type it needs.

```php
function testConnection(): string
```

