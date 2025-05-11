<?php
    //Include de la clase que procesa los datos
    include ("P3_PROCESARDATOS.php");

    //Array asociativo que contiene los datos de las comidas
    $opciones = [
        'radio1' => ['Pollo' => 1.15, 'Res' => 1.50, 'Pescado' => 1.10],
        'radio2' => ['Blanco' => 0.50, 'Guandú' => 0.65, 'Vegetales' => 0.60],
        'radio3' => ['Lentejas' => 0.25, 'Porotos' => 0.35, 'Ninguno' => 0.00],
        'radio4' => ['Soda' => 0.50, 'Jugo' => 0.75, 'Sundae' => 1.25]
    ];

    // Verificamos si los datos han sido enviados por POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Guardar los índices o keys seleccionados
        $key1 = isset($_POST['radio1']) ? array_search(floatval($_POST['radio1']), $opciones['radio1']) : '';
        $key2 = isset($_POST['radio2']) ? array_search(floatval($_POST['radio2']), $opciones['radio2']) : '';
        $key3 = isset($_POST['radio3']) ? array_search(floatval($_POST['radio3']), $opciones['radio3']) : '';
        $key4 = isset($_POST['radio4']) ? array_search(floatval($_POST['radio4']), $opciones['radio4']) : '';

        // Inicializamos las variables en 0
        $radio1 = isset($_POST['radio1']) ? floatval($_POST['radio1']) : 0;
        $radio2 = isset($_POST['radio2']) ? floatval($_POST['radio2']) : 0;
        $radio3 = isset($_POST['radio3']) ? floatval($_POST['radio3']) : 0;
        $radio4 = isset($_POST['radio4']) ? floatval($_POST['radio4']) : 0;
        $cantidad1 = isset($_POST['numero1']) && $_POST['numero1'] !== '' ? floatval($_POST['numero1']) : 0;
        $cantidad2 = isset($_POST['numero2']) && $_POST['numero2'] !== '' ? floatval($_POST['numero2']) : 0;
        $cantidad3 = isset($_POST['numero3']) && $_POST['numero3'] !== '' ? floatval($_POST['numero3']) : 0;
        $cantidad4 = isset($_POST['numero4']) && $_POST['numero4'] !== '' ? floatval($_POST['numero4']) : 0;
        $edad = $_POST['edadcliente'];
        
        // Instanciamos el objeto ProcesarDatos
        $procesar = new ProcesarDatos($radio1, $radio2, $radio3, $radio4, $cantidad1, $cantidad2, $cantidad3, $cantidad4, $edad);

        // Realizamos la suma de los valores atraves de una funcion
        $resultado = $procesar->calcularValores();

        // Realizamos la suma de los valores atraves de una funcion
        $descuento = $procesar->calcularDescuento();

        // Redireccionamos de vuelta al formulario con el resultado y los datos recibidos
        $queryString = http_build_query([
            'resultado' => $resultado,
            'radio1' => $key1,
            'radio2' => $key2,
            'radio3' => $key3,
            'radio4' => $key4,
            'precio1' => $radio1,
            'precio2' => $radio2,
            'precio3' => $radio3,
            'precio4' => $radio4,
            'numero1' => $cantidad1,
            'numero2' => $cantidad2,
            'numero3' => $cantidad3,
            'numero4' => $cantidad4,
            'descuento' => $descuento,
            'edadcliente' => $edad
        ]);

        header("Location: T5P3_VENTADECOMIDA.php?$queryString");
        exit;
    }
?>