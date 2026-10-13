# ouBrowseIsPlumbing()

Active Directory's own furniture, which nobody is importing people from.

Only containers directly under the root are judged: an OU somebody has
genuinely called "System" deeper in their own tree is theirs, not ours to
hide. Being wrong here hides part of somebody's directory, so the list is
deliberately short and only covers what AD creates itself.

```php
function ouBrowseIsPlumbing(string $dn, string $root): bool
```

Defined in [api/system/browse_directory_ous.php](/code/files/api/system/browse_directory_ous.php.md), line 219.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$dn` | `string` |  |  |
| `$root` | `string` |  |  |

**Returns:** `bool`

## Calls

[ouBrowseParent()](/code/functions/ouBrowseParent.md)

## Called from

- [api/system/browse_directory_ous.php](/code/files/api/system/browse_directory_ous.php.md)

