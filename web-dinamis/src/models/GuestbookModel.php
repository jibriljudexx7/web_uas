<?php
require_once __DIR__ . '/../config/Database.php';

class GuestbookModel {
    private $conn;
    private $table_name = "guestbook";

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function getAllEntries() {
        $query = "SELECT id, name, message, created_at FROM " . $this->table_name . " ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addEntry($name, $message) {
        $query = "INSERT INTO " . $this->table_name . " (name, message) VALUES (:name, :message)";
        $stmt = $this->conn->prepare($query);
        $name = htmlspecialchars(strip_tags($name));
        $message = htmlspecialchars(strip_tags($message));
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":message", $message);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
