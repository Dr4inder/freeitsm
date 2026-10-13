# includes/warroom.php

> PHP - 1359 lines

War room — the chat analysts fall back to when Teams/Slack is unavailable.

WHY THIS EXISTS. When the internet drops, the on-premise service desk is the
last thing still running on the LAN — and it already knows every analyst, who
is in which team, and what is currently on fire. So it is the natural place
for people to gather.

🔑 IT BEING A FALLBACK IS NOT A LICENCE TO MAKE IT THIN. The first cut had
team channels and nothing else, on the theory that a break-glass tool should
stay minimal. That was the wrong instinct: a tool nobody enjoys using in calm
conditions is not the one they reach for at 3am, and an outage is the worst
possible moment to discover you cannot start a side conversation or find what
somebody said forty minutes ago. So: real channels, direct messages, search
and attachments.

WHAT WE KEPT FROM THE FIRST CUT, because these were right:

  NO EXTERNAL DEPENDENCIES. No CDN asset, no cert, no token, no scheduled job.
  A tool for the day the internet is down must not have a dependency that can
  expire or fail to resolve while it is down — which is why retention is
  applied on write rather than by cron, and why the channels an analyst needs
  are created on demand rather than by an administrator setting them up in
  advance. The one part that DOES need the internet — the AI situation report
  — is strictly additive: it is a panel, and the chat neither calls it nor
  waits for it. When the provider is unreachable the report says so and the
  room carries on.

  TEAM CHANNELS ARE STILL DERIVED. A team channel is keyed to its team and
  CASCADEs with it, so it cannot be renamed into a lie or orphaned. Custom
  channels and DMs are rows, and they do carry a lifecycle — that is the cost
  of the feature, paid deliberately rather than avoided.

Service layer: the UI page and every API endpoint come through here, so the
access rule exists once. See [[Service-Layer-Architecture]].

## Functions

