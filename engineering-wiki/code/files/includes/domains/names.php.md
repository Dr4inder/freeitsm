# includes/domains/names.php

> PHP - 157 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [domainNormalise()](/code/functions/domainNormalise.md) | 19 |  |
| [domainTld()](/code/functions/domainTld.md) | 79 | The last label: "co.uk" is not a TLD, "uk" is. |
| [domainHostBelongsTo()](/code/functions/domainHostBelongsTo.md) | 90 | Is `$host` this domain or one of its sub-domains? Used to keep the "extra hosts to check certificates on" list from being pointed at somebody else's server — or at an internal address, which would make this a way to probe the network. |
| [domainParseSslHosts()](/code/functions/domainParseSslHosts.md) | 101 | The extra certificate hosts, cleaned: one per entry, only ones that belong to the domain, de-duplicated. The apex and www are always checked and are not listed here. |
| [domainNormaliseHost()](/code/functions/domainNormaliseHost.md) | 116 | A host name (may be a sub-domain, keeps "www."), or null when it is not one. |
| [domainPurposes()](/code/functions/domainPurposes.md) | 134 | Purposes a domain can be registered for. The keys drive checks; labels are in lang. |
| [domainPurposeIsNonMail()](/code/functions/domainPurposeIsNonMail.md) | 147 | Purposes that should never send or receive mail, so get "lock it down" advice. |
| [domainRenewalModes()](/code/functions/domainRenewalModes.md) | 153 | auto \| manual \| do_not_renew \| unknown |

## How it hangs together

**Included by:** [includes/domains/checks.php](/code/files/includes/domains/checks.php.md), [includes/domains/lookup.php](/code/files/includes/domains/lookup.php.md), [includes/domains/read.php](/code/files/includes/domains/read.php.md), [includes/services/domains.php](/code/files/includes/services/domains.php.md)

