<?php
session_start();

// Función para cargar la matriz
function cargarMatriz($I1, $I2, $I3, $I4, $S1, $S2, $S3, $S4, $R1, $R2, $R3, $R4) {
    return [
        [$I1, $I2, $I3, $I4],
        [$S1, $S2, $S3, $S4],
        [$R1, $R2, $R3, $R4]
    ];
}

// Función para calcular la cantidad de alumnos por carrera
function AlumnosPorCarrera($matriz) {
    return array_map('array_sum', $matriz);
}

// Función para calcular la cantidad de alumnos por año
function AlumnosPorAño($matriz) {
    $result = [0, 0, 0, 0];
    foreach ($matriz as $row) {
        foreach ($row as $index => $value) {
            $result[$index] += $value;
        }
    }
    return $result;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $matriz = cargarMatriz(
        $_POST['I1'], $_POST['I2'], $_POST['I3'], $_POST['I4'],
        $_POST['S1'], $_POST['S2'], $_POST['S3'], $_POST['S4'],
        $_POST['R1'], $_POST['R2'], $_POST['R3'], $_POST['R4']
    );

    $opcion = $_POST['opcion'];

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
