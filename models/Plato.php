<?php
require_once 'config/database.php';

class Plato {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }

    public function getAll() {
        $stmt = $this->pdo->prepare("SELECT d.id, d.description, d.price, d.idCategory, c.name AS categoria
                                     FROM dishes d
                                     INNER JOIN categories c ON d.idCategory = c.id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save($descripcion, $categoria, $precio) {
        $stmt = $this->pdo->prepare("INSERT INTO dishes (description, idCategory, price)
                                     VALUES (:descripcion, :categoria, :precio)");
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':precio', $precio);
        $stmt->execute();
    }

    public function delete($id) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM dishes WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "<p style='color:red;'>No se puede eliminar este plato porque está relacionado con una o más órdenes.</p>";
            echo "<a href='index.php?controller=plato'>Volver</a>";
            exit;
        }
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM dishes WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $descripcion, $categoria, $precio) {
        $stmt = $this->pdo->prepare("UPDATE dishes SET description = :descripcion, idCategory = :categoria, price = :precio WHERE id = :id");
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function getCategorias() {
        $stmt = $this->pdo->prepare("SELECT id, name FROM categories");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
