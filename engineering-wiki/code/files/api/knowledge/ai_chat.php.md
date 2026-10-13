# api/knowledge/ai_chat.php

> API endpoint - 294 lines

API Endpoint: AI Chat - Ask questions about knowledge base articles Uses Claude Haiku to answer questions based solely on knowledge article content Supports vector similarity search for finding relevant articles (if embeddings are configured)

## The endpoint

| | |
|---|---|
| URL | `api/knowledge/ai_chat.php` |
| Protected by | Module access: ? (requireAnyModuleAccessJson) |
| Called from | [assets/js/inbox.js](/code/files/assets/js/inbox.js.md) |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [cosineSimilarity()](/code/functions/cosineSimilarity.md) | 56 | Calculate cosine similarity between two vectors |
| [generateEmbedding()](/code/functions/generateEmbedding.md) | 75 | Generate embedding for text using OpenAI API |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 121 |  | read [system_settings](/code/tables/system_settings.md) |  |
| 148 |  | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |
| 166 |  | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |
| 204 |  | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |
| 214 |  | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |
| 219 |  | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |
| 225 |  | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md), [includes/encryption.php](/code/files/includes/encryption.php.md), [includes/ai_settings.php](/code/files/includes/ai_settings.php.md), [includes/tenancy.php](/code/files/includes/tenancy.php.md), [includes/knowledge/visibility.php](/code/files/includes/knowledge/visibility.php.md), [includes/ticket_sensitivity.php](/code/files/includes/ticket_sensitivity.php.md)

**Calls:** [aiProviderChat()](/code/functions/aiProviderChat.md), [aiSettingsLoad()](/code/functions/aiSettingsLoad.md), [analystCanAccessTicket()](/code/functions/analystCanAccessTicket.md), [connectToDatabase()](/code/functions/connectToDatabase.md), [decryptValue()](/code/functions/decryptValue.md), [knowledgeVisibilitySql()](/code/functions/knowledgeVisibilitySql.md), [requireAnyModuleAccessJson()](/code/functions/requireAnyModuleAccessJson.md), [sslApplyCurl()](/code/functions/sslApplyCurl.md), [ticketAiAllowed()](/code/functions/ticketAiAllowed.md)

