<html>
    <head>
        <title>
            Consulta de Mascotas
        </title>
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>
        <h1>Sistema de Adopción de Mascotas</h1>
        <hr> 
        <div>
            <p>
                Se muestra la lista de mascotas disponibles para adopción.
            </p>
        </div>
        <div>
            <form action="" method="post">
                <label for="mascotas">Ver la lista de mascotas</label>
                <input type="checkbox" name="mascotas" value="mascotas">

                <label for="dueños">Ver la lista de clientes</label>
                <input type="checkbox" name="dueños" values="dueños">

                <label for="adopciones">Ver la lista de adopciones</label>
                <input type="checkbox" name="adopciones" values="adopciones">
                <br>
                <button type="submit">Enviar</button>
            </form>
        </div>
        <?PHP
            $link=mysqli_connect("localhost","root","root");
            mysqli_select_db($link,"adopcionmascotas");
            if($_SERVER["REQUEST_METHOD"]== "POST"){
                if(isset($_REQUEST['mascotas'])){
                    $resultadoMasc=mysqli_query($link,"select * from mascotas");
                    echo"<table border=2>";
                    echo"<tr><td>Id</td><td>Nombre</td><td>Raza</td><td>Edad</td><td>Imagen</td></tr>";
                    //<td>Imagen</td>
                    while($reg=mysqli_fetch_array($resultadoMasc)){
                        $id=$reg['id_mascota'];
                        $no=$reg['nombre'];
                        $ra=$reg['raza'];
                        $ed=$reg['edad'];
                        $im=$reg['imagen'];
                        //echo "$id $ti $di $ac <br>";
                        echo "<tr><td>$id</td><td>$no</td><td>$ra</td><td>$ed</td><td><A href='AdopcionM.php?id_mascota=$id'><img src='ImagenesPerros/$im' width='70' height='70'></A></td></tr>";
    
                    }
                    //<td><img src='MisImagenes/$im' width='70' height='70'></A></td>
                    echo"</table><br>";
                }
                if(isset($_REQUEST['dueños'])){
                    $resultadoDue=mysqli_query($link,"select * from dueños");
                    echo"<table border=1>";
                    echo"<tr><td>Id</td><td>Nombre</td><td>Apellido</td><td>Telefono</td></tr>";
                    while($reg=mysqli_fetch_array($resultadoDue)){
                        $idD=$reg['id_dueños'];
                        $nom=$reg['nombre'];
                        $ape=$reg['apellido'];
                        $tel=$reg['telefono'];
                        echo "<tr><td>$idD</td><td><A href='AdopcionD.php?id_dueño=$idD'>$nom</A></td><td>$ape</td><td>$tel</td></tr>";
                    }
                    echo"</table><br>";
                }
                if(isset($_REQUEST['adopciones'])){
                    $resultadoAdop=mysqli_query($link,"select * from adopción");
                    echo"<table border=3>";
                    echo"<tr><td>Dueño</td><td>Mascota</td><td>Fecha</td></tr>";
                    while($reg=mysqli_fetch_array($resultadoAdop)){
                        $idDue=$reg['id_dueños'];
                        $nombreDue=mysqli_query($link,"select nombre from dueños where id_dueños=$idDue");
                        $nomD = mysqli_fetch_array($nombreDue);
                        $Dueño=$nomD['nombre'];

                        $idMas=$reg['id_mascota'];
                        $nombreMas=mysqli_query($link,"select nombre from mascotas where id_mascota=$idMas");
                        $nombM=mysqli_fetch_array($nombreMas);
                        $Mascota=$nombM['nombre'];

                        $fecha=$reg['fecha'];
                        echo "<tr><td><A href='AdopcionD.php?id_dueño=$idDue'>$Dueño</A></td><td><A href='AdopcionM.php?id_mascota=$idMas'>$Mascota</A></td><td>$fecha</td></tr>";
                    }
                    echo"</table><br>";
                }
            }
            mysqli_close($link);
        ?>
    </body>
    
</html>