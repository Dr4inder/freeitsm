# includes/task_contractors.php

> PHP - 206 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [tasksContractorReady()](/code/functions/tasksContractorReady.md) | 29 | Has Database Verification added the two columns? Before it, there are no contractors and no errors. |
| [tasksSupplierNameSql()](/code/functions/tasksSupplierNameSql.md) | 40 | The name a supplier goes by. |
| [tasksContractors()](/code/functions/tasksContractors.md) | 49 | The contractor on each of these tasks: [task_id => {supplier_id, supplier_name, contact_id, contact_name, contact_email}]. Tasks without one are absent. |
| [tasksWithContractors()](/code/functions/tasksWithContractors.md) | 67 | Add the contractor fields to task rows (each with an 'id'). |
| [tasksContractorValidate()](/code/functions/tasksContractorValidate.md) | 83 | Check a supplier / contact pair: the supplier exists; the contact (if any) works for it. A contact alone brings their supplier. Returns [supplierId, contactId]. |
| [tasksContractorChoices()](/code/functions/tasksContractorChoices.md) | 105 | Suppliers to choose from, each with its active contacts. |
| [tasksContractorEmailOn()](/code/functions/tasksContractorEmailOn.md) | 115 | Is project_contractor_email on? |
| [tasksContractorEmail()](/code/functions/tasksContractorEmail.md) | 130 | Email a task's contractor contact - `$kind` 'assigned', 'due' (due soon) or 'overdue'. Quiet: false when the setting is off, there is no contact email or the send fails (the email log says which). Never throws. |
| [tasksContractorReminders()](/code/functions/tasksContractorReminders.md) | 187 | The reminders, from the hourly scan (projectAlertsScan): two days before a contractor's task is due, and once the day after it is missed - each once per due date (the ledger), so moving the date re-arms them. Open tasks with a contact only; nothing when the setting is off. Returns how many were sent. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 33 | `tasksContractorReady` | read [tasks](/code/tables/tasks.md) |  |
| 55 | `tasksContractors` | read [tasks](/code/tables/tasks.md), read [suppliers](/code/tables/suppliers.md), read [contacts](/code/tables/contacts.md) |  |
| 88 | `tasksContractorValidate` | read [contacts](/code/tables/contacts.md) |  |
| 97 | `tasksContractorValidate` | read [suppliers](/code/tables/suppliers.md) |  |
| 107 | `tasksContractorChoices` | read [suppliers](/code/tables/suppliers.md) |  |
| 108 | `tasksContractorChoices` | read [contacts](/code/tables/contacts.md) |  |
| 135 | `tasksContractorEmail` | read [tasks](/code/tables/tasks.md), read [contacts](/code/tables/contacts.md), read [suppliers](/code/tables/suppliers.md), read [analysts](/code/tables/analysts.md) |  |
| 147 | `tasksContractorEmail` | read [projects](/code/tables/projects.md) |  |
| 190 | `tasksContractorReminders` | read [tasks](/code/tables/tasks.md), read [task_statuses](/code/tables/task_statuses.md) |  |
| 196 | `tasksContractorReminders` | **insert** [workflow_scheduled_emissions](/code/tables/workflow_scheduled_emissions.md) (`trigger_event`, `entity_key`, `fingerprint`, `emitted_datetime`) |  |

## How it hangs together

**Includes:** [includes/projects/settings.php](/code/files/includes/projects/settings.php.md), [includes/self_service_email.php](/code/files/includes/self_service_email.php.md), [includes/template_email.php](/code/files/includes/template_email.php.md)

**Included by:** [api/tasks/contractors.php](/code/files/api/tasks/contractors.php.md), [api/tasks/get.php](/code/files/api/tasks/get.php.md), [api/tasks/list.php](/code/files/api/tasks/list.php.md), [api/v1/resources/tasks.php](/code/files/api/v1/resources/tasks.php.md), [includes/people.php](/code/files/includes/people.php.md), [includes/projects/ai.php](/code/files/includes/projects/ai.php.md), [includes/projects/alerts.php](/code/files/includes/projects/alerts.php.md), [includes/projects/assistant_chat.php](/code/files/includes/projects/assistant_chat.php.md), [includes/projects/capacity.php](/code/files/includes/projects/capacity.php.md), [includes/projects/nudges.php](/code/files/includes/projects/nudges.php.md), [includes/projects/read.php](/code/files/includes/projects/read.php.md), [includes/services/project_tools.php](/code/files/includes/services/project_tools.php.md), [includes/services/tasks.php](/code/files/includes/services/tasks.php.md)

**Calls:** [projectSetting()](/code/functions/projectSetting.md), [ssSendSystemEmail()](/code/functions/ssSendSystemEmail.md), [systemName()](/code/functions/systemName.md)

