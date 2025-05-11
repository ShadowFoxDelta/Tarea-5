<script>
  $(document).ready(function(){
    // Cuando se envíe el formulario
    $("#P3Form").submit(function(event){
      event.preventDefault(); // Prevenir el envío tradicional del formulario
      $.ajax({
        url: "BASE/PHP/P3/P3_VALIDAR_DATOS.php", // URL donde se procesa el formulario
        type: "POST", // Método de envío
        data: $(this).serialize(), // Serializar los datos del formulario
        dataType: 'json', // Especificar que esperamos una respuesta JSON
        success: function(response){
          if(response.error) {
            alert(response.message); // Mostrar mensaje de error si lo hay
          } else {
            // Aquí se actualiza el contenido del modal con los datos recibidos
            var modalContent = `
              <p><strong>Total a Pagar:</strong> $${response.resultado}</p>
              <p><strong>Descuento:</strong> ${response.descuento}</p>
              <hr>
              <h5>Detalles:</h5>
              <ul>
                <li><strong>Carne:</strong> ${response.datos.radio1} - $${response.datos.precio1} x ${response.datos.cantidad1}</li>
                <li><strong>Arroz:</strong> ${response.datos.radio2} - $${response.datos.precio2} x ${response.datos.cantidad2}</li>
                <li><strong>Menestra:</strong> ${response.datos.radio3} - $${response.datos.precio3} x ${response.datos.cantidad3}</li>
                <li><strong>Postre:</strong> ${response.datos.radio4} - $${response.datos.precio4} x ${response.datos.cantidad4}</li>
              </ul>
              <hr>
              <p><strong>Edad del Cliente:</strong> ${response.datos.edadcliente}</p>
            `;

            // Insertar el contenido generado dentro del modal
            $('#modalContent').html(modalContent);

            // Mostrar el modal
            $('#exampleModal').modal('show');
          }
        },
        error: function(){
          alert('Hubo un error al procesar los datos.');
        }
      });
    });
  });
</script>
