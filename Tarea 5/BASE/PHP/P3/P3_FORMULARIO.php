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

<?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger" role="alert">
        <?= htmlspecialchars(urldecode($_GET['error'])) ?>
    </div>
<?php endif; ?>

<form id="P3Form">
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
    <input type="number" id="edadcliente" name="edadcliente" min="0" required value="<?= htmlspecialchars($edadcliente) ?>"><br><br>

    <br> 

    <!-- Botones necesarios -->
    <button type="submit" id="enviar">Enviar</button>
    <button type="reset" id="limpiar" onclick="window.location.href='T5P3_VENTADECOMIDA.php';">Limpiar</button>
</form>

<!-- Modal -->
<?php include("BASE/PHP/P3/P3_RESULTADOMODAL.php"); ?>

<br>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Mostrar Factura
</button>

<!-- Bootstrap JS (incluye dependencias como Popper.js) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Asegúrate de usar la versión más reciente de jQuery -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> <!-- Bootstrap con el bundle -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="JavaS/JUnfresh.js"></script>

<script>
  $(document).ready(function() {
    // Interceptar el formulario al enviar
    $("#P3Form").submit(function(event) {
      event.preventDefault();  // Evitar que el formulario se envíe de manera tradicional

      // Enviar los datos usando AJAX
      $.ajax({
        url: "BASE/PHP/P3/P3_VALIDAR_DATOS.php", // La URL donde procesas los datos
        type: "POST",
        data: $(this).serialize(), // Serializa los datos del formulario
        dataType: "json", // Esperamos la respuesta en formato JSON
        success: function(response) {
          if (response.error) {
            alert("Error: " + response.message); // En caso de error
          } else {
            // Llenamos el modal con los datos de la respuesta
            var modalContent = `
              <p><strong>Total a Pagar:</strong> $${response.resultado}</p>
              <p><strong>Descuento:</strong> ${response.descuento}</p>
              <hr>
              <h5>Detalles del Pedido:</h5>
              <ul>
                <li><strong>Carne:</strong> ${response.datos.radio1} - $${response.datos.precio1} x ${response.datos.cantidad1}</li>
                <li><strong>Arroz:</strong> ${response.datos.radio2} - $${response.datos.precio2} x ${response.datos.cantidad2}</li>
                <li><strong>Menestra:</strong> ${response.datos.radio3} - $${response.datos.precio3} x ${response.datos.cantidad3}</li>
                <li><strong>Postre:</strong> ${response.datos.radio4} - $${response.datos.precio4} x ${response.datos.cantidad4}</li>
              </ul>
              <hr>
              <p><strong>Edad del Cliente:</strong> ${response.datos.edadcliente}</p>
            `;

            // Insertamos el contenido al modal
            $('#modalContent').html(modalContent);

            // Mostrar el modal
            $('#exampleModal').modal('show');
          }
        },
        error: function() {
          alert("Hubo un error al procesar los datos.");
        }
      });
    });
  });
</script>