| Function | Line | What it does |
|---|--:|---|
| [warRoomEnsureChannels()](/code/functions/warRoomEnsureChannels.md) | 82 | Make sure the channels this analyst is entitled to actually exist as rows. |
| [warRoomChannelList()](/code/functions/warRoomChannelList.md) | 122 | Every channel this analyst can see, in display order, with unread counts. |
| [warRoomChannelName()](/code/functions/warRoomChannelName.md) | 191 | The label for a channel row. |
| [warRoomChannel()](/code/functions/warRoomChannel.md) | 210 | One channel row, or null. Raw — callers must still check access. |
| [warRoomCanAccessChannel()](/code/functions/warRoomCanAccessChannel.md) | 233 | May this analyst read this channel? |
| [warRoomIsMember()](/code/functions/warRoomIsMember.md) | 258 |  |
| [warRoomCanPostChannel()](/code/functions/warRoomCanPostChannel.md) | 272 | May this analyst POST here? Read access, minus archived. |
| [warRoomCreateChannel()](/code/functions/warRoomCreateChannel.md) | 287 | Create a custom channel. Any analyst may — during an incident, needing an administrator to make you a room is exactly the wrong dependency. |
| [warRoomAddMembers()](/code/functions/warRoomAddMembers.md) | 319 | Add analysts to a channel. Idempotent — re-inviting somebody is not an error. |
| [warRoomSetArchived()](/code/functions/warRoomSetArchived.md) | 339 | Archive or restore a custom channel. Team and all-hands channels cannot be archived — they are derived, so the way to remove one is to remove the team. |
| [warRoomUpdateChannel()](/code/functions/warRoomUpdateChannel.md) | 351 | Rename / re-topic a custom channel. Team and DM names are derived, never stored. |
| [warRoomOpenDm()](/code/functions/warRoomOpenDm.md) | 375 | Find or create the DM between two analysts. |
| [warRoomDirectory()](/code/functions/warRoomDirectory.md) | 413 | Analysts this person could start a DM with. Active accounts only — offering to message somebody who left is a dead end you only discover after typing. |
| [warRoomMessages()](/code/functions/warRoomMessages.md) | 449 | Messages in a channel, oldest first, each with its attachments. |
| [warRoomEditMessage()](/code/functions/warRoomEditMessage.md) | 554 | Edit a message. The AUTHOR only — nobody else may put words in your mouth, not even an administrator, who can delete but not rewrite. |
| [warRoomDeleteMessage()](/code/functions/warRoomDeleteMessage.md) | 588 | Delete a message: the author, or somebody with war_room.manage. |
| [warRoomMessageRow()](/code/functions/warRoomMessageRow.md) | 616 | One message row, raw. Callers do their own access checks. |
| [warRoomSend()](/code/functions/warRoomSend.md) | 625 | Post a message. Returns the new id, or 0 if the body was empty. |
| [warRoomResolveMentions()](/code/functions/warRoomResolveMentions.md) | 680 | Work out who a message names, and record it. |
| [warRoomChannelAudience()](/code/functions/warRoomChannelAudience.md) | 732 | Every analyst who can read this channel, as id => full name. |
| [warRoomStoreMentions()](/code/functions/warRoomStoreMentions.md) | 774 | Record the mentions for a message. Idempotent via the UNIQUE on (message, analyst). |
| [warRoomMyMentions()](/code/functions/warRoomMyMentions.md) | 795 | The notifications panel: messages naming this analyst that they have not read. |
| [warRoomMentionCounts()](/code/functions/warRoomMentionCounts.md) | 851 | Unread mentions per channel, so the channel list can mark a mention differently from ordinary unread. Being named is a different event from having missed something, and one badge for both would hide the one that needs you. |
| [warRoomStoreAttachment()](/code/functions/warRoomStoreAttachment.md) | 890 | Store one uploaded file against a message. |
| [warRoomAttachmentFor()](/code/functions/warRoomAttachmentFor.md) | 922 | The row for an attachment the analyst is allowed to fetch, or null. |
| [warRoomSearch()](/code/functions/warRoomSearch.md) | 967 | Search the conversations this analyst can see. |
| [warRoomSnippet()](/code/functions/warRoomSnippet.md) | 1042 | A window of the message around the first term that matched, so a result is readable without opening it. Plain text — the page inserts it with textContent and highlights client-side, so nothing here can emit markup. |
| [warRoomTouchPresence()](/code/functions/warRoomTouchPresence.md) | 1068 | Record that this analyst is here, and return who else is. |
| [warRoomPresent()](/code/functions/warRoomPresent.md) | 1088 | Who has polled recently, and whether they are in THIS channel or elsewhere in the war room. "Here" versus "around" is a genuinely useful distinction during an incident — it is the difference between nobody is reading this and everybody is in the other room. |
| [warRoomMarkRead()](/code/functions/warRoomMarkRead.md) | 1114 | Remember how far this analyst has read, so the channel list can show what is new. Only ever moves forward: an out-of-order poll must not un-read a channel. |
| [warRoomRetentionDays()](/code/functions/warRoomRetentionDays.md) | 1132 | Retention in days from settings. 0 (the default) means keep forever. |
| [warRoomPrune()](/code/functions/warRoomPrune.md) | 1157 | Apply the retention setting. |
| [warRoomSweepOrphanFiles()](/code/functions/warRoomSweepOrphanFiles.md) | 1214 | Delete attachment files with no row left pointing at them. |
| [warRoomTranscriptSince()](/code/functions/warRoomTranscriptSince.md) | 1266 | The transcript to summarise: everything said in channels this analyst can see since a given moment. |
| [warRoomSitrepPrompt()](/code/functions/warRoomSitrepPrompt.md) | 1330 | The prompt for the situation report. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 88 | `warRoomEnsureChannels` | **insert** [warroom_channels](/code/tables/warroom_channels.md) (`kind`, `name`, `created_datetime`) |  |
| 89 | `warRoomEnsureChannels` | read [warroom_channels](/code/tables/warroom_channels.md) |  |
| 95 | `warRoomEnsureChannels` | **insert** [warroom_channels](/code/tables/warroom_channels.md) (`kind`, `team_id`, `created_datetime`) |  |
| 96 | `warRoomEnsureChannels` | read [teams](/code/tables/teams.md), read [analyst_teams](/code/tables/analyst_teams.md), read [warroom_channels](/code/tables/warroom_channels.md) |  |
| 131 | `warRoomChannelList` | read [warroom_channel_members](/code/tables/warroom_channel_members.md), read [analysts](/code/tables/analysts.md), read [warroom_messages](/code/tables/warroom_messages.md), read [warroom_channels](/code/tables/warroom_channels.md), read [teams](/code/tables/teams.md), read [warroom_reads](/code/tables/warroom_reads.md) |  |
| 149 | `warRoomChannelList` | read [analyst_teams](/code/tables/analyst_teams.md) |  |
| 153 | `warRoomChannelList` | read [warroom_channel_members](/code/tables/warroom_channel_members.md) |  |
| 213 | `warRoomChannel` | read [warroom_channel_members](/code/tables/warroom_channel_members.md), read [analysts](/code/tables/analysts.md), read [warroom_channels](/code/tables/warroom_channels.md), read [teams](/code/tables/teams.md) |  |
| 243 | `warRoomCanAccessChannel` | read [analyst_teams](/code/tables/analyst_teams.md) |  |
| 260 | `warRoomIsMember` | read [warroom_channel_members](/code/tables/warroom_channel_members.md) |  |
| 298 | `warRoomCreateChannel` | **insert** [warroom_channels](/code/tables/warroom_channels.md) (`kind`, `name`, `topic`, `is_private`, `created_by`, `created_datetime`) |  |
| 322 | `warRoomAddMembers` | **insert** [warroom_channel_members](/code/tables/warroom_channel_members.md) (`channel_id`, `analyst_id`, `created_datetime`), read [analysts](/code/tables/analysts.md) |  |
| 342 | `warRoomSetArchived` | **update** [warroom_channels](/code/tables/warroom_channels.md) (`archived_datetime`) |  |
| 356 | `warRoomUpdateChannel` | **update** [warroom_channels](/code/tables/warroom_channels.md) (`name`, `topic`) |  |
| 379 | `warRoomOpenDm` | read [analysts](/code/tables/analysts.md) |  |
| 385 | `warRoomOpenDm` | read [warroom_channels](/code/tables/warroom_channels.md) |  |
| 392 | `warRoomOpenDm` | **insert** [warroom_channels](/code/tables/warroom_channels.md) (`kind`, `dm_key`, `is_private`, `created_by`, `created_datetime`) |  |
| 416 | `warRoomDirectory` | read [warroom_presence](/code/tables/warroom_presence.md), read [analysts](/code/tables/analysts.md) |  |
| 468 | `warRoomMessages` | read [analysts](/code/tables/analysts.md) |  |
| 472 | `warRoomMessages` | read [warroom_messages](/code/tables/warroom_messages.md) |  |
| 480 | `warRoomMessages` | read [warroom_messages](/code/tables/warroom_messages.md) |  |
| 526 | `warRoomMessages` | read [warroom_attachments](/code/tables/warroom_attachments.md) |  |
| 566 | `warRoomEditMessage` | **update** [warroom_messages](/code/tables/warroom_messages.md) (`body`, `edited_datetime`) |  |
| 573 | `warRoomEditMessage` | **delete** [warroom_mentions](/code/tables/warroom_mentions.md) |  |
| 597 | `warRoomDeleteMessage` | read [warroom_attachments](/code/tables/warroom_attachments.md) |  |
| 603 | `warRoomDeleteMessage` | **delete** [warroom_attachments](/code/tables/warroom_attachments.md) |  |
| 604 | `warRoomDeleteMessage` | **delete** [warroom_mentions](/code/tables/warroom_mentions.md) |  |
| 607 | `warRoomDeleteMessage` | **update** [warroom_messages](/code/tables/warroom_messages.md) (`body`, `deleted_datetime`, `deleted_by`) |  |
| 618 | `warRoomMessageRow` | read [warroom_messages](/code/tables/warroom_messages.md) |  |
| 632 | `warRoomSend` | **insert** [warroom_messages](/code/tables/warroom_messages.md) (`channel_id`, `analyst_id`, `body`, `created_datetime`) |  |
| 742 | `warRoomChannelAudience` | read [analysts](/code/tables/analysts.md) |  |
| 747 | `warRoomChannelAudience` | read [analysts](/code/tables/analysts.md), read [analyst_teams](/code/tables/analyst_teams.md) |  |
| 755 | `warRoomChannelAudience` | read [analysts](/code/tables/analysts.md) |  |
| 761 | `warRoomChannelAudience` | read [analysts](/code/tables/analysts.md), read [warroom_channel_members](/code/tables/warroom_channel_members.md) |  |
| 778 | `warRoomStoreMentions` | **insert** [warroom_mentions](/code/tables/warroom_mentions.md) (`message_id`, `analyst_id`, `created_datetime`) |  |
| 798 | `warRoomMyMentions` | read [warroom_channel_members](/code/tables/warroom_channel_members.md), read [analysts](/code/tables/analysts.md), read [warroom_mentions](/code/tables/warroom_mentions.md), read [warroom_messages](/code/tables/warroom_messages.md), read [warroom_channels](/code/tables/warroom_channels.md), read [teams](/code/tables/teams.md), read [warroom_reads](/code/tables/warroom_reads.md) |  |
| 815 | `warRoomMyMentions` | read [analyst_teams](/code/tables/analyst_teams.md) |  |
| 819 | `warRoomMyMentions` | read [warroom_channel_members](/code/tables/warroom_channel_members.md) |  |
| 854 | `warRoomMentionCounts` | read [warroom_mentions](/code/tables/warroom_mentions.md), read [warroom_messages](/code/tables/warroom_messages.md), read [warroom_reads](/code/tables/warroom_reads.md) |  |
| 895 | `warRoomStoreAttachment` | **insert** [warroom_attachments](/code/tables/warroom_attachments.md) (`message_id`, `stored_name`, `original_name`, `size_bytes`, `created_datetime`) |  |
| 925 | `warRoomAttachmentFor` | read [warroom_attachments](/code/tables/warroom_attachments.md), read [warroom_messages](/code/tables/warroom_messages.md) |  |
| 991 | `warRoomSearch` | read [warroom_channel_members](/code/tables/warroom_channel_members.md), read [analysts](/code/tables/analysts.md), read [warroom_messages](/code/tables/warroom_messages.md), read [warroom_channels](/code/tables/warroom_channels.md), read [teams](/code/tables/teams.md) |  |
| 1005 | `warRoomSearch` | read [analyst_teams](/code/tables/analyst_teams.md) |  |
| 1009 | `warRoomSearch` | read [warroom_channel_members](/code/tables/warroom_channel_members.md) |  |
| 1071 | `warRoomTouchPresence` | **insert** [warroom_presence](/code/tables/warroom_presence.md) (`analyst_id`, `channel_id`, `last_seen`) |  |
| 1091 | `warRoomPresent` | read [warroom_presence](/code/tables/warroom_presence.md), read [analysts](/code/tables/analysts.md) |  |
| 1118 | `warRoomMarkRead` | **insert** [warroom_reads](/code/tables/warroom_reads.md) (`analyst_id`, `channel_id`, `last_read_message_id`, `updated_datetime`) |  |
| 1135 | `warRoomRetentionDays` | read [system_settings](/code/tables/system_settings.md) |  |
| 1172 | `warRoomPrune` | read [warroom_attachments](/code/tables/warroom_attachments.md), read [warroom_messages](/code/tables/warroom_messages.md) |  |
| 1183 | `warRoomPrune` | **delete** [warroom_messages](/code/tables/warroom_messages.md) |  |
| 1193 | `warRoomPrune` | read [warroom_attachments](/code/tables/warroom_attachments.md) |  |
| 1218 | `warRoomSweepOrphanFiles` | read [system_settings](/code/tables/system_settings.md) |  |
| 1224 | `warRoomSweepOrphanFiles` | **insert** [system_settings](/code/tables/system_settings.md) (`setting_key`, `setting_value`) |  |
| 1232 | `warRoomSweepOrphanFiles` | read [warroom_attachments](/code/tables/warroom_attachments.md) |  |
| 1276 | `warRoomTranscriptSince` | read [warroom_channel_members](/code/tables/warroom_channel_members.md), read [analysts](/code/tables/analysts.md), read [warroom_messages](/code/tables/warroom_messages.md), read [warroom_channels](/code/tables/warroom_channels.md), read [teams](/code/tables/teams.md) |  |
| 1290 | `warRoomTranscriptSince` | read [analyst_teams](/code/tables/analyst_teams.md) |  |
| 1294 | `warRoomTranscriptSince` | read [warroom_channel_members](/code/tables/warroom_channel_members.md) |  |

