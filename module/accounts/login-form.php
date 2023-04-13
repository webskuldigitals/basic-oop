<?php

echo ResourceManager::loadResources('login',[
    'css' =>['style'],
    'js' => ['script']
]);


$controller = new LoginController();
echo $controller->test();