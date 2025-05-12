<?php
include "T5P2/P2_OPERACIONES2.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Operaciones con Números</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos personalizados para el pie de página -->
    <link rel="stylesheet" type="text/css" href="./ESTILOS/HEADER.css">

    <!-- Estilos personalizados para el pie de página -->
    <link rel="stylesheet" type="text/css" href="./ESTILOS/BARRA_FOOTER.css">

    <!-- Estilos personalizados específicos del formulario del punto 3 -->
    <link rel="stylesheet" type="text/css" href="./ESTILOS/P2_ESTILO.css">
</head>
<body>
<?php include("BASE/HTML/comunes/header.html"); ?>
    <div class="container mt-5">
     <div class="cont-card"><!--INICIAMOS UN CARD-->
     <div class="card text-center">
        <div class="card-body"><!--INICIA EL CUERPO DEL CARD-->
           <center>
           <?php
            include "T5P2/P2_FORM.php";
            ?>
            </center>
        </div><!--FINALIZA EL CUERPO DEL CARD-->
     </div>
     </div><!--FINALIZA EL CARD-->
    </div>


    <?php include ("BASE/HTML/comunes/footer.html"); ?><!--SE INCLUYE EL PIE DE PAGINA-->
</body>
</html>



