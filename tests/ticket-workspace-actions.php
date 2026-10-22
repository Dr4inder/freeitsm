<?php
if (PHP_SAPI !== 'cli') { http_response_code(404); exit; }

/** Native async loaders and navigation against controlled HTTP responses.
 * Tests the real delivered handlers; no mail, AI or external tracker is contacted.
 */
require __DIR__ . '/support/ticket-workspace-browser.php';
require __DIR__ . '/support/ticket-workspace-page.php';
$html = ticketWorkspacePage() . <<<'HTML'
<script>
document.addEventListener=originalAdd;
const checks=[];
const check=(label,pass,detail)=>checks.push({label,pass:!!pass,detail});
const realNotes=loadNotes, realTasks=loadTicketTasks, realSla=loadSlaState;
const realCustom=loadTicketCustomFields;
for(const name of ['loadAiSummary','loadTicketChecklists','loadCorrespondenceThread','loadNotes',
    'loadTicketAttachments','loadCmdbObjects','loadTicketDomains','loadTicketProjects','loadTicketAssets',
    'loadTicketTasks','loadTimeEntries','loadSlaState','loadTicketCustomFields','startPresence']) window[name]=()=>{};
const ticket={id:10,ticket_id:101,ticket_number:'ZZ-101',subject:'ZZ asynchronous ticket',
    status:'Open',received_datetime:'2026-01-01 09:00:00',body_content:'ZZ message',body_type:'text',
    sensitivity:'normal',linked_tickets:{},problems:[],changes:[]};
const response=data=>({ok:true,json:async()=>data});
(async()=>{
    displayEmail(ticket,[]);
    document.querySelector('[onclick="toggleLinkAddMenu(event)"]').click();
    check('native Link to menu opens and keeps all nine destinations',document.getElementById('linkAddMenu').classList.contains('open')&&document.querySelectorAll('#linkAddMenu button').length===9);
    let deliver;
    window.fetch=()=>new Promise(resolve=>{deliver=resolve});
    const pending=realNotes(101);
    displayEmail({...ticket,ticket_id:102},[]);
    deliver(response({success:true,notes:[{id:5,note_text:'ZZ stale private note',created_datetime:'2026-01-01 09:00:00',analyst_name:'ZZ Analyst'}]}));
    await pending;
    check('old notes cannot enter a new ticket',!document.getElementById('notesContainer').textContent.includes('ZZ stale private note'));
    const pendingSame=realNotes(102);
    displayEmail({...ticket,ticket_id:102},[]);
    deliver(response({success:true,notes:[{id:6,note_text:'ZZ earlier generation',created_datetime:'2026-01-01 09:00:00',analyst_name:'ZZ Analyst'}]}));
    await pendingSame;
    check('same-ticket rerender also invalidates old responses',!document.getElementById('notesContainer').textContent.includes('ZZ earlier generation'));
    window.fetch=async()=>response({success:false,error:'ZZ failed lookup'});
    await realTasks(102);
    check('task lookup failure is visible, not an empty task list',!!document.querySelector('#tw-panel-work [role=alert]'));
    await realSla(102);
    check('SLA lookup failure is visible, not disabled SLA',!!document.querySelector('#tw-panel-time [role=alert]'));
    window.TicketFields={render:()=>'<input id="zzCustom">'};
    await realCustom(102);
    check('custom field lookup failure remains visible',!!document.querySelector('#ticketCustomFields [role=alert]'));
    window.fetch=async()=>response({success:false});
    const failed=await TicketWorkspace.requestMode('inbox');
    check('failed preference save retains current view',failed===false&&window.TICKETS_DETAIL_LAYOUT==='workspace'&&document.getElementById('readingPane').classList.contains('ticket-workspace'));
    const modal=document.createElement('div');modal.id='noteModal';modal.className='modal active';document.body.append(modal);
    window.confirm=()=>false;
    let writes=0;window.fetch=async()=>{writes++;return response({success:true})};
    const stayed=await TicketWorkspace.requestMode('inbox');
    check('declining discard retains draft and performs no preference write',!stayed&&modal.classList.contains('active')&&writes===0);
    modal.remove();
    const changed=await TicketWorkspace.requestMode('inbox');
    check('explicit successful choice changes only presentation',changed&&window.TICKETS_DETAIL_LAYOUT==='inbox'&&currentEmail.ticket_id===102);
})().catch(error=>check('native actions complete',false,String(error))).finally(()=>{
    document.getElementById('result').textContent=JSON.stringify(checks);
});
</script></body></html>
HTML;
exit(ticketWorkspaceBrowser(['index.html' => $html]));
