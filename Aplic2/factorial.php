<html>
<head><title> Factorial </title></head>
<body>
<h2> Calcular el Factorial de un numero</h2>
<hr>
<br>

<form method="post" action="">
    <label for="number">Ingrese un número:</label>
    <input type="number" id="number" name="number" required>
    <input type="submit" value="Calcular Factorial">
</form>

<?PHP
function factorial($n){
    $prod=1;
    for($i=1;$i<=$n;$i++){
        $prod=$prod*$i;
    }
    return $prod;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $x = intval($_POST['number']);
    $res = factorial($x);
    echo "El factorial de $x es $res<br>";
}
?>
</body>
</html>