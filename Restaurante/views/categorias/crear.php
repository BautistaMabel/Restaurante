<?php include './views/layout/header.php'; ?>
<h2>Crear Categoría</h2>
<form method="post" action="index.php?controller=categoria&action=crear">
    <label>Nombre:</label>
    <input type="text" name="nombre" required>
    <input type="submit" value="Guardar">
</form>
<?php include './views/layout/footer.php'; ?>