<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<h1>Resumen de selección</h1>";
    
    // Procesamos cada grupo de checkboxes
    foreach ($_POST as $grupo => $valores) {
        // Si es un checkbox (un array de valores seleccionados)
        if (is_array($valores)) {
            echo "<h2>" . ucfirst($grupo) . "</h2>";
            foreach ($valores as $valor) {
                // Buscar la cantidad correspondiente al valor seleccionado
                $cantidadClave = "cantidad_" . $valor;
                if (!empty($_POST[$cantidadClave])) {
                    $cantidad = $_POST[$cantidadClave];
                    echo "Seleccionaste $valor con cantidad: $cantidad<br>";
                } else {
                    echo "Seleccionaste $valor pero no especificaste cantidad.<br>";
                }
            }
        }
    }
}
?>