# includes/domains/lookup.php

> PHP - 428 lines

Domains — asking the registry about a domain.

─────────────────────────────────────────────────────────────────────────────
RDAP FIRST, WHOIS SECOND

RDAP is the modern, JSON replacement for WHOIS, and every generic TLD has to
offer it. IANA publishes which server answers for which TLD
(data.iana.org/rdap/dns.json); that file is cached for a week in
system_settings rather than fetched per lookup.

About a sixth of TLDs — mostly country codes: .de, .io, .co, .eu, .us, .jp —
publish no RDAP server. For those the old port-43 WHOIS is tried: IANA's own
WHOIS names the registry's WHOIS server, and the reply is plain text parsed
for the handful of lines that matter. Some registries (DENIC for .de) never
publish an expiry date at all; the result says so rather than guessing, and
the screen offers the field for a person to fill in.

─────────────────────────────────────────────────────────────────────────────
WHAT THIS DOES NOT DO

It never writes. It returns a normalised array and DomainsService::applyLookup()
decides what to keep, under the operator's "does the registry win?" setting,
with a history row for every field it changes.

⚠️ Registry servers rate-limit and publish no numbers. Callers that loop (the
scheduled run) space requests out per server — see `domainLookupPace()`.

## Functions

| Function | Line | What it does |
|---|--:|---|
| [domainHttpGet()](/code/functions/domainHttpGet.md) | 41 | One outbound GET. Never throws. |
| [domainRdapBootstrap()](/code/functions/domainRdapBootstrap.md) | 79 | TLD → RDAP base URL, from IANA's bootstrap file, cached for seven days. A failed refresh keeps using the stale copy — a week-old map of registries is far better than none, and they rarely move. |
| [domainLookup()](/code/functions/domainLookup.md) | 139 | Look a domain up at its registry. |
| [domainRdapLookup()](/code/functions/domainRdapLookup.md) | 155 |  |
| [domainBlankResult()](/code/functions/domainBlankResult.md) | 210 | The result shape every source fills in. |
| [domainNormaliseStatuses()](/code/functions/domainNormaliseStatuses.md) | 226 | "client transfer prohibited" (RDAP) and "clientTransferProhibited https://icann.org/epp#…" (WHOIS) → "client transfer prohibited". |
| [domainDeriveFlags()](/code/functions/domainDeriveFlags.md) | 247 | Locks and states the statuses imply. |
| [domainVcardField()](/code/functions/domainVcardField.md) | 279 |  |
| [domainLooksRedacted()](/code/functions/domainLooksRedacted.md) | 291 |  |
| [domainDateOnly()](/code/functions/domainDateOnly.md) | 297 | Any date string → Y-m-d, or null. |
| [domainWhoisServer()](/code/functions/domainWhoisServer.md) | 313 | The WHOIS server for a TLD, from IANA's referral, cached with the bootstrap. |
| [domainWhoisQuery()](/code/functions/domainWhoisQuery.md) | 338 | One port-43 query. null when the server could not be reached. |
| [domainWhoisLookup()](/code/functions/domainWhoisLookup.md) | 355 |  |
| [domainLookupPace()](/code/functions/domainLookupPace.md) | 407 | Space out requests to one registry. Called between lookups in a batch: the same RDAP/WHOIS host is not asked again within `$gapSeconds`. |
| [domainTransferLockNotApplicable()](/code/functions/domainTransferLockNotApplicable.md) | 424 | Registries where a registrar "transfer lock" is not how transfers are controlled, so its absence is not a weakness. .uk: Nominet registrar tags. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 86 | `domainRdapBootstrap` | read [system_settings](/code/tables/system_settings.md) |  |
| 112 | `domainRdapBootstrap` | **insert** [system_settings](/code/tables/system_settings.md) (`setting_key`, `setting_value`, `updated_datetime`) |  |
| 320 | `domainWhoisServer` | read [system_settings](/code/tables/system_settings.md) |  |
| 330 | `domainWhoisServer` | **insert** [system_settings](/code/tables/system_settings.md) (`setting_key`, `setting_value`, `updated_datetime`) |  |

## How it hangs together

**Includes:** [includes/domains/names.php](/code/files/includes/domains/names.php.md), [includes/ssl.php](/code/files/includes/ssl.php.md)

**Included by:** [includes/domains/dns.php](/code/files/includes/domains/dns.php.md), [includes/domains/watch.php](/code/files/includes/domains/watch.php.md), [includes/services/domains.php](/code/files/includes/services/domains.php.md)

**Calls:** [domainTld()](/code/functions/domainTld.md), [sslApplyCurl()](/code/functions/sslApplyCurl.md)

