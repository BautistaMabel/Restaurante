<?php include './views/layout/header.php'; ?>
<h2>Editar Mesa</h2>
<form method="post" action="index.php?controller=mesa&action=editar">
    <input type="hidden" name="id" value="<?= $mesa['id'] ?>">
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= $mesa['nombre'] ?>" required><br>
    <input type="submit" value="Actualizar">
</form>
<?php include './views/layout/footer.php'; ?>