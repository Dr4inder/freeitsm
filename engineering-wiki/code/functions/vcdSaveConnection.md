# vcdSaveConnection()

Save a server from the settings form. Returns its id.

Moved here from api/assets/vcloud_connections.php at merge time, so the rules
are in one place and tests/hypervisor-sync.php runs the real ones.

TRAP: the password is stored only through `encryptValue()`, never returned to
  the browser (vcdConnectionOut() says has_password and nothing more), and a
  blank or all-asterisks value on edit keeps the stored one.

```php
function vcdSaveConnection(PDO $conn, array $in): int
```

Defined in [includes/vcloud_sync.php](/code/files/includes/vcloud_sync.php.md), line 405.

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  | The database connection. *([standard](/handbook/standard-parameters.md))* |
| `$in` | `array` |  |  |

**Returns:** `int`

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 432 | `vcdSaveConnection` | read [vcloud_connections](/code/tables/vcloud_connections.md) |  |
| 447 | `vcdSaveConnection` | **update** [vcloud_connections](/code/tables/vcloud_connections.md) (`name`, `host`, `org`, `username`, `password_enc`, `api_version`, `verify_ssl`, `is_active`, `sync_interval_minutes`) |  |
| 453 | `vcdSaveConnection` | **insert** [vcloud_connections](/code/tables/vcloud_connections.md) (`name`, `host`, `org`, `username`, `password_enc`, `api_version`, `verify_ssl`, `is_active`, `sync_interval_minutes`) |  |

## Calls

[encryptValue()](/code/functions/encryptValue.md)

## Called from

- [api/assets/vcloud_connections.php](/code/files/api/assets/vcloud_connections.php.md)

