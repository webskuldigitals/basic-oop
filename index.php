<?php

include 'init.php';

$db = new PDO("mysql:host=localhost;dbname=milk", 'root', '');

$milkController = new MilkController(new MilkModel($db));

if(isset($_POST['task'])){
    echo $milkController->dispatch($_POST);
    die;
}

$milkController->getFirstView();