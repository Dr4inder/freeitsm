# people/includes/render.php

> PHP - 274 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [pplE()](/code/functions/pplE.md) | 13 |  |
| [pplUrl()](/code/functions/pplUrl.md) | 14 |  |
| [pplStats()](/code/functions/pplStats.md) | 17 | The coloured strip of counts across the top of a page. |
| [pplCard()](/code/functions/pplCard.md) | 39 | One section card: a heading with its count, then a table or "Nothing yet". |
| [pplLink()](/code/functions/pplLink.md) | 59 |  |
| [pplPill()](/code/functions/pplPill.md) | 64 |  |
| [pplSectionTickets()](/code/functions/pplSectionTickets.md) | 71 |  |
| [pplSectionAssets()](/code/functions/pplSectionAssets.md) | 88 |  |
| [pplSectionContracts()](/code/functions/pplSectionContracts.md) | 102 |  |
| [pplSectionDomains()](/code/functions/pplSectionDomains.md) | 118 |  |
| [pplSectionCoursesPerson()](/code/functions/pplSectionCoursesPerson.md) | 134 |  |
| [pplSectionCoursesCompany()](/code/functions/pplSectionCoursesCompany.md) | 152 |  |
| [pplSectionForms()](/code/functions/pplSectionForms.md) | 159 |  |
| [pplRaciDuties()](/code/functions/pplRaciDuties.md) | 179 | A person's RACI duties on one project, one line per letter: "Accountable for Phones working on day one, Every desk patched and 2 more". The full list is the line's tooltip. |
| [pplSectionProjects()](/code/functions/pplSectionProjects.md) | 192 | Projects (3.2.0): a person's memberships with their role and RACI duties, or a company's projects. |
| [pplSectionContractorTasks()](/code/functions/pplSectionContractorTasks.md) | 213 | Contractors (3.3.0): the tasks given to a supplier, or to one person there. |
| [pplSections()](/code/functions/pplSections.md) | 230 | Every section present, in a fixed order. |
| [pplHead()](/code/functions/pplHead.md) | 245 | The <head> every People page shares. `$extraCss`: page stylesheets, linked BEFORE mobile.css so the mobile layer still wins its ties (Techniques §9). |
| [pplInitials()](/code/functions/pplInitials.md) | 267 | Two letters for an avatar. |

## How it hangs together

**Included by:** [people/companies.php](/code/files/people/companies.php.md), [people/company.php](/code/files/people/company.php.md), [people/contact.php](/code/files/people/contact.php.md), [people/help.php](/code/files/people/help.php.md), [people/index.php](/code/files/people/index.php.md), [people/person.php](/code/files/people/person.php.md), [people/supplier.php](/code/files/people/supplier.php.md), [people/suppliers.php](/code/files/people/suppliers.php.md)

**Calls:** [fmt_date()](/code/functions/fmt_date.md), [fmt_datetime()](/code/functions/fmt_datetime.md), [pageTitle()](/code/functions/pageTitle.md), [peopleBareDate()](/code/functions/peopleBareDate.md), [t()](/code/functions/t.md)

