<html>
    <head>
        <title>
            Consulta Clientes
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>
        <h2>Lista de peliculas de los clientes</h2>
        <hr>
        <?PHP
        $link=mysqli_connect("localhost","root","");
        mysqli_select_db($link,"videoteca");
        $resultado=mysqli_query($link,"select id_cliente, cliente from clientes");
        echo "<FORM action ='clientes2.php' method='POST'>";
        echo '<select name="dato">';
        while($ren=mysqli_fetch_array($resultado)){
            echo '<option>'.$ren["id_cliente"]."->".$ren["cliente"];
        }
        echo"</select>";
        echo"<br><br>";
        echo '<input type="submit" value="Enviar">';
        echo "</form>";
        mysqli_close($link);
        ?>
    </body>
    
</html>