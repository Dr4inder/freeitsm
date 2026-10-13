# apiNmValidateSize()

Returns the node size when it is a known size class, otherwise answers 422 listing the valid ones.

```php
function apiNmValidateSize(string $size): string
```

Defined in [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md), line 300.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$size` | `string` |  |  |

**Returns:** `string`

## Calls

[apiError()](/code/functions/apiError.md)

## Called from

- [api/v1/resources/network_mapper.php](/code/files/api/v1/resources/network_mapper.php.md) - in [apiNmValidateNodeInput()](/code/functions/apiNmValidateNodeInput.md), [apiNmNodesUpdate()](/code/functions/apiNmNodesUpdate.md)

