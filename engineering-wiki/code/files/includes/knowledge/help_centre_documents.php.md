# includes/knowledge/help_centre_documents.php

> PHP - 130 lines

> [!TIP]
> **Developer guide on the GitHub wiki:** [Knowledge](https://github.com/edmozley/freeitsm/wiki/Knowledge)

Documents on a knowledge article, in the self-service Help Centre (GH #177).

THE RULE, in one sentence: a document attached to an article can be
downloaded from the Help Centre by anyone who may read that article there,
unless that attachment is set to Hidden.

  - "may read that article there" is NOT restated here. It is
    `portalCanReadArticle()` (includes/knowledge/portal_reader.php), built on the
    same `portalKnowledgeScope()` the Help Centre's own list and article use - so
    company, audience, published/archived and the access list all follow,
    including rules added later.
  - "Hidden" is document_links.show_in_help_centre = 0. It lives on the LINK,
    so the same file can be shown on one article and held back on another.
  - Links made before 3.7.0 start hidden; new ones on an article start shown.
    See `documentLinkHelpCentreDefault()` in includes/documents.php.

Analyst-facing help: knowledge/help/documents-help-centre.php.

## Functions

| Function | Line | What it does |
|---|--:|---|
| [helpCentreArticleIsCustomerFacing()](/code/functions/helpCentreArticleIsCustomerFacing.md) | 37 | Is this article one that customers could read in the Help Centre at all - published, not archived, and with an audience that includes signed-in customers? Drives the explanation on the analyst's Documents panel only; it is NOT an access check (that is `portalCanReadArticle()`, which also knows the requester's company and the access list). |
| [helpCentreArticleDocuments()](/code/functions/helpCentreArticleDocuments.md) | 56 | The documents on an article that the Help Centre shows, newest first. |
| [helpCentreDocumentForPortalUser()](/code/functions/helpCentreDocumentForPortalUser.md) | 89 | The document a portal requester may download, or null. |
| [helpCentreSetShown()](/code/functions/helpCentreSetShown.md) | 119 | Show or hide one article attachment in the Help Centre. Only ever touches a knowledge_article link. Returns false when there is no such link (or the column does not exist yet). |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 40 | `helpCentreArticleIsCustomerFacing` | read [knowledge_articles](/code/tables/knowledge_articles.md) |  |
| 59 | `helpCentreArticleDocuments` | read [document_links](/code/tables/document_links.md), read [documents](/code/tables/documents.md) |  |
| 92 | `helpCentreDocumentForPortalUser` | read [documents](/code/tables/documents.md), read [document_links](/code/tables/document_links.md) |  |
| 121 | `helpCentreSetShown` | read [document_links](/code/tables/document_links.md) |  |
| 125 | `helpCentreSetShown` | **update** [document_links](/code/tables/document_links.md) (`show_in_help_centre`) |  |

## How it hangs together

**Includes:** [includes/documents.php](/code/files/includes/documents.php.md), [includes/knowledge/audience.php](/code/files/includes/knowledge/audience.php.md), [includes/knowledge/portal_reader.php](/code/files/includes/knowledge/portal_reader.php.md)

**Included by:** [api/documents/help_centre.php](/code/files/api/documents/help_centre.php.md), [api/documents/list.php](/code/files/api/documents/list.php.md), [api/self-service/get_article_document.php](/code/files/api/self-service/get_article_document.php.md), [api/self-service/get_knowledge_article.php](/code/files/api/self-service/get_knowledge_article.php.md)

**Calls:** [documentHelpCentreReady()](/code/functions/documentHelpCentreReady.md), [portalCanReadArticle()](/code/functions/portalCanReadArticle.md)

