<?php
include('../MODELO/CONEXION/Conexion.php'); 
if (isset($_GET['id'])) {
    $db = DB::conectar();
    $buscar = 'SELECT * FROM producto WHERE id_producto = :id';
    $sql = $db->prepare($buscar);
    $sql->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $sql->execute();
    $producto = $sql->fetch(PDO::FETCH_ASSOC);

    if ($producto):
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Editar Producto</title>
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="CSS/Registroproductos.css">
</head>
<body>
 <?php include 'header/header.php'; ?>
  <!-- Contenido principal -->
  <main class="content">
    <h2>Editar Producto</h2>
    <form id="editForm" class="product-form">
      <label for="id">
        <svg viewBox="0 0 24 24"><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2z"/></svg>
        Código producto
      </label>
      <input type="text" id="id" name="id" value="<?= $producto['id_producto'] ?>" readonly autocomplete="off"/>

      <label for="nameproducto">
        <svg viewBox="0 0 24 24"><path d="M3 13h2v-2H3v2zm4 0h2v-2H7v2zm4 0h2v-2h-2v2zm6-8h2V3h-2v2zm-4 0h2V3h-2v2zm-4 0h2V3h-2v2z"/></svg>
        Nombre planta
      </label>
      <input type="text" id="nameproducto" name="nameproducto" value="<?= $producto['nom_producto'] ?>" required autocomplete="off"/>

      <label for="cantidad">
        <svg viewBox="0 0 24 24"><path d="M4 10h16v2H4zm0 4h10v2H4z"/></svg>
        Cantidad
      </label>
      <input type="number" id="cantidad" name="cantidad" value="<?= $producto['cantidad'] ?>" required autocomplete="off"/>

      <label for="v_unitario">
        <svg viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.25 3.5 9.75 9 11 5.5-1.25 9-5.75 9-11V5l-9-4z"/></svg>
        Valor unitario
      </label>
      <input type="number" id="v_unitario" name="v_unitario" value="<?= $producto['v_unitario'] ?>" required autocomplete="off" />

      <button type="submit" class="button-submit">ACTUALIZAR PRODUCTO</button>
    </form>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="../API/EditarProducto.js" defer></script>

</body>
</html>
<?php
    endif;
}
?>
