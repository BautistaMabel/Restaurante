<?php include './views/layout/header.php'; ?>
<h2>Editar Categoría</h2>
<form method="post" action="index.php?controller=categoria&action=editar">
    <input type="hidden" name="id" value="<?= $categoria['id'] ?>">
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= $categoria['nombre'] ?>" required>
    <input type="submit" value="Actualizar">
</form>
<?php include './views/layout/footer.php'; ?>