
<?php include ("./BASE/menu.html"); ?><!--SE INCLUYE EL MENÚ-->


<!DOCTYPE html>
<html lang="es">
<head>

	<title>Programa 1</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./ESTILOS/BARRA_FOOTER.css">
	<link rel="stylesheet" type="text/css" href="./ESTILOS/P1_ESTILOS.css"><!--AGREGAMOS HOJA DE ESTILO DEL PROGRAMA 1-->
</head>
<body>
<div class="acordeon"><!--INICIA EL ACORDEON-->
        <!-- INICIA EL BLOQUE DE PALOMITAS -->
        <div class="bloque">
            <h2 class="h2"><a>REGISTRO</a></h2>
                <div class="contenido">
<?php require 'FORMULARIO_P1.php'; // SE INCLUYE EL FORMULARIO
$formulario = new Formulario(); // SE CREA LA INSTANCIA DE LA CALSE FORMULARIO
$formulario->llenarFormulario(); // SE MUESTRA EL FORMULARIO
 ?>
                </div>  
        </div>
    </div>

</body> </html>

<?php include ("./BASE/footer.html"); ?> <!--SE INCLUYE EL PIE DE PAGINA-->


<!--CODIGO PARA ACTIVAR EL ACORDEON-->
<script type="text/javascript">
    const bloque = document.querySelectorAll('.bloque');
    const h2 = document.querySelectorAll('.h2');
    h2.forEach((cadaH2, i) => {
        h2[i].addEventListener('click', () => {
            if (bloque[i].classList.contains('activo')) {
                bloque[i].classList.remove('activo');
            } else {
                bloque.forEach((cadaBloque) => {
                    cadaBloque.classList.remove('activo');
                });
                bloque[i].classList.add('activo');
            }
        });
    });
</script>
