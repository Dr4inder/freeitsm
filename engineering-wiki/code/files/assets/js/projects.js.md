# assets/js/projects.js

> JavaScript - 452 lines

Projects module (3.2.0) - helpers every Projects page shares.

window.Prj: `api()`, `esc()`, `T()`, the renderers (icon, health ring, status pill,
date phrases), the create / edit project dialog, and `celebrate()` - so the
portfolio and the project page draw a project the same way.

Every URL is built from window.PRJ_API (set by the page from BASE_URL) -
never a root-relative "/api/...", which 404s on an install in a sub-directory.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `T(k, p)` | 14 |  |
| `TC(k, p)` | 15 |  |
| `esc(v)` | 17 |  |
| `api(path, body)` | 22 |  |
| `lookups()` | 38 |  |
| `icon(key, size)` | 66 |  |
| `gradient(key)` | 73 |  |
| `setPalette(list)` | 77 |  |
| `ring(progress, health, size, onDark)` | 87 | A ring whose arc is the progress and whose colour is the health. The percentage sits inside. Finished projects draw a full, calm ring. |
| `statusPill(status)` | 100 |  |
| `setPriorityLabels(l)` | 110 |  |
| `priorityLabel(key)` | 111 |  |
| `priorityChip(key, always)` | 115 |  |
| `healthBadge(health)` | 120 |  |
| `fmtDate(d)` | 126 |  |
| `todayStr()` | 130 |  |
| `daysTo(d)` | 135 | Whole days from today to a Y-m-d (negative = in the past). |
| `targetPhrase(p)` | 141 | "Due in 12 days" / "3 days late" / "Finished 4 Mar" for a project. |
| `initials(name)` | 152 |  |
| `timeboxWord(kind, plural)` | 158 |  |
| `toast(msg, type)` | 162 |  |
| `openModal(id)` | 167 |  |
| `closeModal(id)` | 173 |  |
| `paintBanner()` | 193 |  |
| `pick(containerId, attr, value)` | 206 |  |
| `openProjectForm(project, onSaved)` | 214 |  |
| `$(id)` | 227 |  |
| `templateMeta(t)` | 308 | "4 stages · 16 tasks · 12 weeks" - what a template brings. |
| `n(key, count)` | 309 |  |
| `chooseTemplate(key)` | 315 |  |
| `$(id)` | 317 |  |
| `wireForm()` | 337 |  |
| `$(id)` | 341 |  |
| `showFormError(msg)` | 404 |  |
| `celebrate(fromEl)` | 415 | Confetti from an element, for the moments worth marking (a stage done, a project closed). Pure CSS transforms on a handful of dots, removed after ~1.2s. Respects prefers-reduced-motion by showing nothing but the toast. |

## Loaded by

- [projects/capacity.php](/code/files/projects/capacity.php.md)
- [projects/index.php](/code/files/projects/index.php.md)
- [projects/settings/index.php](/code/files/projects/settings/index.php.md)
- [projects/tutorial.php](/code/files/projects/tutorial.php.md)
- [projects/view.php](/code/files/projects/view.php.md)

