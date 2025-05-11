<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Taller 4_Programando en PHP</title>

	<!--Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./ESTILOS/BARRA_FOOTER.css">
	<link rel="stylesheet" type="text/css" href="./ESTILOS/P3_ESTILO.css">
</head>

<body>
  <?php incLude("BASE/HTML/comunes/header.html"); ?>
  <div class="contenedor-principal"><!--INICIA EL CONTENEDOR PRINCIPAL DE LA PAGINA-->
  	

    <div class="cont-card"><!--INICIAMOS UN CARD-->
     <div class="card text-center">
     	<div class="card-img"><!--CONTENEDOR DE UNA IMAGEN DENTRO DEL CARD-->
     		<img src="./IMG/logo-restaurante.png" width="100" height="100">
     	</div><!--FINALIZA EL CONTENEDOR DE LA IMAGEN-->
  
     	<div class="card-body"><!--INICIA EL CUERPO DEL CARD-->
     		<h4>Menú Disponible</h4><br>
     		<?php include ("BASE/PHP/P3/P3_FORMULARIO.php"); ?><!--INCLUIMOS EL FORMULARIO-->
     		
     	</div><!--FINALIZA EL CUERPO DEL CARD-->
     </div>
   </div><!--FINALIZA EL CARD-->

  </div><!--TERMINA CONTENEDOR PRINCIPAL DE LA PÁGINA-->
	
</body>
</html>

<?php include ("BASE/HTML/comunes/footer.html"); ?><!--SE INCLUYE EL PIE DE PAGINA-->