<?php
require_once __DIR__ . '/../models/TourModel.php';
require_once __DIR__ . '/../models/NewsModel.php';

class ScheduleController {
    public function index() {
        // Protect this route, only logged in users (fans/admins) can view
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit;
        }

        $tourModel = new TourModel();
        $newsModel = new NewsModel();
        $tours = $tourModel->getAll();
        $news = $newsModel->getAll(); // Fans can also see the gallery of images

        $pageTitle = 'Tour Schedule | Echoes of Eternity';
        $contentView = __DIR__ . '/../views/schedule.php';
        require_once __DIR__ . '/../views/layout.php';
    }
}
