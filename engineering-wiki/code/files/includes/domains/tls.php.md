# includes/domains/tls.php

> PHP - 95 lines

Domains — reading the certificate a web server presents.

Two handshakes per host, on purpose:

  1. verification OFF, to read the certificate whatever state it is in — an
     expired or self-signed certificate is exactly the one somebody needs to
     hear about, and a verifying handshake would refuse to show it;
  2. verification ON, against the same CA bundle the rest of FreeITSM trusts,
     to answer "would a browser accept this chain?".

Only ever called for the domain itself, www, and the extra hosts on the
domain's own record — which `domainParseSslHosts()` restricts to sub-domains of
that domain, so this cannot be pointed at an arbitrary address.

## Functions

| Function | Line | What it does |
|---|--:|---|
| [domainTlsCertificate()](/code/functions/domainTlsCertificate.md) | 25 |  |
| [domainTlsNameMatches()](/code/functions/domainTlsNameMatches.md) | 82 | Does `$host` appear in the certificate's names (with one-label wildcards)? |

## How it hangs together

**Includes:** [includes/ssl.php](/code/files/includes/ssl.php.md)

**Included by:** [includes/domains/checks.php](/code/files/includes/domains/checks.php.md)

**Calls:** [sslResolveCaBundle()](/code/functions/sslResolveCaBundle.md)

