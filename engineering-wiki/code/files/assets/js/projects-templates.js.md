# assets/js/projects-templates.js

> JavaScript - 80 lines

Projects - save this project as a template (3.2.0).

The Template button on the project banner, shown only to analysts with the
Templates permission (lookups.can_manage_templates - the server checks it
again). The dialog picks which parts to keep; people, the company, links and
progress are never kept (includes/projects/templates.php explains why).
"Replace one of your templates" overwrites a saved template's plan with
this project's - how a template is edited (start a project from it, change
it, save it back). Built-ins cannot be replaced, only copied.
Starting a project FROM a template is the picker in the project form
(assets/js/projects.js).

## Functions

| Function | Line | What it does |
|---|--:|---|
| `$(id)` | 29 |  |
| `mode()` | 32 |  |
| `projectName()` | 33 |  |
| `fillFromMode()` | 35 | New: the project's name. Replace: the chosen template's name and description. |

## Loaded by

- [projects/view.php](/code/files/projects/view.php.md)

