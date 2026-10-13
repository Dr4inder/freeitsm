# api/forms/test_ai_key.php

> API endpoint - 156 lines

API: Send a tiny "say ok" prompt to the chosen provider so the user can verify their key + model BEFORE saving. Supports both Anthropic and OpenAI. If the masked placeholder ("****abcd") is submitted, the stored key is decrypted and used — so the user can test the saved config without re-typing the secret.

Mirrors api/workflow/test_ai_key.php.

## The endpoint

| | |
|---|---|
| URL | `api/forms/test_ai_key.php` |
| Protected by | Module access: forms (requireModuleAccessJson); Permission: Cap::FORMS_AI (requireCapabilityJson) |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [formsTestAnthropic()](/code/functions/formsTestAnthropic.md) | 78 |  |
| [formsTestOpenAI()](/code/functions/formsTestOpenAI.md) | 120 |  |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 47 |  | read [system_settings](/code/tables/system_settings.md) |  |

## How it hangs together

**Includes:** [config.php](/code/files/config.php.md), [includes/functions.php](/code/files/includes/functions.php.md), [includes/rbac.php](/code/files/includes/rbac.php.md), [includes/encryption.php](/code/files/includes/encryption.php.md), [api/forms/_ai_helpers.php](/code/files/api/forms/_ai_helpers.php.md)

**Calls:** [connectToDatabase()](/code/functions/connectToDatabase.md), [decryptValue()](/code/functions/decryptValue.md), [formsEffectiveSslVerify()](/code/functions/formsEffectiveSslVerify.md), [isMaskedNoChangeValue()](/code/functions/isMaskedNoChangeValue.md), [requireCapabilityJson()](/code/functions/requireCapabilityJson.md), [requireModuleAccessJson()](/code/functions/requireModuleAccessJson.md), [sslApplyCurl()](/code/functions/sslApplyCurl.md)