## How it hangs together

**Includes:** [includes/uploads.php](/code/files/includes/uploads.php.md)

**Included by:** [api/system/debug-tools/D008_war_room.php](/code/files/api/system/debug-tools/D008_war_room.php.md), [api/war-room/alerts.php](/code/files/api/war-room/alerts.php.md), [api/war-room/attachment.php](/code/files/api/war-room/attachment.php.md), [api/war-room/channels.php](/code/files/api/war-room/channels.php.md), [api/war-room/message.php](/code/files/api/war-room/message.php.md), [api/war-room/poll.php](/code/files/api/war-room/poll.php.md), [api/war-room/search.php](/code/files/api/war-room/search.php.md), [api/war-room/send.php](/code/files/api/war-room/send.php.md), [api/war-room/sitrep.php](/code/files/api/war-room/sitrep.php.md), [api/war-room/warbot.php](/code/files/api/war-room/warbot.php.md), [includes/warbot/tools.php](/code/files/includes/warbot/tools.php.md), [includes/warbot/warbot.php](/code/files/includes/warbot/warbot.php.md), [war-room/index.php](/code/files/war-room/index.php.md), [war-room/settings/index.php](/code/files/war-room/settings/index.php.md)

**Calls:** [attachmentServeRules()](/code/functions/attachmentServeRules.md), [t()](/code/functions/t.md), [uploadStoreFile()](/code/functions/uploadStoreFile.md)

