# assets/js/projects-insights.js

> JavaScript - 96 lines

Projects - the Overview's status and flow charts (3.3.0): Task status a stacked bar per stage (and the whole project): how many tasks sit in each of the install's task statuses, with how many are overdue and how many wait on another task Progress by stage done against not done, per stage, with the percentage Flow over time the cumulative flow diagram (includes/projects/flow.php)

🔑 A status keeps ITS colour in both charts: its slot is its place in the
board's order, never its place in a chart (color follows the entity). Six
validated slots; a seventh status and on share the neutral. Days before the
flow was first recorded are two neutral bands - finished, and open - with a
marker where real history starts.

## Functions

| Function | Line | What it does |
|---|--:|---|
| `T(k, p)` | 18 |  |
| `slotOf(i)` | 22 |  |
| `render(c)` | 24 |  |
| `draw()` | 36 | Drawn when the Overview is showing - the charts measure their width. |

## Loaded by

- [projects/view.php](/code/files/projects/view.php.md)

