<?php

// if ($config->environment == 'dev' && $this->page->rootParent->id != 2 && !$_SERVER['HTTP_X_FORWARDED_HOST']) {
//     $uri = $_SERVER['REQUEST_URI'];
//     Header("Location: http://localhost:3000$uri");
// }

$view->siteTitle = '';
$view->home = $pages->get('/');
$config->urls->dist = $config->urls->site.'templates/dist';
$config->paths->dist = $config->paths->site.'templates/dist';

$view->iconPath = $config->urls->dist.'/svg/sprites.svg';

$view->paginationOptions = [
    'nextItemLabel'	=> "<svg class='icon-arrow-right icon-arrow-right-_5x'><use xlink:href='{$view->iconPath}#icon-arrow-right'></use></svg>",
    'previousItemLabel' => "<svg class='icon-arrow-left icon-arrow-left-_5x''><use xlink:href='{$view->iconPath}#icon-arrow-left'></use></svg>"
];

// Make array from files in js.inc.php and check if they match the current template
// Always load main.bundle.js
$jsRefs = array_filter(explode(PHP_EOL, file_get_contents($config->paths->dist.'/js.php')));
$view->jsRefsOut = '';
foreach ($jsRefs as $jsRef) {
    if (strpos($jsRef, '/'.$page->template.'.bundle.js') !== false) $view->jsRefsOut.= trim($jsRef);
    if (strpos($jsRef, '/main.bundle.js') !== false) $view->jsRefsOut.= trim($jsRef);
}

// Copy CSS Refs
$view->cssRefsOut = file_get_contents($config->paths->dist.'/css.php');

// Set Main navigation output
$navModule = $modules->get("MarkupSimpleNavigation");
$view->mainNavOut = $navModule->render([
    'show_root' => false,
    'levels' => true,
    'max_levels' => 1
]);
?>
