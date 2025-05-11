<?php
require_once './config/Conexion.php';

class Plato {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexion::getConexion();
    }

    public function listar() {
        $sql = "SELECT p.*, c.nombre AS categoria FROM platos p JOIN categorias c ON p.categoria_id = c.id";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear($descripcion, $precio_unitario, $categoria_id) {
        $sql = "INSERT INTO platos(descripcion, precio_unitario, categoria_id) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$descripcion, $precio_unitario, $categoria_id]);
    }

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM platos WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $descripcion, $precio_unitario) {
        $sql = "UPDATE platos SET descripcion = ?, precio_unitario = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$descripcion, $precio_unitario, $id]);
    }

    public function eliminar($id) {
        $sql = "DELETE FROM platos WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
}