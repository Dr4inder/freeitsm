# domainTlsCertificate()

```php
function domainTlsCertificate(string $host, int $port = 443, int $timeout = 8): array
```

Defined in [includes/domains/tls.php](/code/files/includes/domains/tls.php.md), line 25.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$host` | `string` |  |  |
| `$port` | `int` | `443` |  |
| `$timeout` | `int` | `8` |  |

**Returns:** array{ok:bool, host:string, error:?string, subject:?string, issuer:?string, valid_from:?string, valid_to:?string, days_left:?int, sans:array, hostname_match:?bool, chain_valid:?bool}

## Calls

[domainTlsNameMatches()](/code/functions/domainTlsNameMatches.md), [sslResolveCaBundle()](/code/functions/sslResolveCaBundle.md)

## Called from

- [includes/domains/checks.php](/code/files/includes/domains/checks.php.md) - in [domainRunChecks()](/code/functions/domainRunChecks.md)

