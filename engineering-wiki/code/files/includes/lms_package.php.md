# includes/lms_package.php

> PHP - 186 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [lmsValidatePackage()](/code/functions/lmsValidatePackage.md) | 65 | Check every entry in the archive. Returns the entries that should be written (directories excluded), or throws with a message naming the offending file. |
| [lmsExtractPackage()](/code/functions/lmsExtractPackage.md) | 135 | Extract only the entries that passed validation, one at a time. |
| [lmsHardenContentDir()](/code/functions/lmsHardenContentDir.md) | 150 | Stop the content tree ever executing code, whatever ends up in it. |

## How it hangs together

**Includes:** [includes/uploads.php](/code/files/includes/uploads.php.md)

**Included by:** [api/lms/courses.php](/code/files/api/lms/courses.php.md)

**Calls:** [uploadRepairHtaccessFile()](/code/functions/uploadRepairHtaccessFile.md)

