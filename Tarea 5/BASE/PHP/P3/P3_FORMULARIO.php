<?php
// Verificar si hay variables en la URL
$resultado = isset($_GET['resultado']) ? $_GET['resultado'] : '0';
$radio1 = isset($_GET['radio1']) ? $_GET['radio1'] : '0';
$radio2 = isset($_GET['radio2']) ? $_GET['radio2'] : '0';
$radio3 = isset($_GET['radio3']) ? $_GET['radio3'] : '0';
$radio4 = isset($_GET['radio4']) ? $_GET['radio4'] : '0';
$precio1 = isset($_GET['precio1']) ? $_GET['precio1'] : '0';
$precio2 = isset($_GET['precio2']) ? $_GET['precio2'] : '0';
$precio3 = isset($_GET['precio3']) ? $_GET['precio3'] : '0';
$precio4 = isset($_GET['precio4']) ? $_GET['precio4'] : '0';
$cantidad1 = isset($_GET['numero1']) ? $_GET['numero1'] : '0';
$cantidad2 = isset($_GET['numero2']) ? $_GET['numero2'] : '0';
$cantidad3 = isset($_GET['numero3']) ? $_GET['numero3'] : '0';
$cantidad4 = isset($_GET['numero4']) ? $_GET['numero4'] : '0';
$descuento = isset($_GET['descuento']) ? $_GET['descuento'] : '0';
$edadcliente = isset($_GET['edadcliente']) ? $_GET['edadcliente'] : '0';

// Definimos el array asociativo con los valores para los radio buttons
$opciones = [
    'radio1' => ['Pollo' => 1.15, 'Res' => 1.50, 'Pescado' => 1.10],
    'radio2' => ['Blanco' => 0.50, 'Guandú' => 0.65, 'Vegetales' => 0.60],
    'radio3' => ['Lentejas' => 0.25, 'Porotos' => 0.35, 'Ninguno' => 0.00],
    'radio4' => ['Soda' => 0.50, 'Jugo' => 0.75, 'Sundae' => 1.25]
];
?>

<form  action="P3_VALIDAR_DATOS.php" method="POST">
    <div class="accordion" id="accordionExample">
        <!-- Acordeón 1 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Carnes
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <?php foreach ($opciones['radio1'] as $key => $value): ?>
                        <label>
                            <input type="radio" name="radio1" value="<?= $value ?>" > <?= $key ?> (<?= $value ?>)
                        </label><br>
                    <?php endforeach; ?>

                     <!-- Entradas de número -->
                    <label>Catidad: <input type="number" name="numero1" min="0"></label><br>
                </div>
            </div>
        </div>
        
        <!-- Acordeón 2 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Arrroz
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <?php foreach ($opciones['radio2'] as $key => $value): ?>
                        <label>
                            <input type="radio" name="radio2" value="<?= $value ?>" > <?= $key ?> (<?= $value ?>)
                        </label><br>
                    <?php endforeach; ?>

                    <!-- Entradas de número -->
                    <label>Cantidad: <input type="number" name="numero2" min="0"></label><br>
                </div>
            </div>
        </div>
        
        <!-- Acordeón 3 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Menestras
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <?php foreach ($opciones['radio3'] as $key => $value): ?>
                        <label>
                            <input type="radio" name="radio3" value="<?= $value ?>" > <?= $key ?> (<?= $value ?>)
                        </label><br>
                    <?php endforeach; ?>

                    <!-- Entradas de número -->
                    <label>Cantidad: <input type="number" name="numero3" min="0"></label><br>
                </div>
            </div>
        </div>
        
        <!-- Acordeón 4 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Postres
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <?php foreach ($opciones['radio4'] as $key => $value): ?>
                        <label>
                            <input type="radio" name="radio4" value="<?= $value ?>" > <?= $key ?> (<?= $value ?>)
                        </label><br>
                    <?php endforeach; ?>

                    <!-- Entradas de número -->
                    <label>Cantidad: <input type="number" name="numero4" min="0"></label><br>
                </div>
            </div>
        </div>
    </div>

    <br><br>

    <!-- Entrada de edad -->
    <label for="edadcliente"> <h3>Ingresar Edad: </h3> </label><br>
    <input type="number" id="edadcliente" name="edadcliente" min="0"  required><br><br>

    <br>

    <!-- Botones necesarios -->
    <button type="submit" id="enviar">Enviar</button>
    <button type="reset" id="limpiar">Limpiar</button>

</form>

<?php include ("BASE/PHP/P3/P3_RESULTADOMODAL.php"); ?>

<br>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Mostrar Factura
</button>



<!-- Bootstrap JS (incluye dependencias como Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>