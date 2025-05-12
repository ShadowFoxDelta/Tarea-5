<h2>Ingrese 5 valores numéricos:</h2>
<!-- Estilos personalizados específicos del formulario del punto 3 -->
    <link rel="stylesheet" type="text/css" href="./ESTILOS/P2_ESTILO.css">
<form method="post"> <!-- Inicia el formulario, enviará los datos con el método POST -->
<?php for ($i = 0; $i < 5; $i++): ?> <!-- Bucle para generar 5 campos de entrada -->
    <div class="form-group row"> <!-- Grupo de formulario con diseño en filas (usando Bootstrap) -->
        <!-- Etiqueta asociada al campo de entrada, indica el número del valor -->
        <label for="valor<?= $i ?>" class="col-sm-2 col-form-label">Valor <?= $i + 1 ?>:</label>
        <div class="col-sm-10">
            <!-- Campo de entrada numérico con validación de solo números positivos -->
            <input type="text" 
                   id="valor<?= $i ?>" 
                   name="valores[]" 
                   class="form-control mb-2" 
                   value="<?= htmlspecialchars($valores[$i]) ?>" <!-- Rellenado automático con el valor anterior (previene XSS) -->
                   <placeholder="Ingrese valor" 
                   required 
                   pattern="\d+(\.\d+)?" <!-- Solo acepta números positivos (enteros o decimales) -->
                  <title="Solo se permiten números positivos">
        </div>
    </div>
<?php endfor; ?> <!-- Fin del bucle que genera los campos de entrada -->
    
    <!-- Selector desplegable para elegir la operación a realizar -->
    <select name="operacion" class="form-control mb-3" required>
        <option value="">Seleccione una operación</option>
        <!-- La opción se marca como seleccionada si ya fue elegida previamente -->
        <option value="ascendente" <?= $operacionSeleccionada == 'ascendente' ? 'selected' : '' ?>>Orden Ascendente</option>
        <option value="inverso" <?= $operacionSeleccionada == 'inverso' ? 'selected' : '' ?>>Orden Inverso</option>
        <option value="promedio" <?= $operacionSeleccionada == 'promedio' ? 'selected' : '' ?>>Promedio</option>
    </select>

    <!-- Botón para enviar el formulario y calcular la operación -->
    <button type="submit" class="btn btn-primary">Calcular</button>

    <!-- Botón para limpiar el formulario, redirecciona a la página inicial para resetear -->
    <button type="reset" id="limpiar" onclick="window.location.href='T5P2.php';">Limpiar</button>
</form>

<!-- Sección para mostrar el resultado de la operación, si existe -->
<?php if ($resultado): ?>
    <div class="mt-4"><?= $resultado ?></div> <!-- Muestra el resultado con un poco de margen arriba -->
<?php endif; ?>