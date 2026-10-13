# api/v1/dev/openapi_verify.php

> API endpoint - 102 lines

Verify the typed OpenAPI response schemas against LIVE responses from a running install. For every GET endpoint it resolves any {id} parameters from a sibling collection, fetches the real response, and validates the `data` payload against the bound schema — OpenAPI-aware (`$ref`, allOf, nullable). Reports type violations AND response fields the schema fails to document.

Usage (CLI only):
  php api/v1/dev/openapi_verify.php <api_key> [base_url]
  FITSM_API_KEY=fitsm_... php api/v1/dev/openapi_verify.php

The key needs read access to the resources you want checked. base_url
defaults to the local install's front controller. Run openapi_fix.php first
to auto-apply the fixes this reports, then re-run this to confirm zero.

## The endpoint

| | |
|---|---|
| URL | `api/v1/dev/openapi_verify.php` |
| Protected by | REST API key |

## Functions

| Function | Line | What it does |
|---|--:|---|
| [oav_get()](/code/functions/oav_get.md) | 28 |  |
| [oav_resolveRef()](/code/functions/oav_resolveRef.md) | 34 |  |
| [oav_validate()](/code/functions/oav_validate.md) | 39 |  |
| [oav_resolvePath()](/code/functions/oav_resolvePath.md) | 72 |  |

## How it hangs together

**Includes:** [api/v1/lib/openapi.php](/code/files/api/v1/lib/openapi.php.md)

**Calls:** [apiV1BuildOpenApi()](/code/functions/apiV1BuildOpenApi.md)

