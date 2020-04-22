<?php

use Bramus\Router\Router;

require('vendor/autoload.php');


header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require('./app/Routes/Route.php')

/*
$url = $_POST['url'];

if (!empty($url)) {
    try {
        $filesController->downloadAsMp3($url);

    } catch(Exception $exception) {
        print_r($exception);
        die("Error Exception");
    }
}

if (!empty($_GET['method'])) {
    switch ($_GET['method']) {
        case 'getList': {
            echo $filesController->getList();
        }

    }
}
*/


?>