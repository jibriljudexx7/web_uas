<?php
session_start();
require_once __DIR__ . '/../models/UserModel.php';

class AuthController {
    private $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    public function login() {
        $errorMsg = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if (!empty($username) && !empty($password)) {
                $user = $this->model->findByUsername($username);
                if ($user && $this->model->verifyPassword($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['full_name'] = $user['full_name'];
                    header('Location: index.php');
                    exit;
                } else {
                    $errorMsg = 'ACCESS DENIED: Invalid credentials.';
                }
            } else {
                $errorMsg = 'ERROR: All fields are required.';
            }
        }

        require_once __DIR__ . '/../views/login.php';
    }

    public function logout() {
        session_destroy();
        header('Location: index.php?page=login');
        exit;
    }

    public static function check() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['user_id']);
    }
}
