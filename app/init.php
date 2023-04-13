<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

define ('ABS_PATH', __DIR__);

if ((isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' )
    || ( isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false))
{
	define('IS_AJAX', true);
}
else
{
	define('IS_AJAX', false);
}

include ABS_PATH . DS . 'functions.php';
include ABS_PATH . DS . 'config' . DS . 'config.php';