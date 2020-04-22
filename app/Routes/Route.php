<?php

use Bramus\Router\Router;

include_once './app/Controllers/FilesController.php';

// Create Router instance
$router = new Router();

$router->setNamespace('Controllers');

$router->get('/file/all', 'FilesController@getList');
$router->post('/file/download/audio', 'FilesController@downloadAsMp3');

// Run !
$router->run();
