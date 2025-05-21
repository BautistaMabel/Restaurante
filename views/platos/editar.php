<h2>Editar Plato</h2>
<form method="post" action="index.php?controller=plato&action=actualizar">
    <input type="hidden" name="id" value="<?= $plato['id'] ?>">
    <label>Descripción:</label>
    <input type="text" name="descripcion" value="<?= htmlspecialchars($plato['description']) ?>" required><br><br>

    <label>Categoría:</label>
    <select name="categoria" required>
        <?php foreach ($categorias as $cat): ?>
            <option value="<?= $cat['id'] ?>" <?= $cat['id'] == $plato['idCategory'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($cat['name']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Precio:</label>
    <input type="number" name="precio" step="0.01" value="<?= $plato['price'] ?>" required><br><br>

    <input type="submit" value="Actualizar">
</form>
<a href="index.php?controller=plato">Volver</a>
