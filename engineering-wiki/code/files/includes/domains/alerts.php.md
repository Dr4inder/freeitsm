# includes/domains/alerts.php

> PHP - 397 lines

Domains — who hears about what, and when.

─────────────────────────────────────────────────────────────────────────────
THREE KINDS OF NEWS

  expiry    a registration is N days from lapsing (the days list), or has
            lapsed and is still rescuable (a chase every 7 days for 45 days —
            roughly the registry grace + redemption window)
  ssl       a certificate on the domain is within the warning window
  changed   change detection saw something important move (see monitor.php)

Each reaches three audiences, independently:

  events    domain.expiring / domain.ssl_expiring / domain.changed through
            WorkflowEngine::dispatch() — so the notification bell (the owner)
            and any workflow hear it. ALWAYS fired: they are internal, and a
            workflow author should not have to switch e-mail on to get a trigger.
  e-mail    one DIGEST per recipient per run, not one mail per domain — three
            hundred domains renewing in the same month must not be three hundred
            e-mails. OFF until Domains → Settings → Alerts switches it on.
  actions   optionally a task or a ticket at the renewal window, once per
            expiry date, so renewing is somebody's job with a due date.

─────────────────────────────────────────────────────────────────────────────
FIRE ONCE

domain_alerts_sent holds (domain, kind, fingerprint). The fingerprint carries
the date the alert is about, so renewing a domain (a new expiry date) re-arms
every window with nothing to clear. Each audience has its own kind — mail_*,
evt_*, act_* — so switching e-mail on later still sends the mail for a window
whose event already fired.

🔑 CLAIM BEFORE SENDING, GIVE IT BACK ON FAILURE — the LMS reminders rule: an
INSERT IGNORE claim makes an overlapping cron + page-load run send once, and a
failed send releases its claim so the failure is not permanent and silent.

## Functions

| Function | Line | What it does |
|---|--:|---|
| [domainAlertClaim()](/code/functions/domainAlertClaim.md) | 46 | Claim an alert. true = ours to send; false = already sent (or claimed a moment ago). |
| [domainAlertRelease()](/code/functions/domainAlertRelease.md) | 53 |  |
| [domainAlertAlreadySent()](/code/functions/domainAlertAlreadySent.md) | 58 |  |
| [domainAlertsDue()](/code/functions/domainAlertsDue.md) | 70 | Everything due today for expiry and certificates. |
| [domainAlertsRun()](/code/functions/domainAlertsRun.md) | 121 | The run: events, e-mail digests and renewal actions. |
| [domainAlertRecipients()](/code/functions/domainAlertRecipients.md) | 201 | email => display name, for one due item. |
| [domainAlertPayload()](/code/functions/domainAlertPayload.md) | 217 |  |
| [domainPublicLink()](/code/functions/domainPublicLink.md) | 229 | Absolute link to a domain, for mail sent by a cron with no request host. |
| [domainAlertDigest()](/code/functions/domainAlertDigest.md) | 236 | Subject and HTML for one recipient's digest. |
| [domainAlertWhen()](/code/functions/domainAlertWhen.md) | 278 |  |
| [fmt_domain_date()](/code/functions/fmt_domain_date.md) | 287 | 'YYYY-MM-DD' → '20 November 2026'. Plain and not zone-shifted. |
| [domainAlertOnChange()](/code/functions/domainAlertOnChange.md) | 299 | Change detection's e-mail. Called by DomainsService::runChecks() when something serious moved — separate from the daily digest because a possible hijack cannot wait for tomorrow's run. |
| [domainWatchLabel()](/code/functions/domainWatchLabel.md) | 331 |  |
| [domainRenewalActionsRun()](/code/functions/domainRenewalActionsRun.md) | 345 | Raise a task or a ticket for each domain entering the renewal window. Once per expiry date (a renewed domain re-arms). Ownerless domains get an unassigned task — renewing is still somebody's job even when nobody has been named. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 48 | `domainAlertClaim` | **insert** [domain_alerts_sent](/code/tables/domain_alerts_sent.md) (`domain_id`, `alert_kind`, `fingerprint`, `sent_datetime`) |  |
| 55 | `domainAlertRelease` | **delete** [domain_alerts_sent](/code/tables/domain_alerts_sent.md) |  |
| 60 | `domainAlertAlreadySent` | read [domain_alerts_sent](/code/tables/domain_alerts_sent.md) |  |
| 80 | `domainAlertsDue` | read [domains](/code/tables/domains.md), read [domain_statuses](/code/tables/domain_statuses.md), read [analysts](/code/tables/analysts.md), read [tenants](/code/tables/tenants.md) |  |
| 308 | `domainAlertOnChange` | read [analysts](/code/tables/analysts.md) |  |
| 349 | `domainRenewalActionsRun` | read [domains](/code/tables/domains.md), read [domain_statuses](/code/tables/domain_statuses.md), read [analysts](/code/tables/analysts.md) |  |

## How it hangs together

**Includes:** [includes/domains/settings.php](/code/files/includes/domains/settings.php.md), [includes/services/domains.php](/code/files/includes/services/domains.php.md), [includes/self_service_email.php](/code/files/includes/self_service_email.php.md), [includes/public_url.php](/code/files/includes/public_url.php.md), [includes/services/tasks.php](/code/files/includes/services/tasks.php.md), [includes/services/tickets.php](/code/files/includes/services/tickets.php.md)

**Included by:** [includes/domains/scheduler.php](/code/files/includes/domains/scheduler.php.md), [includes/services/domains.php](/code/files/includes/services/domains.php.md)

**Calls:** [domainParseDays()](/code/functions/domainParseDays.md), [domainSettings()](/code/functions/domainSettings.md), [domainSettingWrite()](/code/functions/domainSettingWrite.md), [getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [publicBaseUrl()](/code/functions/publicBaseUrl.md), [ssSendSystemEmail()](/code/functions/ssSendSystemEmail.md)

