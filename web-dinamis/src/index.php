<?php
// MVC Front Controller with Routing
require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/controllers/HomeController.php';

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    default:
        // Protect home page - require login
        if (!AuthController::check()) {
            header('Location: index.php?page=login');
            exit;
        }
        $controller = new HomeController();
        $controller->index();
        break;
}
