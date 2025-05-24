// login.js
const API_LOGIN_URL = './MODELO/CRUD/UsuariologinAPI.php';

document.addEventListener('DOMContentLoaded', () => {
  const loginForm = document.getElementById('loginForm');

  loginForm.addEventListener('submit', async (event) => {
    event.preventDefault();

    const usuario = document.getElementById('usuario').value.trim();
    const password = document.getElementById('pas').value.trim();

    if (!usuario || !password) {
      alert('Por favor, complete todos los campos.');
      return;
    }

    try {
      const response = await fetch(API_LOGIN_URL, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ usuario, password }),
        credentials:'include',
      });

      const result = await response.json();

      if (result.status === 'success') {
        alert('Inicio de sesión exitoso');
        window.location.href = "INTERFACES/Menu.php";
      } else {
        alert(result.message);
      }
      
    } catch (error) {
      console.error('Error al iniciar sesión:', error);
      alert('Error de conexión con la API');
    }
  });
});
