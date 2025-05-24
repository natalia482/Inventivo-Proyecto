    const API_REGISTROP_URL = '../MODELO/CRUD/ProductoAPI.php';

    document.getElementById('productForm').addEventListener('submit', async function (e) {
        e.preventDefault();

        // Capturar los valores del formulario
        const data = {
            nom_producto: document.getElementById('nom_producto').value,
            num_bolsa: document.getElementById('num_bolsa').value,
            v_unitario: document.getElementById('v_unitario').value,
            cantidad: document.getElementById('Cantidad').value,
            estado: document.getElementById('estado').value,
        };
       

        // Enviar la solicitud POST con Axios
        try {
            const response = await axios.post(API_REGISTROP_URL, data, {
                headers: { 'Content-Type': 'application/json' }
            });

            // Manejar la respuesta del servidor
            if (response.data.status === 'success') {
                alert(response.data.message);
                window.location.href = "Listaproductos.php";
                limpiarFormulario(); // Llamar a la función para limpiar el formulario
            } else {
                alert(`Error: ${response.data.message}`);
            }
        } catch (error) {
            console.error(error);
            alert('Hubo un problema al registrar el producto');
        }
        // Función para limpiar el formulario
        function limpiarFormulario() {
            document.getElementById('productForm').reset(); // Reinicia todos los campos
        }
        });