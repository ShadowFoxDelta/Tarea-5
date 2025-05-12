<?php
require_once 'P2_OPERACIONES.php';

$valores = isset($_POST['valores']) ? $_POST['valores'] : array_fill(0, 5, '');
$resultado = '';
$errores = [];
$operacionSeleccionada = isset($_POST['operacion']) ? $_POST['operacion'] : '';

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Validar que todos los campos estén llenos y sean números válidos
        foreach ($valores as $index => $valor) {
            if (trim($valor) === '') {
                $errores[] = "El campo Valor " . ($index + 1) . " está vacío.";
            } elseif (!is_numeric($valor)) {
                $errores[] = "El campo Valor " . ($index + 1) . " debe ser un número.";
            } elseif (floatval($valor) < 0) {
                $errores[] = "El campo Valor " . ($index + 1) . " no puede ser negativo.";
            }
        }

        // Si hay errores, no continuar
        if (!empty($errores)) {
            throw new Exception(implode("<br>", $errores));
        }

        // Convertir a float
        $valoresNumericos = array_map('floatval', $valores);
        $numeros = new Numeros($valoresNumericos);

        // Ejecutar operación
        switch ($operacionSeleccionada) {
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
        $resultado = '<div class="alert alert-danger" role="alert">Error: ' . $e->getMessage() . '</div>';
    }
}
?>