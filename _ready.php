<?php

// Template for save hook
$wire->pages->addHookBefore('save', function($event) {
    return;
    // $page = $event->arguments[0];
    // if (!$page->isChanged('FIELD')) return;
    // $this->message("Nachricht");
});

// Template for cronjob
$wire->addHook('LazyCron::everyMinute', null, function($event) {
    // https://processwire.com/docs/more/lazy-cron/
    // every30Seconds
    // every2Days
    // wire('log')->save('filename', "Unbestätigte Anfragen automatisch entfernt.");
});

// Pagelist rendering: Customize page labels
$wire->addHook("ProcessPageListRender::getPageLabel", null, function($event){
    // Based on https://github.com/benbyford/MarkInPageTree
    // $page = $event->arguments[0];
    // $event->return = 'Neuer Titel';
});

// Pagelist rendering: remove specific pages and templates for users with role redakteur
$wire->addHook("ProcessPageList::execute", null, function($event){
    // Based on https://gist.github.com/somatonic/5595081
    // if(!isset($_GET['render'])) return;
    // if(!$this->config->ajax) return;
    // if (!$this->user->hasRole('redakteur')) return;

    // $hiddenTemplates = [];
    // $hiddenPages = [];

    // $pageArray = json_decode($event->return, true);

    // foreach($pageArray['children'] as $key => $child){
    //     if(in_array($child['id'], $hiddenPages) || in_array($child['template'], $hiddenTemplates)) unset($pageArray['children'][$key]);
    // }

    // $pageArray['children'] = array_values($pageArray['children']);
    // $event->return = json_encode($pageArray);
});
?>
