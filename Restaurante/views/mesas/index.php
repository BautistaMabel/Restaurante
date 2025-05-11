<?php include './views/layout/header.php'; ?>
<h1>Listado de Mesas</h1>
<a href="index.php?controller=mesa&action=crear">Crear nueva mesa</a>
<table border="1" cellpadding="5">
    <tr><th>ID</th><th>Nombre</th><th>Acciones</th></tr>
    <?php foreach ($mesas as $m): ?>
        <tr>
            <td><?= $m['id'] ?></td>
            <td><?= $m['nombre'] ?></td>
            <td>
                <a href="index.php?controller=mesa&action=editar&id=<?= $m['id'] ?>">Editar</a> |
                <a href="index.php?controller=mesa&action=eliminar&id=<?= $m['id'] ?>" onclick="return confirm('¿Seguro de eliminar?')">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php include './views/layout/footer.php'; ?>