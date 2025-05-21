<h2>Listado de Categorías</h2>
<a href="index.php?controller=categoria&action=crear">Crear nueva categoría</a>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($categorias as $cat): ?>
        <tr>
            <td><?= $cat['id'] ?></td>
            <td><?= htmlspecialchars($cat['name']) ?></td>
            <td>
                <a href="index.php?controller=categoria&action=eliminar&id=<?= $cat['id'] ?>">Eliminar</a> |
                <a href="index.php?controller=categoria&action=editar&id=<?= $cat['id'] ?>">Editar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="index.php">Volver al inicio</a>
