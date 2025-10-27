<html>
    <head>
        <title>
            Mascotas
        </title>
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>
        <h2>Perfil de Mascota</h2>
        <hr>
        <?PHP
        /*$link=mysqli_connect("localhost","root","");
        mysqli_select_db($link,"videoteca");
        $resultado=mysqli_query($link,"select * from pelicula where id_pelicula=$id_peli");
        */
        $id=$_GET['id_mascota'];
        //echo "id= $id<br>";
        $link=mysqli_connect("localhost","root","root");
        mysqli_select_db($link,"adopcionmascotas");
        $resultado=mysqli_query($link,"select * from mascotas where id_mascota='$id'");
       
        $reg=mysqli_fetch_array($resultado);
        $no=$reg['nombre'];
        $ra=$reg['raza'];
        $ed=$reg['edad'];
        $im=$reg['imagen'];
        echo "<img src='ImagenesPerros/$im' width='200' height='200'><br>";
        echo "Nombre: $no<br>";
        echo "Raza: $ra<br>";
        echo "Edad: $ed<br>";
        ?>
    </body>
    
</html>