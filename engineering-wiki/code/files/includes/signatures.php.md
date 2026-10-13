# includes/signatures.php

> PHP - 141 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [signatureMergeData()](/code/functions/signatureMergeData.md) | 35 | The values a signature can merge, for the analyst who is signing. |
| [signatureMergeCodes()](/code/functions/signatureMergeCodes.md) | 57 | The merge codes offered in the editor, in the order they are listed. |
| [renderSignature()](/code/functions/renderSignature.md) | 78 | Resolve a signature body for one analyst. |
| [signaturesForAnalyst()](/code/functions/signaturesForAnalyst.md) | 90 | Every signature belonging to one analyst, default first. |
| [defaultSignatureForAnalyst()](/code/functions/defaultSignatureForAnalyst.md) | 113 | The one that gets inserted without being asked for, or null. |
| [setDefaultSignature()](/code/functions/setDefaultSignature.md) | 134 | Make exactly one signature the default for an analyst. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 37 | `signatureMergeData` | read [analysts](/code/tables/analysts.md) |  |
| 93 | `signaturesForAnalyst` | read [analyst_signatures](/code/tables/analyst_signatures.md) |  |
| 136 | `setDefaultSignature` | **update** [analyst_signatures](/code/tables/analyst_signatures.md) (`is_default`) |  |
| 138 | `setDefaultSignature` | **update** [analyst_signatures](/code/tables/analyst_signatures.md) (`is_default`) |  |

## How it hangs together

**Included by:** [api/myaccount/get_signatures.php](/code/files/api/myaccount/get_signatures.php.md), [api/myaccount/save_signature.php](/code/files/api/myaccount/save_signature.php.md)

