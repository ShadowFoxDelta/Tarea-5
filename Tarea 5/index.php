<!DOCTYPE html>
<html lang="es">
<head><!-- Inicia Head-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Taller 4_Programando en PHP</title>

	<!--Bootstrap CSS -->
	<link href="./CSS/bootstrap.min.css" rel="stylesheet" type="text/css">

	<!--Diseño CSS -->
	<link rel="stylesheet" type="text/css" href="./ESTILOS/BARRA_FOOTER.css">
	 
</head><!-- Acaba Head-->

<body><!-- Inicia Body-->
	<?php incLude("BASE/HTML/comunes/header.html"); ?>
	<div><!-- Inicia contenedor principal -->
	<main class="mt-5">
		<!--etiqueta para utilizar un archivo de estilos y aplicarlos a todos los elementos de la clase-->
		<div class="row fila"> <!-- Inicia row -->
			<div class="col-md-12"> <!-- Inicia columna de 12 -->
			<div class="card h-100"> <!-- Inicia un div para el card-->
			<center><h1 class="card-header">Uso de HTML, CSS Y PHP</h1></center>
			<div class="cont-form"> <!-- Inicia card body para insertar formularios y código PHP-->
				<br>
				<center>
                    <img id="logoinicio" src="./IMG/inicio.jpg" height="300" width="600" alt="Brand"/>

                    <br><br>
                    <h6>Este proyecto consiste en el desarrollo de una calculadora web interactiva que permite realizar operaciones aritméticas básicas como calcular onzas y gramos. El programa está construido utilizando HTML para la estructura de la página, CSS para el diseño visual, y PHP para manejar la lógica de los cálculos. Con este proyecto, se busca brindar una herramienta práctica y sencilla para realizar cálculos matemáticos directamente desde el navegador, demostrando el uso combinado de HTML, CSS y PHP para construir aplicaciones web dinámicas.</h6>
                </center> 			

			</div><!-- Finalizar card de formulario -->
			</div> <!-- Finaliza card -->
			</div><!-- Termina columna de 12 -->
		</div><!-- Finaliza row -->
	</main>
	</div><!-- Termina contenedor principal -->	
		<?php include ("BASE/HTML/comunes/footer.html");?>
</body><!-- Acaba Body-->
</html>

