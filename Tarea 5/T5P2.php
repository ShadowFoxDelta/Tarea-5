<?php
include "P2_OPERACIONES2.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Operaciones con Números</title>
    <!-- Bootstrap CSS -->
	<link href="./CSS/bootstrap.min.css" rel="stylesheet" type="text/css" >
	<link rel="stylesheet" type="text/css" href="./ESTILOS/BARRA_FOOTER.css">
</head>
<body class="container mt-5">
<?php include "base/menu.html";?>

     <div class="cont-card"><!--INICIAMOS UN CARD-->
     <div class="card text-center">
        <div class="card-body"><!--INICIA EL CUERPO DEL CARD-->
           <center>
           <?php
            include "P2_FORM.php";
            ?>
            </center>
        </div><!--FINALIZA EL CUERPO DEL CARD-->
     </div>
   </div><!--FINALIZA EL CARD-->


    <?php include ("BASE/footer.html"); ?><!--SE INCLUYE EL PIE DE PAGINA-->
</body>
</html>

