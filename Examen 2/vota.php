<html>
<head>
    <title> Votaciones </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>
<body>
    
    <div style="display: flex; justify-content: center; align-items: center;">
        <table>
            <tr>
                <td>
                    <header><h1> VOTACIONES </h1></header>
                </td>
                <td>
                    <img src="https://ine.mx/wp-content/uploads/2023/01/logo-ine.png" height="100" width="150">
                </td>
            </tr>
        </table>
    
    </div>
    <hr>
    <div>
        <p>
            Seleccione los partidos y candidatos por los que quiera votar.<br>
        </p>
    </div>
    <div>
        
        <?PHP
        $link=mysqli_connect("localhost","root","");
        mysqli_select_db($link,"votaciones");
        echo '<form action="" method="post">';
        
        echo'<h3>PARTIDO A VOTAR</h3>';
        
        echo'<label>Opciones:</label><br><br>';
        
        echo'<label for="voter_name">ID del votante:</label>';
        echo '<input type="number" id="voter_id" name="voter_id" required><br><br>';
       
        $resultado = mysqli_query($link,"select * from partido");
        $contador=0;
        while($reg=mysqli_fetch_array($resultado)){
            $contador++;
            $id=$reg['id'];
            $nom=$reg['nombre'];
            $id_candidato=$reg['id_candidato'];
            echo'<input type="checkbox" name="partido[]" id="partido" value="'.$id.$id_candidato.'">';
            echo'<label for="partido">'.$nom.'</label><br>';
        }
        
        echo'<button type="submit" class="btn btn-primary">Enviar</button>';
        
        echo'</form>';

        if($_SERVER["REQUEST_METHOD"]== "POST"){
            $voter_id = $_POST['voter_id'];
            if (isset($_POST['partido'])) {
                $partidos = $_POST['partido'];
                foreach ($partidos as $partido) {
                    $id = substr($partido, 0, 1); // Assuming ID is the first character
                    $id_candidato = substr($partido, 1); // Assuming id_candidato is the rest
                    echo "Partido ID: " . $id . " - Candidato ID: " . $id_candidato . "<br>";
                }
            }
            $partido_ids = [];
            $candidato_ids = [];
            foreach ($partidos as $partido) {
                $id = substr($partido, 0, 1); // Assuming ID is the first character
                $id_candidato = substr($partido, 1); // Assuming id_candidato is the rest
                $partido_ids[] = $id;
                $candidato_ids[] = $id_candidato;
            }
            echo "La longitud del arreglo de partidos es: " . count($partido_ids) . "<br>";
            echo "La longitud del arreglo de candidatos es: " . count($candidato_ids) . "<br>";
            if (in_array(1, $partido_ids) && in_array(2, $partido_ids) && in_array(3, $partido_ids) && count($partido_ids)==3) {
                
                echo "Los partidos con ID 1, 2 y 3 están en el arreglo.";
                $query = "CALL vota($voter_id, 1);";
                
                if (mysqli_query($link, $query)) {
                    echo "Votos registrados exitosamente.";
                    $query = "CALL vota($voter_id, 2);";
                    if (mysqli_query($link, $query)) {
                        echo "Votos registrados exitosamente.";
                        $query = "CALL vota($voter_id, 3);";
                        if (mysqli_query($link, $query)) {
                            echo "Votos registrados exitosamente.";
                        } else {
                            echo "Error: " . mysqli_error($link);
                        }
                    } else {
                        echo "Error: " . mysqli_error($link);
                    }
                } else {
                    echo "Error: " . mysqli_error($link);
                }
                
            } else if(in_array(4, $partido_ids) && in_array(5, $partido_ids) && in_array(6, $partido_ids) && count($partido_ids)==3){
                $query = "CALL vota($voter_id, 4);";
                if (mysqli_query($link, $query)) {
                    echo "Votos registrados exitosamente.";
                    $query = "CALL vota($voter_id, 5);";
                    if (mysqli_query($link, $query)) {
                        echo "Votos registrados exitosamente.";
                        $query = "CALL vota($voter_id, 6);";
                        if (mysqli_query($link, $query)) {
                            echo "Votos registrados exitosamente.";
                        } else {
                            echo "Error: " . mysqli_error($link);
                        }
                    } else {
                        echo "Error: " . mysqli_error($link);
                    }
                } else {
                    echo "Error: " . mysqli_error($link);
                }
            } else if(count($partido_ids)<3 && count($candidato_ids)==1){
                $query = "CALL vota($voter_id, $id);";
                if (mysqli_query($link, $query)) {
                    echo "Votos registrados exitosamente.";
                } else {
                    echo "Error: " . mysqli_error($link);
                }
                        
            } else {
                $query = "CALL vota($voter_id,8);";
                if (mysqli_query($link, $query)) {
                    echo "Votos anulado.";
                } else {
                    echo "Error: " . mysqli_error($link);
                }
            }
            
        }
        ?>
    
    </div>

</body>
</html>