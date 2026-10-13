# cardDavBuildCard()

Build the new card. vCard 3.0: what the fixture, Baikal, Nextcloud and iCloud all store, and what `cdsyncMapCard()` reads.

```php
function cardDavBuildCard(string $uid, array $preview, ?string $organisation): string
```

Defined in [includes/carddav_create.php](/code/files/includes/carddav_create.php.md), line 118.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$uid` | `string` |  |  |
| `$preview` | `array` |  |  |
| `$organisation` | `?string` |  |  |

**Returns:** `string`

## Called from

- [includes/carddav_create.php](/code/files/includes/carddav_create.php.md) - in [cardDavCreateContact()](/code/functions/cardDavCreateContact.md)

