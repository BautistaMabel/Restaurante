<?php
require_once './config/Conexion.php';

class DetalleOrden {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexion::getConexion();
    }

    public function insertar($orden_id, $plato_id, $cantidad, $precio_unitario) {
        $sql = "INSERT INTO detalle_orden (orden_id, plato_id, cantidad, precio_unitario)
                VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$orden_id, $plato_id, $cantidad, $precio_unitario]);
    }

    public function listarPorOrden($orden_id) {
        $sql = "SELECT d.*, p.descripcion
                FROM detalle_orden d
                JOIN platos p ON d.plato_id = p.id
                WHERE d.orden_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$orden_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}