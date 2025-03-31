<?php

# Front contoller

use App\Core\Request;
use App\Core\Routing\Route;
use App\Core\Routing\Router;

include 'bootstrap/init.php';


$router = new Router;
$router->run();