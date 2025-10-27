<?PHP
class Conjunto{
    private $arreglo = [];
    public function __construct($n){
        $A = [];
        for($i=0;$i<$n;$i++){
            $A[$i] = rand(1,20);
        }
        $this->arreglo = $A;

    }
    private function setArreglo($arreglo){
        $this->arreglo = $arreglo;
    }
    public function muestra() {
        foreach ($this->arreglo as $elemento) {
            echo "$elemento ";
        }
    }

    public function union($C1, $C2): Conjunto {
        $C3 = new Conjunto(0);
        $C3->setArreglo(array_unique(array_merge($C1->getElements(), $C2->getElements())));
        return $C3;
    }

    public function interseccion($C1, $C2): Conjunto {
        $C3 = new Conjunto(0);
        $C3->setArreglo(array_unique(array_values(array_intersect($C1->getElements(), $C2->getElements()) )));
        return $C3;
    }

    public function diferencia($C1, $C2) {
        $C3 = new Conjunto(0);
        $C3->setArreglo(array_unique(array_values(array_diff($C1->getElements(), $C2->getElements()))));
        return $C3;
    }

    public function getElements() {
        return $this->arreglo;
    }
}