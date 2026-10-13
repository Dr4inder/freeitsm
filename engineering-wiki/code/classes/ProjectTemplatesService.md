# ProjectTemplatesService

> Class in [includes/services/project_templates.php](/code/files/includes/services/project_templates.php.md), line 27

## Methods

| Method | What it does |
|---|---|
| [createFromTemplate()](#createfromtemplate) | Create a project from template `$key`. `$in` is the new-project form (name, start_date, ...): anything it sets wins over the template. Returns the id. |
| [cleanup()](#cleanup) | Remove a half-built project and the tasks made for it. |
| [saveFromProject()](#savefromproject) | Save a project as a template. `$parts`: plan, scope, raid, benefits (3.3.0), tolerances, targets. Needs the Templates capability - templates are shared by every company on the install. |
| [update()](#update) | Changes a project template's name, description and active flag. |
| [delete()](#delete) | Deletes a project template; projects made from it are untouched. |
| [setBuiltinHidden()](#setbuiltinhidden) | Hide or show a built-in template in the new-project picker. |
| [assertManage()](#assertmanage) | Throws unless the actor holds the Projects templates capability; system callers (actor 0) pass. |
| [nameDesc()](#namedesc) | A validated template name and optional description. |
| [row()](#row) | Loads one project template; throws not found when it does not exist. |

### createFromTemplate

*public static* - line 33

Create a project from template `$key`. `$in` is the new-project form (name, start_date, ...): anything it sets wins over the template. Returns the id.

```php
function createFromTemplate(
    PDO $conn,
    ActorContext $ctx,
    string $key,
    array $in,
    ?int $tenantId
): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$key` | `string` |  |  |
| `$in` | `array` |  |  |
| `$tenantId` | `?int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 59 | `ProjectTemplatesService::createFromTemplate` | **insert** [project_stages](/code/tables/project_stages.md) (`project_id`, `kind`, `name`, `goal`, `start_date`, `end_date`, `position`, `status`, `created_datetime`, `updated_datetime`) |  |
| 77 | `ProjectTemplatesService::createFromTemplate` | **update** [project_stages](/code/tables/project_stages.md) (`gate_kind`) |  |
| 78 | `ProjectTemplatesService::createFromTemplate` | **insert** [project_gate_items](/code/tables/project_gate_items.md) (`project_id`, `stage_id`, `kind`, `title`, `position`, `created_by_id`, `created_datetime`) |  |
| 83 | `ProjectTemplatesService::createFromTemplate` | **insert** [project_milestones](/code/tables/project_milestones.md) (`project_id`, `stage_id`, `name`, `due_date`, `position`, `created_by_analyst_id`, `created_datetime`, `updated_datetime`) |  |
| 92 | `ProjectTemplatesService::createFromTemplate` | **insert** [task_dependencies](/code/tables/task_dependencies.md) (`task_id`, `depends_on_id`, `lag_days`, `created_by_id`, `created_datetime`) |  |
| 100 | `ProjectTemplatesService::createFromTemplate` | **insert** [project_benefits](/code/tables/project_benefits.md) (`project_id`, `title`, `measure`, `unit`, `direction`, `target_value`, `target_date`, `review_date`, `review_months`, `status`, `position`, `created_by_id`) |  |
| 110 | `ProjectTemplatesService::createFromTemplate` | **insert** [project_items](/code/tables/project_items.md) (`project_id`, `title`, `description`, `moscow`, `status`, `position`, `created_datetime`, `updated_datetime`) |  |
| 115 | `ProjectTemplatesService::createFromTemplate` | **insert** [project_raid](/code/tables/project_raid.md) (`project_id`, `type`, `title`, `description`, `probability`, `impact`, `response`, `response_plan`, `status`, `raised_by_id`, `raised_datetime`, `updated_datetime`) |  |
| 120 | `ProjectTemplatesService::createFromTemplate` | **insert** [project_tolerances](/code/tables/project_tolerances.md) (`project_id`, `stage_id`, `dimension`, `value`) |  |
| 127 | `ProjectTemplatesService::createFromTemplate` | **insert** [project_asset_targets](/code/tables/project_asset_targets.md) (`project_id`, `name`, `scope`, `scope_type_id`, `scope_field`, `scope_value`, `done_field`, `done_op`, `done_value`, `target_date`, `position`, `created_by_analyst_id`) |  |

**Called from:** [api/projects/save.php](/code/files/api/projects/save.php.md), [api/v1/resources/projects.php](/code/files/api/v1/resources/projects.php.md)

### cleanup

*private static* - line 150

Remove a half-built project and the tasks made for it.

```php
function cleanup(PDO $conn, int $pid, array $taskIds): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$pid` | `int` |  |  |
| `$taskIds` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 155 | `ProjectTemplatesService::cleanup` | **delete** [tasks](/code/tables/tasks.md) |  |
| 157 | `ProjectTemplatesService::cleanup` | **delete** [project_raid_tasks](/code/tables/project_raid_tasks.md), read [project_raid](/code/tables/project_raid.md) |  |
| 161 | `ProjectTemplatesService::cleanup` | **delete** [projects](/code/tables/projects.md) |  |

### saveFromProject

*public static* - line 177

Save a project as a template. `$parts`: plan, scope, raid, benefits (3.3.0), tolerances, targets. Needs the Templates capability - templates are shared by every company on the install.

With `$in`['id'] it REPLACES that saved template's plan instead - the way a
template is edited: start a project from it, change the project, save it
back. The template keeps its id and whether it is offered; projects
already started from it are untouched. Built-ins have no id, so they can
only be copied, never overwritten.

```php
function saveFromProject(PDO $conn, ActorContext $ctx, int $projectId, array $in): int
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$projectId` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 188 | `ProjectTemplatesService::saveFromProject` | **update** [project_templates](/code/tables/project_templates.md) (`name`, `description`, `content`, `updated_datetime`) |  |
| 192 | `ProjectTemplatesService::saveFromProject` | **insert** [project_templates](/code/tables/project_templates.md) (`name`, `description`, `content`, `is_active`, `created_by_analyst_id`, `created_datetime`, `updated_datetime`) |  |

**Called from:** [api/projects/templates.php](/code/files/api/projects/templates.php.md)

### update

*public static* - line 202

Changes a project template's name, description and active flag.

```php
function update(PDO $conn, ActorContext $ctx, int $id, array $in): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$id` | `int` |  |  |
| `$in` | `array` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 207 | `ProjectTemplatesService::update` | **update** [project_templates](/code/tables/project_templates.md) (`name`, `description`, `is_active`, `updated_datetime`) |  |

**Called from:** [api/projects/templates.php](/code/files/api/projects/templates.php.md)

### delete

*public static* - line 212

Deletes a project template; projects made from it are untouched.

```php
function delete(PDO $conn, ActorContext $ctx, int $id): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 217 | `ProjectTemplatesService::delete` | **delete** [project_templates](/code/tables/project_templates.md) |  |

**Called from:** [api/projects/templates.php](/code/files/api/projects/templates.php.md)

### setBuiltinHidden

*public static* - line 221

Hide or show a built-in template in the new-project picker.

```php
function setBuiltinHidden(PDO $conn, ActorContext $ctx, string $key, bool $hidden): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |
| `$key` | `string` |  |  |
| `$hidden` | `bool` |  |  |

**Called from:** [api/projects/templates.php](/code/files/api/projects/templates.php.md)

### assertManage

*private static* - line 232

Throws unless the actor holds the Projects templates capability; system callers (actor 0) pass.

```php
function assertManage(PDO $conn, ActorContext $ctx): void
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$ctx` | `ActorContext` |  |  |

### nameDesc

*private static* - line 241

A validated template name and optional description.

```php
function nameDesc(array $in): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$in` | `array` |  |  |

### row

*private static* - line 251

Loads one project template; throws not found when it does not exist.

```php
function row(PDO $conn, int $id): array
```

| Parameter | Type | Default | Meaning |
|---|---|---|---|
| `$conn` | `PDO` |  |  |
| `$id` | `int` |  |  |

**Database**

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 254 | `ProjectTemplatesService::row` | read [project_templates](/code/tables/project_templates.md) |  |

