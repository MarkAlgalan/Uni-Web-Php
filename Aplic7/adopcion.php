<html>
    <head>
        <title>Adopcion</title>
    </head>
    <body>
        <h2>Proceso de adopcion</h2>
        <hr>
        <?PHP
            $link=mysqli_connect("localhost","root","");
            mysqli_select_db($link,"centroadopciones");
            $res1 = mysqli_query($link,"select ClienteID, Nombre from clientes");
            $res2 = mysqli_query($link,"select MascotaID, Nombre from mascotas");
            echo "<form action='adopcion2.php' method='post'>";
            echo "Mascota a adoptar: <br>";
            echo "<select name='mascota'>";
            while($ren = mysqli_fetch_array($res2)){
                $id = $ren['MascotaID'];
                $nom = $ren['Nombre'];
                echo "<option value='$id'>$id --> $nom</option>";
            }
            echo "</select>";
            echo "<br><br>";
            echo "Seleccione cliente que va a adoptar mascota: <br>";
            echo "<select name='cliente'>";
            while($ren = mysqli_fetch_array($res1)){
                $id = $ren['ClienteID'];
                $nom = $ren['Nombre'];
                echo "<option value='$id'>$id --> $nom</option>";
            }
            echo "</select>";
            echo "<br><br>";
            echo "<input type='submit' value='Enviar'>";
            echo "</form>";
            mysqli_close($link);
        ?>
    </body>
</html>