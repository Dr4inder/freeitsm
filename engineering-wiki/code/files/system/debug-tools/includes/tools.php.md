# system/debug-tools/includes/tools.php

> PHP - 471 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [getDebugTools()](/code/functions/getDebugTools.md) | 19 |  |
| [getDebugToolBySlug()](/code/functions/getDebugToolBySlug.md) | 436 | Find one tool by its slug (e.g. 'd001'). Returns null if not found. |
| [debugToolAiFeatureOptions()](/code/functions/debugToolAiFeatureOptions.md) | 444 | D014's feature picker: every AI feature, plus "all" (GH #171). |
| [debugToolIcon()](/code/functions/debugToolIcon.md) | 457 | Inline SVG markup for a debug-tool icon key. Unknown keys render a neutral wrench so a typo never breaks the page. Sizing/colour come from CSS. |

## How it hangs together

**Includes:** [includes/ai_settings.php](/code/files/includes/ai_settings.php.md)

**Included by:** [system/debug-tools/includes/tool-page.php](/code/files/system/debug-tools/includes/tool-page.php.md), [system/debug-tools/index.php](/code/files/system/debug-tools/index.php.md)

**Calls:** [aiSettingsRegistry()](/code/functions/aiSettingsRegistry.md)

