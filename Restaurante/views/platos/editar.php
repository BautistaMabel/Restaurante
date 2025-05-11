<?php include './views/layout/header.php'; ?>
<h2>Editar Plato</h2>
<form method="post" action="index.php?controller=plato&action=editar">
    <input type="hidden" name="id" value="<?= $plato['id'] ?>">
    <label>Descripción:</label>
    <input type="text" name="descripcion" value="<?= $plato['descripcion'] ?>" required><br>
    <label>Precio Unitario:</label>
    <input type="number" name="precio_unitario" value="<?= $plato['precio_unitario'] ?>" required step="0.01"><br>
    <input type="submit" value="Actualizar">
</form>
<?php include './views/layout/footer.php'; ?>