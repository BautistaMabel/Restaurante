<h2>Listado de Mesas</h2>
<a href="index.php?controller=mesa&action=crear">Crear nueva mesa</a>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($mesas as $mesa): ?>
        <tr>
            <td><?= $mesa['id'] ?></td>
            <td><?= htmlspecialchars($mesa['name']) ?></td>
            <td>
                <a href="index.php?controller=mesa&action=eliminar&id=<?= $mesa['id'] ?>">Eliminar</a> |
                <a href="index.php?controller=mesa&action=editar&id=<?= $mesa['id'] ?>">Editar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="index.php">Volver al inicio</a>
