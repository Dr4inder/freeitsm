# FormsService

> Class in [includes/services/forms.php](/code/files/includes/services/forms.php.md), line 40

## Methods

| Method | What it does |
|---|---|
| [isAnswerable()](#isanswerable) | Does this field type collect an answer? |
| [presentationalSqlExclusion()](#presentationalsqlexclusion) | A SQL fragment excluding the presentational types: `field_type NOT IN (…)`. |
| [lookupSourceOf()](#lookupsourceof) | Which source this lookup points at, or null if it is not configured yet. |
| [lookupPortalAllowed()](#lookupportalallowed) | May this particular field be used by a customer on the portal? |
| [lookupTenantClause()](#lookuptenantclause) | The company-scope SQL for a lookup source, shared by the search and the submit-time guard so the two can never disagree about what is in scope. |
| [lookupSearch()](#lookupsearch) | Search one lookup source, scoped to what the person asking may see. |
| [lookupValueAllowed()](#lookupvalueallowed) | Is this exact record one the person answering was allowed to pick? |
| [dateModeOf()](#datemodeof) | The mode a 'datetime' field is in, defaulting for a field saved before modes existed or by an adapter that didn't send one. |
| [collectionsAvailable()](#collectionsavailable) | 🔴 Is the collections schema actually here? |
| [closeEffect()](#closeeffect) | What closing a collection means on this install. An operator setting rather than a property of the collection, because organisations disagree about what "closed" implies and there is no right answer to hard-code. |
| [listCollections()](#listcollections) | Collections, newest first, each with how many forms point at it and how many submissions carry its stamp. |
| [collectionForms()](#collectionforms) | The leaf forms currently paired to a collection, for the settings list. |
| [setCollectionForms()](#setcollectionforms) | Set exactly which forms belong to a collection, from the collection's side. Ed asked for this as well as the per-form control on the forms list; both write through the same column, so they cannot disagree. |
| [formsForPicker()](#formsforpicker) | Every leaf form, with the collection it is in — the picker's whole list, so somebody choosing can see what a tick would take away from where. |
| [collectionSubmissions()](#collectionsubmissions) | Every submission stamped into a collection, across all its forms, newest first — plus the field definitions of each form involved, because a collection's rows do not share a set of questions and both the detail panel and the PDF need the right ones. |
| [requireCollections()](#requirecollections) |  |
| [saveCollection()](#savecollection) | Create or rename. Returns the id. |
| [setCollectionClosed()](#setcollectionclosed) | Close or reopen. |
| [deleteCollection()](#deletecollection) | Delete, but only while nothing is stamped into it. |
| [submissionsBlockedBy()](#submissionsblockedby) | Is this form's collection closed in a way that stops new submissions? Returns the collection name when it is, null when it is not. |
| [portalCatalogueFilter()](#portalcataloguefilter) | A SQL fragment for the portal catalogue: forms whose collection is closed are not offered, but only when the operator chose 'stop_and_hide'. Returns '' when nothing should be filtered, so callers can concatenate. |
| [saveForm()](#saveform) |  |
| [deleteForm()](#deleteform) | Delete one version (leaf only) or the whole chain. Returns ['id','versions_deleted']. |
| [encodeActionLists()](#encodeactionlists) | Validate and encode the three action lists for storage. |
| [actionLists()](#actionlists) | A form's three action lists (#95): what to do when it is submitted, approved or rejected. |
| [createVersion()](#createversion) | Fork the leaf into a new version. Returns ['id','version_number']. |
| [submitForm()](#submitform) | Validate + record a submission, then dispatch form.submitted. `$data` is a field_id => value map. Returns the submission id. |
| [deleteSubmission()](#deletesubmission) | Delete a submission (+ its data). `$formId` scopes the 404 when supplied. Returns the id. |
| [loadFormRow()](#loadformrow) | Load a form row (with child_count for the leaf check), or throw 404. |
| [requireLeaf()](#requireleaf) | 409 unless the form is the chain leaf (the current editable version). |
| [validateFields()](#validatefields) | Validate an incoming fields array — 422s where the raw UI silently drops or blindly stores. Returns rows ready for the id-based sync. |
| [parseOptionList()](#parseoptionlist) | An option list, from whatever shape it is stored in. |
| [gridColumns()](#gridcolumns) |  |
| [gridLiveColumns()](#gridlivecolumns) | The columns a NEW row may be filled in against — retired ones excluded. |
| [gridToText()](#gridtotext) | A grid's answer as readable text — one line per row, each cell prefixed with its column's label. |
| [gridRows()](#gridrows) |  |
| [audiencesAvailable()](#audiencesavailable) |  |
| [formAudiences()](#formaudiences) | The people groups a form is restricted to. Empty means everyone. |
| [setFormAudiences()](#setformaudiences) | Replace a form's audience. An empty list means everyone. |
| [portalAudienceSql()](#portalaudiencesql) | 🔴 THE ONE PLACE THAT DECIDES. Every portal entry point asks this — the catalogue list, opening a form by id, saving a draft, fetching an image, and submitting. A restriction enforced in four places is a restriction that will be enforced in three of them by the end of the year. |
| [portalCanUseForm()](#portalcanuseform) | The same decision as a yes/no, for an endpoint that already has one form. |
| [draftsAvailable()](#draftsavailable) | Does this database have the drafts table yet? |
| [saveDraft()](#savedraft) | Save (or overwrite) somebody's draft of a form. |
| [loadDraft()](#loaddraft) | Somebody's draft of a form, or null. |
| [deleteDraft()](#deletedraft) | Throw a draft away. Idempotent — deleting one that is gone is not an error. |
| [draftsForOwner()](#draftsforowner) | Which of these forms this person has a draft of, as form_id => modified_date. |
| [layoutAvailable()](#layoutavailable) | Does this database have the layout column yet? |
| [deriveLayout()](#derivelayout) | The flow layout a form has implicitly always had: its fields in sort_order, packed into rows of twelve by their widths. |
| [fieldWidthOf()](#fieldwidthof) | A field's width in twelfths, defaulting to full. Absent is every old field. |
| [layoutFor()](#layoutfor) | The layout to render a form with: the stored one if it has one, otherwise the derived flow. |
| [reconcileLayout()](#reconcilelayout) | Make a stored layout agree with the fields that actually exist. |
| [normaliseCell()](#normalisecell) | One cell, with every value forced into range. |
| [remapLayoutFields()](#remaplayoutfields) | Rewrite a stored layout's field references through an id map. |
| [layoutFieldOrder()](#layoutfieldorder) | Every field id a layout places, in the order it places them. |
| [validateFieldConfig()](#validatefieldconfig) |  |
| [syncFields()](#syncfields) | Sync a form's fields BY ID. |

### isAnswerable

*public static* - line 119

Does this field type collect an answer?

```php
function isAnswerable(?string $type): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$type` | `?string` |  |  |

**Called from:** [api/forms/ai_generate.php](/code/files/api/forms/ai_generate.php.md)

### presentationalSqlExclusion

*public static* - line 132

A SQL fragment excluding the presentational types: `field_type NOT IN (…)`.

🔑 Written as an EXCLUSION rather than a list of questions on purpose. A
new question type is then included automatically, and only a new
presentational type has to be declared — which is the direction that fails
safe. The opposite shape is what left 'grid' out of three lists.

```php
function presentationalSqlExclusion(string $column = 'field_type'): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$column` | `string` | `'field_type'` |  |

**Called from:** [api/forms/get_submissions.php](/code/files/api/forms/get_submissions.php.md)

### lookupSourceOf

*public static* - line 304

Which source this lookup points at, or null if it is not configured yet.

```php
function lookupSourceOf(array $field): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$field` | `array` |  |  |

**Called from:** [api/forms/lookup_search.php](/code/files/api/forms/lookup_search.php.md)

### lookupPortalAllowed

*public static* - line 322

May this particular field be used by a customer on the portal?

Two gates, and BOTH must pass:
  1. the source is `portal_safe` — a staff directory never is, whatever a
     form builder ticks;
  2. the field itself has `config.portal_lookup` set — off by default, so
     nothing is ever exposed by accident. The person building the form
     decides, because they know what that form is for.

```php
function lookupPortalAllowed(array $field): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$field` | `array` |  |  |

**Called from:** [api/forms/lookup_search.php](/code/files/api/forms/lookup_search.php.md)

### lookupTenantClause

*private static* - line 346

The company-scope SQL for a lookup source, shared by the search and the submit-time guard so the two can never disagree about what is in scope.

⚠️ For these tables `tenant_id IS NULL` means "unassigned — treat as the
DEFAULT company's", NOT "shared with everyone". (Knowledge means the
opposite by the same NULL; see tenancyKnowledgeFilter.) So a NULL row is
in scope only when Default itself is, never as a blanket include — and on
a single-company install, where every row is NULL, that is what makes the
feature work at all.

```php
function lookupTenantClause(PDO $conn, array $meta, array $tenantIds): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$meta` | `array` |  |  |
| `$tenantIds` | `array` |  | non-empty; callers handle null/empty themselves. |

**Returns:** array{0:string,1:array} [sql clause, params]

### lookupSearch

*public static* - line 373

Search one lookup source, scoped to what the person asking may see.

⚠️ THE SCOPE IS THE WHOLE FEATURE. A lookup is a search box over records
we already hold, so getting `$tenantIds` wrong turns a convenience into a
disclosure — one client browsing another's asset register. It is passed in
rather than derived here, because the two callers know different things:
an analyst has accessible companies, a portal user has exactly one.

```php
function lookupSearch(
    PDO $conn,
    string $source,
    string $term,
    ?array $tenantIds,
    int $limit = 20
): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$source` | `string` |  |  |
| `$term` | `string` |  |  |
| `$tenantIds` | `?array` |  | companies whose rows may be returned. `null` means UNRESTRICTED and is only ever correct for an analyst who can see every company. There is no "all" string — a typo in a string would silently mean everything. |
| `$limit` | `int` | `20` |  |

**Returns:** array [['id'=>int,'label'=>string], …]

**Called from:** [api/forms/lookup_search.php](/code/files/api/forms/lookup_search.php.md)

### lookupValueAllowed

*public static* - line 437

Is this exact record one the person answering was allowed to pick?

The generalisation of the rule already applied to dropdowns — *"a choice
field must be answered with one of ITS OWN choices"* — to a list that is
built at answer time. Without it the stored id is whatever the client
posted, and a crafted submission could name a record from another company
that then appears, resolved and labelled, on a submission an analyst reads.

```php
function lookupValueAllowed(PDO $conn, string $source, int $id, ?array $tenantIds): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$source` | `string` |  |  |
| `$id` | `int` |  |  |
| `$tenantIds` | `?array` |  |  |

### dateModeOf

*public static* - line 480

The mode a 'datetime' field is in, defaulting for a field saved before modes existed or by an adapter that didn't send one.

```php
function dateModeOf(array $field): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$field` | `array` |  |  |

### collectionsAvailable

*public static* - line 512

🔴 Is the collections schema actually here?

A new column has to survive being absent. Someone who pulls the code and
has not yet run DB Verification must get the forms module they had
yesterday, not a wall of 500s - so every read and write below is guarded
by this, and with it false the feature is simply not offered.

Cached per request: this is an information_schema query and the forms
list would otherwise run it once per form.

```php
function collectionsAvailable(PDO $conn): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Called from:** [api/forms/get_collections.php](/code/files/api/forms/get_collections.php.md), [api/forms/get_forms.php](/code/files/api/forms/get_forms.php.md)

### closeEffect

*public static* - line 541

What closing a collection means on this install. An operator setting rather than a property of the collection, because organisations disagree about what "closed" implies and there is no right answer to hard-code.

```php
function closeEffect(PDO $conn): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 546 | `FormsService::closeEffect` | read [system_settings](/code/tables/system_settings.md) |  |

**Called from:** [api/forms/get_collections.php](/code/files/api/forms/get_collections.php.md)

### listCollections

*public static* - line 566

Collections, newest first, each with how many forms point at it and how many submissions carry its stamp.

⚠️ The form count is over LEAVES only. A form's history is a chain of
rows all carrying collection_id, so counting rows would report "Staff
Survey 2026 - 4 forms" for one form that had been edited three times.
The submission count is not filtered that way on purpose: every one of
those IS a real submission, whichever version it came from.

```php
function listCollections(PDO $conn): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 570 | `FormsService::listCollections` | read [forms](/code/tables/forms.md), read [form_submissions](/code/tables/form_submissions.md), read [form_collections](/code/tables/form_collections.md), read [analysts](/code/tables/analysts.md) |  |

**Called from:** [api/forms/get_collections.php](/code/files/api/forms/get_collections.php.md)

### collectionForms

*public static* - line 585

The leaf forms currently paired to a collection, for the settings list.

```php
function collectionForms(PDO $conn, int $collectionId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$collectionId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 589 | `FormsService::collectionForms` | read [forms](/code/tables/forms.md) |  |

**Called from:** [api/forms/get_collections.php](/code/files/api/forms/get_collections.php.md)

### setCollectionForms

*public static* - line 616

Set exactly which forms belong to a collection, from the collection's side. Ed asked for this as well as the per-form control on the forms list; both write through the same column, so they cannot disagree.

🔑 A form belongs to AT MOST ONE collection, so adding one that is
already in another MOVES it. That is a real consequence and the caller
has to have said it out loud - the returned `moved` list is what the
screen uses to do so.

🔴 Touches `forms` ONLY. Submissions already made keep the collection
they were filed under: unlinking a form here must not rewrite history,
which is the entire point of the second column.

```php
function setCollectionForms(PDO $conn, ActorContext $ctx, int $collectionId, array $formIds): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$collectionId` | `int` |  |  |
| `$formIds` | `array` |  | leaf form ids that should be in the collection |

**Returns:** array{added:int,removed:int,moved:array}

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 620 | `FormsService::setCollectionForms` | read [form_collections](/code/tables/form_collections.md) |  |
| 635 | `FormsService::setCollectionForms` | read [forms](/code/tables/forms.md) |  |
| 659 | `FormsService::setCollectionForms` | **update** [forms](/code/tables/forms.md) (`collection_id`, `modified_by`, `modified_date`) |  |
| 663 | `FormsService::setCollectionForms` | **update** [forms](/code/tables/forms.md) (`collection_id`, `modified_by`, `modified_date`) |  |
| 673 | `FormsService::setCollectionForms` | **update** [forms](/code/tables/forms.md) (`collection_id`, `modified_by`, `modified_date`) |  |

**Called from:** [api/forms/save_collection_forms.php](/code/files/api/forms/save_collection_forms.php.md)

### formsForPicker

*public static* - line 690

Every leaf form, with the collection it is in — the picker's whole list, so somebody choosing can see what a tick would take away from where.

```php
function formsForPicker(PDO $conn): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 694 | `FormsService::formsForPicker` | read [forms](/code/tables/forms.md), read [form_collections](/code/tables/form_collections.md) |  |

**Called from:** [api/forms/get_collection_form_picker.php](/code/files/api/forms/get_collection_form_picker.php.md)

### collectionSubmissions

*public static* - line 713

Every submission stamped into a collection, across all its forms, newest first — plus the field definitions of each form involved, because a collection's rows do not share a set of questions and both the detail panel and the PDF need the right ones.

🔑 Selected on `form_submissions.collection_id` — the STAMP — not by
joining through the form. A submission made while the form was in this
collection belongs here whatever the form says today, and one made before
it was paired does not. That is the whole reason for the second column.

```php
function collectionSubmissions(PDO $conn, int $collectionId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$collectionId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 718 | `FormsService::collectionSubmissions` | read [form_submissions](/code/tables/form_submissions.md), read [forms](/code/tables/forms.md), read [analysts](/code/tables/analysts.md), read [users](/code/tables/users.md) |  |
| 741 | `FormsService::collectionSubmissions` | read [form_submission_data](/code/tables/form_submission_data.md) |  |
| 759 | `FormsService::collectionSubmissions` | read [form_fields](/code/tables/form_fields.md) |  |

**Called from:** [api/forms/get_collection_submissions.php](/code/files/api/forms/get_collection_submissions.php.md)

### requireCollections

*private static* - line 776

```php
function requireCollections(PDO $conn): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

### saveCollection

*public static* - line 785

Create or rename. Returns the id.

```php
function saveCollection(PDO $conn, ActorContext $ctx, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 803 | `FormsService::saveCollection` | read [form_collections](/code/tables/form_collections.md) |  |
| 810 | `FormsService::saveCollection` | **update** [form_collections](/code/tables/form_collections.md) (`name`, `description`, `modified_date`) |  |
| 813 | `FormsService::saveCollection` | read [form_collections](/code/tables/form_collections.md) |  |
| 821 | `FormsService::saveCollection` | **insert** [form_collections](/code/tables/form_collections.md) (`name`, `description`, `created_by`, `created_date`, `modified_date`) |  |

**Called from:** [api/forms/save_collection.php](/code/files/api/forms/save_collection.php.md)

### setCollectionClosed

*public static* - line 836

Close or reopen.

🔴 Writes to form_collections and NOTHING ELSE. If closing stamped
is_portal_visible = 0 on the forms, reopening would turn them all back
on - including one deliberately kept off the portal. What closing means
is asked at the moment somebody tries to fill the form in; see
`submissionsBlockedBy()` and `portalHiddenBy()`.

```php
function setCollectionClosed(PDO $conn, ActorContext $ctx, int $id, bool $closed): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$id` | `int` |  |  |
| `$closed` | `bool` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 841 | `FormsService::setCollectionClosed` | **update** [form_collections](/code/tables/form_collections.md) (`closed_datetime`, `closed_by`, `modified_date`) |  |
| 842 | `FormsService::setCollectionClosed` | **update** [form_collections](/code/tables/form_collections.md) (`closed_datetime`, `closed_by`, `modified_date`) |  |
| 847 | `FormsService::setCollectionClosed` | read [form_collections](/code/tables/form_collections.md) |  |

**Called from:** [api/forms/set_collection_closed.php](/code/files/api/forms/set_collection_closed.php.md)

### deleteCollection

*public static* - line 862

Delete, but only while nothing is stamped into it.

🔑 A collection holding submissions is CLOSABLE, not deletable. The
database enforces this too (no ON DELETE rule on the submission FK), but
a raw constraint error is not an explanation, so say it here.

```php
function deleteCollection(PDO $conn, ActorContext $ctx, int $id): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 865 | `FormsService::deleteCollection` | read [form_submissions](/code/tables/form_submissions.md) |  |
| 872 | `FormsService::deleteCollection` | **delete** [form_collections](/code/tables/form_collections.md) |  |

**Called from:** [api/forms/delete_collection.php](/code/files/api/forms/delete_collection.php.md)

### submissionsBlockedBy

*public static* - line 885

Is this form's collection closed in a way that stops new submissions? Returns the collection name when it is, null when it is not.

🔑 Asked at the moment it matters, never stored. `is_active` remains the
form's OWN switch - two independent reasons a form may be shut, and
neither overwrites the other.

```php
function submissionsBlockedBy(PDO $conn, int $formId): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$formId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 891 | `FormsService::submissionsBlockedBy` | read [forms](/code/tables/forms.md), read [form_collections](/code/tables/form_collections.md) |  |

### portalCatalogueFilter

*public static* - line 912

A SQL fragment for the portal catalogue: forms whose collection is closed are not offered, but only when the operator chose 'stop_and_hide'. Returns '' when nothing should be filtered, so callers can concatenate.

⚠️ NOT EXISTS rather than a LEFT JOIN with IS NULL: a form with no
collection at all must stay in the catalogue, and that is the common case.

```php
function portalCatalogueFilter(PDO $conn, string $formsAlias = 'f'): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$formsAlias` | `string` | `'f'` |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 916 | `FormsService::portalCatalogueFilter` | read [form_collections](/code/tables/form_collections.md) |  |

**Called from:** [api/self-service/get_catalogue.php](/code/files/api/self-service/get_catalogue.php.md)

### saveForm

*public static* - line 921

```php
function saveForm(PDO $conn, ActorContext $ctx, array $in): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 954 | `FormsService::saveForm` | **update** [forms](/code/tables/forms.md) (`title`, `description`, `is_active`, `is_portal_visible`, `requires_approval`, `approver_id`, `submission_actions`, `modified_by`) |  |
| 1007 | `FormsService::saveForm` | **insert** [forms](/code/tables/forms.md) (`title`, `description`, `is_active`, `is_portal_visible`, `requires_approval`, `approver_id`, `submission_actions`, `created_by`, `modified_by`, `version_number`, `created_date`, `modified_date`) |  |

**Called from:** [api/forms/save_form.php](/code/files/api/forms/save_form.php.md), [api/v1/resources/forms.php](/code/files/api/v1/resources/forms.php.md)

### deleteForm

*public static* - line 1038

Delete one version (leaf only) or the whole chain. Returns ['id','versions_deleted'].

```php
function deleteForm(PDO $conn, ActorContext $ctx, int $id, bool $chain = false): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$id` | `int` |  |  |
| `$chain` | `bool` | `false` |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1046 | `FormsService::deleteForm` | read [forms](/code/tables/forms.md) |  |
| 1057 | `FormsService::deleteForm` | read [forms](/code/tables/forms.md) |  |
| 1075 | `FormsService::deleteForm` | **delete** [form_submission_data](/code/tables/form_submission_data.md), read [form_submissions](/code/tables/form_submissions.md) |  |
| 1079 | `FormsService::deleteForm` | **delete** [form_submissions](/code/tables/form_submissions.md) |  |
| 1080 | `FormsService::deleteForm` | **delete** [form_fields](/code/tables/form_fields.md) |  |
| 1083 | `FormsService::deleteForm` | **delete** [forms](/code/tables/forms.md) |  |

**Called from:** [api/forms/delete_form.php](/code/files/api/forms/delete_form.php.md), [api/v1/resources/forms.php](/code/files/api/v1/resources/forms.php.md)

### encodeActionLists

*private static* - line 1106

Validate and encode the three action lists for storage.

Explicit NULL stores NULL — "never configured", the state that keeps a
pre-#95 form behaving exactly as it did. Anything else is normalised to
the three known keys holding lists of {type, args}, so a malformed or
hostile payload cannot put arbitrary structure into the column that the
engine will later hand to an action handler.

```php
function encodeActionLists($value): ?string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$value` |  |  |  |

### actionLists

*public static* - line 1153

A form's three action lists (#95): what to do when it is submitted, approved or rejected.

🔑 NULL and [] mean DIFFERENT things and the difference is load-bearing.
NULL is "never configured" — the pre-#95 behaviour applies, which is what
lets this ship without a data migration: every form that existed before
keeps doing exactly what it did, including raising a ticket on approval
the hard-coded way. [] is "somebody opened the panel and chose nothing",
and must be obeyed as the deliberate instruction it is.

A malformed value is treated as NULL rather than thrown: a form must stay
submittable even if its configuration is nonsense.

```php
function actionLists(PDO $conn, int $formId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$formId` | `int` |  |  |

**Returns:** array{submitted: ?array, approved: ?array, rejected: ?array}

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1157 | `FormsService::actionLists` | read [forms](/code/tables/forms.md) |  |

**Called from:** [includes/catalogue_approvals.php](/code/files/includes/catalogue_approvals.php.md)

### createVersion

*public static* - line 1174

Fork the leaf into a new version. Returns ['id','version_number'].

```php
function createVersion(PDO $conn, ActorContext $ctx, int $parentId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$parentId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1201 | `FormsService::createVersion` | **insert** [forms](/code/tables/forms.md) (`title`, `description`, `is_active`, `is_portal_visible`, `requires_approval`, `approver_id`, `submission_actions`, `created_by`, `modified_by`, `parent_form_id`, `version_number{$colSql}`, `created_date`) |  |
| 1272 | `FormsService::createVersion` | read [form_fields](/code/tables/form_fields.md) |  |
| 1281 | `FormsService::createVersion` | **insert** [form_fields](/code/tables/form_fields.md) (`form_id`, `field_type`, `label`, `options`, `is_required`, `sort_order`, `config`) |  |
| 1290 | `FormsService::createVersion` | **update** [form_fields](/code/tables/form_fields.md) (`config`) |  |
| 1311 | `FormsService::createVersion` | **update** [forms](/code/tables/forms.md) (`layout`) |  |
| 1327 | `FormsService::createVersion` | **insert** [form_audiences](/code/tables/form_audiences.md) (`form_id`, `principal_type`, `principal_id`) |  |

**Called from:** [api/forms/create_version.php](/code/files/api/forms/create_version.php.md), [api/v1/resources/forms.php](/code/files/api/v1/resources/forms.php.md)

### submitForm

*public static* - line 1357

Validate + record a submission, then dispatch form.submitted. `$data` is a field_id => value map. Returns the submission id.

```php
function submitForm(
    PDO $conn,
    ActorContext $ctx,
    int $formId,
    array $data,
    ?int $portalUserId = null
): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$formId` | `int` |  |  |
| `$data` | `array` |  |  |
| `$portalUserId` | `?int` | `null` | a REQUESTER (users.id) submitting through the self-service request catalogue, or null for the analyst paths. It is a separate argument rather than `$ctx`->actorId because the two are DIFFERENT ID SPACES. `submitted_by` has no foreign key and every reader LEFT JOINs it to `analysts`, so writing a users.id there would silently attribute a customer's request to whichever analyst happened to share the number. They go in different columns and exactly one is set. |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1400 | `FormsService::submitForm` | read [form_fields](/code/tables/form_fields.md) |  |
| 1671 | `FormsService::submitForm` | **insert** [form_submissions](/code/tables/form_submissions.md) (`$cols`) |  |
| 1674 | `FormsService::submitForm` | **insert** [form_submission_data](/code/tables/form_submission_data.md) (`submission_id`, `field_id`, `field_value`) |  |

**Called from:** [api/forms/submit_form.php](/code/files/api/forms/submit_form.php.md), [api/self-service/submit_catalogue_form.php](/code/files/api/self-service/submit_catalogue_form.php.md), [api/v1/resources/forms.php](/code/files/api/v1/resources/forms.php.md)

### deleteSubmission

*public static* - line 1766

Delete a submission (+ its data). `$formId` scopes the 404 when supplied. Returns the id.

```php
function deleteSubmission(PDO $conn, ActorContext $ctx, int $submissionId, ?int $formId = null): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$submissionId` | `int` |  |  |
| `$formId` | `?int` | `null` |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1769 | `FormsService::deleteSubmission` | read [form_submissions](/code/tables/form_submissions.md) |  |
| 1775 | `FormsService::deleteSubmission` | read [form_submissions](/code/tables/form_submissions.md) |  |
| 1783 | `FormsService::deleteSubmission` | **delete** [form_submission_data](/code/tables/form_submission_data.md) |  |
| 1784 | `FormsService::deleteSubmission` | **delete** [form_submissions](/code/tables/form_submissions.md) |  |

**Called from:** [api/forms/delete_submission.php](/code/files/api/forms/delete_submission.php.md), [api/v1/resources/forms.php](/code/files/api/v1/resources/forms.php.md)

### loadFormRow

*private static* - line 1798

Load a form row (with child_count for the leaf check), or throw 404.

```php
function loadFormRow(PDO $conn, int $id): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 1801 | `FormsService::loadFormRow` | read [forms](/code/tables/forms.md) |  |

### requireLeaf

*private static* - line 1813

409 unless the form is the chain leaf (the current editable version).

```php
function requireLeaf(array $formRow): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$formRow` | `array` |  |  |

### validateFields

*private static* - line 1833

Validate an incoming fields array — 422s where the raw UI silently drops or blindly stores. Returns rows ready for the id-based sync.

Each row may carry an `id`: the form_fields.id it is editing. Absent (or null)
means a brand-new field. That id is what keeps a respondent's answer attached
to the question they actually answered when the builder reorders things.

A conditional rule's `field` may be either an existing form_fields.id or the
string "idx:N", meaning "the field at position N of THIS payload" — needed
because a rule can point at a question that is itself being created by this
same save and has no id yet. `syncFields()` resolves "idx:N" once the ids exist.

```php
function validateFields(array $fields): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$fields` | `array` |  |  |

### parseOptionList

*private static* - line 1917

An option list, from whatever shape it is stored in.

🔑 Mirrors FormLogic.parseOptions() exactly: options are a JSON ARRAY,
not a newline-separated string. Guessing the other way here would have
split "A, B" into one option and shown it as two on screen — the two
halves of one rule disagreeing, which is the failure this codebase keeps
writing warnings about.

```php
function parseOptionList($raw): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$raw` |  |  |  |

### gridColumns

*public static* - line 1933

```php
function gridColumns(array $field): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$field` | `array` |  |  |

**Called from:** [api/v1/resources/forms.php](/code/files/api/v1/resources/forms.php.md)

### gridLiveColumns

*public static* - line 1948

The columns a NEW row may be filled in against — retired ones excluded.

```php
function gridLiveColumns(array $field): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$field` | `array` |  |  |

### gridToText

*public static* - line 1972

A grid's answer as readable text — one line per row, each cell prefixed with its column's label.

Used wherever a grid has to become a single string: the workflow payload
handed to automations, and anywhere else that expects one value per
question. The PDF and the submissions table render a real table instead,
because they have the room.

⚠️ Labels come from `gridColumns()`, which INCLUDES retired ones — a value
stored against a column since withdrawn still says what it was, rather
than appearing as an unexplained extra.

```php
function gridToText(array $field, $raw): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$field` | `array` |  |  |
| `$raw` |  |  |  |

**Called from:** [includes/catalogue_approvals.php](/code/files/includes/catalogue_approvals.php.md)

### gridRows

*public static* - line 1988

```php
function gridRows($raw): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$raw` |  |  |  |

**Called from:** [api/v1/resources/forms.php](/code/files/api/v1/resources/forms.php.md)

### audiencesAvailable

*public static* - line 2018

```php
function audiencesAvailable(PDO $conn): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Called from:** [api/forms/audience.php](/code/files/api/forms/audience.php.md), [api/forms/get_forms.php](/code/files/api/forms/get_forms.php.md)

### formAudiences

*public static* - line 2036

The people groups a form is restricted to. Empty means everyone.

```php
function formAudiences(PDO $conn, int $formId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$formId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 2040 | `FormsService::formAudiences` | read [form_audiences](/code/tables/form_audiences.md) |  |

**Called from:** [api/forms/audience.php](/code/files/api/forms/audience.php.md)

### setFormAudiences

*public static* - line 2055

Replace a form's audience. An empty list means everyone.

⚠️ Ids are checked against real, active groups rather than trusted. A
typo that stored a group id which does not exist would restrict the form
to nobody — and it would look identical to "restricted to a group" from
the outside, which is the worst kind of wrong.

```php
function setFormAudiences(PDO $conn, int $formId, array $groupIds): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$formId` | `int` |  |  |
| `$groupIds` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 2066 | `FormsService::setFormAudiences` | read [knowledge_user_groups](/code/tables/knowledge_user_groups.md) |  |
| 2079 | `FormsService::setFormAudiences` | **delete** [form_audiences](/code/tables/form_audiences.md) |  |
| 2083 | `FormsService::setFormAudiences` | **insert** [form_audiences](/code/tables/form_audiences.md) (`form_id`, `principal_type`, `principal_id`) |  |

**Called from:** [api/forms/audience.php](/code/files/api/forms/audience.php.md)

### portalAudienceSql

*public static* - line 2107

🔴 THE ONE PLACE THAT DECIDES. Every portal entry point asks this — the catalogue list, opening a form by id, saving a draft, fetching an image, and submitting. A restriction enforced in four places is a restriction that will be enforced in three of them by the end of the year.

Returns a SQL fragment for `WHERE …`, with `:audUser` to bind. Written as
a fragment rather than a helper that runs its own query because the list
has to FILTER rather than ask once per row.

⚠️ The membership check honours `expires_at`: a people group carries a
per-member expiry and a lapsed member is not a member.

```php
function portalAudienceSql(PDO $conn, string $formAlias = 'f'): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$formAlias` | `string` | `'f'` |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 2110 | `FormsService::portalAudienceSql` | read [form_audiences](/code/tables/form_audiences.md), read [knowledge_user_group_members](/code/tables/knowledge_user_group_members.md), read [knowledge_user_groups](/code/tables/knowledge_user_groups.md) |  |

**Called from:** [api/forms/image.php](/code/files/api/forms/image.php.md), [api/self-service/draft.php](/code/files/api/self-service/draft.php.md), [api/self-service/get_catalogue.php](/code/files/api/self-service/get_catalogue.php.md), [api/self-service/get_catalogue_form.php](/code/files/api/self-service/get_catalogue_form.php.md)

### portalCanUseForm

*public static* - line 2126

The same decision as a yes/no, for an endpoint that already has one form.

```php
function portalCanUseForm(PDO $conn, int $formId, int $userId): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$formId` | `int` |  |  |
| `$userId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 2129 | `FormsService::portalCanUseForm` | read [forms](/code/tables/forms.md) |  |

### draftsAvailable

*public static* - line 2144

Does this database have the drafts table yet?

```php
function draftsAvailable(PDO $conn): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

### saveDraft

*public static* - line 2171

Save (or overwrite) somebody's draft of a form.

🔴 NOTHING HERE IS VALIDATED AGAINST THE FORM. Not being finished is the
whole point: a required field may be empty, a conditional branch may be
half-answered, a number box may hold the word "tbc". Validation happens on
SUBMIT, which is a different act. What IS enforced is the shape — keys
must be field ids belonging to this form, so a crafted post cannot use a
draft as somewhere to park arbitrary data.

```php
function saveDraft(PDO $conn, int $formId, string $ownerKind, int $ownerId, array $answers): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$formId` | `int` |  |  |
| `$ownerKind` | `string` |  |  |
| `$ownerId` | `int` |  |  |
| `$answers` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 2188 | `FormsService::saveDraft` | read [form_fields](/code/tables/form_fields.md) |  |
| 2215 | `FormsService::saveDraft` | **insert** [form_drafts](/code/tables/form_drafts.md) (`form_id`, `owner_kind`, `owner_id`, `answers`, `created_date`, `modified_date`) |  |

**Called from:** [api/forms/draft.php](/code/files/api/forms/draft.php.md), [api/self-service/draft.php](/code/files/api/self-service/draft.php.md)

### loadDraft

*public static* - line 2236

Somebody's draft of a form, or null.

🔴 ALSO REPORTS WHETHER THE FORM HAS MOVED ON. `createVersion()` renumbers
every field, so a draft's answers only mean anything against the version
they were typed into. `stale` true means that version is no longer the
one people fill in — the caller must SAY SO rather than load the answers
into a newer form, where they would attach to whatever now holds those
ids, or to nothing at all.

```php
function loadDraft(PDO $conn, int $formId, string $ownerKind, int $ownerId): ?array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$formId` | `int` |  |  |
| `$ownerKind` | `string` |  |  |
| `$ownerId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 2242 | `FormsService::loadDraft` | read [form_drafts](/code/tables/form_drafts.md) |  |
| 2254 | `FormsService::loadDraft` | read [forms](/code/tables/forms.md) |  |

**Called from:** [api/forms/draft.php](/code/files/api/forms/draft.php.md), [api/self-service/draft.php](/code/files/api/self-service/draft.php.md)

### deleteDraft

*public static* - line 2267

Throw a draft away. Idempotent — deleting one that is gone is not an error.

```php
function deleteDraft(PDO $conn, int $formId, string $ownerKind, int $ownerId): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$formId` | `int` |  |  |
| `$ownerKind` | `string` |  |  |
| `$ownerId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 2271 | `FormsService::deleteDraft` | **delete** [form_drafts](/code/tables/form_drafts.md) |  |

**Called from:** [api/forms/draft.php](/code/files/api/forms/draft.php.md), [api/self-service/draft.php](/code/files/api/self-service/draft.php.md)

### draftsForOwner

*public static* - line 2276

Which of these forms this person has a draft of, as form_id => modified_date.

```php
function draftsForOwner(PDO $conn, string $ownerKind, int $ownerId): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ownerKind` | `string` |  |  |
| `$ownerId` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 2281 | `FormsService::draftsForOwner` | read [form_drafts](/code/tables/form_drafts.md) |  |

### layoutAvailable

*public static* - line 2301

Does this database have the layout column yet?

🔴 Everything below must work with it ABSENT. A new column that only works
after Database Verification breaks every install between the upgrade and
the moment somebody remembers to run it — and the failure would be a form
that will not open.

```php
function layoutAvailable(PDO $conn): bool
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |

**Called from:** [api/forms/get_form.php](/code/files/api/forms/get_form.php.md), [api/self-service/get_catalogue_form.php](/code/files/api/self-service/get_catalogue_form.php.md)

### deriveLayout

*public static* - line 2327

The flow layout a form has implicitly always had: its fields in sort_order, packed into rows of twelve by their widths.

🔑 This is what makes the whole change migration-free. Every form that
predates layouts stores NULL, derives this, and renders exactly as it did
— the packing here is the same arithmetic the CSS grid already does when
it wraps, so the derived rows describe what is already on the screen.

```php
function deriveLayout(array $fields): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$fields` | `array` |  |  |

### fieldWidthOf

*public static* - line 2352

A field's width in twelfths, defaulting to full. Absent is every old field.

```php
function fieldWidthOf(array $field): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$field` | `array` |  |  |

### layoutFor

*public static* - line 2371

The layout to render a form with: the stored one if it has one, otherwise the derived flow.

⚠️ A stored layout is AUTHORITATIVE for order and width. sort_order is
then only the pool's own ordering, which is what the simple builder edits.
Two sources that can disagree is the drift this codebase keeps being bitten
by, so the rule is one sentence long and written down here: **if a layout
exists, it wins; if it does not, sort_order does.**

```php
function layoutFor($stored, array $fields): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$stored` |  |  |  |
| `$fields` | `array` |  |  |

**Called from:** [api/forms/get_form.php](/code/files/api/forms/get_form.php.md), [api/self-service/get_catalogue_form.php](/code/files/api/self-service/get_catalogue_form.php.md)

### reconcileLayout

*private static* - line 2393

Make a stored layout agree with the fields that actually exist.

🔴 THE CASE THAT MATTERS: a question added or retired since the layout was
saved. A field the layout does not mention would silently never render —
the same silent-drop failure as an untaught type, arriving by a different
road. Unplaced fields are therefore appended as their own rows, and cells
pointing at a field that is gone are dropped.

```php
function reconcileLayout(array $layout, array $fields): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$layout` | `array` |  |  |
| `$fields` | `array` |  |  |

### normaliseCell

*private static* - line 2432

One cell, with every value forced into range.

```php
function normaliseCell(array $cell, ?array $field): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$cell` | `array` |  |  |
| `$field` | `?array` |  |  |

### remapLayoutFields

*public static* - line 2459

Rewrite a stored layout's field references through an id map.

Used by `createVersion()`, where every copied field gets a new id. A cell
whose field is not in the map keeps its old id and is therefore dropped on
read — which is right: it refers to a field that did not come forward
(a retired one), and inventing a reference would place the wrong question.

```php
function remapLayoutFields(string $json, array $idMap): string
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$json` | `string` |  |  |
| `$idMap` | `array` |  |  |

### layoutFieldOrder

*public static* - line 2476

Every field id a layout places, in the order it places them.

```php
function layoutFieldOrder(array $layout): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$layout` | `array` |  |  |

### validateFieldConfig

*private static* - line 2487

```php
function validateFieldConfig(
    $config,
    int $i,
    array $fields,
    array $indexById,
    string $type = 'text'
): ?array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$config` |  |  |  |
| `$i` | `int` |  |  |
| `$fields` | `array` |  |  |
| `$indexById` | `array` |  |  |
| `$type` | `string` | `'text'` |  |

### syncFields

*private static* - line 2782

Sync a form's fields BY ID.

This used to be positional — it updated the existing rows in order, so dragging
a question to a new place rewrote the labels while the answers stayed put, and
every historic submission silently started reading against the wrong questions.
Removing a field hard-deleted the trailing row's answers outright. Now each
payload row carries the id it is editing, a field with no id is genuinely new,
and a field that disappears is SOFT deleted so past answers survive.

Two passes: the ids have to exist before a condition that points at a
brand-new field ("idx:N") can be resolved to one.

```php
function syncFields(PDO $conn, int $formId, array $fields): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$formId` | `int` |  |  |
| `$fields` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 2787 | `FormsService::syncFields` | read [form_fields](/code/tables/form_fields.md) |  |
| 2793 | `FormsService::syncFields` | **update** [form_fields](/code/tables/form_fields.md) (`field_type`, `label`, `options`, `is_required`, `sort_order`, `is_deleted`) |  |
| 2798 | `FormsService::syncFields` | **insert** [form_fields](/code/tables/form_fields.md) (`form_id`, `field_type`, `label`, `options`, `is_required`, `sort_order`) |  |
| 2820 | `FormsService::syncFields` | **update** [form_fields](/code/tables/form_fields.md) (`is_deleted`) |  |
| 2823 | `FormsService::syncFields` | **update** [form_fields](/code/tables/form_fields.md) (`is_deleted`) |  |
| 2827 | `FormsService::syncFields` | **update** [form_fields](/code/tables/form_fields.md) (`config`) |  |

