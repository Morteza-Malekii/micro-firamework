<?php

use App\Core\Request;

define('BASEPATH', realpath(__DIR__ . '/../') . DIRECTORY_SEPARATOR);

include BASEPATH ."vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(BASEPATH);
$dotenv->load();

$request = new Request;

include BASEPATH ."helpers/helpers.php";
include BASEPATH ."routes/web.php";