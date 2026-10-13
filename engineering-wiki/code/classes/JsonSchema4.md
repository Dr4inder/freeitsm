# JsonSchema4

> Class in [api/v1/dev/jsonschema4.php](/code/files/api/v1/dev/jsonschema4.php.md), line 17

## Methods

| Method | What it does |
|---|---|
| [__construct()](#__construct) | Keeps the root schema, which `$ref` pointers are resolved against. |
| [validate()](#validate) | Validates data against a schema (the root schema by default), adding any failures to `$errors`. |
| [err()](#err) | Records one validation failure as "path: message". |
| [resolveRef()](#resolveref) | Follows a local JSON pointer (`$ref` starting #/) through the root schema, decoding ~1 and ~0, and returns the schema it points at - null when it is external or missing. |
| [check()](#check) | Checks one value against one schema and records every failure: `$ref`, allOf / anyOf / oneOf / not, type, enum, then the object, array, string and number keywords the OpenAPI 3.0 meta-schema uses. |
| [isList()](#islist) | Whether a PHP array is a JSON list - an empty array counts as both list and object. |
| [isAssoc()](#isassoc) | Whether a PHP array is a non-empty JSON object (not a list). |
| [isObject()](#isobject) | Whether a value is a JSON object - an associative array, or an empty array. |
| [typeOf()](#typeof) | The JSON Schema type name of a PHP value, for error messages. |
| [matchesAnyType()](#matchesanytype) | Whether a value matches at least one of the given JSON Schema types. |
| [matchesType()](#matchestype) | Whether a value matches one JSON Schema type - integer is a PHP int only, number an int or float. |
| [inEnum()](#inenum) | Whether a value is one of an enum's values, comparing strictly and then by JSON encoding (so arrays and objects match). |

### __construct

*public* - line 21

Keeps the root schema, which `$ref` pointers are resolved against.

```php
function __construct(array $root)
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$root` | `array` |  |  |

### validate

*public* - line 29

Validates data against a schema (the root schema by default), adding any failures to `$errors`.

```php
function validate($data, ?array $schema = null, string $path = '#'): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$data` |  |  |  |
| `$schema` | `?array` | `null` |  |
| `$path` | `string` | `'#'` |  |

**Returns:** bool  true when this call added no errors

### err

*private* - line 37

Records one validation failure as "path: message".

```php
function err(string $path, string $msg)
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$path` | `string` |  |  |
| `$msg` | `string` |  |  |

### resolveRef

*private* - line 44

Follows a local JSON pointer (`$ref` starting #/) through the root schema, decoding ~1 and ~0, and returns the schema it points at - null when it is external or missing.

```php
function resolveRef(string $ref): ?array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$ref` | `string` |  |  |

### check

*private* - line 64

Checks one value against one schema and records every failure: `$ref`, allOf / anyOf / oneOf / not, type, enum, then the object, array, string and number keywords the OpenAPI 3.0 meta-schema uses.

A type mismatch stops the remaining keyword checks for that value, since they
would only repeat it.

```php
function check($data, array $schema, string $path): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$data` |  |  |  |
| `$schema` | `array` |  |  |
| `$path` | `string` |  |  |

### isList

*private* - line 162

Whether a PHP array is a JSON list - an empty array counts as both list and object.

```php
function isList($d): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$d` |  |  |  |

### isAssoc

*private* - line 164

Whether a PHP array is a non-empty JSON object (not a list).

```php
function isAssoc($d): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$d` |  |  |  |

### isObject

*private* - line 166

Whether a value is a JSON object - an associative array, or an empty array.

```php
function isObject($d): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$d` |  |  |  |

### typeOf

*private* - line 169

The JSON Schema type name of a PHP value, for error messages.

```php
function typeOf($d): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$d` |  |  |  |

### matchesAnyType

*private* - line 179

Whether a value matches at least one of the given JSON Schema types.

```php
function matchesAnyType($d, array $types): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$d` |  |  |  |
| `$types` | `array` |  |  |

### matchesType

*private* - line 187

Whether a value matches one JSON Schema type - integer is a PHP int only, number an int or float.

```php
function matchesType($d, string $t): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$d` |  |  |  |
| `$t` | `string` |  |  |

### inEnum

*private* - line 203

Whether a value is one of an enum's values, comparing strictly and then by JSON encoding (so arrays and objects match).

```php
function inEnum($d, array $enum): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$d` |  |  |  |
| `$enum` | `array` |  |  |

