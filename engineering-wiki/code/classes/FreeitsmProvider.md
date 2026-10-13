# FreeitsmProvider

> Class in [includes/messaging/FreeitsmProvider.php](/code/files/includes/messaging/FreeitsmProvider.php.md), line 20

## Methods

| Method | What it does |
|---|---|
| [verifyWebhook()](#verifywebhook) | Webchat has its own public endpoints, so the shared webhook never routes here. |
| [parseInbound()](#parseinbound) | Not used — inbound is handled by api/webchat/send.php, not parseInbound. |
| [sendMessage()](#sendmessage) | "Send" an outbound reply. There is nothing to transmit — the message row is stored by the caller and delivered when the visitor next polls — so we only mint a stable id. Prefixed 'wc_out_' so it's recognisable in the emails table. |
| [testConnection()](#testconnection) | Nothing to reach; the channel is healthy as long as it exists and is active. |

### verifyWebhook

*public* - line 23

Webchat has its own public endpoints, so the shared webhook never routes here.

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

*public* - line 29

Not used — inbound is handled by api/webchat/send.php, not parseInbound.

```php
function parseInbound(string $rawBody, array $params): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$rawBody` | `string` |  |  |
| `$params` | `array` |  |  |

### sendMessage

*public* - line 39

"Send" an outbound reply. There is nothing to transmit — the message row is stored by the caller and delivered when the visitor next polls — so we only mint a stable id. Prefixed 'wc_out_' so it's recognisable in the emails table.

```php
function sendMessage(string $to, string $body): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$to` | `string` |  |  |
| `$body` | `string` |  |  |

### testConnection

*public* - line 45

Nothing to reach; the channel is healthy as long as it exists and is active.

```php
function testConnection(): string
```

