<?php
$controller = $_GET['controller'] ?? null;
$action = $_GET['action'] ?? 'index';

if ($controller) {
    require_once 'controllers/' . ucfirst($controller) . 'Controller.php';
    $controllerName = ucfirst($controller) . 'Controller';
    $obj = new $controllerName();
    if (method_exists($obj, $action)) {
        $obj->$action();
    } else {
        echo "Acción no encontrada.";
    }
} else {
?>
    <h1>Bienvenido al Restaurante Suculentos</h1>
    <ul>
        <li><a href="index.php?controller=categoria">Categorías</a></li>
        <li><a href="index.php?controller=mesa">Mesas</a></li>
        <li><a href="index.php?controller=plato">Platos</a></li>
        <li><a href="index.php?controller=orden">Órdenes</a></li>
    </ul>
<?php } ?>
