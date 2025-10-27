<html>
    <head>
        <title>
            Consulta Dueños
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
<body>

    <?PHP
    $link=mysqli_connect("localhost","root","root");
    mysqli_select_db($link,"adopcionmascotas");
    
    $da=$_REQUEST['Dato'];
    
    
    $resultado=mysqli_query($link,"select mascotas.nombre, mascotas.id_mascota from adopción, mascotas where adopción.id_dueños='$da' and mascotas.id_mascota=adopción.id_mascota");
    echo "<br> Mascotas del dueño : <br>";
    while($ren=mysqli_fetch_array($resultado)){
        $id = $ren["id_mascota"];
        printf(
            "<A href='AdopcionM.php?id_mascota=$id'> %s </A><br>", $ren["nombre"]
        );
    }
    
    mysqli_close($link);
    ?>

</body>
</html>