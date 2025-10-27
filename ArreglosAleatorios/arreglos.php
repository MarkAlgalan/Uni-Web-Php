<html>
<head>
    <title> ArreglosPHP </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?PHP
    function numAleatorio($n){
        for($i=0;$i<$n;$i++){
            $A[$i] = rand(1,20);
        }
        return $A;
    }
    function burbujaM($A, $n){
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
    function quicksortMin($A){    
        $n = count($A);
        if($n<=1){
            return $A;
        }
        $pivote = $A[0];
        $izq = [];
        $der = [];
        for($i=1;$i<$n;$i++){
            if($A[$i]<=$pivote){
                $izq[] = $A[$i];
            }else{
                $der[] = $A[$i];
            }
        }
        $Z = array_merge(quicksortMin($izq),array($pivote),quicksortMin($der));
        return $Z;
    }
    function quicksortMax($A){    
        $n = count($A);
        if($n<=1){
            return $A;
        }
        $pivote = $A[0];
        $izq = [];
        $der = [];
        for($i=1;$i<$n;$i++){
            if($A[$i]>$pivote){
                $izq[] = $A[$i];
            }else{
                $der[] = $A[$i];
            }
        }
        $Z = array_merge(quicksortMax($izq),array($pivote),quicksortMax($der));
        return $Z;
    }


    $n = $_REQUEST['n'];
    $A = numAleatorio($n);
    echo "El arreglo es :<br>";
    for ($i= 0;$i<$n-1;$i++)
        echo "$A[$i], ";
    $n --;
    echo " $A[$n] <br><br>"; ;
    if (isset($_REQUEST['Mayor'])){
        $maximo = max($A);
        echo "El mayor numero del arreglo es : $maximo <br>";
        $A = quicksortMax($A);
        echo "El arreglo ordenado de Mayor a Menos es :<br>";
        for ($i= 0;$i<$n;$i++)
            echo "$A[$i], ";
        echo " $A[$n] <br><br>";

    }

    if (isset($_REQUEST['Menor'])){
        $minimo = min($A);
        echo "El menor numero del arreglo es : $minimo <br>";
        $A = quicksortMin($A);
        echo "El arreglo ordenado de Menor a Mayor es :<br>";
        for ($i= 0;$i<$n;$i++)
            echo "$A[$i], ";
        echo " $A[$n] <br><br>";
    }
    
    if (isset($_REQUEST['Promedio'])){
        $promedio = array_sum($A)/count($A);
        echo "El promedio del arreglo es : $promedio <br><br>";
    }

    if (isset($_REQUEST['Moda'])){
        $values = array_count_values($A);
        $moda = array_search(max($values), $values);
        echo "La moda del arreglo es : $moda <br><br>";
    }

    ?>
</body>
</html>


