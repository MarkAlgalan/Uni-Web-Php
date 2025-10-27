<html>
    <head>
        <title>Adopcion</title>
        <style>
            table{
                width: 25%;
                background-color: white;
                border: 1px solid;
            }
            th{
                font-weight: bolder;
            }
            tr:nth-child(even){
                background-color: #f2f2f2;
            }
        </style>
    </head>
    <body>
    <?PHP
function exists($id, $arr){
    if($arr==null)
        return false;
    foreach($arr as $a){
        if($a==$id)
            return true;
    }
    return false;
}

$link = mysqli_connect("localhost","root","");
mysqli_select_db($link,"centroadopciones");
$dat1=$_REQUEST['mascota'];
$dat2=$_REQUEST['cliente'];
$date = date('Y-m-d');
$check = mysqli_query($link, "SELECT MascotaID from adopciones where ClienteID = $dat2");
if(!exists($dat1,mysqli_fetch_array($check))){
    $succ=mysqli_query($link,"INSERT INTO adopciones (Fecha, MascotaID, ClienteID) values ('$date', $dat1,$dat2)");
    if($succ===true){
        echo "Adopcion realizada exitosamente!";
    }else{
        echo "Hubo un problema";
    }
}else{
    echo "Adopcion ya se ha realizado";
}
$res = mysqli_query($link, "select Nombre from clientes where ClienteID = $dat2");
$res = mysqli_fetch_array($res);
$nom = $res['Nombre'];
echo "<br><h3>Mascotas adoptadas por $nom</h3>";
$res = mysqli_query($link, "select MascotaID from adopciones where ClienteID = $dat2");
echo "<table>";
echo "<tr><th> ID Mascota </th><th> Nombre </th></tr>";
while($reg = mysqli_fetch_array($res)){
    $id=$reg['MascotaID'];
    $que = mysqli_query($link, "select Nombre from mascotas where MascotaID = $id");
    $que = mysqli_fetch_array($que);
    $nom = $que['Nombre'];
    echo "<tr><td> $id </td><td> $nom </td></tr>";
}
mysqli_close($link)
    ?>
    </body>
</html>