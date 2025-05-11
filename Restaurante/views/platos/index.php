<?php include './views/layout/header.php'; ?>
<h1>Listado de Platos</h1>
<a href="index.php?controller=plato&action=crear">Crear nuevo plato</a>
<table border="1" cellpadding="5">
    <tr><th>ID</th><th>Descripción</th><th>Precio</th><th>Categoría</th><th>Acciones</th></tr>
    <?php foreach ($platos as $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= $p['descripcion'] ?></td>
            <td>$<?= $p['precio_unitario'] ?></td>
            <td><?= $p['categoria'] ?></td>
            <td>
                <a href="index.php?controller=plato&action=editar&id=<?= $p['id'] ?>">Editar</a> |
                <a href="index.php?controller=plato&action=eliminar&id=<?= $p['id'] ?>" onclick="return confirm('¿Seguro de eliminar?')">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php include './views/layout/footer.php'; ?>