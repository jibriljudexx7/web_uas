<?php
// MVC Front Controller
require_once __DIR__ . '/controllers/HomeController.php';

$controller = new HomeController();
$controller->index();
