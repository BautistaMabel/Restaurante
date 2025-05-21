<?php
require_once 'models/Categoria.php';

class CategoriaController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Categoria();
    }

    public function index() {
        $categorias = $this->modelo->getAll();
        require 'views/categorias/index.php';
    }

    public function crear() {
        require 'views/categorias/crear.php';
    }

    public function guardar() {
        if (isset($_POST['nombre'])) {
            $this->modelo->save($_POST['nombre']);
        }
        header("Location: index.php?controller=categoria");
    }

    public function eliminar() {
        if (isset($_GET['id'])) {
            $this->modelo->delete($_GET['id']);
        }
        header("Location: index.php?controller=categoria");
    }

    public function editar() {
        if (isset($_GET['id'])) {
            $categoria = $this->modelo->getById($_GET['id']);
            require 'views/categorias/editar.php';
        }
    }

    public function actualizar() {
        if (isset($_POST['id']) && isset($_POST['nombre'])) {
            $this->modelo->update($_POST['id'], $_POST['nombre']);
        }
        header("Location: index.php?controller=categoria");
    }
}
