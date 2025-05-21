<h2>Crear nueva Orden</h2>
<form method="post" action="index.php?controller=orden&action=guardar">
    <label>Mesa:</label>
    <select name="mesa" required>
        <?php foreach ($mesas as $mesa): ?>
            <option value="<?= $mesa['id'] ?>"><?= htmlspecialchars($mesa['name']) ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Platos:</label><br>
    <?php foreach ($platos as $plato): ?>
        <input type="checkbox" name="plato[]" value="<?= $plato['id'] ?>">
        <?= htmlspecialchars($plato['description']) ?> - Cantidad:
        <input type="number" name="cantidad[]" min="1" value="1"><br>
    <?php endforeach; ?>

    <br>
    <input type="submit" value="Registrar Orden">
</form>
<a href="index.php?controller=orden">Volver a Órdenes</a>
