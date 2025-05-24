const API_EDITAR_URL = '../MODELO/CRUD/ProductoAPI.php';
 document.getElementById('editForm').addEventListener('submit', async function(e) {
      e.preventDefault();

      const data = {
        id_producto: document.getElementById('id').value,
        nom_producto: document.getElementById('nameproducto').value,
        cantidad: document.getElementById('cantidad').value,
        v_unitario: document.getElementById('v_unitario').value
      };

      try {
        const response = await axios.put(API_EDITAR_URL, data, {
          headers: { 'Content-Type': 'application/json' }
        });

        if (response.status === 200 || response.status === 201) {
          alert("Producto actualizado correctamente");
          window.location.href = "Listaproductos.php";
        } else {
          alert("Error al actualizar el producto");
        }
      } catch (error) {
        console.error("Error:", error);
        alert("Hubo un problema al actualizar. Producto ya existe");
      }
    });