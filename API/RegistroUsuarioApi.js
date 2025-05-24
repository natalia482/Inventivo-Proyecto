    
const API_REGISTRO_URL = './Inventivo_Proyecto/MODELO/CRUD/UsuarioAPI.php';

  document.getElementById('registroForm').addEventListener('submit', async function(event) {
    event.preventDefault();

    const formData = {
      rol_usuario: document.getElementById('rol').value,
      nom_usuario: document.getElementById('name').value,
      apellido_usuario: document.getElementById('apellido').value,
      ciudad_usuario: document.getElementById('ciudad').value,
      tipo_documento: document.getElementById('tdocumento').value,
      num_documento: document.getElementById('documento').value,
      email_usuario: document.getElementById('email').value,
      usuario: document.getElementById('usuario').value,
      contraseña: document.getElementById('pas').value,
    };

    const confirmarContraseña = document.getElementById('pas2').value;
    if (formData.contraseña !== confirmarContraseña) {
      alert('Las contraseñas no coinciden');
      return;
    }

    try {
        const response = await fetch(API_REGISTRO_URL, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(formData),
        });

        const data = await response.json();

        if (response.ok && data.success) {
        alert('Usuario registrado exitosamente');
        window.location.href = '../index.html';
        } else {
        alert('Error al registrar el usuario: ' + (data.message || 'Error desconocido'));
        console.error(data);
        }
    } catch (error) {
      console.error('Error en la solicitud:', error);
    }
  });