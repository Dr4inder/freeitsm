# formsEffectiveSslVerify()

Apply the global SSL_VERIFY_PEER kill switch on top of the per-form toggle. Same behaviour as the equivalent helper on Workflow.

```php
function formsEffectiveSslVerify(bool $perCallVerify): bool
```

Defined in [api/forms/_ai_helpers.php](/code/files/api/forms/_ai_helpers.php.md), line 46.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$perCallVerify` | `bool` |  |  |

**Returns:** `bool`

## Called from

- [api/forms/test_ai_key.php](/code/files/api/forms/test_ai_key.php.md) - in [formsTestAnthropic()](/code/functions/formsTestAnthropic.md), [formsTestOpenAI()](/code/functions/formsTestOpenAI.md)

