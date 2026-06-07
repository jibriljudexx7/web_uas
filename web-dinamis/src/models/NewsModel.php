<?php
require_once __DIR__ . '/../config/Database.php';

class NewsModel {
    private $conn;
    private $table_name = "news";

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($title, $content, $image_url) {
        $query = "INSERT INTO " . $this->table_name . " (title, content, image_url) VALUES (:title, :content, :image_url)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":title", htmlspecialchars(strip_tags($title)));
        $stmt->bindParam(":content", htmlspecialchars(strip_tags($content)));
        $stmt->bindParam(":image_url", htmlspecialchars(strip_tags($image_url)));
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
