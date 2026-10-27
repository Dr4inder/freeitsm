<?php
if (PHP_SAPI !== 'cli') { http_response_code(404); exit; }
/** Native ticket table, independently of the optional workspace. Local synthetic fixtures only. */
require __DIR__.'/support/ticket-workspace-fixture.php';
require __DIR__.'/support/ticket-workspace-browser.php';
$fixture=null;$restore=null;$exit=1;
try {
    $fixture=ticketWorkspaceFixture();extract($fixture);
    $restore=ticketWorkspaceSetting($conn,'ticket_list_export','ticket_users');
    $insert('emails',['ticket_id'=>$ticket,'from_address'=>'requester@example.invalid','from_name'=>'ZZ Requester',
        'to_recipients'=>'desk@example.invalid','subject'=>'ZZ Workspace ticket','body_content'=>'ZZ Check the service.',
        'body_type'=>'text','received_datetime'=>gmdate('Y-m-d H:i:s'),'direction'=>'Inbound','is_initial'=>1]);
    for($i=1;$i<75;$i++)$insert('tickets',['ticket_number'=>'ZZUI-'.bin2hex(random_bytes(5)),'subject'=>'ZZ Queue selection '.$i,'tenant_id'=>$tenant]);
    $exit=ticketWorkspaceBrowser([],['url'=>$url.'/auth/login.php','verify'=>function(string $ws)use($fixture):array {
        extract($fixture);
        $credentials=json_encode(['username'=>$analysts['full']['username'],'password'=>$analysts['full']['password']]);
        cdpEvaluate($ws,"fetch('login.php',{method:'POST',body:new URLSearchParams($credentials)}).then(r=>r.ok?'ok':'failed')",20);
        cdpEvaluate($ws,'',10,['method'=>'Page.navigate','params'=>['url'=>$url.'/tickets/?ticket_id='.$ticket]]);
        usleep(500000);
        $checks=json_decode(cdpEvaluate($ws,<<<JS
(async()=>{
 window.__tableErrors=[];window.addEventListener('error',e=>__tableErrors.push(e.message));window.addEventListener('unhandledrejection',e=>__tableErrors.push(String(e.reason)));
 const checks=[],check=(label,pass,detail)=>checks.push({label,pass:!!pass,detail});window.__tableChecks=checks;
 const wait=async(fn)=>{for(let i=0;i<200;i++){if(await fn())return true;await new Promise(r=>setTimeout(r,100));}return false;};
 await wait(()=>Number(currentEmail?.ticket_id)===$ticket&&emails.length===75&&(typeof ticketPendingWrites==='undefined'||ticketPendingWrites===0));
 check('message list remains the default independently of the detail layout',window.TICKETS_LIST_LAYOUT==='messages');
 const pane=document.getElementById('readingPane').firstElementChild;
 let initialQuery=null,exportQuery=null;const nativeFetch=window.fetch;
 window.fetch=(input,init)=>{const value=String(input);if(value.includes('tickets/table.php'))initialQuery??=new URL(value,location.href);if(value.includes('table_export.php'))exportQuery=new URL(value,location.href);return nativeFetch(input,init);};
 currentFilter={type:'unassigned'};folderGrouping='analyst';
 await TicketTable.requestMode('table');
 await wait(()=>document.querySelectorAll('#dtBody .dt-row').length===50);
 check('first table request retains the chosen folder',JSON.parse(initialQuery?.searchParams.get('filters')||'{}').assignee_id?.[0]==='unassigned');
 check('switching list style preserves the open reading pane',document.getElementById('readingPane').firstElementChild===pane);
 const rows=[...document.querySelectorAll('#dtBody .dt-row')];
 check('native queue paints only its first 50 tickets',rows.length===50);
 multiSelectPaneMode='keep';
 await handleEmailRowClick({ctrlKey:false,metaKey:false,shiftKey:false},Number(rows[0].dataset.emailId));
 await wait(()=>Number(currentEmail?.ticket_id)===Number(rows[0].dataset.ticketId));
 await handleEmailRowClick({ctrlKey:true,metaKey:false,shiftKey:false},Number(rows[1].dataset.emailId));
 await handleEmailRowClick({ctrlKey:false,metaKey:false,shiftKey:true},Number(rows[3].dataset.emailId));
 check('native modifier selection uses visible rows',TicketTable.getSelectedTicketIds().length===3);
 rows[4].dispatchEvent(new MouseEvent('contextmenu',{bubbles:true,clientX:350,clientY:350}));
 check('context menu targets a row outside the selection',TicketTable.getSelectedTicketIds().length===1&&TicketTable.getSelectedTicketIds()[0]===Number(rows[4].dataset.ticketId));
 const transfer=new DataTransfer();rows[4].dispatchEvent(new DragEvent('dragstart',{bubbles:true,dataTransfer:transfer}));
 check('native drag payload identifies the selected ticket',Number(transfer.getData('text/plain'))===Number(rows[4].dataset.ticketId));
 rows[4].dispatchEvent(new DragEvent('dragend',{bubbles:true,dataTransfer:transfer}));
 document.dispatchEvent(new KeyboardEvent('keydown',{key:'Escape',bubbles:true}));
 document.querySelectorAll('.dt-pagination button')[1].click();await wait(()=>document.querySelectorAll('#dtBody .dt-row').length===25);
 check('changing pages clears hidden selection',TicketTable.getSelectedTicketIds().length===0&&document.querySelectorAll('#dtBody .dt-row').length===25);
 const search=document.getElementById('dtSearch');search.value='ZZ Workspace ticket';search.dispatchEvent(new Event('input',{bubbles:true}));
 await wait(()=>document.querySelectorAll('#dtBody .dt-row').length===1);
 check('native search applies across all pages',document.querySelectorAll('#dtBody .dt-row').length===1&&Number(document.querySelector('#dtBody .dt-row')?.dataset.ticketId)===$ticket);
 const anchorClick=HTMLAnchorElement.prototype.click;HTMLAnchorElement.prototype.click=function(){};
 document.getElementById('dtCsvBtn').click();await wait(()=>exportQuery);await new Promise(r=>setTimeout(r,400));HTMLAnchorElement.prototype.click=anchorClick;
 check('CSV receives the current complete filter and visible columns',exportQuery?.searchParams.get('q')==='zz workspace ticket'&&exportQuery.searchParams.get('columns').split(',').includes('subject'));
 await TicketTable.requestMode('messages');
 check('message mode excludes hidden table rows from selection',visibleEmailIds().length===75);
 await TicketTable.requestMode('table');
 search.value='';search.dispatchEvent(new Event('input',{bubbles:true}));await wait(()=>document.querySelectorAll('#dtBody .dt-row').length===50);
 check('table workflow has no uncaught JavaScript errors',!window.__tableErrors.length,window.__tableErrors);
 return JSON.stringify(checks);
})().catch(error=>JSON.stringify([...window.__tableChecks,{label:'native table workflow completes',pass:false,detail:String(error)}]))
JS,100),true);
        if(array_filter($checks,fn($check)=>!$check['pass']))return $checks;
        $directory=getenv('FREEITSM_SCREENSHOTS');
        if($directory){
            if(!is_dir($directory))mkdir($directory,0700,true);
            foreach([1440,1024,768,390]as$width){
                $emulate=['method'=>'Emulation.setDeviceMetricsOverride','params'=>['width'=>$width,'height'=>1000,'deviceScaleFactor'=>1,'mobile'=>false]];
                $capture=json_decode(cdpEvaluate($ws,'',10,['method'=>'Page.captureScreenshot','params'=>['format'=>'png']],[$emulate,['method'=>'Runtime.evaluate','params'=>['expression'=>"new Promise(r=>setTimeout(()=>r('ready'),400))",'awaitPromise'=>true]]]),true);
                if(isset($capture['data']))file_put_contents($directory.'/table-'.$width.'.png',base64_decode($capture['data']));
            }
        }
        return $checks;
    }]);
}finally{
    if($restore)$restore();
    if($fixture)($fixture['cleanup'])();
}
exit($exit);
