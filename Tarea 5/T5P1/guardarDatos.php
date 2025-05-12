<?php
session_start(); // Inicia la sesión

// Función para cargar la matriz con los valores ingresados por el usuario
function cargarMatriz($I1, $I2, $I3, $I4, $S1, $S2, $S3, $S4, $R1, $R2, $R3, $R4) {
    // Retorna una matriz de 3 filas (carreras) y 4 columnas (años)
    return [
        [$I1, $I2, $I3, $I4],        // Ingeniería
        [$S1, $S2, $S3, $S4],        // Desarrollo Software
        [$R1, $R2, $R3, $R4]         // Redes
    ];
}

// Función para calcular el total de alumnos por carrera (suma de cada fila)
function AlumnosPorCarrera($matriz) {
    return array_map('array_sum', $matriz);
}

// Función para calcular el total de alumnos por año (suma de cada columna)
function AlumnosPorAño($matriz) {
    $result = [0, 0, 0, 0]; // Inicializa los totales por año (I, II, III, IV)
    foreach ($matriz as $row) {
        foreach ($row as $index => $value) {
            $result[$index] += $value; // Suma por columna
        }
    }
    return $result;
}

// Validación de los valores enviados por POST
foreach ($_POST as $key => $value) {
    // Solo valida los campos que comienzan con I, S o R
    if (strpos($key, 'I') === 0 || strpos($key, 'S') === 0 || strpos($key, 'R') === 0) {
        // Verifica que sean números y no negativos
        if (!is_numeric($value) || $value < 0) {
            die("<div class='alert alert-danger'>Error: Todos los campos deben ser números enteros no negativos.</div>");
        }
    }
}

// Si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Carga la matriz con los datos del formulario
    $matriz = cargarMatriz(
        $_POST['I1'], $_POST['I2'], $_POST['I3'], $_POST['I4'],
        $_POST['S1'], $_POST['S2'], $_POST['S3'], $_POST['S4'],
        $_POST['R1'], $_POST['R2'], $_POST['R3'], $_POST['R4']
    );

    // Obtiene la opción seleccionada por el usuario
    $opcion = $_POST['opcion'];

    // Opción 1: Mostrar matriz completa
    if ($opcion == 1) {
        echo '<table class="table table-bordered table-hover">
            <thead><tr><th colspan="5">Matriz de Estudiantes por Carrera y Nivel</th></tr></thead>
            <tbody>
                <tr><th></th><th>I</th><th>II</th><th>III</th><th>IV</th></tr>';
        $carreras = ['Ingeniería', 'Desarrollo Software', 'Redes'];
        for ($i = 0; $i < 3; $i++) {
            echo '<tr><td>' . $carreras[$i] . '</td>';
            for ($j = 0; $j < 4; $j++) {
                echo '<td>' . $matriz[$i][$j] . '</td>';
            }
            echo '</tr>';
        }
        echo '</tbody></table>';
    }

    // Opción 2: Mostrar cantidad de alumnos por carrera
    if ($opcion == 2) {
        $carrera = AlumnosPorCarrera($matriz);
        echo '<table class="table table-bordered table-hover">
            <thead><tr><th colspan="3">Cantidad de Alumnos por Carrera</th></tr></thead>
            <tbody>
                <tr><td>Ingeniería</td><td>Desarrollo Software</td><td>Redes</td></tr>
                <tr><td>' . $carrera[0] . '</td><td>' . $carrera[1] . '</td><td>' . $carrera[2] . '</td></tr>
            </tbody>
        </table>';
    }

    // Opción 3: Mostrar cantidad de alumnos por año
    if ($opcion == 3) {
        $anio = AlumnosPorAño($matriz);
        echo '<table class="table table-bordered table-hover">
            <thead><tr><th colspan="4">Cantidad de Alumnos por Año</th></tr></thead>
            <tbody>
                <tr><td>I</td><td>II</td><td>III</td><td>IV</td></tr>
                <tr><td>' . $anio[0] . '</td><td>' . $anio[1] . '</td><td>' . $anio[2] . '</td><td>' . $anio[3] . '</td></tr>
            </tbody>
        </table>';
    }
}
?>