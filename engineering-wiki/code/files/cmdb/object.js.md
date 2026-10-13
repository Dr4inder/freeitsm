# cmdb/object.js

> JavaScript - 1258 lines

CMDB Object Detail

Renders one configuration item and everything attached to it, and provides
inline editing of the lot: name, parent, planned state, every property type,
relationships in both directions, and the property DEFINITION modal.

Layout notes worth knowing before changing anything here are in the header
of object.php — in particular why Impact / Map / Hierarchy / Relationships
are one panel, and why its tally counts by KIND rather than by direction.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `esc(s)` | 52 |  |
| `toast(msg, isError)` | 60 |  |
| `confirmAction(opts)` | 63 |  |
| `postJson(url, body)` | 67 |  |
| `fmtWhen(s)` | 81 |  |
| `dateOnly(v)` | 88 |  |
| `daysSince(sqlUtc)` | 93 |  |
| `icon(key, size)` | 101 |  |
| `iconForClassName(name, size)` | 104 |  |
| `iconForClassId(id, size)` | 107 |  |
| `loadRelationshipTypes()` | 127 |  |
| `reloadAndRender()` | 137 |  |
| `loadObject()` | 142 |  |
| `loadImpact()` | 153 |  |
| `loadActivity()` | 159 |  |
| `loadClasses()` | 165 |  |
| `detectSignal()` | 181 |  |
| `connectionTally()` | 207 |  |
| `render()` | 226 |  |
| `breadcrumbHtml()` | 283 |  |
| `heroHtml(signal)` | 292 |  |
| `statsHtml()` | 337 |  |
| `tile(val, unit, label, cls, target)` | 343 |  |
| `aiHtml()` | 362 |  |
| `blastHtml()` | 383 |  |
| `viaText(n)` | 440 |  |
| `connectionsHtml()` | 452 |  |
| `nodeRow(id, name, className, verb, relId)` | 561 |  |
| `upArrow()` | 574 |  |
| `downArrow()` | 577 |  |
| `propsHtml()` | 583 |  |
| `propCard(p)` | 628 |  |
| `propValueHtml(p)` | 646 |  |
| `toggleBlanks()` | 668 |  |
| `activityHtml()` | 673 |  |
| `dangerHtml()` | 702 |  |
| `animateStats()` | 715 |  |
| `step(now)` | 724 |  |
| `animateMeter()` | 734 |  |
| `wireName()` | 745 |  |
| `wireProps()` | 760 |  |
| `beginEdit(cell)` | 770 |  |
| `saveProperty(p, raw, cell, before)` | 817 |  |
| `savePartial(patch)` | 834 |  |
| `generateSummary(btn)` | 856 |  |
| `createImpactDiagram(btn)` | 877 |  |
| `beginEditObjectRef(cell, p)` | 899 |  |
| `wireAutocomplete(inputEl, resultsEl, params, onPick)` | 937 |  |
| `draw()` | 970 |  |
| `togglePlanned()` | 990 |  |
| `openParentModal()` | 996 |  |
| `closeParentModal()` | 1014 |  |
| `saveParent()` | 1016 |  |
| `clearParent()` | 1027 |  |
| `openRelModal()` | 1044 |  |
| `closeRelModal()` | 1074 |  |
| `setRelDirection(dir)` | 1076 |  |
| `updateRelPreview()` | 1085 |  |
| `saveRelationship()` | 1097 |  |
| `jumpToDetails()` | 1114 |  |
| `deleteRelationship(id)` | 1119 |  |
| `initPropDefModalDrag()` | 1139 |  |
| `openPropDefModal(propertyId)` | 1163 |  |
| `closePropDefModal()` | 1188 |  |
| `onPropDefTypeChange()` | 1190 |  |
| `savePropDef()` | 1197 |  |
| `deleteObject()` | 1229 |  |

## API endpoints it calls

- [api/cmdb/get_relationship_types.php](/code/files/api/cmdb/get_relationship_types.php.md)
- [api/cmdb/get_object.php](/code/files/api/cmdb/get_object.php.md)
- [api/cmdb/get_object_impact.php](/code/files/api/cmdb/get_object_impact.php.md)
- [api/cmdb/get_object_tickets.php](/code/files/api/cmdb/get_object_tickets.php.md)
- [api/cmdb/get_classes.php](/code/files/api/cmdb/get_classes.php.md)
- [api/cmdb/save_object.php](/code/files/api/cmdb/save_object.php.md)
- [api/cmdb/generate_object_summary.php](/code/files/api/cmdb/generate_object_summary.php.md)
- [api/cmdb/create_impact_diagram.php](/code/files/api/cmdb/create_impact_diagram.php.md)
- [api/cmdb/search_objects.php](/code/files/api/cmdb/search_objects.php.md)
- [api/cmdb/save_object_relationship.php](/code/files/api/cmdb/save_object_relationship.php.md)
- [api/cmdb/delete_object_relationship.php](/code/files/api/cmdb/delete_object_relationship.php.md)
- [api/cmdb/save_class_property.php](/code/files/api/cmdb/save_class_property.php.md)
- [api/cmdb/delete_object.php](/code/files/api/cmdb/delete_object.php.md)

## Loaded by

- [cmdb/object.php](/code/files/cmdb/object.php.md)

