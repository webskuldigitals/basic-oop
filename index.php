
<?php
include 'Data.php';
include 'Controller.php';
include 'View.php';
$controller = new Controller();

if(isset($_GET['data'])){
    header('Content-type:application/json');
    echo $controller->getData($_GET);
    die;
}

include ('form.html.php');

?>