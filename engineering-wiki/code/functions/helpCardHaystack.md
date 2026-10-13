# helpCardHaystack()

The text a card is matched against when someone searches. Lower-cased and flattened so the caller can do a single substring test: title, description, the area's own keyword synonyms, this page's standfirst, its section labels and any extra search terms.

```php
function helpCardHaystack(array $card)
```

Defined in [system/help/_registry.php](/code/files/system/help/_registry.php.md), line 588.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$card` | `array` |  |  |

## Called from

- [system/help/index.php](/code/files/system/help/index.php.md)

