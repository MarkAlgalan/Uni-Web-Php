<html>
    <head>
        <title>
            Consulta Clientes
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
<body>

    <?PHP
    $link=mysqli_connect("localhost","root","");
    mysqli_select_db($link,"videoteca");
    
    $da=$_REQUEST['dato'];
    $pos=strpos($da,"-");
    $id=substr($da,0,$pos);
    
    
    
    
    $resultado=mysqli_query($link,"select pelicula.titulo from rentas, pelicula where rentas.id_cliente='$id' and pelicula.id_pelicula=rentas.id_pelicula");
    echo "<br> Peliculas del cliente: <br>";
    while($ren=mysqli_fetch_array($resultado)){
        printf(
            "%s <br>", $ren["titulo"]
        );
    }
    
    mysqli_close($link);
    ?>

</body>
</html>