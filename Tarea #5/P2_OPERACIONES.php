<?php
class Numeros {
    private $valores; // Array para almacenar los valores numéricos

    // Constructor que recibe los valores del formulario
    public function __construct($valores) {
        $this->valores = $valores;
    }

    // Método para ordenar los números en orden ascendente
    public function ordenarAscendente() {
        $valoresOrdenados = $this->valores;
        sort($valoresOrdenados);
        return $valoresOrdenados;
    }

    // Método para invertir el orden de los números
    public function ordenarInverso() {
        $valoresInversos = $this->valores;
        rsort($valoresInversos);
        return $valoresInversos;
    }

    // Método para calcular el promedio de los números
    public function calcularPromedio() {
        $suma = array_sum($this->valores);
        $cantidad = count($this->valores);
        return $cantidad > 0 ? $suma / $cantidad : 0;
    }
}
?>
