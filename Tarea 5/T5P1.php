<?php include("./BASE/HTML/comunes/header.html"); ?> <!-- Se incluye el encabezado común (header) del sitio web -->
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Programa 1</title> <!-- Título de la pestaña del navegador -->
    <meta charset="utf-8"> <!-- Configuración de codificación de caracteres -->

    <!-- Enlaces a hojas de estilo CSS -->
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css"> <!-- Bootstrap para diseño responsivo -->
    <link rel="stylesheet" type="text/css" href="./ESTILOS/BARRA_FOOTER.css"> <!-- Estilos del footer -->
    <link rel="stylesheet" type="text/css" href="./ESTILOS/P1_ESTILOS.css"> <!-- Estilos específicos para este formulario -->
    <link rel="stylesheet" type="text/css" href="./ESTILOS/HEADER.css"> <!-- Estilos del encabezado -->

    <!-- Inclusión de jQuery para facilitar el manejo del DOM y AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <?php 
    // Se incluye el archivo PHP que contiene la clase Formulario
    require 'T5P1/FORMULARIO_P1.php'; 

    // Se crea una instancia del formulario y se llama al método que imprime el HTML del formulario
    $formulario = new Formulario();
    $formulario->llenarFormulario(); 
    ?>
    
    <!-- Script para manejar la funcionalidad del formulario -->
    <script>
        // Evento que intercepta el envío del formulario
        $('#formularioP1').on('submit', function(e) {
            e.preventDefault(); // Previene el comportamiento por defecto (recargar la página)

            // Envío del formulario mediante AJAX
            $.ajax({
                type: 'POST',
                url: 'T5P1/guardarDatos.php', // Ruta del archivo PHP que procesa los datos
                data: $(this).serialize(),    // Serializa los datos del formulario
                success: function(response) {
                    // Inserta la respuesta recibida en el div con ID "tablaResultados"
                    $('#tablaResultados').html(response);
                }
            });
        });

        // Función para limpiar los campos del formulario
        function limpiarFormulario() {
            $('#formularioP1').trigger("reset"); // Reinicia los valores del formulario
        }
    </script>

    <!-- Inclusión del pie de página -->
    <?php include("./BASE/HTML/comunes/footer.html"); ?>
</body>
</html>
