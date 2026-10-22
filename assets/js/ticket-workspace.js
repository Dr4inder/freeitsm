/** Optional ticket arrangement. Native controls and their write handlers remain authoritative. */
window.TicketWorkspace = (() => {
    'use strict';
    const sections = ['conversation', 'work', 'links', 'time', 'history'];
    let root = null, ticketId = 0, active = 'conversation';
    const boundRoots = new WeakSet();
    const text = key => t('tickets.workspace.' + key);
    const element = (tag, className, label) => {
        const node = document.createElement(tag);
        if (className) node.className = className;
        if (label !== undefined) node.textContent = label;
        return node;
    };

    function activate(section, focus = false) {
        if (!root || !sections.includes(section)) return;
        active = section;
        root.querySelectorAll('.tw-tab').forEach(tab => {
            const selected = tab.dataset.section === section;
            tab.setAttribute('aria-selected', String(selected));
            tab.tabIndex = selected ? 0 : -1;
            if (selected && focus) tab.focus();
        });
        root.querySelectorAll('.tw-panel').forEach(panel => { panel.hidden = panel.dataset.section !== section; });
        root.dispatchEvent(new CustomEvent('ticket-workspace-section', {detail: {ticketId, section}}));
    }

    function prepare(pane, context) {
        if (root !== pane || Number(context.ticketId) !== ticketId) active = 'conversation';
        root = pane;
        ticketId = Number(context.ticketId);
        const enabled = context.mode === 'workspace';
        pane.classList.toggle('ticket-workspace', enabled);
        document.body.classList.toggle('ticket-workspace-mode', enabled);
        if (!enabled) return;
        // Called before body hydration/editor setup. Never rebuild live editors on a tab switch.
        if (pane.querySelector('.tw-grid')) return;
        const properties = pane.querySelector('#ticketPropertiesContainer');
        if (!properties) return;
        // TRAP: trashed tickets have a disabled wrapper. Keep the entire workspace
        // inside it; moving controls outside would bypass the existing UI guard.
        const host = properties.parentElement;
        const native = [...host.children];
        const header = element('div', 'tw-header');
        const grid = element('div', 'tw-grid');
        const side = element('aside', 'tw-properties');
        side.setAttribute('aria-label', text('properties'));
        const content = element('div', 'tw-main');
        const tabs = element('div', 'tw-tabs');
        tabs.setAttribute('role', 'tablist');
        tabs.setAttribute('aria-label', text('sections'));
        const panels = {};
        sections.forEach(section => {
            const tab = element('button', 'tw-tab', text(section));
            tab.type = 'button';
            tab.id = 'tw-tab-' + section;
            tab.dataset.section = section;
            tab.setAttribute('role', 'tab');
            tab.setAttribute('aria-controls', 'tw-panel-' + section);
            tab.addEventListener('click', () => activate(section));
            tab.addEventListener('keydown', event => {
                const index = sections.indexOf(section);
                const next = event.key === 'ArrowRight' ? (index + 1) % sections.length
                    : event.key === 'ArrowLeft' ? (index + sections.length - 1) % sections.length
                    : event.key === 'Home' ? 0 : event.key === 'End' ? sections.length - 1 : -1;
                if (next >= 0) { event.preventDefault(); activate(sections[next], true); }
            });
            tabs.append(tab);
            const panel = element('section', 'tw-panel');
            panel.id = 'tw-panel-' + section;
            panel.dataset.section = section;
            panel.setAttribute('role', 'tabpanel');
            panel.setAttribute('aria-labelledby', tab.id);
            panels[section] = panel;
        });
        const move = (selector, destination) => {
            [...pane.querySelectorAll(selector)].forEach(node => destination.append(node));
        };
        move('.email-header', header);
        move('.wrong-company-banner, .snooze-banner, .merge-banner, #presenceStrip', header);
        move('.action-toolbar', header);
        const toolbar = header.querySelector('.action-toolbar');
        if (toolbar) move('.link-add-wrap', toolbar);
        side.append(properties);
        const fields = properties.querySelector('.ticket-toolbar');
        if (fields) {
            const groups = [
                ['classification', ['departmentSelect','ticketTypeSelect','statusSelect','prioritySelect','categorySelect','closureCategorySelect','resolutionCodeSelect']],
                ['responsibility', ['teamSelect','ownerSelect','companySelect','sensitivitySelect']],
                ['other', []],
            ];
            const remaining = [...fields.children];
            groups.forEach(([name, ids]) => {
                const group = element('fieldset', 'tw-field-group');
                group.append(element('legend', '', text(name)));
                const chosen = ids.length ? remaining.filter(node => ids.some(id => node.querySelector('#' + id))) : [...fields.children].filter(node => !node.matches('fieldset'));
                chosen.forEach(node => group.append(node));
                if (chosen.length) fields.append(group);
            });
        }
        move('#ticketChecklistContainer', panels.work);
        move('#slaContainer, #timeEntriesContainer', panels.time);
        move('.links-strip', panels.links);
        move('#threadContainer, #notesContainer, #attachmentInfoBar', panels.conversation);
        // The remaining native containers are deliberately preserved. A future
        // field, message channel or integration must not vanish through a whitelist.
        native.forEach(node => {
            if (node.parentElement !== host) return;
            panels.conversation.append(node);
        });
        const historyButton = element('button', 'btn btn-secondary', text('show_history'));
        historyButton.type = 'button';
        historyButton.addEventListener('click', () => showAuditHistory());
        panels.history.append(historyButton);
        content.append(tabs, ...Object.values(panels));
        grid.append(side, content);
        host.append(header, grid);
        const requested = new URLSearchParams(location.search).get('section');
        activate(sections.includes(requested) ? requested : active);
        // Native validation may focus a field in another section. Reveal it before
        // focus is assigned, without copying any of the validation/write rules.
        if (!boundRoots.has(pane)) {
            boundRoots.add(pane);
            pane.addEventListener('invalid', event => {
                const panel = event.target.closest('.tw-panel');
                if (panel) activate(panel.dataset.section);
            }, true);
        }
    }

    function setSectionState(id, section, state, message) {
        if (!root || Number(id) !== ticketId) return;
        const panel = root.querySelector('#tw-panel-' + section);
        if (!panel) return;
        let notice = panel.querySelector(':scope > .tw-state');
        if (state === 'ready') { notice?.remove(); return; }
        if (!notice) { notice = element('div', 'tw-state'); panel.prepend(notice); }
        notice.setAttribute('role', state === 'error' ? 'alert' : 'status');
        notice.textContent = message || text(state === 'error' ? 'unavailable' : 'loading');
        notice.dataset.state = state;
    }

    return {
        prepare, activate, setSectionState,
        refresh(id, section) { if (Number(id) === ticketId) setSectionState(id, section, 'ready'); },
        dispose() { root = null; ticketId = 0; active = 'conversation'; },
        isActive() { return !!root?.classList.contains('ticket-workspace'); },
    };
})();
