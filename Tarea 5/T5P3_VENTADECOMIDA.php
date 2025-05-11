<!DOCTYPE html>
<html lang="es"> <!-- Declaración del tipo de documento y lenguaje en español -->
<head>
    <meta charset="UTF-8"> <!-- Codificación de caracteres -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Diseño adaptable para móviles -->
    <title>Taller 4_Programando en PHP</title> <!-- Título de la pestaña -->

    <!-- Enlace a Bootstrap CSS desde CDN para estilos y componentes responsivos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos personalizados (barra de navegación y pie de página) -->
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
        <div class="cont-card">
            <div class="card text-center">

                <!-- Imagen decorativa en la parte superior del card -->
                <div class="card-img">
                    <img src="./IMG/logo-restaurante.png" width="100" height="100" alt="Logo del Restaurante">
                </div>

                <!-- Cuerpo del card con título y formulario -->
                <div class="card-body">
                    <h4>Menú Disponible</h4><br>

                    <!-- Inclusión del formulario PHP para la venta de comida -->
                    <?php include ("BASE/PHP/P3/P3_FORMULARIO.php"); ?>

                </div> <!-- Fin del cuerpo del card -->
            </div>
        </div> <!-- Fin del contenedor del card -->

    </div> <!-- Fin del contenedor principal -->

    <!-- Inclusión del pie de página común del sitio -->
    <?php include ("BASE/HTML/comunes/footer.html"); ?>

</body>
</html>


