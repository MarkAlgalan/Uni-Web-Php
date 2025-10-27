<html>
    <head>
        <title>
            Dueños
        </title>
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>
        <h2>Perfil del Dueño</h2>
        <hr>
        <?PHP
        /*$link=mysqli_connect("localhost","root","");
        mysqli_select_db($link,"videoteca");
        $resultado=mysqli_query($link,"select * from pelicula where id_pelicula=$id_peli");
        */
        $id=$_GET['id_dueño'];
        //echo "id= $id<br>";
        $link=mysqli_connect("localhost","root","root");
        mysqli_select_db($link,"adopcionmascotas");
        $resultado=mysqli_query($link,"select * from dueños where id_dueños='$id'");
       
        $reg=mysqli_fetch_array($resultado);
        $nom=$reg['nombre'];
        $ape=$reg['apellido'];
        $tel=$reg['telefono'];
        echo "Nombre: $nom<br>";
        echo "Apellido: $ape<br>";
        echo "Telefono: $tel<br>";
        ?>
    </body>
    
</html>