<h2>Listado de Platos</h2>
<a href="index.php?controller=plato&action=crear">Crear nuevo plato</a>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($platos as $plato): ?>
        <tr>
            <td><?= $plato['id'] ?></td>
            <td><?= htmlspecialchars($plato['description']) ?></td>
            <td><?= htmlspecialchars($plato['categoria']) ?></td>
            <td>$<?= number_format($plato['price'], 0) ?></td>
            <td><a href="index.php?controller=plato&action=eliminar&id=<?= $plato['id'] ?>">Eliminar</a> | <a href="index.php?controller=plato&action=editar&id=<?= $plato['id'] ?>">Editar</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="index.php">Volver al inicio</a>
