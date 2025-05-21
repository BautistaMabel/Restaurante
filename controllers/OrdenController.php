<?php
require_once 'models/Orden.php';

class OrdenController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Orden();
    }

    public function index() {
        $ordenes = $this->modelo->getAll();
        require 'views/ordenes/index.php';
    }

    public function crear() {
        $mesas = $this->modelo->getMesas();
        $platos = $this->modelo->getPlatos();
        require 'views/ordenes/crear.php';
    }

    public function guardar() {
        if (isset($_POST['mesa']) && isset($_POST['plato']) && isset($_POST['cantidad'])) {
            $this->modelo->save($_POST['mesa'], $_POST['plato'], $_POST['cantidad']);
        }
        header("Location: index.php?controller=orden");
    }

    public function anular() {
        if (isset($_GET['id'])) {
            $this->modelo->cancel($_GET['id']);
        }
        header("Location: index.php?controller=orden");
    }
}
