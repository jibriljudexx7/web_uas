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

    public function findById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($username, $password, $full_name) {
        $stmt = $this->conn->prepare("INSERT INTO users (username, password, full_name, role) VALUES (:username, :password, :full_name, 'fan')");
        $stmt->bindParam(":username", $username);
        
        $hashed = password_hash($password, PASSWORD_BCRYPT);
        $stmt->bindParam(":password", $hashed);
        $stmt->bindParam(":full_name", $full_name);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
