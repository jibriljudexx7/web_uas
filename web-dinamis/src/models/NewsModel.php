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
        $cleanTitle = htmlspecialchars(strip_tags($title));
        $cleanContent = htmlspecialchars(strip_tags($content));
        $cleanImageUrl = htmlspecialchars(strip_tags($image_url));
        $stmt->bindParam(":title", $cleanTitle);
        $stmt->bindParam(":content", $cleanContent);
        $stmt->bindParam(":image_url", $cleanImageUrl);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
