<h2>Ingrese 5 valores numéricos:</h2>
<form method="post">
<?php for ($i = 0; $i < 5; $i++): ?>
    <div class="form-group row">
        <label for="valor<?= $i ?>" class="col-sm-2 col-form-label">Valor <?= $i + 1 ?>:</label>
        <div class="col-sm-10">
            <input type="text" id="valor<?= $i ?>" name="valores[]" class="form-control mb-2" value="<?= htmlspecialchars($valores[$i]) ?>" placeholder="Ingrese valor">
        </div>
    </div>
<?php endfor; ?>
        <!-- Selección de operación -->
        <select name="operacion" class="form-control mb-3">
            <option value="ascendente" <?= $operacionSeleccionada == 'ascendente' ? 'selected' : '' ?>>Orden Ascendente</option>
            <option value="inverso" <?= $operacionSeleccionada == 'inverso' ? 'selected' : '' ?>>Orden Inverso</option>
            <option value="promedio" <?= $operacionSeleccionada == 'promedio' ? 'selected' : '' ?>>Promedio</option>
        </select>

        <!-- Botón de envío -->
        <button type="submit" class="btn btn-primary">Calcular</button>
    </form>

    <!-- Mostrar resultado si existe -->
    <?php if ($resultado): ?>
        <div class="mt-4"><?= $resultado ?></div>
    <?php endif; ?>
