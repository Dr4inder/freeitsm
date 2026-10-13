# ServiceError

> Class in [includes/service_context.php](/code/files/includes/service_context.php.md), line 125

A business-rule failure raised by a service. `$kind` drives the HTTP status the API adapter emits; `$code` + the message are passed through verbatim so the API's existing error bodies stay byte-identical.

## Methods

| Method | What it does |
|---|---|
| [__construct()](#__construct) |  |

### __construct

*public* - line 132

```php
function __construct(string $kind, string $code, string $message)
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$kind` | `string` |  |  |
| `$code` | `string` |  |  |
| `$message` | `string` |  |  |

