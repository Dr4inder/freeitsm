# assets/js/workflow-editor.js

> JavaScript - 1825 lines

Workflow Editor — visual canvas builder.

Stage 2 of the Workflows module: replaces the form-based editor with a
Process Mapper-style dot-grid canvas where each node represents a single
piece of the rule. Layout is the UI, but the engine's data shape is
unchanged — at save time we sort condition + action nodes by y position
and write them in order.

Node kinds:
  - trigger    (singleton, pinned at top by default)
  - condition  (zero or more, drawn as diamonds)
  - action     (one or more, drawn as rounded rectangles)

Connectors are auto-routed at render time based on the y-sorted order
trigger -> condition[0..n-1] -> action[0..m-1]. They aren't stored.

The trigger event itself lives on the workflow row (trigger_event column);
the trigger node just visualises it. Each condition / action node stores
its x, y on its JSON object — the engine ignores the extra keys.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `WFE(()` | 22 | Workflow Editor — visual canvas builder. |
| `snap(v)` | 25 |  |
| `init()` | 49 | Init |
| `setRunButtonsEnabled(on)` | 84 | Test fire and Dry run both need a saved workflow (the engine loads it from the database by id), so they enable and disable together. |
| `showTemplateGaps(id)` | 97 | A workflow just cloned from a starter template may carry args the template couldn't fill in for this install — a priority we don't have, a webhook URL only the user knows. The list is handed over in sessionStorage by the gallery; show it once, then clear it. |
| `escHtml(s)` | 109 |  |
| `loadWorkflow(id)` | 121 |  |
| `addTriggerNode()` | 182 | Node model |
| `addConditionNode(x, y, field, op, value)` | 191 |  |
| `addActionNode(x, y, type, args)` | 202 |  |
| `addCondition()` | 215 | Public — toolbar buttons. |
| `addAction()` | 222 |  |
| `lowestNodeY(...kinds)` | 241 | Helper — find the lowest y of any node in the listed kinds (used to place a new node below the existing stack). |
| `deleteSelected()` | 252 |  |
| `renderAll()` | 267 | Rendering — nodes + connectors |
| `createNodeEl(n)` | 279 |  |
| `renderNodeContent(n)` | 293 |  |
| `escHtml(s)` | 294 |  |
| `labelFor(id)` | 315 |  |
| `lookupLabel(lookupKey, idVal)` | 344 |  |
| `renderConnectors()` | 381 | Connectors run trigger -> conditions (in y order) -> actions (in y order). No branching in v1 — purely linear visual of execution flow. |
| `ensureArrowheadDef()` | 394 |  |
| `drawConnector(a, b)` | 401 |  |
| `updateCanvasSize()` | 431 | Resize the canvas's intrinsic dimensions so all nodes fit and the SVG overlay stretches over the whole content area. |
| `updateSelectionVisuals()` | 443 |  |
| `bindCanvasEvents()` | 453 | Interaction — drag, select, keys |
| `onCanvasMouseDown(e)` | 465 |  |
| `onNodeMouseDown(e, n)` | 472 |  |
| `onDocMouseMove(e)` | 493 |  |
| `onDocMouseUp(e)` | 517 |  |
| `selectNode(id, deferDetail)` | 527 | Selection + detail panel |
| `selectWorkflow()` | 539 |  |
| `showBody(title, id)` | 545 |  |
| `showDetailForTrigger()` | 552 |  |
| `showDetailForCondition(n)` | 557 |  |
| `rebuildOperatorDropdown(n)` | 594 | The operator dropdown's contents depend on whether the field is a normalised lookup (priority_id, status_id, etc.) or free-text. |
| `renderConditionValueInput(n)` | 657 | The value control adapts to (a) whether the chosen field has a lookup (i.e. a normalised id like `ticket.priority_id`) and (b) the operator. |
| `onConditionMultiToggle()` | 709 | When a multi-select checkbox toggles, gather every checked value and store as an array on the condition node. Re-render the canvas node so its preview reflects the new list. |
| `showDetailForAction(n)` | 718 |  |
| `renderActionArgsForm(n, def)` | 734 | Render the per-action form into #wfActArgsHost based on the action's args spec in WF_ACTION_DEFS. Replaces the old single JSON textarea — users now get a labelled control per arg (text input / textarea / number / checkbox / lookup dropdown). Free-text args that support variables show a small `{{ticket.id}}` hint underneath. |
| `renderList(query = '')` | 807 |  |
| `refreshWarn()` | 918 |  |
| `applyFormatHints(host, n)` | 951 | Two things the message-format registry gives us, shown where they're needed rather than in a help page you'd have to know to read: |
| `check()` | 973 |  |
| `appendWebhookTest(host, n)` | 1009 | Append the "Send test" control + result panel for the webhook action. Sends n.args (the live config) to webhook_test.php, which renders the templates against a sample payload and delivers synchronously. |
| `runWebhookTest(n, btn, out)` | 1024 |  |
| `wfEsc(s)` | 1054 | Local HTML escaper (escHtml elsewhere is function-scoped, not shared). |
| `currentVars()` | 1069 |  |
| `currentVarPrefixes()` | 1074 | Open-ended prefixes, e.g. submission.fields.<the form author's label>. |
| `varLabel(path)` | 1078 |  |
| `isKnownVar(path)` | 1083 |  |
| `unknownVarsIn(text)` | 1089 | Every {{code}} in the text that this trigger cannot resolve. |
| `renderVarWarning(el, text)` | 1099 |  |
| `openVarModal(argName, spec, ctrl)` | 1114 |  |
| `closeVarModal()` | 1131 |  |
| `applyVarModal()` | 1136 |  |
| `renderVarList(query)` | 1148 |  |
| `insertVar(path)` | 1171 | Insert {{path}} at the cursor (replacing any selection). |
| `refreshVarModal()` | 1189 | Live feedback inside the modal: the unknown-code warning, plus a preview that swaps each code for its human label. We deliberately do NOT invent sample data — showing a fake ticket subject would be a lie about what the message will say. Showing the shape is honest and still useful. |
| `webhookTestError(msg, heading)` | 1214 |  |
| `renderDiagnosis(dg)` | 1225 | The plain-English explanation of a transport failure, plus a link to the fix where one exists. Shared shape with the delivery log in System → Webhooks (both get it from `webhookDiagnoseError()` server-side). |
| `renderWebhookTestResult(d)` | 1237 |  |
| `applyArgVisibility(host, n)` | 1270 | Show/hide fields whose `show_when` condition (another arg's current value) isn't met — e.g. the webhook Message field only for the chat presets, the raw JSON body only for Custom. |
| `updateActionArgFromControl(argName, type, ctrl)` | 1284 |  |
| `bindWorkflowDetailEvents()` | 1304 |  |
| `updateTriggerFromDetail()` | 1319 | Detail-panel handlers exposed via WFE.* for inline onchange / oninput. |
| `updateConditionFromDetail()` | 1326 |  |
| `updateActionTypeFromDetail()` | 1360 |  |
| `markDirty()` | 1382 | Dirty flag + status pip |
| `setStatus(state)` | 1386 |  |
| `save()` | 1403 | Save / Test fire |
| `buildTestFirePayload()` | 1471 | Build a synthetic payload from the workflow's own conditions so Test fire actually exercises the action path. For each condition with an equality-ish op we set `payload[field] = value` (or the first item of a list), so the condition trivially passes. Other ops (is_empty / is_not_empty / contains / gt / lt) get a sensible sentinel. The user wants Test fire to mean "do my actions run when conditions pass" — an empty payload would skip every workflow that has any condition. |
| `setPath(path, value)` | 1474 |  |
| `dryRun()` | 1522 | Dry run — evaluate the conditions for real, but describe the actions instead of executing them. Nothing is written, emailed or queued, so this is safe to point at a live workflow. |
| `testFire(isDryRun)` | 1526 |  |
| `renderExecutions(execs)` | 1555 |  |
| `escHtml(s)` | 1562 |  |
| `fmtDate(s)` | 1567 |  |
| `dryStepsHtml(e)` | 1576 | A dry run's whole value is in its step log — "here is what it WOULD have done" — so unlike a real run we render the steps inline rather than just a status pill. |
| `escAttr(s)` | 1614 | Helpers |
| `openAiModal()` | 1631 |  |
| `closeAiModal()` | 1647 |  |
| `aiGenerate()` | 1652 |  |
| `collectWorkflowForApi(dropPositions)` | 1687 | Build a payload that mirrors what save.php expects, with optional `dropPositions` to omit the x/y the canvas tracks — the AI doesn't need to see those. |
| `renderAiResult(d)` | 1710 |  |
| `escHtml(s)` | 1711 |  |
| `aiDiscard()` | 1754 |  |
| `aiApply()` | 1764 |  |

## Loaded by

- [workflow/editor.php](/code/files/workflow/editor.php.md)

