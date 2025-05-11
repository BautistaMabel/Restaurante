<?php include './views/layout/header.php'; ?>

<h1>Listado de Categorías</h1>
<a href="index.php?controller=categoria&action=crear">Crear nueva categoría</a>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th><th>Nombre</th><th>Acciones</th>
    </tr>
    <?php foreach ($categorias as $c): ?>
        <tr>
            <td><?= $c['id'] ?></td>
            <td><?= $c['nombre'] ?></td>
            <td>
                <a href="index.php?controller=categoria&action=editar&id=<?= $c['id'] ?>">Editar</a> |
                <a href="index.php?controller=categoria&action=eliminar&id=<?= $c['id'] ?>" onclick="return confirm('¿Seguro de eliminar?')">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include './views/layout/footer.php'; ?>