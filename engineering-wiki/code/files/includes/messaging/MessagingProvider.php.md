# includes/messaging/MessagingProvider.php

> PHP - 239 lines

## Classes

- [MessagingProvider](/code/classes/MessagingProvider.md) (class, line 23) - MessagingProvider — the provider-agnostic contract for a chat channel (WhatsApp today; SMS/others later). Everything above this line — webhook ingestion, ticket creation, the reply path — talks to this interface and never knows whether Twilio or Meta Cloud is actually live.

## How it hangs together

**Included by:** [includes/messaging/FreeitsmProvider.php](/code/files/includes/messaging/FreeitsmProvider.php.md), [includes/messaging/MattermostProvider.php](/code/files/includes/messaging/MattermostProvider.php.md), [includes/messaging/messaging.php](/code/files/includes/messaging/messaging.php.md), [includes/messaging/MetaCloudProvider.php](/code/files/includes/messaging/MetaCloudProvider.php.md), [includes/messaging/SlackProvider.php](/code/files/includes/messaging/SlackProvider.php.md), [includes/messaging/TeamsProvider.php](/code/files/includes/messaging/TeamsProvider.php.md), [includes/messaging/TelegramProvider.php](/code/files/includes/messaging/TelegramProvider.php.md), [includes/messaging/TwilioProvider.php](/code/files/includes/messaging/TwilioProvider.php.md)

**Calls:** [sslApplyCurl()](/code/functions/sslApplyCurl.md)

