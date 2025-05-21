<h2>Listado de Órdenes</h2>
<a href="index.php?controller=orden&action=crear">Crear nueva orden</a>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Mesa</th>
            <th>Total</th>
            <th>Estado</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($ordenes as $orden): ?>
        <tr>
            <td><?= $orden['id'] ?></td>
            <td><?= $orden['dateOrder'] ?></td>
            <td><?= htmlspecialchars($orden['mesa']) ?></td>
            <td>$<?= number_format($orden['total'], 0) ?></td>
            <td><?= $orden['isCancelled'] ? 'Anulada' : 'Activa' ?></td>
            <td>
                <?php if (!$orden['isCancelled']): ?>
                    <a href="index.php?controller=orden&action=anular&id=<?= $orden['id'] ?>">Anular</a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="index.php">Volver al inicio</a>
