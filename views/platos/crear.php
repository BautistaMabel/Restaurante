<h2>Crear nuevo Plato</h2>
<form method="post" action="index.php?controller=plato&action=guardar">
    <label>Descripción:</label>
    <input type="text" name="descripcion" required><br><br>

    <label>Categoría:</label>
    <select name="categoria" required>
        <?php 
        $categorias = (new Plato())->getCategorias();
        foreach ($categorias as $cat): ?>
            <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['name']) ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Precio:</label>
    <input type="number" name="precio" required><br><br>
    <input type="submit" value="Guardar">
</form>
<a href="index.php?controller=plato">Volver a Platos</a>
