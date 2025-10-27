<?PHP
class Circulo{
    private $px, $py;
    private $radio;

    public function __construct($px, $py, $radio){
        $this->px = $px;
        $this->py = $py;
        $this->radio = $radio;

    }

    public function area(){
        
        return 3.1416*$this->radio*$this->radio;
    }
    public function perimetro(){
        
        return 3.1416*2*$this->radio;

    }

    public function muestra($cad){
        echo"$cad <br>";
        echo "Px = $this->px<br> " ;
        echo "Py = $this->py<br> " ;
        echo "Radio = $this->radio<br> " ;

    }

    public function suma($C1, $C2){
        $this->px = $C1->px+ $C2->px;
        $this->py = $C1->py+ $C2->py;
        $this->radio = $C1->radio+ $C2->radio;
    }


}
