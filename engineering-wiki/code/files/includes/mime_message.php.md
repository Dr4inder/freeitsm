# includes/mime_message.php

> PHP - 155 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [mimeEncodeHeader()](/code/functions/mimeEncodeHeader.md) | 25 | RFC 2047 encode a header value if it contains non-ASCII. |
| [mimeMessageId()](/code/functions/mimeMessageId.md) | 38 | A globally unique Message-ID on the sender's own domain, e.g. <3f9c...e1.1790805999@example.com>. Falls back to a fixed domain if the From address has none we can use. |
| [mimeBuildMessage()](/code/functions/mimeBuildMessage.md) | 50 |  |
| [mimeHtmlPart()](/code/functions/mimeHtmlPart.md) | 97 | The HTML body as a [headers, content] entity. |
| [mimeFilePart()](/code/functions/mimeFilePart.md) | 105 | One file (inline image or attachment) as a [headers, content] entity. |
| [mimeMultipart()](/code/functions/mimeMultipart.md) | 144 | Wrap [headers, content] entities in a multipart/<subtype> entity. |

## How it hangs together

**Included by:** [includes/gmail.php](/code/files/includes/gmail.php.md), [includes/mailbox_imap.php](/code/files/includes/mailbox_imap.php.md)

