<html>
    <head>
        <title>
            Tramite de adopción de mascotas
        </title>
        <link rel="stylesheet" href="estilos.css">

    </head>
    <body>
        <h2>Lista de peliculas de los clientes</h2>
        <hr>
        
        <?PHP
            $link=mysqli_connect("localhost","root","root");
            mysqli_select_db($link,"adopcionmascotas");
           $resultadoMasc=mysqli_query($link,"select * from mascotas");
            echo"<table border=2>";
            echo"<tr><td>Id</td><td>Nombre</td><td>Raza</td><td>Edad</td><td>Imagen</td><td>Acción</td></tr>";
            while($reg=mysqli_fetch_array($resultadoMasc)){
                $id=$reg['id_mascota'];
                $no=$reg['nombre'];
                $ra=$reg['raza'];
                $ed=$reg['edad'];
                $im=$reg['imagen'];
                echo "<tr><td>$id</td><td>$no</td><td>$ra</td><td>$ed</td><td><A href='AdopcionM.php?id_mascota=$id'><img src='ImagenesPerros/$im' width='70' height='70'></A></td><td><A href='Mascotas2.php?id_mascota=$id'>Adoptar</A></td></tr>";
            }
            echo"</table><br>";
            
            echo"<h2>Ver adopciones de los dueños</h2>";
            $clientes = mysqli_query($link, "select id_dueños, nombre, apellido from dueños");
            echo"<FORM action='Dueños.php' method='POST'>";
            echo "<select name='Dato'>";
            while($ren=mysqli_fetch_array($clientes)){
                $id=$ren["id_dueños"];
                $nom=$ren["nombre"];
                $apellido=$ren["apellido"];
                echo "<option value='$id'>$id ---> $nom $apellido </option>";
            }
            
            echo"</select>";
            echo"<br><br>";
            echo '<input type="submit" value="Ver">';
            echo "</form>";
        
     
            mysqli_close($link);
        ?>
    </body>
    
</html>