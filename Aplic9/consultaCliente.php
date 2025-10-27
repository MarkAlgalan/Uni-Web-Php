<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Videoteca</title>
<link href="../time/style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?PHP session_start();
if(isset($_SESSION['k_username']) & $_SESSION['k_tipo']==1);
else header("Location: index.php");
?>
<div id="wrap">
  <div id="masthead">
    <h1>Videoteca</h1>
    <h2><a href="indexCliente.php">homepage</a> | <a href="contacto.php">contact</a> </h2>
  </div>
  <div id="menucontainer">
    <div id="menunav">
      <ul>       
		<li><a href="indexCliente.php"><span>InicioC</span></a></li>
		<li><a href="consultaCliente.php" class="current"><span>Consulta</span></a></li>
        <li><a href="rentas.php"><span>Rentas</span></a></li>
        <li><a href="salir.php"><span>Salir</span></a></li>
      </ul>
    </div>
  </div>
  <div id="container">
    <div id="sidebar">
      <h3>Sidebar</h3>
      <h3>pELICULAS reCIENTES </h3>
      <ul><li>Venom</li>
      </ul>
      <ul>
        <li>La sustancia</li>
      </ul>
      <ul>
        <li>Sonrie 2</li>
      </ul>
      <ul>
        <li>Jalowin</li>
      </ul>
	 
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </div>
    <div id="content">
       <?PHP
        $link=mysqli_connect("localhost","root","");
        mysqli_select_db($link,"videoteca");
        $resultado=mysqli_query($link,"select * from pelicula");
        echo"<table border=1>";
        echo"<tr><td>Id</td><td>Titulo</td><td>Director</td><td>Actor</td><td>Imagen</td></tr>";
        while($reg=mysqli_fetch_array($resultado)){
            $id=$reg['id_pelicula'];
            $ti=$reg['titulo'];
            $di=$reg['director'];
            $ac=$reg['actor'];
            $im=$reg['imagen'];
            //echo "$id $ti $di $ac $im <br>";
            echo "<tr><td>$id</td><td>$ti</td><td>$di</td><td>$ac</td><td><A href='consultaCliente2.php?id_peli=$id'><img src='MisImagenes/$im' width='70' height='70'></A></td></tr>";

        }
        echo"</table>";
        mysqli_close($link);
        ?>
    </div>
  </div>
  <div id="footer"> <a href="#">homepage</a> | <a href="mailto:denise@mitchinson.net">contact</a> | <a href="http://validator.w3.org/check?uri=referer">html</a> | <a href="http://jigsaw.w3.org/css-validator">css</a> | &copy; 2007 Anyone | Design by <a href="http://www.mitchinson.net"> www.mitchinson.net</a><br/>
  This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/3.0/">Creative Commons Attribution 3.0 License</a> </div>
</div>
</body>
</html>
