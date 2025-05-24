<?php
include '../MODELO/CONEXION/Conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Inventivo - Lista de Productos</title>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="CSS/Listaproductos.css">

</head>
<body>
<div class="layout">
<?php include 'header/header.php'; ?>
<main class="content" role="main" >
  <h2>Lista de Productos</h2>
  <div class="top-bar">
    <div class="search-wrapper">
      <input type="text" placeholder="Buscar productos" aria-label="Buscar productos" class="search-input" id="searchInput" />
      <svg viewBox="0 0 24 24" aria-hidden="true">
        <path d="M21 21l-6-6m2-5a7 7 0 1 0-14 0 7 7 0 0 0 14 0z" stroke="#b9ff59" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </div>
    <a href="Registrarproductos.php"><button class="btn-add" id="btnAddProduct" aria-label="Agregar productos">
      <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14m7-7H5" stroke="#b9ff59" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      Agregar productos
    </button></a>
  </div>
  <table aria-label="Lista de productos">
    <thead>
      <tr>
        <th>CÓDIGO</th>
        <th>PLANTA</th>
        <th>NÚMERO BOLSA</th>
        <th>CANTIDAD</th>
        <th>PRECIO</th>
        <th>EDITAR</th>
      </tr>
    </thead>
    <tbody id="productsTableBody">
      <!-- Productos cargados aquí por JS -->
    </tbody>
  </table>
</main>
</div>


<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
  const tableBody = document.getElementById('productsTableBody');
  const searchInput = document.getElementById('searchInput');

  const cargarProductos = async () => {
    try {
      const response = await axios.get("http://localhost/INVENTIVO/API%20CRUD/ProductoAPI.php");
      const data = response.data;

      if (Array.isArray(data)) {
        renderProductos(data);
      } else {
        tableBody.innerHTML = `<tr><td colspan="6">No se encontraron productos.</td></tr>`;
      }
    } catch (error) {
      console.error("Error al cargar productos:", error);
      tableBody.innerHTML = `<tr><td colspan="6">Error al cargar los productos.</td></tr>`;
    }
  };

  const renderProductos = (productos) => {
    const filtro = searchInput.value.toLowerCase();
    const productosFiltrados = productos.filter(p =>
      p.nom_producto.toLowerCase().includes(filtro) ||
      p.num_bolsa.toString().includes(filtro)
    );

    if (productosFiltrados.length === 0) {
      tableBody.innerHTML = `<tr><td colspan="6">No se encontraron productos.</td></tr>`;
      return;
    }

    tableBody.innerHTML = productosFiltrados.map(producto => `
      <tr>
        <td data-label="Código">${producto.id_producto}</td>
        <td data-label="Planta">${producto.nom_producto}</td>
        <td data-label="Número Bolsa">${producto.num_bolsa}</td>
        <td data-label="Cantidad">${producto.cantidad}</td>
        <td data-label="Precio">${producto.v_unitario}</td>
        <td data-label="Editar">
          <a href="Editarproducto.php?id=${producto.id_producto}" aria-label="Editar producto ${producto.nom_producto}">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="#0a2c2b" xmlns="http://www.w3.org/2000/svg" style="cursor:pointer;">
              <path d="M3 17.25V21h3.75l11.06-11.06-3.75-3.75L3 17.25zM20.71 7.04a1.003 1.003 0 0 0 0-1.42l-2.34-2.34a1.003 1.003 0 0 0-1.42 0l-1.83 1.83 3.75 3.75 1.84-1.82z"/>
            </svg>
          </a>
        </td>
      </tr>
    `).join('');
  };

  // Filtrar productos cuando se escribe en la búsqueda
  searchInput.addEventListener('input', () => {
    cargarProductos();
  });

  // Cargar productos inicialmente
  cargarProductos();
</script>

</body>
</html>
