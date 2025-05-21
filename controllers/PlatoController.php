<?php
require_once 'models/Plato.php';

class PlatoController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Plato();
    }

    public function index() {
        $platos = $this->modelo->getAll();
        require 'views/platos/index.php';
    }

    public function crear() {
        $categorias = $this->modelo->getCategorias();
        require 'views/platos/crear.php';
    }

    public function guardar() {
        if (isset($_POST['descripcion'], $_POST['categoria'], $_POST['precio'])) {
            $this->modelo->save($_POST['descripcion'], $_POST['categoria'], $_POST['precio']);
        }
        header("Location: index.php?controller=plato");
    }

    public function eliminar() {
        if (isset($_GET['id'])) {
            $this->modelo->delete($_GET['id']);
        }
        header("Location: index.php?controller=plato");
    }

    public function editar() {
        if (isset($_GET['id'])) {
            $plato = $this->modelo->getById($_GET['id']);
            $categorias = $this->modelo->getCategorias();
            require 'views/platos/editar.php';
        }
    }

    public function actualizar() {
        if (isset($_POST['id'], $_POST['descripcion'], $_POST['categoria'], $_POST['precio'])) {
            $this->modelo->update($_POST['id'], $_POST['descripcion'], $_POST['categoria'], $_POST['precio']);
        }
        header("Location: index.php?controller=plato");
    }
}
