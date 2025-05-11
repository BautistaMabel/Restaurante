<?php include './views/layout/header.php'; ?>
<h2>Crear Plato</h2>
<form method="post" action="index.php?controller=plato&action=crear">
    <label>Descripción:</label>
    <input type="text" name="descripcion" required><br>
    <label>Precio Unitario:</label>
    <input type="number" name="precio_unitario" required step="0.01"><br>
    <label>Categoría (ID):</label>
    <input type="number" name="categoria_id" required><br>
    <input type="submit" value="Guardar">
</form>
<?php include './views/layout/footer.php'; ?>