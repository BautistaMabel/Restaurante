<?php include './views/layout/header.php'; ?>
<h1>Listado de Órdenes</h1>
<a href="index.php?controller=orden&action=crear">Registrar nueva orden</a>
<table border="1" cellpadding="5">
    <tr><th>ID</th><th>Fecha</th><th>Mesa</th><th>Total</th><th>Anulado</th><th>Acciones</th></tr>
    <?php foreach ($ordenes as $o): ?>
        <tr>
            <td><?= $o['id'] ?></td>
            <td><?= $o['fecha'] ?></td>
            <td><?= $o['mesa_id'] ?></td>
            <td>$<?= $o['total'] ?></td>
            <td><?= $o['anulado'] ? 'Sí' : 'No' ?></td>
            <td>
                <a href="index.php?controller=orden&action=verDetalle&orden_id=<?= $o['id'] ?>">Ver detalle</a>
                <?php if (!$o['anulado']): ?>
                    | <a href="index.php?controller=orden&action=anular&id=<?= $o['id'] ?>" onclick="return confirm('¿Seguro de anular la orden?')">Anular</a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php include './views/layout/footer.php'; ?>