<?php
session_start(); // Inicia la sesión para conservar datos entre peticiones

// Definición de la clase Formulario
class Formulario {

    // Método principal para imprimir el formulario HTML
    public function llenarFormulario() {
        ?>
        <!-- Formulario que envía los datos a 'guardarDatos.php' usando el método POST -->
        <form id="formularioP1" action="guardarDatos.php" method="POST">
            
            <!-- Título del formulario -->
            <center>
                <legend><h3 id="titulo">REGISTRO DE ESTUDIANTES</h3></legend>
            </center><br>

            <!-- Contenedor general del formulario -->
            <div class="form-group">
                <div class="row">
                    <?php 
                    // Se generan 3 tarjetas (cards), una por cada carrera
                    $this->generarCard("Ingeniería", "I");            // Card para Ingeniería (prefijo I)
                    $this->generarCard("Desarrollo Software", "S");   // Card para Desarrollo (prefijo S)
                    $this->generarCard("Redes", "R");                 // Card para Redes (prefijo R)
                    ?>
                </div>
            </div>

            <!-- Controles de selección y botones -->
            <center>
                <!-- Menú desplegable para seleccionar qué operación realizar -->
                <select class="form-control" id="inputOpcion" name="opcion">
                    <option value="1">Imprimir Todo</option>
                    <option value="2">Cantidad por Carrera</option>
                    <option value="3">Cantidad por Año</option>
                </select>
                <br>
                <!-- Botón para enviar el formulario -->
                <button type="submit" name="save" class="btn btn-success">GUARDAR</button>
                <!-- Botón para limpiar los campos del formulario -->
                <button type="button" id="resetButton" class="btn btn-primary" onclick="limpiarFormulario()">LIMPIAR</button>
            </center>
        </form>
        <br>

        <!-- Contenedor donde se mostrarán los resultados de la tabla -->
        <div id="tablaResultados"></div>
        <?php
    }

    // Método privado para generar una tarjeta (card) por carrera
    private function generarCard($titulo, $prefijo) {
        $romanos = ['I', 'II', 'III', 'IV']; // Niveles académicos en números romanos

        // Comienza el diseño de la tarjeta usando Bootstrap
        echo '<div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <label><h5>Carrera de ' . $titulo . '</h5></label><br>';

        // Genera 4 campos de entrada (uno por nivel académico)
        for ($i = 0; $i < 4; $i++) {
            echo '<label>' . $romanos[$i] . '</label>
                  <input type="number" class="form-control" 
                         name="' . $prefijo . ($i + 1) . '" 
                         value="' . ($_SESSION['C' . $prefijo . ($i + 1)] ?? '') . '" 
                         required>';
        }

        // Cierra la tarjeta
        echo '</div>
              </div>
            </div>';
    }
}
?>
