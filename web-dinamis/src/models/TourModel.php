<?php
require_once __DIR__ . '/../config/Database.php';

class TourModel {
    private $conn;
    private $table_name = "tours";

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY tour_date ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($city, $venue, $tour_date, $status) {
        $query = "INSERT INTO " . $this->table_name . " (city, venue, tour_date, status) VALUES (:city, :venue, :tour_date, :status)";
        $stmt = $this->conn->prepare($query);
        $cleanCity = htmlspecialchars(strip_tags($city));
        $cleanVenue = htmlspecialchars(strip_tags($venue));
        $stmt->bindParam(":city", $cleanCity);
        $stmt->bindParam(":venue", $cleanVenue);
        $stmt->bindParam(":tour_date", $tour_date);
        $stmt->bindParam(":status", $status);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
