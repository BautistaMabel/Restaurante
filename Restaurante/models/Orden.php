<?php
require_once './config/Conexion.php';

class Orden {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexion::getConexion();
    }

    public function listar() {
        $sql = "SELECT * FROM ordenes";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear($fecha, $mesa_id, $total) {
        $sql = "INSERT INTO ordenes(fecha, mesa_id, total) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$fecha, $mesa_id, $total]);
        return $this->pdo->lastInsertId();
    }

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM ordenes WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function anular($id) {
        $sql = "UPDATE ordenes SET anulado = 1 WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
}