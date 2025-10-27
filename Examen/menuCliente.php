<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página Web</title>
 
    <link rel="stylesheet" href="estiloInter.css">
</head>
<body>
    <header>
        <h1>Adopciones de Mascotas</h1>
    </header>
    <nav>
        <a href="index.php">Indice</a>
        <a href="visualizarInter.php">Visualizar Mascotas</a>
        <a href="adopcion.php">Adoptar Mascotas</a>
        <a href="login.php">Salir</a>
    </nav>
    <div class="container">
        <div class="sidebar">
            <h2>Adopciones Recientes</h2>
            
            <ul>
                <li>Max</li>
                <li>Bella</li>
                <li>Charlie</li>
                <li>Luna</li>
                <li>Rocky</li>
            </ul>
        </div>
        <div class="main-content">
            <h2>Gracias Cliente</h2>
            <p>Ahora que estas registrado y has entrado al sistemas tiene la opción de adoptar las mascotas que esten disponibles en el sistema</p>
            <button onclick="location.href='adopcion.php'">Adoptar</button>
        </div>
    </div>
</body>
</html>