<html>
    <head>
        <title>Formulario</title>
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>
        <?PHP
            $fp = fopen("alumno.txt","a");
            $nombre = $_REQUEST['nombre'];
            $carrera = $_REQUEST['select'];
            $titulidade = $_REQUEST['radio'];

            echo "Nombre: $nombre <br> Carrera: $carrera <br> Titulación: $titulidade <br>";
            fprintf($fp, "Nombre: %s \nCarrera: %s \nMetodo de Titulación: %s\n", $nombre, $carrera, $titulidade);
            fclose($fp);
        ?>
    </body>
</html>