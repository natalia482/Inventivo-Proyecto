<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Registro Usuario</title>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="CSS/Registrousuario.css">   
<style>
</style>
</head>
<body>
  <div class="container">
    <div class="left">
        <a href="Login.php">
        <img src="imagenes/Logo.png" alt="Logo Robot Planta" />
        <h2>REGISTRO</h2>
        </a>
    </div>
    <div class="right">
      <h1>BIENVENIDO</h1>
      <form id="registroForm" novalidate>
        <input type="hidden" id="rol" name="rol_usuario" value="ADMINISTRADOR" />
        
        <div class="input-group">
          <svg class="icon" viewBox="0 0 24 24"><path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5zm0 2c-3.33 0-10 1.672-10 5v3h20v-3c0-3.328-6.67-5-10-5z"/></svg>
          <input type="text" id="name" name="nom_usuario" placeholder="Nombres" required />
        </div>
        <div class="input-group">
          <svg class="icon" viewBox="0 0 24 24"><path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5zm0 2c-3.33 0-10 1.672-10 5v3h20v-3c0-3.328-6.67-5-10-5z"/></svg>
          <input type="text" id="apellido" name="apellido_usuario" placeholder="Apellidos" required />
        </div>
        <div class="input-group">
          <svg class="icon" viewBox="0 0 24 24"><path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5z"/></svg>
          <select id="tdocumento" name="tipo_documento" required>
            <option value="" disabled selected>Tipo de documento</option>
            <option value="CC">Cédula de ciudadanía</option>
            <option value="CI">Tarjeta de identidad</option>
            <option value="CE">Cédula de extranjería</option>
          </select>
        </div>
        <div class="input-group">
          <svg class="icon" viewBox="0 0 24 24"><path d="M21 11.5a3 3 0 0 0-3-3H6a3 3 0 0 0-3 3v5a3 3 0 0 0 3 3h12a3 3 0 0 0 3-3v-5zM9 18a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg>
          <input type="text" id="documento" name="num_documento" placeholder="Número de documento" required />
        </div>
        <div class="input-group half">
          <svg class="icon" viewBox="0 0 24 24"><path d="M22 15a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3v-2a3 3 0 0 1 3-3h14a3 3 0 0 1 3 3v2z"/></svg>
          <input type="tel" id="telefono" name="telefono_usuario" placeholder="Teléfono" />
        </div>
        <div class="input-group half">
          <svg class="icon" viewBox="0 0 24 24"><path d="M12 2l3 7h-6l3-7zm0 22v-4h3v-4H9v4h3v4z"/></svg>
          <input type="text" id="ciudad" name="ciudad_usuario" placeholder="Ciudad" required />
        </div>
        <div class="input-group">
          <svg class="icon" viewBox="0 0 24 24"><path d="M20 4H4a2 2 0 0 0-2 2v1l10 6 10-6V6a2 2 0 0 0-2-2zM4 8v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-10 6-10-6z"/></svg>
          <input type="email" id="email" name="email_usuario" placeholder="Correo electrónico" required />
        </div>
        <div class="input-group">
          <svg class="icon" viewBox="0 0 24 24"><path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5z"/></svg>
          <input type="text" id="usuario" name="usuario" placeholder="Usuario" required />
        </div>
        <div class="input-group">
          <svg class="icon" viewBox="0 0 24 24"><path d="M17 8h-1V6c0-2.761-2.239-5-5-5S6 3.239 6 6v2H5a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-9a2 2 0 0 0-2-2zm-5 9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm3-9H9V6c0-1.654 1.346-3 3-3s3 1.346 3 3v2z"/></svg>
          <input type="password" id="pas" name="contraseña" placeholder="Contraseña" required />
        </div>
        <div class="input-group">
          <svg class="icon" viewBox="0 0 24 24"><path d="M17 8h-1V6c0-2.761-2.239-5-5-5S6 3.239 6 6v2H5a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-9a2 2 0 0 0-2-2zm-5 9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm3-9H9V6c0-1.654 1.346-3 3-3s3 1.346 3 3v2z"/></svg>
          <input type="password" id="pas2" name="pas2" placeholder="Confirmar contraseña" required />
        </div>
        <button type="submit">REGISTRAR</button>
      </form>
    </div>
  </div>
  <script src="../API/RegistroUsuarioApi.js" defer></script>
</body>
</html>
