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
| `toast(msg, isError)` | 60 | showToast and showConfirm are the shared components, pulled in by includes/header.php -> waffle-menu.php. Not redefined here — a second toast implementation one module away from the real one is exactly the divergence worth avoiding. |
| `confirmAction(opts)` | 63 |  |
| `postJson(url, body)` | 67 |  |
| `fmtWhen(s)` | 81 | Was a top-level `function fmtDateTime` that called itself - it shadowed tz.js's global (#1195) - until the stack overflowed, and then showed the raw UTC string. A different name, so the shared formatter is the one called. |
| `dateOnly(v)` | 88 | "2026-04-15 00:00:00" -> "2026-04-15". Never parsed as a Date: a date property is naive, and round-tripping it through a timezone shifts it. |
| `daysSince(sqlUtc)` | 93 |  |
| `icon(key, size)` | 101 |  |
| `iconForClassName(name, size)` | 104 |  |
| `iconForClassId(id, size)` | 107 |  |
| `loadRelationshipTypes()` | 127 |  |
| `reloadAndRender()` | 137 | Everything that reloads after a write goes through here, so no caller can refresh the object but forget the impact panel and leave the blast radius and the connection tally disagreeing. |
| `loadObject()` | 142 |  |
| `loadImpact()` | 153 |  |
| `loadActivity()` | 159 |  |
| `loadClasses()` | 165 |  |
| `detectSignal()` | 181 | The object's own signal colour, read off its data rather than configured anywhere: an explicit option colour first, a severity word second. |
| `connectionTally()` | 207 | One place that counts each kind of connection, so the tally row, the headline number and the columns can never disagree with each other. `descendants` is the TRANSITIVE list from the impact endpoint, not just direct children — a Server → Instance → Database → Job chain must not report one descendant. |
| `render()` | 226 |  |
| `breadcrumbHtml()` | 283 |  |
| `heroHtml(signal)` | 292 |  |
| `statsHtml()` | 337 |  |
| `tile(val, unit, label, cls, target)` | 343 |  |
| `aiHtml()` | 362 |  |
| `blastHtml()` | 383 | The blast radius as a left-to-right chain: root, then one column per hop. The grouped list said the same thing; the chain shows the direction a failure travels, which is the point of the panel. |
| `viaText(n)` | 440 | Every row says how it was reached, so a surprising entry can be traced rather than doubted. |
| `connectionsHtml()` | 452 | ONE panel where object.php had four. Impact, Map, Hierarchy and Relationships are four framings of "what is this attached to", and on a sparse object they produced four separate empty states. |
| `tk(base, n)` | 500 |  |
| `nodeRow(id, name, className, verb, relId)` | 561 |  |
| `upArrow()` | 574 |  |
| `downArrow()` | 577 |  |
| `propsHtml()` | 583 | Filled properties first as cards; blanks collapse to one line. A row per empty field is how the old page ended up mostly saying "(not set)". |
| `propCard(p)` | 628 |  |
| `propValueHtml(p)` | 646 |  |
| `toggleBlanks()` | 668 |  |
| `activityHtml()` | 673 |  |
| `row(t, isOpen)` | 684 |  |
| `dangerHtml()` | 702 |  |
| `animateStats()` | 715 | A detail page is opened occasionally, not hundreds of times a day, so the numbers can afford to count up. Kept to 460ms and skipped entirely under prefers-reduced-motion. |
| `step(now)` | 724 |  |
| `animateMeter()` | 734 |  |
| `wireName()` | 745 |  |
| `wireProps()` | 760 |  |
| `beginEdit(cell)` | 770 |  |
| `commit()` | 801 |  |
| `saveProperty(p, raw, cell, before)` | 817 |  |
| `savePartial(patch)` | 834 |  |
| `generateSummary(btn)` | 856 |  |
| `createImpactDiagram(btn)` | 877 |  |
| `beginEditObjectRef(cell, p)` | 899 | Search is scoped to the property's target class and excludes this object, so a field can never be pointed at the thing that holds it. |
| `finish(raw)` | 915 |  |
| `cancel()` | 916 |  |
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
| `updateRelPreview()` | 1085 | Writes out the sentence that will actually be stored, both ways round, so nobody has to hold the direction in their head while picking a verb. |
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

