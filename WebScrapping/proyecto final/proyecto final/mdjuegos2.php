<!DOCTYPE html>
<html>

<head>
  <title>GameScraping</title>
</head>

  <?php session_start(); 
    if ((isset($_SESSION['k_username'])) && ($_SESSION['k_tipo'] == 0)) { 
   } else { 
    header("Location: index.html"); 
    exit();}
        $link=mysqli_connect("localhost","root","");
        mysqli_select_db($link,"gamescrapping");

        $app=$_REQUEST['appid'];
        $name=$_REQUEST['nombre'];
        $gn=$_REQUEST['genero'];
        $pp=$_REQUEST['pop'];

        $sql_verificar = "SELECT appid FROM juego WHERE appid = $app";
        $resultados=mysqli_query($link, $sql_verificar);

        if(mysqli_num_rows($resultados) > 0)
        {
            $actualizar="update juego set nombre='$name', genero='$gn', popularidad='$pp' WHERE appid=$app";
            mysqli_query($link,$actualizar);
            echo "<script>alert('Juego modificado correctamente'); window.location.href='mdjuegos.php';</script>";

        }else{
            mysqli_query($link,"INSERT INTO juego (appid, nombre, genero, popularidad) values ($app, '$name','$gn',$pp)");
            echo "<script>alert('Juego añadido correctamente'); window.location.href='mdjuegos.php';</script>";
        }
        ?>


<body class="sub_page">
</body>

</html>