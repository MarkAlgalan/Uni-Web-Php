<html>
<head>
    <title> Arreglos </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    <div style="display: flex; justify-content: center; align-items: center;">
        <header><h1> Conjuntos </h1></header>       
    </div>
    <hr>
    <div>
        <p>
            Se crea un conjunto de n datos con valores aleatorios entre 1 y 20.<br>
        </p>
    </div>
    <div>
        <form action="" method="post">
            <label>Tamaño del conjunto 1:</label><br>
            <br>
            <input type="number" id="number1" name="nA" required>
            <br>
            <label>Tamaño del conjunto 2:</label><br>
            <input type="number" id="number2" name="nB" required>
            <br> 
            <br>
            <button type="submit" class="btn btn-primary">Enviar</button>
            
        </form>

    </div>
    <?php
        require_once("Conjunto.php");
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $C1 = new Conjunto(intval($_POST['nA']));
            $C2 = new Conjunto($_POST['nB']);
          

            echo "El primer conjunto es: ";
            $C1->muestra();
            echo "<br> El segundo conjunto es: ";
            $C2->muestra();
    
            $union = $C1->union($C1, $C2);
            $interseccion = $C2->interseccion($C1, $C2);
            $diferencia = $C1->diferencia($C1, $C2);
            echo "<br> La union es: ";
            $union->muestra();
            echo "<br> La intersección es: ";
            $interseccion->muestra();
            echo "<br> La diferencia es: ";
            $diferencia->muestra();

        }
        
    ?>

</body>
</html>


