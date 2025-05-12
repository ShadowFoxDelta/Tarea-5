<?php
// Se incluye el archivo que contiene la clase Numeros con los métodos necesarios
require_once 'P2_OPERACIONES.php';

// Se inicializa el arreglo de valores desde el formulario o se llena con 5 cadenas vacías si no hay datos enviados
$valores = isset($_POST['valores']) ? $_POST['valores'] : array_fill(0, 5, '');

// Variable que almacenará el resultado a mostrar
$resultado = '';

// Arreglo para almacenar errores de validación
$errores = [];

// Se obtiene la operación seleccionada o una cadena vacía si no se ha enviado
$operacionSeleccionada = isset($_POST['operacion']) ? $_POST['operacion'] : '';

// Se verifica si el formulario fue enviado con el método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Validación de los valores numéricos ingresados
        foreach ($valores as $index => $valor) {
            if (trim($valor) === '') {
                // Si el campo está vacío, se agrega un mensaje de error
                $errores[] = "El campo Valor " . ($index + 1) . " está vacío.";
            } elseif (!is_numeric($valor)) {
                // Si no es numérico, se agrega un mensaje de error
                $errores[] = "El campo Valor " . ($index + 1) . " debe ser un número.";
            } elseif (floatval($valor) < 0) {
                // Si el valor es negativo, se agrega un mensaje de error
                $errores[] = "El campo Valor " . ($index + 1) . " no puede ser negativo.";
            }
        }

        // Si hay algún error, se lanza una excepción para detener el proceso
        if (!empty($errores)) {
            throw new Exception(implode("<br>", $errores));
        }

        // Se convierten todos los valores a tipo float para asegurarse de trabajar con números
        $valoresNumericos = array_map('floatval', $valores);

        // Se crea una instancia de la clase Numeros con los valores ingresados
        $numeros = new Numeros($valoresNumericos);

        // Se evalúa qué operación fue seleccionada por el usuario y se ejecuta
        switch ($operacionSeleccionada) {
            case 'ascendente':
                // Ordena los valores en orden ascendente
                $resultado = "Valores Ordenados Ascendentemente: " . implode(", ", $numeros->ordenarAscendente());
                break;
            case 'inverso':
                // Ordena los valores en orden inverso
                $resultado = "Valores Ordenados Inversamente: " . implode(", ", $numeros->ordenarInverso());
                break;
            case 'promedio':
                // Calcula el promedio de los valores
                $resultado = "Promedio de los Valores: " . number_format($numeros->calcularPromedio(), 2);
                break;
            default:
                // Si no se seleccionó una operación válida
                $resultado = "Operación no válida seleccionada.";
        }
    } catch (Exception $e) {
        // En caso de excepción, se muestra el mensaje de error en un cuadro de alerta
        $resultado = '<div class="alert alert-danger" role="alert">Error: ' . $e->getMessage() . '</div>';
    }
}
?>