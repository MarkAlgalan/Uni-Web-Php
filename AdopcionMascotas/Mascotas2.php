<html>
    <head>
        <title>
            Consulta Clientes
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
<body>

    <?PHP
    $link=mysqli_connect("localhost","root","root");
    mysqli_select_db($link,"adopcionmascotas");
    
    $idMas=$_GET['id_mascota'];
    $resMascota=(mysqli_query($link,"select * from mascotas where id_mascota=$idMas"));
    $reg=mysqli_fetch_array($resMascota);
    echo "Lista de clientes disponibles para adopcion de la mascota ".$reg['nombre']."<br>";
    $resultado=mysqli_query($link,"select id_dueños, nombre from dueños");
    echo "<FORM action ='' method='POST'>";
    echo '<select name="dato">';
    while($ren=mysqli_fetch_array($resultado)){
        echo '<option>'.$ren["id_dueños"]."->".$ren["nombre"].'</option>';
    }
    echo"</select>";
    echo"<br><br>";
    echo '<input type="submit" value="Enviar">';
    echo "</form>";
    
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        
        if(isset($_REQUEST['dato'])){
            $da=$_REQUEST['dato'];
        }
        $pos=strpos($da,"-");
        $id=substr($da,0,$pos);

        $check = mysqli_query($link, "SELECT $idMas from adopción where id_dueños = $id");
        if(mysqli_fetch_array($check)<=0){
            $exito=mysqli_query($link,"INSERT INTO adopción (fecha, id_dueños,id_mascota) values (CURDATE(), $id,$idMas)");
            if($exito===true){
                echo "Gracias por Adoptar a ".$reg['nombre']."<br>";
            }else{
                echo "Algo salio mal";
            }
        }else{
            echo "Esa mascota ya ha sido adoptada por este cliente";
        }      
    }

    mysqli_close($link);
    ?>

</body>
</html>