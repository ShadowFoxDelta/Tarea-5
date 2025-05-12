<?php
class Numeros {
    private $valores;

    public function __construct($valores) {
        $this->valores = $valores;
    }

    public function ordenarAscendente() {
        $valoresOrdenados = $this->valores;
        sort($valoresOrdenados);
        return $valoresOrdenados;
    }

    public function ordenarInverso() {
        $valoresInversos = $this->valores;
        rsort($valoresInversos);
        return $valoresInversos;
    }

    public function calcularPromedio() {
        $suma = array_sum($this->valores);
        $cantidad = count($this->valores);
        return $cantidad > 0 ? $suma / $cantidad : 0;
    }
}
?>

