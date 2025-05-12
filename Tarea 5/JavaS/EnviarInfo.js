/*
Este script se encarga de rellenar el modal con la información recuperada de la clase validar datos.
En caso de error manda un mensaje con "alert".
*/
$(document).ready(function() {
    // Captura el evento submit del formulario
    $("#P3Form").submit(function(event) {
      event.preventDefault(); // Evita que se recargue la página

      // Envío AJAX al servidor
      $.ajax({
        url: "BASE/PHP/P3/P3_VALIDAR_DATOS.php", // Script que procesa los datos
        type: "POST",
        data: $(this).serialize(), // Serializa los campos del formulario
        dataType: "json", // Espera respuesta en JSON

        success: function(response) {
          if (response.error) {
            alert("Error: " + response.message); // Muestra error si existe
          } else {
            // Construye contenido dinámico para el modal con los datos del pedido
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

            // Inserta contenido al div dentro del modal
            $('#modalContent').html(modalContent);

            // Muestra el modal con Bootstrap
            const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
            modal.show();
          }
        },

        error: function() {
          alert("Hubo un error al procesar los datos."); // Error general
        }
      });
    });
  });