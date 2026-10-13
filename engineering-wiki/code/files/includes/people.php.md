# includes/people.php

> PHP - 863 lines

People (#153 step 2) — one page per person and per company.

Reads only. A person is a row in `users`; a company is a row in `tenants`.
Nothing here is stored: every section is read from the module that owns it,
at the moment the page is opened, so nothing is copied and nothing can drift.

🔑 TWO GATES ON EVERY SECTION, AND BOTH ARE THE OWNING MODULE'S.
  1. The module: a person's tickets appear only for an analyst who can open
     Tickets, their courses only for one who can open the LMS, and so on.
     A section the reader may not see is ABSENT from the result, not empty -
     "no tickets" and "you cannot see tickets" are different answers.
  2. The company: each section applies the same company rule its own module
     does - tickets, assets and domains by the companies the analyst can
     access, contracts by `contractVisibilitySql()`. The page as a whole needs
     `analystCanAccessUser()` / `analystCanAccessTenant()` first; out of reach
     reads exactly like "no such person".

Accessible companies, not the ACTIVE one: a person page is reached by id from
anywhere (a contract, a domain, search), and showing nothing because the
header's company picker points elsewhere would read as "this person has no
tickets". Every company shown is one the analyst may already open.

SUPPLIERS AND THEIR CONTACTS (#153 step 3, #162). Shown here, not moved here:
they stay in `suppliers` and `contacts`, owned and edited by Contracts, so a
supplier's contact never becomes somebody who can sign in, raise a ticket or
be swept up by directory sync. Contracts owns them, so their pages need
Contracts as well as People (peopleCanSeeSuppliers). They have no company -
they are install-wide, as in Contracts - but every section on their pages
still applies its own module's company rule.

## Functions

| Function | Line | What it does |
|---|--:|---|
| [peopleScope()](/code/functions/peopleScope.md) | 40 | " AND (<col> IN (accessible) [OR <col> IS NULL])", or '' on a single-company install. |
| [peopleCompanyMatch()](/code/functions/peopleCompanyMatch.md) | 47 | " AND <col> = ?" for one company - NULL counts as the Default company's. |
| [peopleName()](/code/functions/peopleName.md) | 55 | The name to show for a person: preferred name, then display name, email, username, or #id. |
| [peopleListRows()](/code/functions/peopleListRows.md) | 72 | People the analyst can see, newest-relevant first by name. |
| [peopleCompanies()](/code/functions/peopleCompanies.md) | 112 | The companies this analyst can access, with how many people are in each. |
| [peopleCompanyCards()](/code/functions/peopleCompanyCards.md) | 140 | The companies page's cards: `peopleCompanies()` plus a few figures for each. |
| [personDetail()](/code/functions/personDetail.md) | 194 | Everything about one person this analyst may see, or null (unknown or out of reach). |
| [companyDetail()](/code/functions/companyDetail.md) | 259 | Everything about one company this analyst may see, or null. |
| [peopleTickets()](/code/functions/peopleTickets.md) | 305 | Tickets raised by the person / in the company: the latest, and how many are open. |
| [peopleAssets()](/code/functions/peopleAssets.md) | 345 | Assets the person holds now / assets belonging to the company. |
| [peopleContracts()](/code/functions/peopleContracts.md) | 376 | Contracts where the person / the company is the CUSTOMER (#153 step 1). |
| [peopleDomains()](/code/functions/peopleDomains.md) | 413 | Domains the person is the customer for / the company holds. |
| [peopleProjects()](/code/functions/peopleProjects.md) | 445 | Projects (3.2.0): for a person, the projects they are a member of (People tab of a project) with their role and their RACI duties ("Accountable for Phones working on day one"); for a company, its projects. Live ones first. Limited to the companies the analyst can access, like Projects itself. |
| [peopleCoursesForPerson()](/code/functions/peopleCoursesForPerson.md) | 498 | The person's courses - exactly what their own My courses page shows. |
| [peopleCoursesForCompany()](/code/functions/peopleCoursesForCompany.md) | 514 | Per course, how many people in the company have finished it and how many are part-way. |
| [peopleForms()](/code/functions/peopleForms.md) | 539 | Forms the person submitted / people in the company submitted (from the portal). |
| [peopleCanSeeSuppliers()](/code/functions/peopleCanSeeSuppliers.md) | 584 | Suppliers and contacts are Contracts' records: their pages need Contracts too. |
| [peopleSupplierName()](/code/functions/peopleSupplierName.md) | 590 | The name to show for a supplier: trading name, else legal name, else #id. |
| [peopleContactName()](/code/functions/peopleContactName.md) | 597 | The name to show for a supplier contact: first name and surname, else email, else #id. |
| [peopleSupplierRows()](/code/functions/peopleSupplierRows.md) | 607 | Every supplier, with how many contacts and contracts each has. |
| [supplierDetail()](/code/functions/supplierDetail.md) | 646 | Everything about one supplier this analyst may see, or null. |
| [supplierContactDetail()](/code/functions/supplierContactDetail.md) | 686 | Everything about one supplier contact this analyst may see, or null. |
| [peopleContractorTasks()](/code/functions/peopleContractorTasks.md) | 719 | Tasks given to a supplier, or to one person there, as a contractor (3.3.0, includes/task_contractors.php) - open first. In companies the analyst can access; a task in a members-only project they cannot see is left out. |
| [peopleSupplierContracts()](/code/functions/peopleSupplierContracts.md) | 753 | Contracts with the supplier - the ordinary, "we buy from them" kind. |
| [peopleSupplierAssets()](/code/functions/peopleSupplierAssets.md) | 778 | Assets bought from the supplier, in companies the analyst can access. |
| [peopleSupplierDomains()](/code/functions/peopleSupplierDomains.md) | 810 | Domains a supplier or a contact is involved in, and how: registrar, customer, technical contact. `$who` = ['supplier' => id] or ['contact' => id]. A domain belongs to a company, so only companies the analyst can access count. |
| [peopleBareDate()](/code/functions/peopleBareDate.md) | 853 | A bare date (a contract end, a domain expiry, a deadline) - shown as stored, never shifted by a timezone. |

## Database

| Line | In | Tables | Purpose |
|--:|---|---|---|
| 93 | `peopleListRows` | read [users](/code/tables/users.md), read [tenants](/code/tables/tenants.md) |  |
| 118 | `peopleCompanies` | read [tenants](/code/tables/tenants.md) |  |
| 122 | `peopleCompanies` | read [users](/code/tables/users.md) |  |
| 158 | `peopleCompanyCards` | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 165 | `peopleCompanyCards` | read [assets](/code/tables/assets.md) |  |
| 170 | `peopleCompanyCards` | read [users](/code/tables/users.md) |  |
| 173 | `peopleCompanyCards` | read [tenants](/code/tables/tenants.md) |  |
| 176 | `peopleCompanyCards` | read [tenant_domains](/code/tables/tenant_domains.md) |  |
| 202 | `personDetail` | read [users](/code/tables/users.md), read [tenants](/code/tables/tenants.md), read [auth_providers](/code/tables/auth_providers.md) |  |
| 228 | `personDetail` | read [users](/code/tables/users.md) |  |
| 233 | `personDetail` | read [users](/code/tables/users.md) |  |
| 270 | `companyDetail` | read [tenant_domains](/code/tables/tenant_domains.md) |  |
| 276 | `companyDetail` | read [users](/code/tables/users.md) |  |
| 313 | `peopleTickets` | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md) |  |
| 322 | `peopleTickets` | read [tickets](/code/tables/tickets.md), read [ticket_statuses](/code/tables/ticket_statuses.md), read [ticket_priorities](/code/tables/ticket_priorities.md), read [analysts](/code/tables/analysts.md), read [users](/code/tables/users.md) |  |
| 349 | `peopleAssets` | read [asset_types](/code/tables/asset_types.md), read [asset_status_types](/code/tables/asset_status_types.md) |  |
| 351 | `peopleAssets` | read [users_assets](/code/tables/users_assets.md), read [assets](/code/tables/assets.md) |  |
| 356 | `peopleAssets` | read [assets](/code/tables/assets.md) |  |
| 357 | `peopleAssets` | read [users_assets](/code/tables/users_assets.md), read [users](/code/tables/users.md) |  |
| 391 | `peopleContracts` | read [contracts](/code/tables/contracts.md), read [contract_statuses](/code/tables/contract_statuses.md) |  |
| 424 | `peopleDomains` | read [domains](/code/tables/domains.md), read [domain_statuses](/code/tables/domain_statuses.md) |  |
| 457 | `peopleProjects` | read [project_members](/code/tables/project_members.md), read [projects](/code/tables/projects.md), read [project_roles](/code/tables/project_roles.md), read [analysts](/code/tables/analysts.md) |  |
| 465 | `peopleProjects` | read [projects](/code/tables/projects.md), read [analysts](/code/tables/analysts.md) |  |
| 478 | `peopleProjects` | read [project_raci](/code/tables/project_raci.md), read [project_members](/code/tables/project_members.md), read [project_items](/code/tables/project_items.md) |  |
| 519 | `peopleCoursesForCompany` | read [lms_progress](/code/tables/lms_progress.md), read [users](/code/tables/users.md), read [lms_courses](/code/tables/lms_courses.md) |  |
| 551 | `peopleForms` | read [form_submissions](/code/tables/form_submissions.md), read [forms](/code/tables/forms.md), read [users](/code/tables/users.md), read [tickets](/code/tables/tickets.md) |  |
| 616 | `peopleSupplierRows` | read [contacts](/code/tables/contacts.md) |  |
| 622 | `peopleSupplierRows` | read [contacts](/code/tables/contacts.md), read [contracts](/code/tables/contracts.md), read [suppliers](/code/tables/suppliers.md), read [supplier_types](/code/tables/supplier_types.md), read [supplier_statuses](/code/tables/supplier_statuses.md) |  |
| 650 | `supplierDetail` | read [suppliers](/code/tables/suppliers.md), read [supplier_types](/code/tables/supplier_types.md), read [supplier_statuses](/code/tables/supplier_statuses.md) |  |
| 669 | `supplierDetail` | read [contacts](/code/tables/contacts.md) |  |
| 690 | `supplierContactDetail` | read [contacts](/code/tables/contacts.md), read [suppliers](/code/tables/suppliers.md) |  |
| 728 | `peopleContractorTasks` | read [projects](/code/tables/projects.md) |  |
| 732 | `peopleContractorTasks` | read [projects](/code/tables/projects.md), read [tasks](/code/tables/tasks.md), read [task_statuses](/code/tables/task_statuses.md), read [analysts](/code/tables/analysts.md), read [contacts](/code/tables/contacts.md) |  |
| 758 | `peopleSupplierContracts` | read [contracts](/code/tables/contracts.md), read [contract_statuses](/code/tables/contract_statuses.md) |  |
| 781 | `peopleSupplierAssets` | read [assets](/code/tables/assets.md), read [asset_types](/code/tables/asset_types.md), read [asset_status_types](/code/tables/asset_status_types.md) |  |
| 788 | `peopleSupplierAssets` | read [users_assets](/code/tables/users_assets.md), read [users](/code/tables/users.md) |  |
| 820 | `peopleSupplierDomains` | read [contacts](/code/tables/contacts.md) |  |
| 832 | `peopleSupplierDomains` | read [domains](/code/tables/domains.md), read [domain_statuses](/code/tables/domain_statuses.md) |  |

## How it hangs together

**Includes:** [includes/tenancy.php](/code/files/includes/tenancy.php.md), [includes/entity_links.php](/code/files/includes/entity_links.php.md), [includes/cost_centre_assign.php](/code/files/includes/cost_centre_assign.php.md), [includes/contract_party.php](/code/files/includes/contract_party.php.md), [includes/domains/customer.php](/code/files/includes/domains/customer.php.md), [includes/projects/methodologies.php](/code/files/includes/projects/methodologies.php.md), [includes/projects/read.php](/code/files/includes/projects/read.php.md), [includes/projects/visibility.php](/code/files/includes/projects/visibility.php.md), [includes/lms_access.php](/code/files/includes/lms_access.php.md), [includes/task_contractors.php](/code/files/includes/task_contractors.php.md)

**Included by:** [api/people/list.php](/code/files/api/people/list.php.md), [people/companies.php](/code/files/people/companies.php.md), [people/company.php](/code/files/people/company.php.md), [people/contact.php](/code/files/people/contact.php.md), [people/index.php](/code/files/people/index.php.md), [people/person.php](/code/files/people/person.php.md), [people/supplier.php](/code/files/people/supplier.php.md), [people/suppliers.php](/code/files/people/suppliers.php.md)

**Calls:** [allAccessibleTenantsFilter()](/code/functions/allAccessibleTenantsFilter.md), [analystCanAccessModule()](/code/functions/analystCanAccessModule.md), [analystCanAccessTenant()](/code/functions/analystCanAccessTenant.md), [analystCanAccessTicket()](/code/functions/analystCanAccessTicket.md), [analystCanAccessUser()](/code/functions/analystCanAccessUser.md), [contractCustomerTenantExpr()](/code/functions/contractCustomerTenantExpr.md), [contractPartyLabel()](/code/functions/contractPartyLabel.md), [contractPartyReady()](/code/functions/contractPartyReady.md), [contractPartySql()](/code/functions/contractPartySql.md), [contractVisibilitySql()](/code/functions/contractVisibilitySql.md), [costCentreSelectSql()](/code/functions/costCentreSelectSql.md), [domainCustomerReady()](/code/functions/domainCustomerReady.md), [domainPartiesReady()](/code/functions/domainPartiesReady.md), [entityLink()](/code/functions/entityLink.md), [getAccessibleTenantIds()](/code/functions/getAccessibleTenantIds.md), [getDefaultTenantId()](/code/functions/getDefaultTenantId.md), [getTenantById()](/code/functions/getTenantById.md), [isMultiTenant()](/code/functions/isMultiTenant.md), [lmsMyCourses()](/code/functions/lmsMyCourses.md), [projectColourHex()](/code/functions/projectColourHex.md), [projectDecorate()](/code/functions/projectDecorate.md), [projectHealthConfig()](/code/functions/projectHealthConfig.md), [projectsPhase2Ready()](/code/functions/projectsPhase2Ready.md), [projectsSchemaReady()](/code/functions/projectsSchemaReady.md), [projectTaskStats()](/code/functions/projectTaskStats.md), [projectVisibleSql()](/code/functions/projectVisibleSql.md), [tasksContractorReady()](/code/functions/tasksContractorReady.md)

