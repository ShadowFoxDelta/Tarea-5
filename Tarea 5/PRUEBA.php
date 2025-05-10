<?php
// Definir el array de opciones
$opciones = [
    'radio1' => ['Pollo' => 1.15, 'Res' => 1.50, 'Pescado' => 1.10],
    'radio2' => ['Blanco' => 0.50, 'Guandú' => 0.65, 'Vegetales' => 0.60],
    'radio3' => ['Lentejas' => 0.25, 'Porotos' => 0.35, 'Ninguno' => 0.00],
    'radio4' => ['Soda' => 0.50, 'Jugo' => 0.75, 'Sundae' => 1.25],
    'radio5' => ['So' => 0.50, 'Go' => 0.50, 'Sun' => 1.20]
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con Checkboxes</title>
    
    <script>
        // Función para mostrar/ocultar el campo de número al seleccionar un checkbox
        function mostrarEntrada(checkbox) {
            let inputCantidad = document.getElementById("cantidad_" + checkbox.value);
            if (checkbox.checked) {
                inputCantidad.style.display = 'inline'; // Mostrar el campo si el checkbox está seleccionado
            } else {
                inputCantidad.style.display = 'none'; // Ocultar el campo si el checkbox no está seleccionado
                inputCantidad.value = ''; // Limpiar el valor del campo
            }
        }
    </script>
</head>


<body>
    <form action="procesar.php" method="POST">
        <?php foreach ($opciones as $grupo => $items): ?>
            <fieldset>
                <legend><?php echo ucfirst($grupo); ?></legend>
                <?php foreach ($items as $nombre => $precio): ?>
                    <label>
                        <input type="checkbox" name="<?php echo $grupo; ?>[]" value="<?php echo $nombre; ?>" onchange="mostrarEntrada(this)">
                        <?php echo $nombre . " ($" . number_format($precio, 2) . ")"; ?>
                    </label>
                    <!-- Campo de número, inicialmente oculto -->
                    <input type="number" name="cantidad_<?php echo $nombre; ?>" id="cantidad_<?php echo $nombre; ?>" placeholder="Cantidad de <?php echo $nombre; ?>" min="1" style="display:none;">
                    <br>
                <?php endforeach; ?>
            </fieldset>
        <?php endforeach; ?>
        
        <input type="submit" value="Enviar">
    </form>
</body>
</html>