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
| `init()` | 49 |  |
| `setRunButtonsEnabled(on)` | 84 | Test fire and Dry run both need a saved workflow (the engine loads it from the database by id), so they enable and disable together. |
| `showTemplateGaps(id)` | 97 | A workflow just cloned from a starter template may carry args the template couldn't fill in for this install — a priority we don't have, a webhook URL only the user knows. The list is handed over in sessionStorage by the gallery; show it once, then clear it. |
| `loadWorkflow(id)` | 121 |  |
| `addTriggerNode()` | 182 |  |
| `addConditionNode(x, y, field, op, value)` | 191 |  |
| `addActionNode(x, y, type, args)` | 202 |  |
| `addCondition()` | 215 |  |
| `addAction()` | 222 |  |
| `lowestNodeY(...kinds)` | 241 |  |
| `deleteSelected()` | 252 |  |
| `renderAll()` | 267 |  |
| `createNodeEl(n)` | 279 |  |
| `renderNodeContent(n)` | 293 |  |
| `renderConnectors()` | 381 |  |
| `ensureArrowheadDef()` | 394 |  |
| `drawConnector(a, b)` | 401 |  |
| `updateCanvasSize()` | 431 |  |
| `updateSelectionVisuals()` | 443 |  |
| `bindCanvasEvents()` | 453 |  |
| `onCanvasMouseDown(e)` | 465 |  |
| `onNodeMouseDown(e, n)` | 472 |  |
| `onDocMouseMove(e)` | 493 |  |
| `onDocMouseUp(e)` | 517 |  |
| `selectNode(id, deferDetail)` | 527 |  |
| `selectWorkflow()` | 539 |  |
| `showBody(title, id)` | 545 |  |
| `showDetailForTrigger()` | 552 |  |
| `showDetailForCondition(n)` | 557 |  |
| `rebuildOperatorDropdown(n)` | 594 | The operator dropdown's contents depend on whether the field is a normalised lookup (priority_id, status_id, etc.) or free-text. |
| `renderConditionValueInput(n)` | 657 | The value control adapts to (a) whether the chosen field has a lookup (i.e. a normalised id like `ticket.priority_id`) and (b) the operator. |
| `onConditionMultiToggle()` | 709 |  |
| `showDetailForAction(n)` | 718 |  |
| `renderActionArgsForm(n, def)` | 734 | Render the per-action form into #wfActArgsHost based on the action's args spec in WF_ACTION_DEFS. Replaces the old single JSON textarea — users now get a labelled control per arg (text input / textarea / number / checkbox / lookup dropdown). Free-text args that support variables show a small `{{ticket.id}}` hint underneath. |
| `renderList(query = '')` | 807 |  |
| `applyFormatHints(host, n)` | 951 | Two things the message-format registry gives us, shown where they're needed rather than in a help page you'd have to know to read: |
| `appendWebhookTest(host, n)` | 1009 | Append the "Send test" control + result panel for the webhook action. Sends n.args (the live config) to webhook_test.php, which renders the templates against a sample payload and delivers synchronously. |
| `runWebhookTest(n, btn, out)` | 1024 |  |
| `wfEsc(s)` | 1054 |  |
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
| `updateTriggerFromDetail()` | 1319 |  |
| `updateConditionFromDetail()` | 1326 |  |
| `updateActionTypeFromDetail()` | 1360 |  |
| `markDirty()` | 1382 |  |
| `setStatus(state)` | 1386 |  |
| `save()` | 1403 |  |
| `buildTestFirePayload()` | 1471 |  |
| `dryRun()` | 1522 | Dry run — evaluate the conditions for real, but describe the actions instead of executing them. Nothing is written, emailed or queued, so this is safe to point at a live workflow. |
| `testFire(isDryRun)` | 1526 |  |
| `renderExecutions(execs)` | 1555 |  |
| `escAttr(s)` | 1614 |  |
| `openAiModal()` | 1631 |  |
| `closeAiModal()` | 1647 |  |
| `aiGenerate()` | 1652 |  |
| `collectWorkflowForApi(dropPositions)` | 1687 |  |
| `renderAiResult(d)` | 1710 |  |
| `aiDiscard()` | 1754 |  |
| `aiApply()` | 1764 |  |

## Loaded by

- [workflow/editor.php](/code/files/workflow/editor.php.md)

