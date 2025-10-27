<html>
<head><title> Factorial </title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<h2> Calcular el Factorial de un numero</h2>
<hr>
<br>



<?PHP
function factorial($n){
    $prod=1;
    for($i=1;$i<=$n;$i++){
        $prod=$prod*$i;
    }
    return $prod;
}

$fp=fopen("salida.txt","a");
$x = $_REQUEST['numero'];
$res = factorial($x);
echo "El factorial de $x es $res<br>";
fprintf($fp,"El factorial de %d es = %d \n",$x,$res);
fclose($fp);
?>
</body>
</html>