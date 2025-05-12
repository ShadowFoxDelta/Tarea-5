<?php
// Obtenemos las variables desde la URL, si existen; si no, les asignamos valor por defecto
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

// Valores disponibles en los radio buttons y sus precios
$opciones = [
    'radio1' => ['Pollo' => 1.15, 'Res' => 1.50, 'Pescado' => 1.10],
    'radio2' => ['Blanco' => 0.50, 'Guandú' => 0.65, 'Vegetales' => 0.60],
    'radio3' => ['Lentejas' => 0.25, 'Porotos' => 0.35, 'Ninguno' => 0.00],
    'radio4' => ['Soda' => 0.50, 'Jugo' => 0.75, 'Sundae' => 1.25]
];
?>

<!-- Formulario principal, sin acción para ser manejado por JavaScript -->
<form id="P3Form">
    <div class="accordion" id="accordionExample">
        <!-- Incluye secciones por separado, cada acordeón contiene una categoría de producto -->
        <?php include("BASE/HTML/P3/acordeon1.html"); ?>
        <?php include("BASE/HTML/P3/acordeon2.html"); ?>
        <?php include("BASE/HTML/P3/acordeon3.html"); ?>
        <?php include("BASE/HTML/P3/acordeon4.html"); ?>
    </div>

    <br><br>

    <!-- Entrada para la edad del cliente -->
    <label for="edadcliente"><h3>Ingresar Edad: </h3></label><br>
    <input type="number" id="edadcliente" name="edadcliente" min="0" max="150" required value="<?= htmlspecialchars($edadcliente) ?>"><br><br>

    <br>

    <!-- Botones del formulario -->
    <button type="submit" id="enviar">Enviar</button>
    <button type="reset" id="limpiar" onclick="window.location.href='T5P3_VENTADECOMIDA.php';">Limpiar</button>
</form>

<!-- Modal donde se mostrarán los resultados -->
<?php include("BASE/PHP/P3/P3_RESULTADOMODAL.php"); ?>

<!-- ========== JAVASCRIPT ========== -->

<!-- jQuery para facilitar la manipulación del DOM y AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!--incluye Popper y componentes dinámicos como el modal -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script AJAX que gestiona el envío del formulario y muestra el modal con los datos -->
<script src="JavaS/EnviarInfo.js"></script>

