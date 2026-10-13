# contractAssetSetReference()

Change the note on an existing link.

```php
function contractAssetSetReference(PDO $conn, int $analystId, int $linkId, ?string $reference): void
```

Defined in [includes/contract_assets.php](/code/files/includes/contract_assets.php.md), line 189.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$analystId` | `int` |  | The analyst doing this - normally the one signed in. *([standard](/handbook/standard-parameters.md))* |
| `$linkId` | `int` |  |  |
| `$reference` | `?string` |  |  |

**Returns:** `void`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 196 | `contractAssetSetReference` | **update** [contract_assets](/code/tables/contract_assets.md) (`reference`) |  |

## Calls

[contractAssetLoad()](/code/functions/contractAssetLoad.md)

## Called from

- [api/contracts/save_contract_asset.php](/code/files/api/contracts/save_contract_asset.php.md)

