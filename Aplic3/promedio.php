<html>
<head>
    <title> Promedio </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h2>Promedios</h2>
    <hr>
    <?PHP
    function burbuja($A, $n){
        for($i=0;$i<$n-1;$i++){
            for($j=0;$j<$n-1;$j++){
                if($A[$j]>$A[$j+1]){
                    $k = $A[$j+1];
                    $A[$j+1] = $A[$j];
                    $A[$j] = $k;
                }
            }
        }
        return $A;
    }


    $n = 0;
    $suma = 0;
    $Max =0;
    $nombre = "";
    $fp=fopen("alumnos.txt","r");
    while(!feof($fp)){
        $linea = fgets($fp);
        //echo "$linea<br>";
        $datos = explode(" ",$linea);
        $suma += $datos[1];
        if($datos[1]>$Max){
            $Max = $datos[1];
            $nombre = $datos[0];
        }
        echo"Estudienate $n: Nombre: $datos[0] Promedio: $datos[1] Carrera: $datos[2]<br>";
        $promedio[$n] = $datos[1];
        $n++;
    }
    asort($promedio);
    foreach($promedio as $key =>$val){
        echo "$val<br>";
    }
    echo"Burbuja<br>";
    $promedio = burbuja($promedio,$n);
    for ($i=0;$i<$n;$i++){
        echo "$promedio[$i]<br>";
    }
    echo "Numero de alumnos = $n<br>";
    $promedio = $suma / $n;
    echo "Promedio de los alumnos = $promedio<br>";
    echo "El alumno con el promedio mas alto es: $nombre con un promedio de $Max<br>";
    fclose($fp);
    ?>
</body>
</html>