<?php
require_once __DIR__ . '/../models/GuestbookModel.php';

class HomeController {
    private $model;

    public function __construct() {
        $this->model = new GuestbookModel();
    }

    public function index() {
        // Handle form submission
        $successMsg = '';
        $errorMsg = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['name']) && !empty($_POST['message'])) {
                if ($this->model->addEntry($_POST['name'], $_POST['message'])) {
                    $successMsg = "Data Transmission Successful!";
                } else {
                    $errorMsg = "System Error: Transmission Failed.";
                }
            } else {
                $errorMsg = "Validation Error: Operator Name and Data cannot be empty.";
            }
        }

        // Get logged-in user info
        $loggedUser = $_SESSION['full_name'] ?? 'Unknown';

        // Fetch entries
        $entries = $this->model->getAllEntries();

        // Render view
        require_once __DIR__ . '/../views/home.php';
    }
}
