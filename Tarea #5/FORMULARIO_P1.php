<?php 

// INICIO DE SESIÓN PERMITE MANTENER LOS DATOS DE LA PAGINA AUQUE SE CARGUE DENUEVO
session_start();

//INICIA LA CALSE FOMRULARIO
class Formulario {
    // CONSTRUCTOR DE LA CLASE FORMULARIO
    public function __construct() {

        // SE INICIALIZAN LAS VARIABLES DEL FOMRULARIO
@$_SESSION['CI1'] = $_POST['I1'];
@$_SESSION['CI2'] = $_POST['I2'];
@$_SESSION['CI3'] = $_POST['I3'];
@$_SESSION['CI4'] = $_POST['I4'];

@$_SESSION['CS1'] = $_POST['S1'];
@$_SESSION['CS2'] = $_POST['S2'];
@$_SESSION['CS3'] = $_POST['S3'];
@$_SESSION['CS4'] = $_POST['S4'];

@$_SESSION['CR1'] = $_POST['R1'];
@$_SESSION['CR2'] = $_POST['R2'];
@$_SESSION['CR3'] = $_POST['R3'];
@$_SESSION['CR4'] = $_POST['R4'];
    }

    public function llenarFormulario() {
        ?>
        <form action="" method ="POST" role = "form"><!-- SE INICIA EL FORMULARIO -->
            <center><legend><h3 id="titulo">REGISTRO DE ESTUDIANTES</h3></legend></center><br>
            <div class="form-group"><!-- INICIA EL FORM GROUP -->
                <div class="row">
                    <div class="col-md-4">
                      <div class="card text-center"><!--INICIA EL CARD DE INGENIERÍA-->
                          <div class="card-body">
                             <center>
                        <label><h5>Carrera de Ingeniería</h5></label><br>
                        <label>I</label>
                        <input type = "number" class="form-control" name ="I1" value="<?php echo $_SESSION['CI1']; ?>" required>
                        <label>II</label>
                        <input type = "number" class="form-control" name ="I2" value="<?php echo $_SESSION['CI2']; ?>" required>
                        <label>III</label>
                        <input type = "number" class="form-control" name ="I3" value="<?php echo $_SESSION['CI3']; ?>" required>
                        <label>IV</label>
                        <input type = "number" class="form-control" name ="I4" value="<?php echo $_SESSION['CI4']; ?>" required>
                        <br> <br>
                        </center>
                          </div>
                      </div><!--TERMINA EL CARD DE INGENIERÍA-->
                    </div>

                    <div class="col-md-4" >
                        <div class="card text-center"><!--INICIA EL CARD DE DESARROLLO SOFT-->
                          <div class="card-body">
                        <center>
                        <label><h5>Carrera de Desarrollo de Software</h5></label><br>
                        <label>I</label>
                        <input type = "number" class="form-control" name ="S1" value="<?php echo $_SESSION['CS1']; ?>" required>
                        <label>II</label>
                        <input type = "number" class="form-control" name ="S2" value="<?php echo $_SESSION['CS2']; ?>" required>
                        <label>III</label>
                        <input type = "number" class="form-control" name ="S3" value="<?php echo $_SESSION['CS3']; ?>" required>
                        <label>IV</label>
                        <input type = "number" class="form-control" name ="S4" value="<?php echo $_SESSION['CS4']; ?>" required> <br> <br>
                        </center>
                         </div>
                      </div><!--TERMINA EL CARD DE DESARROLLO-->
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center"><!--INICIA EL CARD DE REDES-->
                          <div class="card-body">
                        <center>
                        <label><h5>Carrera de Redes</h5></label><br>
                        <label>I</label>
                        <input type = "number" class="form-control" name ="R1" value="<?php echo $_SESSION['CR1']; ?>" required>
                        <label>II</label>
                        <input type = "number" class="form-control" name ="R2" value="<?php echo $_SESSION['CR2']; ?>" required>
                        <label>III</label>
                        <input type = "number" class="form-control" name ="R3" value="<?php echo $_SESSION['CR3']; ?>" required>
                        <label>IV</label>
                        <input type = "number" class="form-control" name ="R4" value="<?php echo $_SESSION['CR4']; ?>" required > <br> <br>
                        </center>
                    </div>
                   </div><!--TERMINA EL CARD DE REDES-->
                </div>
                </div>
            </div><!-- TERMINA EL FORM GROUP -->
            <center>
            <select class="form-control" id="inputOpcion" name="opcion"><!--SELECT-->
                <option value="1">Imprimir Todo</option>
                <option value="2">Cantidad por Carrera</option>
                <option value="3">Cantidad por año</option>
            </select>
            <br>
            <button type="" name="save" class="btn btn-success">GUARDAR</button><!--BOTON PARA GUARDAR DATOS-->
             <button type="button" id="resetButton" class="btn btn-primary"><a href="T5_P1.php">LIMPIAR</a></button><!--BOTON PARA LIMPIAR CASILLAS-->
            <br><br>
            </center>
        </form><!-- TERMINA EL FORM -->

        <?php
         try {
            if (isset($_POST['save'])) {//VALIDACIÓN DEL ENVIO DE FORMULARIO
                //ASIGNACIÓN DE LOS INPUT
                $I1 = $_POST['I1'];
                $I2 = $_POST['I2'];
                $I3 = $_POST['I3'];
                $I4 = $_POST['I4'];
                $S1 = $_POST['S1'];
                $S2 = $_POST['S2'];
                $S3 = $_POST['S3'];
                $S4 = $_POST['S4'];
                $R1 = $_POST['R1'];
                $R2 = $_POST['R2'];
                $R3 = $_POST['R3'];
                $R4 = $_POST['R4'];
                $opcion = $_POST['opcion'];

                if($I1 > 0 && $I2 > 0 && $I3 > 0 && $I4 > 0 && $S1 > 0 && $S2 > 0 && $S3 > 0 && $S4 > 0 && $R1 > 0 && $R2 > 0 && $R3 > 0 && $R4 > 0){//VALIDACIÓN PARA CERO O MENOS
               

                $matriz = cargarMatriz($I1, $I2, $I3, $I4, $S1, $S2, $S3, $S4, $R1, $R2, $R3, $R4);//SE CARGA LA MATRIZ PRINCIPAL LLAMANDO SU RESPECTIVA FUNCIÓN

                // SELECCIÓN DE OPCIONES
                if ($opcion == 1) {
                    // SE MUESTRAN TODOS LOS DATOS EN FORMATO TABULAR
                    echo '<table class="table table-bordered table-hover">
                        <thead><tr><th>Matriz de Estudiantes por Carrera y Nivel</th><th colspan="4">Carrera/Curso</th> </tr></thead>
                        <tbody>
                            <tr><th></th><th>I</th><th>II</th><th>III</th><th>IV</th></tr>';
                    $carreras = ['Ing. Sistemas', 'Desarrollo Software', 'Redes'];
                    for ($i = 0; $i < 3; $i++) {
                        echo '<tr><td>' . $carreras[$i] . '</td>';
                        for ($j = 0; $j < 4; $j++) {
                            echo '<td>' . $matriz[$i][$j] . '</td>';
                        }
                        echo '</tr>';
                    }
                    echo '</tbody></table>';
                }

                if ($opcion == 2) {
                    // SE MUESTRAN LOS DATOS DE ALUMNOS POR CARRERA
                    $carrera = AlumnosPorCarrera($matriz);
                    echo '<table class="table table-bordered table-hover">
                        <thead><tr><th colspan="3">Cantidad de Alumnos por Carrera</th></tr></thead>
                        <tbody>
                            <tr><td>Ing. Sistemas</td><td>Desarrollo Software</td><td>Redes</td></tr>
                            <tr><td>' . $carrera[0] . '</td><td>' . $carrera[1] . '</td><td>' . $carrera[2] . '</td></tr>
                        </tbody>
                    </table>';
                }

                if ($opcion == 3) {
                    //SE MUESTRAN LOS DATOS DE ALUMNOS POR AÑO
                    $año = AlumnosPorAño($matriz);
                    echo '<table class="table table-bordered table-hover">
                        <thead><tr><th colspan="4">Cantidad de Alumnos por Año</th></tr></thead>
                        <tbody>
                            <tr><td>I</td><td>II</td><td>III</td><td>IV</td></tr>
                            <tr><td>' . $año[0] . '</td><td>' . $año[1] . '</td><td>' . $año[2] . '</td><td>' . $año[3] . '</td></tr> </tbody> </table>'; } 

                        }else{
    echo '<div class="alert alert-warning" role="alert">
    <H3>¡SOLO CANTIDADES MAYORES A 0!</H3> </div>';}}
                             } catch (Exception $e) { echo "Ha ocurrido un error: " . $e->getMessage(); } 
                                }//TERMINA LA CLASE FORMULARIO
                              } 
                            ?> 


            <?php
            //FUNCIÓN PARA CARGAR LOS DATOS DEL FORMULARIO
            function cargarMatriz() {
                $I = [$_POST['I1'], $_POST['I2'], $_POST['I3'], $_POST['I4']];
                $S = [$_POST['S1'], $_POST['S2'], $_POST['S3'], $_POST['S4']];
                $R = [$_POST['R1'], $_POST['R2'], $_POST['R3'], $_POST['R4']];
                
                return [$I, $S, $R];
            }

            //FUNCIÓN PARA CALCULAR LA CANTIDAD DE ALUMNOS POR CARRERA
            function AlumnosPorCarrera($matriz) {
                $carrera = [];
                for ($i = 0; $i < 3; $i++) {
                    $carrera[$i] = array_sum($matriz[$i]);
                }
                return $carrera;
            }

            //FUNCIÓN PARA CALCULAR LA CANTIDAD DE ALUMNOS POR AÑO
            function AlumnosPorAño($matriz) {
                $año = [0, 0, 0, 0];
                for ($j = 0; $j < 4; $j++) {
                    for ($i = 0; $i < 3; $i++) {
                        $año[$j] += $matriz[$i][$j];
                    }
                }
                return $año;
            }
            ?>
