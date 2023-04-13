<?php

function my_autoloader($class) : void
{
    if(is_readable(ABS_PATH . DS .'class'. DS . $class.'.php')){
		include ABS_PATH . DS .'class'. DS . $class.'.php';
	}elseif(is_readable(ABS_PATH . DS . '..' . DS . 'module'. DS . MODULE_NAME . DS . 'class' . DS . $class.'.php')){
		include ABS_PATH . DS . '..' . DS . 'module'. DS . MODULE_NAME . DS . 'class' . DS . $class.'.php';
	}
}

spl_autoload_register('my_autoloader');
