<h2>Editar Mesa</h2>
<form method="post" action="index.php?controller=mesa&action=actualizar">
    <input type="hidden" name="id" value="<?= $mesa['id'] ?>">
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= htmlspecialchars($mesa['name']) ?>" required>
    <input type="submit" value="Actualizar">
</form>
<a href="index.php?controller=mesa">Volver</a>
