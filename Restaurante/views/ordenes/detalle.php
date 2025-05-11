<?php include './views/layout/header.php'; ?>

<h2>Detalle de la Orden</h2>
<p><strong>Fecha:</strong> <?= $orden['fecha'] ?></p>
<p><strong>Mesa:</strong> <?= $orden['mesa_id'] ?></p>
<p><strong>Total:</strong> $<?= $orden['total'] ?></p>
<p><strong>Anulado:</strong> <?= $orden['anulado'] ? 'Sí' : 'No' ?></p>

<h3>Platos</h3>
<table border="1" cellpadding="5">
    <tr><th>Plato</th><th>Cantidad</th><th>Precio Unitario</th><th>Subtotal</th></tr>
    <?php foreach ($detalles as $d): ?>
        <tr>
            <td><?= $d['descripcion'] ?></td>
            <td><?= $d['cantidad'] ?></td>
            <td>$<?= $d['precio_unitario'] ?></td>
            <td>$<?= $d['cantidad'] * $d['precio_unitario'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include './views/layout/footer.php'; ?>