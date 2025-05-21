<?php
require_once 'models/Mesa.php';

class MesaController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Mesa();
    }

    public function index() {
        $mesas = $this->modelo->getAll();
        require 'views/mesas/index.php';
    }

    public function crear() {
        require 'views/mesas/crear.php';
    }

    public function guardar() {
        if (isset($_POST['nombre'])) {
            $this->modelo->save($_POST['nombre']);
        }
        header("Location: index.php?controller=mesa");
    }

    public function eliminar() {
        if (isset($_GET['id'])) {
            $this->modelo->delete($_GET['id']);
        }
        header("Location: index.php?controller=mesa");
    }

    public function editar() {
        if (isset($_GET['id'])) {
            $mesa = $this->modelo->getById($_GET['id']);
            require 'views/mesas/editar.php';
        }
    }

    public function actualizar() {
        if (isset($_POST['id']) && isset($_POST['nombre'])) {
            $this->modelo->update($_POST['id'], $_POST['nombre']);
        }
        header("Location: index.php?controller=mesa");
    }
}
