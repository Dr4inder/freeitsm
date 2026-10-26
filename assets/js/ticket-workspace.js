/** Optional ticket arrangement. Native controls and their write handlers remain authoritative. */
window.TicketWorkspace = (() => {
    'use strict';
    const sections = ['conversation', 'work', 'links', 'time', 'history'];
    let root = null, ticketId = 0, active = 'conversation';
    const boundRoots = new WeakSet();
    let changingMode = false, deferredRender = null;
    const propertyDrafts = new Map();
    let taskFrame = null, taskContext = null, leaveRequest = null, frameGeneration = 0;

    function hasPropertyDrafts() {
        let dirty = false;
        for (const [field, value] of propertyDrafts) {
            if (!field.isConnected) propertyDrafts.delete(field);
            else if (field.value !== value) dirty = true;
        }
        return dirty;
    }
    const text = key => t('tickets.workspace.' + key);
    const element = (tag, className, label) => {
        const node = document.createElement(tag);
        if (className) node.className = className;
        if (label !== undefined) node.textContent = label;
        return node;
    };

    // Keep native writers and the installed CSRF fetch wrapper. While one is
    // receiving its response, another ticket must not become its UI target.
    const nativeFetch = window.fetch.bind(window);
    window.fetch = async (input, init) => {
        const url = new URL(input instanceof Request ? input.url : String(input), location.href);
        const method = (init?.method || (typeof input !== 'string' ? input.method : '') || 'GET').toUpperCase();
        const track = root?.classList.contains('ticket-workspace') && url.origin === location.origin
            && url.pathname.includes('/api/') && !url.pathname.endsWith('/system/set_user_preference.php')
            && !['GET','HEAD','OPTIONS'].includes(method);
        if (!track) return nativeFetch(input, init);
        ticketPendingWrites++;
        const finish = () => setTimeout(() => { ticketPendingWrites--; flushRender(); }, 0);
        try {
            const response = await nativeFetch(input, init);
            response.clone().text().then(finish, finish);
            return response;
        } catch (error) { finish(); throw error; }
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
        if (section === 'history') {
            const body = root.querySelector('#twAuditBody');
            if (body && body.getAttribute('aria-busy') !== 'true') {
                body.setAttribute('aria-busy', 'true');
                setSectionState(ticketId, 'history', 'loading');
                showAuditHistory(true).finally(() => body.setAttribute('aria-busy', 'false'));
            }
        }
        root.dispatchEvent(new CustomEvent('ticket-workspace-section', {detail: {ticketId, section}}));
    }

    function enabled(email) {
        const config = window.TICKET_WORKSPACE || {};
        return config.personal !== false && (config.mode === 'all'
            || (config.mode === 'selected' && Number(email.is_workspace) === 1));
    }

    function fieldGroup(name, html) {
        return '<fieldset class="tw-field-group"><legend>' + escapeHtml(text(name)) + '</legend>' + html + '</fieldset>';
    }

    /** Receives the shared renderer's fragments, never a rendered classic pane. */
    function render(parts) {
        const tabs = sections.map(section => `<button type="button" class="tw-tab" id="tw-tab-${section}"
            data-section="${section}" role="tab" aria-controls="tw-panel-${section}"
            aria-selected="false" tabindex="-1">${escapeHtml(text(section))}</button>`).join('');
        const panels = sections.map(section => `<section class="tw-panel" id="tw-panel-${section}"
            data-section="${section}" role="tabpanel" aria-labelledby="tw-tab-${section}" hidden>
            ${section === 'history' ? '<div class="tw-history-content" id="twAuditBody"></div>' : parts[section] || ''}</section>`).join('');
        return `<div class="tw-header">${parts.header}<button type="button" class="tw-sla-summary"
                id="twSlaSummary" onclick="TicketWorkspace.activate('time')" hidden></button></div>
            <div class="tw-grid"><aside class="tw-properties" aria-label="${escapeHtml(text('properties'))}">${parts.properties}</aside>
            <div class="tw-main"><div class="tw-tabs" role="tablist" aria-label="${escapeHtml(text('sections'))}">${tabs}</div>${panels}</div></div>`;
    }

    function prepare(pane, context) {
        if (root !== pane || Number(context.ticketId) !== ticketId || !context.enabled) disposeTask();
        if (root !== pane || Number(context.ticketId) !== ticketId) active = 'conversation';
        root = pane;
        ticketId = Number(context.ticketId);
        pane.classList.toggle('ticket-workspace', context.enabled);
        document.body.classList.toggle('ticket-workspace-mode', context.enabled);
        if (!boundRoots.has(pane)) {
            boundRoots.add(pane);
            pane.addEventListener('focusin', event => {
                const field = event.target;
                if (field.matches('#ticketCustomFields input, #ticketCustomFields textarea') && !propertyDrafts.has(field)) {
                    propertyDrafts.set(field, field.value);
                }
            });
            pane.addEventListener('invalid', event => {
                const panel = event.target.closest('.tw-panel');
                if (panel) activate(panel.dataset.section);
            }, true);
        }
        if (!context.enabled) return;
        // Bind only behavior. Tab changes hide sections and preserve live inputs.
        pane.querySelectorAll('.tw-tab').forEach(tab => {
            tab.addEventListener('click', () => activate(tab.dataset.section));
            tab.addEventListener('keydown', event => {
                const index = sections.indexOf(tab.dataset.section);
                const next = event.key === 'ArrowRight' ? (index + 1) % sections.length
                    : event.key === 'ArrowLeft' ? (index + sections.length - 1) % sections.length
                    : event.key === 'Home' ? 0 : event.key === 'End' ? sections.length - 1 : -1;
                if (next >= 0) { event.preventDefault(); activate(sections[next], true); }
            });
        });
        const requested = new URLSearchParams(location.search).get('section');
        activate(sections.includes(requested) ? requested : active);
    }

    /** Reuse the native SLA indicator and values, including their error state. */
    function updateSla(id, sla) {
        if (!root || Number(id) !== ticketId) return;
        const summary = root.querySelector('#twSlaSummary');
        if (!summary) return;
        summary.hidden = sla !== null && !sla.enabled;
        if (sla === null) summary.textContent = text('sla_unavailable');
        else summary.innerHTML = renderInboxSlaIndicator(sla);
        if (sla !== null && !summary.textContent.trim()) summary.hidden = true;
    }

    function revealMissing(id, missing) {
        if (!root?.classList.contains('ticket-workspace') || Number(id) !== ticketId) return;
        const fields = {
            priority:'prioritySelect', ticket_type:'ticketTypeSelect', department:'departmentSelect',
            category:'categorySelect', closure_category:'closureCategorySelect', resolution_code:'resolutionCodeSelect',
            team:'teamSelect', owner:'ownerSelect', origin:'originSelect',
            first_time_fix:'firstTimeFixSelect', it_training:'itTrainingSelect',
        };
        for (const {key} of missing) {
            const target = key.startsWith('cf:')
                ? [...root.querySelectorAll('[data-tf-key]')].find(node => node.dataset.tfKey === key.slice(3))
                : key === 'work_start' ? root.querySelector('[onclick="openScheduleModal()"]')
                : fields[key] ? root.querySelector('#' + fields[key]) : null;
            if (!target) continue;
            target.closest('.ticket-properties-container')?.classList.add('expanded');
            const panel = target.closest('.tw-panel');
            if (panel) activate(panel.dataset.section);
            target.scrollIntoView({block:'nearest'});
            target.focus({preventScroll:true});
            return;
        }
    }

    function setSectionState(id, section, state, message, source = section) {
        if (!root || Number(id) !== ticketId) return;
        const panel = root.querySelector('#tw-panel-' + section);
        if (!panel) return;
        let notice = [...panel.querySelectorAll(':scope > .tw-state')].find(node => node.dataset.source === source);
        if (state === 'ready') { notice?.remove(); return; }
        if (!notice) { notice = element('div', 'tw-state'); notice.dataset.source = source; panel.prepend(notice); }
        notice.setAttribute('role', state === 'error' ? 'alert' : 'status');
        notice.textContent = message || text(state === 'error' ? 'unavailable' : 'loading');
        notice.dataset.state = state;
    }

    async function canLeave() {
        if (taskFrame && !await taskCanLeave()) return false;
        if (typeof ticketPendingWrites !== 'undefined' && ticketPendingWrites > 0) return false;
        const dirty = hasPropertyDrafts() || (typeof ticketHasUnsavedInput === 'function' && ticketHasUnsavedInput());
        const accepted = !dirty || (typeof showConfirm === 'function'
            ? await showConfirm({title: text('layout'), message: text('discard'), okLabel: text('discard_button'), okClass: 'danger'})
            : window.confirm(text('discard')));
        if (!accepted) return false;
        for (const [field, value] of propertyDrafts) field.value = value;
        propertyDrafts.clear();
        if (dirty && typeof discardTicketDraft === 'function') discardTicketDraft();
        return true;
    }

    function disposeTask() {
        frameGeneration++;
        if (leaveRequest) { clearTimeout(leaveRequest.timer); leaveRequest.resolve(false); leaveRequest = null; }
        taskFrame?.remove(); taskFrame = null; taskContext = null;
    }

    function taskCanLeave() {
        if (!taskFrame || taskContext?.unavailable) return Promise.resolve(true);
        if (leaveRequest) return leaveRequest.promise;
        const requestId = crypto.randomUUID();
        let resolve;
        const promise = new Promise(done => { resolve = done; });
        const timer = setTimeout(() => { if (leaveRequest?.requestId === requestId) { leaveRequest = null; resolve(false); } }, 45000);
        leaveRequest = {requestId, resolve, promise, timer, generation:frameGeneration};
        taskFrame.contentWindow.postMessage({type:'freeitsm:task-embed:leave',requestId}, location.origin);
        return promise;
    }

    async function openTask(id, taskId) {
        if (!root || Number(id) !== ticketId || !Number.isInteger(Number(taskId)) || Number(taskId) <= 0) return false;
        if (taskContext?.taskId === Number(taskId)) { activate('work'); return true; }
        if (!await taskCanLeave() || Number(id) !== ticketId) return false;
        const area = root.querySelector('#twTaskArea');
        if (!area) return false;
        disposeTask();
        taskContext = {ticketId, taskId:Number(taskId)};
        taskFrame = element('iframe', 'tw-task-frame');
        taskFrame.title = text('task');
        taskFrame.src = '../tasks/embedded.php?task=' + taskContext.taskId + '&ticket_id=' + ticketId;
        taskFrame.addEventListener('load', event => {
            if (event.currentTarget !== taskFrame) return;
            try {
                if (!taskFrame.contentWindow.TaskEmbedBridge) {
                    taskContext.unavailable = true;
                    setSectionState(ticketId, 'work', 'error', null, 'task-editor');
                }
            } catch (_) { taskContext.unavailable = true; }
        });
        const controls = element('div', 'tw-task-controls');
        const external = element('a', 'btn btn-secondary', text('open_task'));
        external.href = '../tasks/index.php?task=' + taskContext.taskId; external.target='_blank'; external.rel='noopener';
        const close = element('button', 'btn btn-secondary', text('close_task'));
        close.type='button';
        close.addEventListener('click', async () => { if (await taskCanLeave()) { disposeTask(); area.replaceChildren(); flushRender(); } });
        controls.append(external,close);
        area.replaceChildren(controls,taskFrame);
        activate('work');
        return true;
    }

    window.addEventListener('message', event => {
        const message = event.data;
        if (!taskFrame || !taskContext || event.origin !== location.origin || event.source !== taskFrame.contentWindow
            || !message || message.ticketId !== taskContext.ticketId || message.taskId !== taskContext.taskId) return;
        if (message.type === 'freeitsm:task-embed:leave-result') {
            if (leaveRequest?.requestId !== message.requestId || leaveRequest.generation !== frameGeneration) return;
            const request = leaveRequest; leaveRequest = null; clearTimeout(request.timer);
            request.resolve(message.canLeave === true); return;
        }
        if (message.type !== 'freeitsm:task-embed') return;
        if (message.event === 'resize' && Number.isFinite(message.height) && message.height > 0) {
            taskFrame.style.height = Math.min(50000, Math.max(300, message.height)) + 'px';
        } else if (message.event === 'changed') {
            if (typeof loadTicketTasks === 'function') loadTicketTasks(ticketId);
        } else if (message.event === 'error') {
            const controls = root.querySelector('.tw-task-controls');
            if (controls) controls.hidden = false;
            setSectionState(ticketId, 'work', 'error', null, 'task-editor');
        } else if (message.event === 'closed') {
            disposeTask(); root.querySelector('#twTaskArea')?.replaceChildren(); flushRender();
        } else if (message.event === 'ready') {
            // Keep the outer actions as a fallback if the native editor cannot load.
            const controls = root.querySelector('.tw-task-controls');
            if (controls) controls.hidden = message.hasActions === true;
            setSectionState(ticketId, 'work', 'ready', null, 'task-editor');
        }
    });

    function flushRender() {
        if (taskFrame || hasPropertyDrafts() || (typeof ticketPendingWrites !== 'undefined' && ticketPendingWrites)
            || (typeof ticketHasUnsavedInput === 'function' && ticketHasUnsavedInput())) return;
        const render = deferredRender; deferredRender = null;
        if (render && Number(render.email.ticket_id) === ticketId) displayEmail(render.email, render.recordings);
    }

    async function requestPersonal(value) {
        const toggle = document.getElementById('ticketWorkspacePreference');
        const config = window.TICKET_WORKSPACE;
        if (changingMode || !config || config.mode === 'off') return false;
        changingMode = true;
        if (toggle) toggle.disabled = true;
        try {
            if (value === config.personal) return true;
            if (!await canLeave()) return false;
            const response = await fetch(sharedApiBase() + 'system/set_user_preference.php', {
                method: 'POST', headers: {'Content-Type':'application/json'},
                body: JSON.stringify({key:'ticket_workspace', value:value ? '1' : '0'})
            });
            const result = await response.json();
            if (!response.ok || !result.success) throw new Error(text('save_failed'));
            disposeTask(); deferredRender = null;
            config.personal = value;
            if (typeof currentEmail !== 'undefined' && currentEmail) displayEmail(currentEmail, currentRecordings);
            return true;
        } catch (error) {
            if (typeof showToast === 'function') showToast(text('save_failed'), 'error');
            return false;
        } finally {
            changingMode = false;
            if (toggle) { toggle.checked = config.personal; toggle.disabled = false; }
        }
    }

    window.addEventListener('beforeunload', event => {
        if (root?.classList.contains('ticket-workspace') && (hasPropertyDrafts() || (typeof ticketPendingWrites !== 'undefined' && ticketPendingWrites)
            || (typeof ticketHasUnsavedInput === 'function' && ticketHasUnsavedInput()))) {
            event.preventDefault(); event.returnValue='';
        }
    });

    return {
        enabled, render, fieldGroup, prepare, activate, openTask, releaseTask: disposeTask, updateSla, revealMissing, setSectionState, requestPersonal, canLeave, flushRender,
        propertySaved(field) { propertyDrafts.set(field, field.value); },
        holdRender(email, recordings) {
            const busy = taskFrame || hasPropertyDrafts() || (typeof ticketPendingWrites !== 'undefined' && ticketPendingWrites)
                || (typeof ticketHasUnsavedInput === 'function' && ticketHasUnsavedInput());
            if (!root?.classList.contains('ticket-workspace') || !busy || Number(email.ticket_id) !== ticketId) return false;
            deferredRender = {email, recordings}; return true;
        },
        tasksLoaded(id, tasks) {
            if (taskFrame && Number(id) === ticketId && !tasks.some(task => Number(task.id) === taskContext.taskId)) {
                taskFrame.contentWindow.postMessage({type:'freeitsm:task-embed:context-lost'}, location.origin);
                setSectionState(id,'work','error',null,'task-editor');
            }
        },
        refresh(id, section) { if (Number(id) === ticketId) setSectionState(id, section, 'ready'); },
        dispose() {
            disposeTask();
            root?.classList.remove('ticket-workspace');
            document.body.classList.remove('ticket-workspace-mode');
            deferredRender = null; root = null; ticketId = 0; active = 'conversation';
        },
        isActive() { return !!root?.classList.contains('ticket-workspace'); },
    };
})();
