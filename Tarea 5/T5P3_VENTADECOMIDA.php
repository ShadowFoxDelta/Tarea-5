<!DOCTYPE html>
<html lang="es"> <!-- Declaración del tipo de documento y lenguaje en español -->
<head>
    <meta charset="UTF-8"> <!-- Codificación de caracteres -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Diseño adaptable para móviles -->
    <title>Taller 4_Programando en PHP</title> <!-- Título de la pestaña -->

    <!-- Enlace a Bootstrap CSS desde CDN para estilos y componentes responsivos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos personalizados para el pie de página -->
    <link rel="stylesheet" type="text/css" href="./ESTILOS/HEADER.css">

    <!-- Estilos personalizados para el pie de página -->
    <link rel="stylesheet" type="text/css" href="./ESTILOS/BARRA_FOOTER.css">

    <!-- Estilos personalizados específicos del formulario del punto 3 -->
    <link rel="stylesheet" type="text/css" href="./ESTILOS/P3_ESTILO.css">
</head>

<body>

    <!-- Se incluye el encabezado común del sitio -->
    <?php include("BASE/HTML/comunes/header.html"); ?>

    <!-- Contenedor principal que envuelve el contenido de la página -->
    <div class="contenedor-principal">

        <!-- Card que contiene el formulario dentro de un diseño limpio y centrado -->
        <?php include("BASE/HTML/P3/Card.html"); ?>

    </div> <!-- Fin del contenedor principal -->

    <!-- Inclusión del pie de página común del sitio -->
    <?php include ("BASE/HTML/comunes/footer.html"); ?>

</body>
</html>


