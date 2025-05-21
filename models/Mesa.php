<?php
require_once 'config/database.php';

class Mesa {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }

    public function getAll() {
        $stmt = $this->pdo->prepare("SELECT * FROM restaurant_tables");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save($nombre) {
        $stmt = $this->pdo->prepare("INSERT INTO restaurant_tables (name) VALUES (:name)");
        $stmt->bindParam(':name', $nombre);
        $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM restaurant_tables WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM restaurant_tables WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $nombre) {
        $stmt = $this->pdo->prepare("UPDATE restaurant_tables SET name = :nombre WHERE id = :id");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
