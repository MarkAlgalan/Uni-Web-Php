<?php
session_start();
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"gamescrapping");
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$usu = $_POST['usuario'];
$pass = $_POST['pass'];

$result = mysqli_query($link, "SELECT password, usuario, tipo, id_usuario FROM usuario WHERE usuario='$usu'");

if($row = mysqli_fetch_array($result)) {
    if($row["password"] == $pass) {
        $_SESSION["k_username"] = $row['usuario'];
        $_SESSION["k_tipo"] = $row['tipo'];
        $_SESSION["kid_usuario"] = $row['id_usuario'];

        echo 'Has sido logueado correctamente ' . $_SESSION['k_username'] . ' <p>';
        if ($row["tipo"] == 1)
            header("Location: indexUsuario.php");
        else
            header("Location: indexAdm.php");
    } else {
        echo "<script>alert('Password incorrecto'); window.location.href='login.html';</script>";
    }
} else {
    echo "<script>alert('Login incorrecto'); window.location.href='login.html';</script>";
}
}else{
    header("Location: index.html");
}
?>
