<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Agregar Producto - Inventivo</title>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="CSS/Registroproductos.css">
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
<?php include 'header/header.php'; ?>
<main class="content" role="main" tabindex="0">
  <h2>Agregar Producto</h2>
  <form class="product-form" id="productForm">
    <label for="nom_producto">
      Nombre planta
    </label>
    <input type="text" id="nom_producto" name="nom_producto" placeholder="Nombre de la planta" required autocomplete="off">

    <label for="num_bolsa">
      Número de bolsa
    </label>
    <input type="text" id="num_bolsa" name="num_bolsa" placeholder="Número de bolsa" required autocomplete="off">

    <label for="Cantidad">
      Cantidad
    </label>
    <input type="text" id="Cantidad" name="Cantidad" placeholder="Número de bolsa" required autocomplete="off">

    <label for="v_unitario">
      Valor unitario
    </label>
    <input type="number" id="v_unitario" name="v_unitario" placeholder="Valor unitario" required autocomplete="off">
   
    <label for="estado">
      Estado
    </label>
    <input type="text" id="estado" name="estado" placeholder="EN VENTA" value="EN VENTA" required autocomplete="off">

    <button type="submit" class="button-submit">INGRESAR PRODUCTO</button>
  </form>
</main>
  <script src="../API/RegistroProductosApi.js" defer></script>
</body>
</html>
