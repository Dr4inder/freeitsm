# includes/domains/dns.php

> PHP - 138 lines

Domains — DNS questions, answered one way whatever the resolver.

Two resolvers, one shape:

  system      PHP's `dns_get_record()`, i.e. whatever the server itself uses.
              Fast and private, but PHP cannot ask for every type on every
              platform — on Windows there is no DNS_CAA constant at all, and no
              PHP anywhere can ask for DS.
  google /    DNS-over-HTTPS JSON (dns.google/resolve, cloudflare-dns.com).
  cloudflare  Answers every type, and is what the "system" resolver falls back
              to for the types it cannot ask.

🔑 EVERY ANSWER IS NORMALISED: host names lower-case with no trailing dot, TXT
records re-joined from their 255-byte chunks, MX as [priority, host]. The
checks compare answers from different resolvers and from the registry, so a
trailing dot or a chunk boundary must never read as a difference.

## Functions

| Function | Line | What it does |
|---|--:|---|
| [domainDns()](/code/functions/domainDns.md) | 28 |  |
| [domainDnsSystem()](/code/functions/domainDnsSystem.md) | 54 |  |
| [domainDnsDoh()](/code/functions/domainDnsDoh.md) | 78 |  |
| [domainDnsSort()](/code/functions/domainDnsSort.md) | 120 |  |
| [domainTxtStartingWith()](/code/functions/domainTxtStartingWith.md) | 133 | The TXT records at `$name` that start with `$prefix` (case-insensitive), e.g. "v=spf1". |

## How it hangs together

**Includes:** [includes/domains/lookup.php](/code/files/includes/domains/lookup.php.md)

**Included by:** [includes/domains/checks.php](/code/files/includes/domains/checks.php.md), [includes/domains/watch.php](/code/files/includes/domains/watch.php.md)

**Calls:** [domainHttpGet()](/code/functions/domainHttpGet.md)

