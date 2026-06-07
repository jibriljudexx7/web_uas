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
        $pageTitle = "Login | Echoes of Eternity";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if (!empty($username) && !empty($password)) {
                $user = $this->model->findByUsername($username);
                if ($user && $this->model->verifyPassword($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['full_name'] = $user['full_name'];
                    $_SESSION['role'] = $user['role'];
                    
                    if ($user['role'] === 'admin') {
                        header('Location: index.php?page=dashboard');
                    } else {
                        header('Location: index.php?page=schedule');
                    }
                    exit;
                } else {
                    $errorMsg = 'ACCESS DENIED: Invalid credentials.';
                }
            } else {
                $errorMsg = 'ERROR: All fields are required.';
            }
        }

        $contentView = __DIR__ . '/../views/login.php';
        require_once __DIR__ . '/../views/layout.php';
    }

    public function register() {
        $errorMsg = '';
        $successMsg = '';
        $pageTitle = "Register | Echoes of Eternity";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $fullname = $_POST['full_name'] ?? '';

            if (!empty($username) && !empty($password) && !empty($fullname)) {
                if ($this->model->findByUsername($username)) {
                    $errorMsg = 'ERROR: Username already exists.';
                } else {
                    if ($this->model->create($username, $password, $fullname)) {
                        header('Location: index.php?page=login&registered=1');
                        exit;
                    } else {
                        $errorMsg = 'ERROR: Failed to register.';
                    }
                }
            } else {
                $errorMsg = 'ERROR: All fields are required.';
            }
        }

        $contentView = __DIR__ . '/../views/register.php';
        require_once __DIR__ . '/../views/layout.php';
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
