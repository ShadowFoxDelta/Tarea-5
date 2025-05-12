<?php
// Incluye la clase que contiene la lógica para procesar los datos
require_once (__DIR__ . "/../../Clases/P3/P3_CLASE_PROCESARDATOS.php");

// Definimos un array asociativo que contiene los nombres y precios de las opciones disponibles
$opciones = [
    'radio1' => ['Pollo' => 1.15, 'Res' => 1.50, 'Pescado' => 1.10],        // Carnes
    'radio2' => ['Blanco' => 0.50, 'Guandú' => 0.65, 'Vegetales' => 0.60], // Arroces
    'radio3' => ['Lentejas' => 0.25, 'Porotos' => 0.35, 'Ninguno' => 0.00],// Menestras
    'radio4' => ['Soda' => 0.50, 'Jugo' => 0.75, 'Sundae' => 1.25]         // Postres/Bebidas
];

// Validamos que los datos lleguen por el método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recuperamos el nombre del producto seleccionado usando array_search con el valor enviado
    $key1 = isset($_POST['radio1']) ? array_search(floatval($_POST['radio1']), $opciones['radio1']) : '';
    $key2 = isset($_POST['radio2']) ? array_search(floatval($_POST['radio2']), $opciones['radio2']) : '';
    $key3 = isset($_POST['radio3']) ? array_search(floatval($_POST['radio3']), $opciones['radio3']) : '';
    $key4 = isset($_POST['radio4']) ? array_search(floatval($_POST['radio4']), $opciones['radio4']) : '';

    // Convertimos a número flotante los valores de los productos seleccionados, o 0 si no hay selección
    $radio1 = isset($_POST['radio1']) ? floatval($_POST['radio1']) : 0;
    $radio2 = isset($_POST['radio2']) ? floatval($_POST['radio2']) : 0;
    $radio3 = isset($_POST['radio3']) ? floatval($_POST['radio3']) : 0;
    $radio4 = isset($_POST['radio4']) ? floatval($_POST['radio4']) : 0;

    // Validamos y convertimos las cantidades, asegurando que no estén vacías
    $cantidad1 = isset($_POST['numero1']) && $_POST['numero1'] !== '' ? floatval($_POST['numero1']) : 0;
    $cantidad2 = isset($_POST['numero2']) && $_POST['numero2'] !== '' ? floatval($_POST['numero2']) : 0;
    $cantidad3 = isset($_POST['numero3']) && $_POST['numero3'] !== '' ? floatval($_POST['numero3']) : 0;
    $cantidad4 = isset($_POST['numero4']) && $_POST['numero4'] !== '' ? floatval($_POST['numero4']) : 0;

    // Edad del cliente enviada por el formulario
    $edad = $_POST['edadcliente'];

    // Creamos una instancia de la clase ProcesarDatos con los datos del pedido
    $procesar = new ProcesarDatos($radio1, $radio2, $radio3, $radio4, $cantidad1, $cantidad2, $cantidad3, $cantidad4, $edad);

    // Si hay un error en los datos ingresados, se devuelve en la respuesta
    if ($procesar->HayError()) {
        $errorMsg = urlencode($procesar->GetError()); // Codificamos el mensaje de error

        // Respondemos en formato JSON con el error
        echo json_encode([
            'error' => true,
            'message' => urldecode($errorMsg) // Decodificamos para que el cliente lo vea legible
        ]);
        exit; // Terminamos la ejecución
    }

    // Calculamos el total a pagar usando el método de la clase
    $resultado = $procesar->calcularValores();

    // Calculamos el descuento aplicable según la edad
    $descuento = $procesar->calcularDescuento();

    // Si menestra es 0 cantidad3 es 0
    if ($procesar->MenestraExiste()) {
        $cantidad3 = 0;
    }


    // Enviamos todos los datos de vuelta en formato JSON para mostrarlos en el modal
    echo json_encode([
        'error' => false, // No hubo errores
        'resultado' => number_format($resultado, 2), // Formato decimal con dos cifras
        'descuento' => $descuento, // Descuento aplicado
        'datos' => [
            // Nombres de los productos seleccionados
            'radio1' => $key1,
            'radio2' => $key2,
            'radio3' => $key3,
            'radio4' => $key4,

            // Precios seleccionados por producto
            'precio1' => $radio1,
            'precio2' => $radio2,
            'precio3' => $radio3,
            'precio4' => $radio4,

            // Cantidades seleccionadas
            'cantidad1' => $cantidad1,
            'cantidad2' => $cantidad2,
            'cantidad3' => $cantidad3,
            'cantidad4' => $cantidad4,

            // Edad del cliente
            'edadcliente' => $edad
        ]
    ]);
    exit; // Terminamos el script correctamente
}
?>
