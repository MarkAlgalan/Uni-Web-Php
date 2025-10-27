<html>
    <head>
        <title>
            Consulta
        </title>
    </head>
    <body>
        <h2>Lista de peliculas de la videoteca</h2>
        <hr>
        <?PHP
        /*$link=mysqli_connect("localhost","root","");
        mysqli_select_db($link,"videoteca");
        $resultado=mysqli_query($link,"select * from pelicula where id_pelicula=$id_peli");
        */
        $id=$_GET['id_peli'];
        //echo "id= $id<br>";
        $link=mysqli_connect("localhost","root","");
        mysqli_select_db($link,"videoteca");
        $resultado=mysqli_query($link,"select * from pelicula where id_pelicula='$id'");
       
        $reg=mysqli_fetch_array($resultado);
        $id=$reg['id_pelicula'];
        $ti=$reg['titulo'];
        $di=$reg['director'];
        $ac=$reg['actor'];
        $im=$reg['imagen'];
        echo "<img src='MisImagenes/$im' width='200' height='200'><br>";
        echo "Titulo: $ti<br>";
        echo "Director: $di<br>";
        echo "Actor: $ac<br>";
        echo "Resumen: No leas esto te dara sida <br>";
        ?>
    </body>
    
</html>