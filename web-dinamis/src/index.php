<?php
// MVC Front Controller with Routing
require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/controllers/PublicController.php';
require_once __DIR__ . '/controllers/DashboardController.php';

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;
    case 'register':
        $controller = new AuthController();
        $controller->register();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    case 'schedule':
        require_once __DIR__ . '/controllers/ScheduleController.php';
        $controller = new ScheduleController();
        $controller->index();
        break;
    case 'dashboard':
        $controller = new DashboardController();
        $controller->index();
        break;
    default:
        $controller = new PublicController();
        $controller->index();
        break;
}
