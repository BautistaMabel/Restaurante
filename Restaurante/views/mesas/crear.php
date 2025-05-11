<?php include './views/layout/header.php'; ?>
<h2>Crear Mesa</h2>
<form method="post" action="index.php?controller=mesa&action=crear">
    <label>Nombre:</label>
    <input type="text" name="nombre" required><br>
    <input type="submit" value="Guardar">
</form>
<?php include './views/layout/footer.php'; ?>