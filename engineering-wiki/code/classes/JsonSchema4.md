# JsonSchema4

> Class in [api/v1/dev/jsonschema4.php](/code/files/api/v1/dev/jsonschema4.php.md), line 17

## Methods

| Method | What it does |
|---|---|
| [__construct()](#__construct) |  |
| [validate()](#validate) |  |
| [err()](#err) |  |
| [resolveRef()](#resolveref) |  |
| [check()](#check) |  |
| [isList()](#islist) |  |
| [isAssoc()](#isassoc) |  |
| [isObject()](#isobject) |  |
| [typeOf()](#typeof) |  |
| [matchesAnyType()](#matchesanytype) |  |
| [matchesType()](#matchestype) |  |
| [inEnum()](#inenum) |  |

### __construct

*public* - line 20

```php
function __construct(array $root)
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$root` | `array` |  |  |

### validate

*public* - line 22

```php
function validate($data, ?array $schema = null, string $path = '#'): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$data` |  |  |  |
| `$schema` | `?array` | `null` |  |
| `$path` | `string` | `'#'` |  |

### err

*private* - line 29

```php
function err(string $path, string $msg)
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$path` | `string` |  |  |
| `$msg` | `string` |  |  |

### resolveRef

*private* - line 31

```php
function resolveRef(string $ref): ?array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$ref` | `string` |  |  |

### check

*private* - line 43

```php
function check($data, array $schema, string $path): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$data` |  |  |  |
| `$schema` | `array` |  |  |
| `$path` | `string` |  |  |

### isList

*private* - line 140

```php
function isList($d): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$d` |  |  |  |

### isAssoc

*private* - line 141

```php
function isAssoc($d): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$d` |  |  |  |

### isObject

*private* - line 142

```php
function isObject($d): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$d` |  |  |  |

### typeOf

*private* - line 144

```php
function typeOf($d): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$d` |  |  |  |

### matchesAnyType

*private* - line 153

```php
function matchesAnyType($d, array $types): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$d` |  |  |  |
| `$types` | `array` |  |  |

### matchesType

*private* - line 157

```php
function matchesType($d, string $t): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$d` |  |  |  |
| `$t` | `string` |  |  |

### inEnum

*private* - line 169

```php
function inEnum($d, array $enum): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$d` |  |  |  |
| `$enum` | `array` |  |  |

