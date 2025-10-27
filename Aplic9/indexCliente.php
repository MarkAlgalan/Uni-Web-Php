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
        <li><a href="indexCliente.php"  class="current"><span>InicioC</span></a></li>
        <li><a href="consultaCliente.php"><span>Consulta</span></a></li>
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
      <h3>BIENVENIDOS</h3>
      <p>Esta pagina provee de las peliculas nacionales e internaciones de mayor exito en taquilla. Te invitamos a ser parte de este sistema registrando tus datos en la opci&oacute;n de &quot;Registro&quot;.</p>
      <p><a href="#"><img src="../Aplic8/TablaPeliculas/MisImagenes/imagenuw.jpg" width="150" height="128" /></a><img src="../Aplic8/TablaPeliculas/MisImagenes/imagen4.jpg" width="101" height="128" /><img src="../Aplic8/TablaPeliculas/MisImagenes/imagen.jpg" width="111" height="128" /></p>
      <p>Que disfrutes de las peliculas. </p>
    </div>
  </div>
  <div id="footer"> <a href="#">homepage</a> | <a href="mailto:denise@mitchinson.net">contact</a> | <a href="http://validator.w3.org/check?uri=referer">html</a> | <a href="http://jigsaw.w3.org/css-validator">css</a> | &copy; 2007 Anyone | Design by <a href="http://www.mitchinson.net"> www.mitchinson.net</a><br/>
  This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/3.0/">Creative Commons Attribution 3.0 License</a> </div>
</div>
</body>
</html>
