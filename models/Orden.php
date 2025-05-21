<?php
require_once 'config/database.php';

class Orden {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT o.id, o.dateOrder, o.total, o.isCancelled, t.name AS mesa
                                   FROM orders o
                                   INNER JOIN restaurant_tables t ON o.idTable = t.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDetalles($idOrden) {
        $stmt = $this->pdo->prepare("SELECT d.quantity, d.price, p.description
                                     FROM order_details d
                                     INNER JOIN dishes p ON d.idDish = p.id
                                     WHERE d.idOrder = :id");
        $stmt->bindParam(':id', $idOrden);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save($idMesa, $platos, $cantidades) {
        $this->pdo->beginTransaction();
        try {
            $stmt = $this->pdo->prepare("INSERT INTO orders (dateOrder, total, idTable, isCancelled)
                                         VALUES (NOW(), 0, :idMesa, 0)");
            $stmt->bindParam(':idMesa', $idMesa);
            $stmt->execute();
            $orderId = $this->pdo->lastInsertId();
            $total = 0;

            foreach ($platos as $i => $idPlato) {
                $stmtPrecio = $this->pdo->prepare("SELECT price FROM dishes WHERE id = :id");
                $stmtPrecio->bindParam(':id', $idPlato);
                $stmtPrecio->execute();
                $precio = $stmtPrecio->fetchColumn();
                $cantidad = $cantidades[$i];
                $subtotal = $precio * $cantidad;

                $stmtDetalle = $this->pdo->prepare("INSERT INTO order_details (quantity, price, idOrder, idDish)
                                                    VALUES (:cantidad, :precio, :idOrden, :idPlato)");
                $stmtDetalle->execute([
                    ':cantidad' => $cantidad,
                    ':precio' => $precio,
                    ':idOrden' => $orderId,
                    ':idPlato' => $idPlato
                ]);

                $total += $subtotal;
            }

            $stmtUpdate = $this->pdo->prepare("UPDATE orders SET total = :total WHERE id = :id");
            $stmtUpdate->execute([':total' => $total, ':id' => $orderId]);

            $this->pdo->commit();
        } catch (Exception $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }

    public function cancel($id) {
        $stmt = $this->pdo->prepare("UPDATE orders SET isCancelled = 1 WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function getMesas() {
        $stmt = $this->pdo->query("SELECT id, name FROM restaurant_tables");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPlatos() {
        $stmt = $this->pdo->query("SELECT id, description FROM dishes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
