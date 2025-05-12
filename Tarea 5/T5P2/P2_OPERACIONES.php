<?php
// Definición de la clase Numeros para realizar operaciones con un arreglo de valores numéricos
class Numeros {
    // Propiedad privada que almacena los valores numéricos
    private $valores;

    // Constructor: recibe un arreglo de valores y los asigna a la propiedad privada
    public function __construct($valores) {
        $this->valores = $valores;
    }

    // Método para ordenar los valores en orden ascendente
    public function ordenarAscendente() {
        $valoresOrdenados = $this->valores; // Copiamos los valores originales
        sort($valoresOrdenados); // Ordenamos de menor a mayor
        return $valoresOrdenados; // Devolvemos el arreglo ordenado
    }

    // Método para ordenar los valores en orden descendente (inverso)
    public function ordenarInverso() {
        $valoresInversos = $this->valores; // Copiamos los valores originales
        rsort($valoresInversos); // Ordenamos de mayor a menor
        return $valoresInversos; // Devolvemos el arreglo ordenado
    }

    // Método para calcular el promedio de los valores
    public function calcularPromedio() {
        $suma = array_sum($this->valores); // Suma todos los elementos del arreglo
        $cantidad = count($this->valores); // Cuenta cuántos elementos hay
        return $cantidad > 0 ? $suma / $cantidad : 0; // Retorna el promedio o 0 si no hay elementos
    }
}
?>