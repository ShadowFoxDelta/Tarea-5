<?php include("./BASE/HTML/comunes/header.html"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Programa 1</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./ESTILOS/BARRA_FOOTER.css">
    <link rel="stylesheet" type="text/css" href="./ESTILOS/P1_ESTILOS.css">
    <link rel="stylesheet" type="text/css" href="./ESTILOS/HEADER.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <?php require 'T5P1/FORMULARIO_P1.php'; 
    $formulario = new Formulario();
    $formulario->llenarFormulario(); ?>
    
    <script>
        $('#formularioP1').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'guardarDatos.php',
                data: $(this).serialize(),
                success: function(response) {
                    $('#tablaResultados').html(response);
                }
            });
        });

        function limpiarFormulario() {
            $('#formularioP1').trigger("reset");
        }
    </script>
    <?php include("./BASE/HTML/comunes/footer.html"); ?>
</body>
</html>
