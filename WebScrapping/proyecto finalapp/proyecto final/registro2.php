<?php
		$link=mysqli_connect("localhost","root","");
    mysqli_select_db($link,"gamescrapping");
		
			$nom = $_REQUEST['nom'];
            $appe = $_REQUEST['ape'];
			$usu = $_REQUEST['usuario'];
			$pas = $_REQUEST['pass'];
      $tip=1;
      $sql_verificar = "SELECT * FROM usuario WHERE usuario = '$usu'";
      $resultado_verificar = $link->query($sql_verificar);
      if ($resultado_verificar->num_rows > 0) {
        echo "<script>alert('Ese usuario ya existe :c'); window.location.href='register.html';</script>";
        }else{
          $ins=mysqli_query($link,"INSERT INTO usuario (nombre,apellido, usuario, password, tipo) values ('$nom','$appe', '$usu','$pas',$tip)");
          echo "<script>alert('Usuario registrado correctamente :D'); window.location.href='login.html';</script>";
        }
		?>