<?php
session_start();

class Formulario {
    public function llenarFormulario() {
        ?>
        <form id="formularioP1" action="guardarDatos.php" method="POST">
            <center><legend><h3 id="titulo">REGISTRO DE ESTUDIANTES</h3></legend></center><br>
            <div class="form-group">
                <div class="row">
                    <?php 
                    $this->generarCard("Ingeniería", "I");
                    $this->generarCard("Desarrollo Software", "S");
                    $this->generarCard("Redes", "R");
                    ?>
                </div>
            </div>
            <center>
                <select class="form-control" id="inputOpcion" name="opcion">
                    <option value="1">Imprimir Todo</option>
                    <option value="2">Cantidad por Carrera</option>
                    <option value="3">Cantidad por Año</option>
                </select>
                <br>
                <button type="submit" name="save" class="btn btn-success">GUARDAR</button>
                <button type="button" id="resetButton" class="btn btn-primary" onclick="limpiarFormulario()">LIMPIAR</button>
            </center>
        </form>
        <br>
        <div id="tablaResultados"></div> <!-- Contenedor para mostrar los resultados -->
        <?php
    }

    private function generarCard($titulo, $prefijo) {
        $romanos = ['I', 'II', 'III', 'IV']; // Números romanos para los niveles
        echo '<div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <label><h5>Carrera de ' . $titulo . '</h5></label><br>';
        for ($i = 0; $i < 4; $i++) {
            echo '<label>' . $romanos[$i] . '</label>
                  <input type="number" class="form-control" name="' . $prefijo . ($i + 1) . '" value="' . ($_SESSION['C' . $prefijo . ($i + 1)] ?? '') . '" required>';
        }
        echo '</div>
              </div>
            </div>';
    }
}
?>
