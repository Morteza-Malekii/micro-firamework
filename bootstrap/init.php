<?php

define('BASEPATH', realpath(__DIR__ . '/../') . DIRECTORY_SEPARATOR);

include BASEPATH ."vendor/autoload.php";


$dotenv = Dotenv\Dotenv::createImmutable(BASEPATH);
$dotenv->load();

include BASEPATH ."helpers/helpers.php";