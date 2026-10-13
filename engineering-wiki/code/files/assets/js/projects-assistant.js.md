# assets/js/projects-assistant.js

> JavaScript - 189 lines

Projects - the AI project assistant panel (3.3.0): "Ask AI" on a project.

The same slide-in panel as Knowledge's Ask AI (the .ai-chat-* styles in
inbox.css / mobile.css), talking to api/projects/assistant_chat.php. The rules,
the memory and what the model is told are in includes/projects/assistant_chat.php.

  PrjAssistant.open()    the header's Ask AI button
  PrjAssistant.bind(ctx) from projects-view.js after each redraw - ctx.refresh redraws
                         the project once proposals are applied

Opening the panel loads the conversation, then asks the server to 'open' it:
a greeting for an empty conversation, a "since we last spoke" after a while,
or nothing. An assistant message with proposals gets a card: a box per change
(all ticked), Apply and Dismiss; each line then shows applied / dismissed / why it failed.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `aiError(r)` | 28 |  |
| `note(text, bad)` | 33 |  |
| `chips()` | 42 |  |
| `proposalCard(msg)` | 51 |  |
| `draw()` | 63 |  |
| `load()` | 95 |  |
| `openTurn()` | 100 |  |
| `send(text)` | 110 |  |
| `act(card, dismiss)` | 124 |  |
| `clear()` | 145 |  |
| `open()` | 151 |  |
| `close()` | 159 |  |
| `wire()` | 164 |  |

## Loaded by

- [projects/view.php](/code/files/projects/view.php.md)

