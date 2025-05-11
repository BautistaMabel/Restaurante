<?php
require_once './config/Conexion.php';

class Categoria {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexion::getConexion();
    }

    public function listar() {
        $sql = "SELECT * FROM categorias";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear($nombre) {
        $sql = "INSERT INTO categorias(nombre) VALUES (?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nombre]);
    }

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM categorias WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $nombre) {
        $sql = "UPDATE categorias SET nombre = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nombre, $id]);
    }

    public function eliminar($id) {
        $sql = "DELETE FROM categorias WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
}