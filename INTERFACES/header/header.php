<?php
session_start();

if (!isset($_SESSION['usuario']) && !isset($_SESSION['rol'])) {
    header("Location: Login.php");
    exit();
}

$usuario = $_SESSION['usuario'];
$rol = $_SESSION['rol'];
?>
<style>
  /* Reset básico */
  * {
    box-sizing: border-box;
  }
  a {
    text-decoration: none;
  }
  /* Sidebar */
  .sidebar {
    background-color: #0a2c2b;
    color: #b9ff59;
    width: 280px;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    padding: 30px 25px;
    transition: transform 0.3s ease;
  }
  .sidebar.hidden {
    transform: translateX(-100%);
  }
  .sidebar .logo {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 50px;
  }
  .sidebar .logo img {
    max-width: 250px;
    user-select: none;
    margin-bottom: 15px;
    padding: 10px 0 0 0;
  }
  .user-info {
    color: white;
    margin-bottom: 40px;
    text-align: center;
  }
  .user-info .username {
    font-weight: 900;
    font-size: 2.8rem;
    letter-spacing: 1.1px;
    text-transform: uppercase;
  }
  .user-info .role {
    font-weight: 400;
    font-size: 1rem;
    letter-spacing: 1.5px;
    opacity: 0.8;
  }
  nav.menu-list {
    padding-top: 100px;
    display: flex;
    flex-direction: column;
    gap: 20px;
    
  }
  
  .menu-item {
    display: flex;
    align-items: center;
    font-size: 1.1rem;
    padding: 10px 15px;
    border-radius: 25px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    user-select: none;
  }
  .menu-item a{
    text-decoration: none;
  }
  .menu-item.active,
  .menu-item:hover {
    background-color:rgba(109, 242, 0, 0.87);
    color: #0a2c2b;
    font-weight: 700;
    text-decoration: none;
  }
  .menu-item .icon {
    margin-right: 12px;
    width: 22px;
    height: 22px;
    fill: #b9ff59;
    flex-shrink: 0;
  }
  .bottom-menu {
    margin-top: auto;
    display: flex;
    flex-direction: column;
    gap: 15px;
  }
  .bottom-menu a {
    display: flex;
    align-items: center;
    color: #b9ff59;
    font-weight: 500;
    font-size: 1.1rem;
    cursor: pointer;
  }
  .bottom-menu a .icon {
    margin-right: 10px;
    width: 20px;
    height: 20px;
    fill: #b9ff59;
  }

  /* Botón hamburguesa */
  .menu-toggle {
    display: none;
    position: fixed;
    top: 15px;
    left: 15px;
    background: #0a2c2b;
    border: none;
    padding: 10px 12px;
    border-radius: 5px;
    cursor: pointer;
    z-index: 9999;
  }
  .menu-toggle svg {
    fill: #b9ff59;
    width: 28px;
    height: 28px;
  }

  /* Responsive */
  @media (max-width: 900px) {
    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      height: 100vh;
      z-index: 1000;
      transform: translateX(-100%);
      box-shadow: 2px 0 5px rgba(0,0,0,0.5);
    }
    .sidebar.visible {
      transform: translateX(0);
    }
    .menu-toggle {
      display: block;
    }
    body.menu-open {
      overflow: hidden;
    }
  }
</style>

<button class="menu-toggle" aria-label="Toggle navigation menu" aria-expanded="false" aria-controls="sidebarMenu">
  <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
    <path d="M3 6h18M3 12h18M3 18h18" stroke="#b9ff59" stroke-width="2" stroke-linecap="round"/>
  </svg>
</button>

<aside id="sidebarMenu" class="sidebar" role="navigation" aria-label="Menú principal">
  <div class="logo" aria-label="Logo Inventivo">
    <a href="Menu.php"><img src="imagenes/INVENTIVO.png" alt="Logo Inventivo" /></a>
  </div>

  <div class="user-info" aria-label="Información del usuario">
    <div class="username"><?php echo htmlspecialchars($usuario); ?></div>
    <div class="role"><?php echo htmlspecialchars($rol); ?></div>
  </div>

  <nav class="menu-list">
    <a href="Listaproductos.php" class="menu-item active">
      <svg class="icon" viewBox="0 0 24 24"><path d="M9 21H7a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2zm7-14h-2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2zm0 10h-2v4h2v-4zM9 5H7v4h2V5z"/></svg>
      Lista de productos
    </a>
    <!--<a href="Factura.php" class="menu-item">
      <svg class="icon" viewBox="0 0 24 24"><path d="M19 2H5a2 2 0 0 0-2 2v16l4-4h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2z"/></svg>
      Facturas
    </a>
    <a href="Reportes.php" class="menu-item">
      <svg class="icon" viewBox="0 0 24 24"><path d="M4 4h16v16H4z"/></svg>
      Reportes
    </a>-->
  </nav>

  <div class="bottom-menu">
    <a href="Cerrarsesion.php">
      <svg class="icon" viewBox="0 0 24 24"><path d="M16 17v-2H7v-2h9v-2l5 3-5 3z"/></svg>
      Salir
    </a>
    <!--<a href="Configuracion.php">
      <svg class="icon" viewBox="0 0 24 24"><path d="M12 8a4 4 0 1 1 0 8 4 4 0 0 1 0-8z"/></svg>
      Configuración
    </a>
  </div>-->
</aside>

<script>
  const menuToggle = document.querySelector('.menu-toggle');
  const sidebar = document.getElementById('sidebarMenu');

  menuToggle.addEventListener('click', () => {
    sidebar.classList.toggle('visible');
    const isVisible = sidebar.classList.contains('visible');
    menuToggle.setAttribute('aria-expanded', isVisible);
    document.body.classList.toggle('menu-open', isVisible);
  });
</script>
