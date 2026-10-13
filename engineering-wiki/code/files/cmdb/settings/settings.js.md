# cmdb/settings/settings.js

> JavaScript - 827 lines

CMDB Settings Page Handles three tabs: Classes (with nested per-class properties), Relationship Types, AI Integration.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `escapeHtml(s)` | 16 |  |
| `slugify(s)` | 20 |  |
| `showInlineToast(msg, isError = false)` | 24 |  |
| `postJson(url, body)` | 32 |  |
| `switchTab(tab)` | 43 |  |
| `loadSidebarMode()` | 63 |  |
| `saveSidebarMode(value)` | 76 |  |
| `loadClasses()` | 92 |  |
| `renderClasses()` | 106 |  |
| `openClassModal(id = null)` | 132 |  |
| `closeClassModal()` | 145 |  |
| `saveClass(ev)` | 147 |  |
| `deleteClass(id, name)` | 168 |  |
| `openPropsModal(classId)` | 198 |  |
| `closePropsModal()` | 206 |  |
| `loadPropsForClass()` | 214 |  |
| `renderProps()` | 228 |  |
| `openPropertyModal(id = null)` | 254 |  |
| `closePropertyModal()` | 282 |  |
| `onPropertyTypeChange()` | 284 |  |
| `saveProperty(ev)` | 309 |  |
| `deleteProperty(id, label)` | 352 |  |
| `loadRelTypes()` | 366 |  |
| `relTypeImpactCell(r)` | 384 | At-a-glance impact setting for the list. Reads with the row's own verbs so a scan of the table answers "which of these actually spread a failure?". |
| `renderRelTypes()` | 393 |  |
| `syncRelTypeImpactOptions()` | 426 | Rewrite the impact-direction options using whatever is currently typed in the verb fields, so the choice reads as a sentence about the analyst's own estate ("everything that depends on it is affected") rather than as jargon. Both impact options share one frame — the only difference is which verb reads correctly from the affected object's side. |
| `openRelTypeModal(id = null)` | 438 |  |
| `closeRelTypeModal()` | 453 |  |
| `saveRelType(ev)` | 455 |  |
| `deleteRelType(id, verb)` | 477 |  |
| `loadCmdbAiExtras()` | 494 |  |
| `saveCmdbAiExtras(ev)` | 505 |  |
| `setAiStage(stage)` | 525 |  |
| `openAiSuggestModal()` | 570 |  |
| `closeAiSuggestModal()` | 594 |  |
| `renderAiQuestions()` | 599 |  |
| `collectAiAnswers()` | 610 |  |
| `aiPrimaryAction()` | 617 |  |
| `renderAiSuggestions()` | 647 |  |
| `applyAiSuggestions()` | 671 |  |
| `renderAiResult(added, created, errors)` | 759 |  |

## API endpoints it calls

- [api/system/get_user_preference.php](/code/files/api/system/get_user_preference.php.md)
- [api/system/set_user_preference.php](/code/files/api/system/set_user_preference.php.md)
- [api/cmdb/get_classes.php](/code/files/api/cmdb/get_classes.php.md)
- [api/cmdb/save_class.php](/code/files/api/cmdb/save_class.php.md)
- [api/cmdb/delete_class.php](/code/files/api/cmdb/delete_class.php.md)
- [api/cmdb/get_class_properties.php](/code/files/api/cmdb/get_class_properties.php.md)
- [api/cmdb/save_class_property.php](/code/files/api/cmdb/save_class_property.php.md)
- [api/cmdb/delete_class_property.php](/code/files/api/cmdb/delete_class_property.php.md)
- [api/cmdb/get_relationship_types.php](/code/files/api/cmdb/get_relationship_types.php.md)
- [api/cmdb/save_relationship_type.php](/code/files/api/cmdb/save_relationship_type.php.md)
- [api/cmdb/delete_relationship_type.php](/code/files/api/cmdb/delete_relationship_type.php.md)
- [api/cmdb/get_ai_settings.php](/code/files/api/cmdb/get_ai_settings.php.md)
- [api/cmdb/save_ai_settings.php](/code/files/api/cmdb/save_ai_settings.php.md)
- [api/cmdb/ai_suggest_questions.php](/code/files/api/cmdb/ai_suggest_questions.php.md)
- [api/cmdb/ai_suggest_properties.php](/code/files/api/cmdb/ai_suggest_properties.php.md)

## Loaded by

- [cmdb/settings/index.php](/code/files/cmdb/settings/index.php.md)

