<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mascotas</title>
 
    <link rel="stylesheet" href="estiloIAdmin.css">
</head>
<body>
    <header>
        <h1>Adopciones de Mascotas</h1>
    </header>
    <nav>
        <a href="menuInter.php">Indice</a>
        <a href="visualizarInter.php">Visualizar Adopciones</a>
        <a href="adopcion.php">Gestionar</a>
        <a href="login.php">Salir</a>
    </nav>
    <div class="container">
        <div class="sidebar">
            <h2>Opciones de Gestion</h2>
        
            <button onclick="location.href='darDeBaja.php'">Dar de Baja</button>
            <button onclick="location.href='anadirMascota.php'">Añadir Mascota</button>
        </div>
        <div class="main-content">
            <h2>Sección de Administración</h2>
            <p>Esta seccion solo esta disponibles para los administradores. Ahora puedes ver y gestionar las adopciones.</p>
        </div>
    </div>
</body>
</html>