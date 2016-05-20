<?php
session_start();
require_once "config.php";
use App\Controllers\Route_Controller;
require_once "autoload.php";
$controller = Route_Controller::instance();
$controller->route();

?>