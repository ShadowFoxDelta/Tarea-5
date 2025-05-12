
<?php
/*
Esta clase se encarga de procesar los datos una vez pasaron por P3_VALIDARDATOS.php, calcula el subtotal y total del pedido.
En caso de que haya un error con los datos envia un mensaje de error de que faltan campos por rellenar.
El constructor recupera con POST los datos almacenados en los acordeones, para generar la factura.
*/
class ProcesarDatos {
    //Declaramos las Variables 
    public $radio1, $radio2, $radio3, $radio4;
    public $cantidad1, $cantidad2, $cantidad3, $cantidad4;
    public $edad;
    public $error;

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

        $this->validarDatos();


    }

    //Función verificar entradas
    private function validarDatos() {
        // Verificar radios vacíos o nulos
        if ($this->radio1 === null || $this->radio1 === '' ||
            $this->radio2 === null || $this->radio2 === '' ||
            $this->radio3 === null || $this->radio3 === '' ||
            $this->radio4 === null || $this->radio4 === '') {
            $this->error = "Debe seleccionar todas las opciones de comida.";
            echo $this->radio3;
            return;
        }

        // Verificar si alguna cantidad es 0
        if ($this->cantidad1 == 0 || $this->cantidad2 == 0 || $this->cantidad4 == 0) {
            $this->error = "Debe ingresar cantidades mayores que 0 para todos los productos.";
            return;
        }

        if ($this->edad == 0) {
            $this->error = "Debe ingresar una edad mayor que 0.";
            return;
        }


        // Menestra: solo se acepta 0 si es "Ninguno"

        if ($this->radio3 !== 0.00 && $this->cantidad3 <= 0) {
            $this->cantidad3 = 0;
            $this->error = "Debe ingresar una cantidad mayor a 0 para la menestra seleccionada.";
            return;
        }
    }

    //Función verificar si colocó menestra
    public function MenestraExiste(){
        return $this->radio3 === 0.00;
    }

    //Función verificar si hay error
    public function HayError(){
        return isset($this->error);
    }

    //Función recuperar error
    public function GetError(){
        return $this->error ?? null;
    }

    // Función que suma los valores
    public function calcularValores() {
        if ($this->HayError()) return null;

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
        if ($this->HayError()) return null;

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