<?php
require_once 'P2_OPERACIONES.php'; // Asegúrate de incluir la clase Numeros desde el archivo aparte

// Inicializar los valores
$valores = isset($_POST['valores']) ? array_map('floatval', $_POST['valores']) : array_fill(0, 5, '');

$resultado = '';
$operacionSeleccionada = isset($_POST['operacion']) ? $_POST['operacion'] : '';

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['valores'])) {
    try {
        // Verificar que no haya números negativos en los valores ingresados
        foreach ($valores as $valor) {
            if ($valor < 0) {
                throw new Exception("No se permiten números negativos.");
            }
        }

        $numeros = new Numeros($valores); // Instanciar la clase Numeros
        $operacion = $_POST['operacion']; // Obtener la operación seleccionada

        // Realizar la operación seleccionada y mostrar el resultado
        switch ($operacion) {
            case 'ascendente':
                $resultado = "Valores Ordenados Ascendentemente: " . implode(", ", $numeros->ordenarAscendente());
                break;
            case 'inverso':
                $resultado = "Valores Ordenados Inversamente: " . implode(", ", $numeros->ordenarInverso());
                break;
            case 'promedio':
                $resultado = "Promedio de los Valores: " . number_format($numeros->calcularPromedio(), 2);
                break;
            default:
                $resultado = "Operación no válida seleccionada.";
        }
    } catch (Exception $e) {
        $resultado = '<div class="alert alert-danger" role="alert">Error: ' . $e->getMessage() . '</div>'; // Capturar y mostrar el mensaje de excepción con Bootstrap
    }
}
?>