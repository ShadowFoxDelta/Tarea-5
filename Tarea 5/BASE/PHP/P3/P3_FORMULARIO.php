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

<form  action="BASE/PHP/P3/P3_VALIDAR_DATOS.php" method="POST">
    <div class="accordion" id="accordionExample">
        
        <!-- Acordeón 1 -->
        <?php include("BASE/HTML/P3/acordeon1.html"); ?>

        <!-- Acordeón 2 -->
        <?php include("BASE/HTML/P3/acordeon2.html"); ?>

        <!-- Acordeón 3 -->
        <?php include("BASE/HTML/P3/acordeon3.html"); ?>

        <!-- Acordeón 4 -->
        <?php include("BASE/HTML/P3/acordeon4.html"); ?>
        
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