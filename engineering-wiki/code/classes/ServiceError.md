# ServiceError

> Class in [includes/service_context.php](/code/files/includes/service_context.php.md), line 130

A business-rule failure raised by a service. `$kind` drives the HTTP status the API adapter emits; `$code` + the message are passed through verbatim so the API's existing error bodies stay byte-identical.

## Methods

| Method | What it does |
|---|---|
| [__construct()](#__construct) | A service failure with a kind (validation, not_found, conflict, forbidden...) that adapters turn into an HTTP status, a machine code and a message. |

### __construct

*public* - line 141

A service failure with a kind (validation, not_found, conflict, forbidden...) that adapters turn into an HTTP status, a machine code and a message.

```php
function __construct(string $kind, string $code, string $message)
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$kind` | `string` |  |  |
| `$code` | `string` |  |  |
| `$message` | `string` |  |  |

