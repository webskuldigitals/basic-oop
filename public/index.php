<?php

include __DIR__ . '/../app/init.php';

if(!empty(CommonRequest::getQueryString('module')))
{
    $moduleId = CommonRequest::getQueryString('module');
}else{
    $moduleId = 1;
}

$moduleController = new ModuleController(new ModuleModel(CommonHelper::db()));
$module = $moduleController->getModule($moduleId);
define('MODULE_NAME', $module['folder']);

if(!empty(CommonRequest::getQueryString('what')))
{
    $whatId = CommonRequest::getQueryString('what');
}else{
    $whatId = '';
}

include_once ABS_PATH . DS . ".." . DS . "module" . DS . MODULE_NAME . DS . MODULE_NAME . ".php";

$whatController = new WhatController(new WhatModel(CommonHelper::db()));
$what = $whatController->getWhat($whatId);
define('WHAT_NAME', $what['file']);

include_once ABS_PATH . DS . ".." . DS . "theme" . DS . "header.php";

include_once ABS_PATH . DS . ".." . DS . "module" . DS . MODULE_NAME . DS . WHAT_NAME . ".php";

include_once ABS_PATH . DS . ".." . DS . "theme" . DS . "footer.php";