# rfpAiLogAction()

Insert a row into rfp_processing_log. Silently no-ops if rfp_id is null (the column is NOT NULL in the schema; callers should always have an rfp_id by the time they're calling AI).

```php
function rfpAiLogAction(
    PDO $conn,
    ?int $rfpId,
    ?int $documentId,
    ?int $sectionId,
    string $action,
    string $status,
    ?string $details,
    ?int $tokensIn,
    ?int $tokensOut
): void
```

Defined in [includes/rfp_ai.php](/code/files/includes/rfp_ai.php.md), line 455.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$rfpId` | `?int` |  |  |
| `$documentId` | `?int` |  |  |
| `$sectionId` | `?int` |  |  |
| `$action` | `string` |  |  |
| `$status` | `string` |  |  |
| `$details` | `?string` |  |  |
| `$tokensIn` | `?int` |  |  |
| `$tokensOut` | `?int` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 468 | `rfpAiLogAction` | **insert** [rfp_processing_log](/code/tables/rfp_processing_log.md) (`rfp_id`, `document_id`, `section_id`, `action`, `status`, `details`, `tokens_in`, `tokens_out`) |  |

## Called from

- [includes/rfp_ai.php](/code/files/includes/rfp_ai.php.md) - in [rfpAiExtractRequirements()](/code/functions/rfpAiExtractRequirements.md), [rfpAiConsolidate()](/code/functions/rfpAiConsolidate.md), [rfpAiConsolidateStreaming()](/code/functions/rfpAiConsolidateStreaming.md), [rfpAiGenerateSectionStreaming()](/code/functions/rfpAiGenerateSectionStreaming.md), [rfpAiGenerateFramingStreaming()](/code/functions/rfpAiGenerateFramingStreaming.md), [rfpAiRestyleStreaming()](/code/functions/rfpAiRestyleStreaming.md)

