<?php
namespace App; 
include_once("src/View.php");
require_once("src/Utils/debug.php");
include_once("src/Controller.php");
$configuration = require_once("config/config.php");

$params = 
[
    'GET' => $_GET, 
    'POST' => $_POST
];

Controller::initConfiguration($configuration['db']);
(new Controller($params)) -> run(); 