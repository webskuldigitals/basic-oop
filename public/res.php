<?php

include __DIR__ . '/../app/init.php';

$data = CommonRequest::getQueryString();

ResourceManager::getContent($data);