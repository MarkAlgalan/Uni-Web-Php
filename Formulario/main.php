<html>
<head>

    <title>Formulario</title>
    
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header>
        <h1>Formulario Universitario FCC</h1>
    </header>
    <div><p>
        Ahora añade tus datos en el formulario segun el formato requerido.
    </p></div>
    <form method="POST" action="formulario.php">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required><br><br>

        <label for="select">Seleccionar carrera</label>
        <select name="select" id="carrera" required>
            <option value="Licenciatura">Licenciatura en Ciencias de la Computación</option>
            <option value="Ingenieria">Ingenieria en Ciencias de la Computación</option>
            <option value="It">Ingenieria en Tecnologías de la Información</option>
            <option value="Ciberseguridad">Ciberseguridad</option>
            <option value="Ciencia de datos">Ciencia de datos</option>
        </select>
        <br>
        <br>

        <label for="radio">Metodo de Titulación</label><br>
        <div class=".radio-group">
            <table>
                <tr>
                    <td>
                    <img src="https://www.webquestcreator2.com/majwq/files/files_user/78694/Nueva%20carpeta/reportcard.jpg" width="150" height="100"><br>
                    </td>
                    <td>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwGyVBKyMs-TEtaT8uxgSNrC2w8Z05OVk4Xw&s" width="100" height="100"><br>
                    </td>
                    <td>
                    <img src="https://www.bibguru.com/es/guides/img/cita-apa-tesis-400x400.png" width="150" height="100"><br>
                    </td>
                    <td>
                    <img src="https://beceneslp.edu.mx/pagina/sites/default/files/img1.jpg" width="200" height="100"><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" name="radio" id="radio1" value="Promedio" required>
                        <label for="radio1">Promedio</label><br>
                    </td>
                    <td>
                        <input type="radio" name="radio" id="radio2" value="Examen Ceneval" required>
                        <label for="radio2">Examen Ceneval</label><br>
                    </td>
                    <td>
                        <input type="radio" name="radio" id="radio3" value="Tesis" required>
                        <label for="radio3">Tesis</label><br>
                    </td>
                    <td>
                        <input type="radio" name="radio" id="radio4" value="Diplomados" required>
                        <label for="radio4">Diplomados</label><br>
                    </td>
                </tr>
            </table>
            
            
        </div>
        <br>
        <br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>