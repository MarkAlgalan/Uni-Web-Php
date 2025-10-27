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
        $link=mysqli_connect("localhost","root","");
        mysqli_select_db($link,"videoteca");

        //Esto era previo a los procedimientos almacenados
        //$resultado=mysqli_query($link,"select * from pelicula");
        $resultado=mysqli_query($link,"call ver();");
        echo"<table border=1>";
        echo"<tr><td>Id</td><td>Titulo</td><td>Director</td><td>Actor</td><td>Imagen</td></tr>";
        while($reg=mysqli_fetch_array($resultado)){
            $id=$reg['id_pelicula'];
            $ti=$reg['titulo'];
            $di=$reg['director'];
            $ac=$reg['actor'];
            $im=$reg['imagen'];
            echo "$id $ti $di $ac $im <br>";
            echo "<tr><td>$id</td><td>$ti</td><td>$di</td><td>$ac</td><td><A href='peliculas2.php?id_peli=$id'><img src='MisImagenes/$im' width='70' height='70'></A></td></tr>";

        }
        echo"</table>";
        mysqli_close($link);
        ?>
    </body>
    
</html>