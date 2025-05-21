<h2>Editar Categoría</h2>
<form method="post" action="index.php?controller=categoria&action=actualizar">
    <input type="hidden" name="id" value="<?= $categoria['id'] ?>">
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= htmlspecialchars($categoria['name']) ?>" required>
    <input type="submit" value="Actualizar">
</form>
<a href="index.php?controller=categoria">Volver</a>
