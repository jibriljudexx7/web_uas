<?php
require_once __DIR__ . '/../config/Database.php';

class UserModel {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function findByUsername($username) {
        $query = "SELECT * FROM users WHERE username = :username LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function verifyPassword($password, $hash) {
        return password_verify($password, $hash);
    }
}
