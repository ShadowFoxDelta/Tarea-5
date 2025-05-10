<?php
class ProcesarDatos {
    //Declaramos las Variables 
    public $radio1;
    public $radio2;
    public $radio3;
    public $radio4;
    public $cantidad1;
    public $cantidad2;
    public $cantidad3;
    public $cantidad4;
    public $edad;

    // Constructor para inicializar las variables
    public function __construct($radio1, $radio2, $radio3, $radio4, $cantidad1, $cantidad2, $cantidad3, $cantidad4, $edad) {

        $this->radio1 = $radio1;
        $this->radio2 = $radio2;
        $this->radio3 = $radio3;
        $this->radio4 = $radio4;
        $this->cantidad1 = $cantidad1;
        $this->cantidad2 = $cantidad2;
        $this->cantidad3 = $cantidad3;
        $this->cantidad4 = $cantidad4;
        $this->edad = $edad;
    }

    // Función que suma los valores
    public function calcularValores() {
        $ed = $this->edad;

        //Verificamos si aplica descuento
        if($ed >= 57){
            $data = ($this->radio1 * $this->cantidad1) + ($this->radio2 * $this->cantidad2) + ($this->radio3 * $this->cantidad3) + ($this->radio4 * $this->cantidad4);

            $desc = $data / 4;
            $res = $data - $desc;
            $data = 0;
            $data = $res;

            return $data;

        }
        if($ed < 57){
            $dato = ($this->radio1 * $this->cantidad1) + ($this->radio2 * $this->cantidad2) + ($this->radio3 * $this->cantidad3) + ($this->radio4 * $this->cantidad4);

            return $dato;
        }
    }


    public function calcularDescuento() {
        $ed = $this->edad;

        if($ed >= 57){
            $data = ($this->radio1 * $this->cantidad1) + ($this->radio2 * $this->cantidad2) + ($this->radio3 * $this->cantidad3) + ($this->radio4 * $this->cantidad4);

            $desc = $data / 4;

            $descuento = "Si aplica descuento de ".number_format($desc, 2);
        }

        if($ed < 57){
            $descuento = "No aplica descuento";
        }

        return $descuento;
    }
}
?>