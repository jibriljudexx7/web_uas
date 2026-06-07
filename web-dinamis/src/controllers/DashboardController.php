<?php
require_once __DIR__ . '/../models/NewsModel.php';
require_once __DIR__ . '/../models/TourModel.php';
require_once __DIR__ . '/AuthController.php';

class DashboardController {
    private $newsModel;
    private $tourModel;

    public function __construct() {
        if (!AuthController::check()) {
            header('Location: index.php?page=login');
            exit;
        }
        $this->newsModel = new NewsModel();
        $this->tourModel = new TourModel();
    }

    public function index() {
        // Only admin can access dashboard
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header('Location: index.php?page=schedule');
            exit;
        }

        $news = $this->newsModel->getAll();
        $tours = $this->tourModel->getAll();
        
        $pageTitle = 'Admin Dashboard - Echoes of Eternity';
        $viewType = 'dashboard';
        
        // Handle Post Requests for Create/Delete
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action'] ?? '';
            
            if ($action === 'add_news') {
                $this->newsModel->create($_POST['title'], $_POST['content'], $_POST['image_url']);
            } elseif ($action === 'delete_news') {
                $this->newsModel->delete($_POST['id']);
            } elseif ($action === 'add_tour') {
                $this->tourModel->create($_POST['city'], $_POST['venue'], $_POST['tour_date'], $_POST['status']);
            } elseif ($action === 'delete_tour') {
                $this->tourModel->delete($_POST['id']);
            }
            
            // Redirect to avoid form resubmission
            header('Location: index.php?page=dashboard');
            exit;
        }
        
        require_once __DIR__ . '/../views/dashboard.php';
    }
}
