<?PHP
require_once("Circulo.php");

$C1 = new Circulo(10,20,5);
$C2 = new Circulo(15,30,8);
$C3 = new Circulo(0,0,0);

$a1 = $C1->area();

echo "El area del circulo 1 = $a1 <br>";
$C1->muestra("Circulo 1");


$p2 = $C1->perimetro();
echo "El perimetro del circulo 2 = $p2 <br>";
$C2->muestra("Circulo 2");

$C3->suma($C1, $C2);
$C3->muestra("XDDD");