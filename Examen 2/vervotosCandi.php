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
        
        echo'<h3>PARTIDO</h3>';
        
        echo'<label>Opciones:</label><br><br>';
        
       
        $resultado = mysqli_query($link,"select * from candidatos");
        $contador=0;
        while($reg=mysqli_fetch_array($resultado)){
            $contador++;
            $id=$reg['id'];
            $nom=$reg['nombre'];
      
            echo'<input type="checkbox" name="partido[]" id="partido" value="'.$id.'">';
            echo'<label for="partido">'.$nom.'</label><br>';
        }
        echo'<button type="submit" class="btn btn-primary">Enviar</button>';
        echo'</form>';

        if($_SERVER["REQUEST_METHOD"]== "POST"){
            
            if (isset($_POST['partido'])) {
                $partidos = $_POST['partido'];
                foreach ($partidos as $partido) {
                    $id = substr($partido, 0, 1); // Assuming ID is the first character
                    
                    echo "Candidato ID: " . $id ."<br>";
                    $query = "SELECT COUNT(*) as votos FROM votos WHERE id_partido = '$id'";
                    $result = mysqli_query($link, $query);
                    $row = mysqli_fetch_assoc($result);
                    echo "Votos: " . $row['votos'] . "<br>";
                }
            }
        }
        ?>
    
    </div>

</body>
</html>