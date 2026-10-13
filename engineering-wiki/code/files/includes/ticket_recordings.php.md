# includes/ticket_recordings.php

> PHP - 88 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [claimPendingRecordings()](/code/functions/claimPendingRecordings.md) | 40 | Move pending recordings onto a ticket and (optionally) a specific message. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 58 | `claimPendingRecordings` | read [ticket_recordings](/code/tables/ticket_recordings.md) |  |
| 65 | `claimPendingRecordings` | **update** [ticket_recordings](/code/tables/ticket_recordings.md) (`ticket_id`, `email_id`, `file_path`) |  |

## How it hangs together

**Included by:** [api/self-service/create_ticket.php](/code/files/api/self-service/create_ticket.php.md), [api/self-service/reply_ticket.php](/code/files/api/self-service/reply_ticket.php.md)

