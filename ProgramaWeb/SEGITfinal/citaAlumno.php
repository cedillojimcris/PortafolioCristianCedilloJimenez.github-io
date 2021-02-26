<?php
    session_start();
    if(!isset($_SESSION['id_usuario'])){
      header("location: login.php");
    }
    require 'funts/conexionBD.php';
    require 'funts/funcionCita.php';
    $idAlumno = $_GET['id_alumno'];
    $i=0;
    $j=0;
    $errors=array();
    $idUsuario=$_SESSION['id_usuario'];
    $id_tipoU=$_SESSION['tipo_usuario'];
    /*consultamos el id del coordinador de terapeuta que actualmente tiene la sesion para despues consultar los horarios de sus terapeutas */
    $consulta="SELECT id_coorTerapeuta FROM coordinador_terapeuta WHERE id_usuarioFK=$idUsuario";
     $resultado1=$mysqli->query($consulta);
     $fila1= $resultado1->fetch_assoc();
    $idCordiT=$fila1['id_coorTerapeuta'];

    /*Consultamos la tabla de horarios de los alumnos*/ 
    $consultaHorarioA = "SELECT * FROM horarioA WHERE id_alumnoFK=$idAlumno";
    $resultadoHorarioA = $mysqli->query($consultaHorarioA);
    /*consultamos la tabla de horarios de los terapeutas */
    $consultaHorarioT = "SELECT id_horarioT,diaSemanaT,horaT,nombreT,apellido_maternoT,apellido_paternoT FROM horarioT INNER JOIN terapeuta WHERE id_terapeutaFK=id_terapeuta AND estado_horario=0 AND id_coorTerapeutaFK=$idCordiT";
    $resultadoHorarioT = $mysqli->query($consultaHorarioT);
    /*consultamos los datos del alumno */
    $consultaAlumno = "SELECT nombreA,apellido_maternoA,apellido_paternoA FROM alumno WHERE id_alumno=$idAlumno";
    $resultadoA = $mysqli->query($consultaAlumno);
    $filaAlumno = $resultadoA->fetch_array(MYSQLI_ASSOC);
    /* consultamos los datos de los terapeutas */
    $consultaTerapeuta = "SELECT id_terapeuta,nombreT,apellido_maternoT,apellido_paternoT FROM terapeuta WHERE id_coorTerapeutaFK=$idCordiT";
    $resultadoT = $mysqli->query($consultaTerapeuta);
     
    /*Consultamos los correos de alumnos y de terapeuta*/
    /*Correo de alumno*/
    $correoA = "SELECT * FROM alumno WHERE id_alumno=$idAlumno";
    $resultadoCorrA = $mysqli->query($correoA);
    $row = $resultadoCorrA->fetch_array(MYSQLI_ASSOC);   
    $consultaNomAlumno = "SELECT nombreA FROM alumno WHERE id_alumno=$idAlumno";
    $resultadoNomA = $mysqli->query($consultaAlumno);    
	 
    
    if(!empty($_POST)){
        $estadoCita=$mysqli->real_escape_string($_POST['EstadoCita']);
        $estadoAlumno=$mysqli->real_escape_string($_POST['EstadoPaciente']);
        $diaCita=$mysqli->real_escape_string($_POST['diaCita']);
        $horaCita=$mysqli->real_escape_string($_POST['horarioCita']);
        $direccionCita=$mysqli->real_escape_string($_POST['direccionCita']);
        $id_terapeuta=$mysqli->real_escape_string($_POST['TerapeutaCita']);
        

    	/*Correo de terapeuta*/
    	$correoT ="SELECT * FROM terapeuta WHERE id_terapeuta=$id_terapeuta";
    	$resultadoCorrT = $mysqli->query($correoT); 
    	$rowT =$resultadoCorrT->fetch_array(MYSQLI_ASSOC);	    

        if(DatosNulos($estadoCita,$estadoAlumno,$diaCita,$horaCita,$direccionCita)){
            $errors[]="<p>Debe de llenar todos los campos</p>";
        }

        if(isset($_POST['hora'])){
            $id_horarioT=$mysqli->real_escape_string($_POST['hora']);

        }else{
            $errors[]="<p>Debe de marcar un horario para agendar la cita</p>";
        }

        if(count($errors) == 0){
            $resultadoCita=agendarCita($estadoCita,$estadoAlumno,$diaCita,$horaCita,$direccionCita,$idAlumno,$id_terapeuta);
            if($resultadoCita==true){
                $resultadoActualizar=actualizarAlumno($idAlumno);
                if($resultadoActualizar==true){
                    if($id_horarioT!=null){
                        $resultadoActuTera=actualizarHorarioTerapeuta($id_horarioT);
                        if($resultadoActuTera==true){

				//Enviar correo a alumno
				require_once 'PHPMailer/PHPMailerAutoload.php';

				$mail = new PHPMailer();
				$mail->isSMTP();
				$mail->SMTPDebug=0;//SMTP::DEBUG_SERVER;
				$mail->SMTPAuth = true;
				$mail->SMTPSecure = 'tls'; 
				$mail->Host = 'smtp.gmail.com'; //uaemex.com.mx
				$mail->Port = 587; 


				$mail->Username = 'coorterasegit@gmail.com'; 
				$mail->Password = ' UteAraEpeuMtaEX$20'; 

				$mail->setFrom('uaemexsegit@gmail.com', 'SEGIT');
				$mail->addAddress($row['correo_personalA'], $row['nombreA']);
				$mail->Subject = "SEGIT Cita para terapia ha sido agendada";
				$mail->Body    = "Estimada(0) ".$row['nombreA']." ".$row['apellido_paternoA']." ".$row['apellido_maternoA']." <br><br>
					Le informamos que su cita ha sido agendada, deberá acudir a la siguiente dirección: <br>
					".$_POST['direccionCita']." <br>
					En el horario ".$_POST['horarioCita']." <br>
					Apartir del ".$_POST['diaCita']."<br>
					Será atendida(o) por el/la terapeuta ".$rowT['nombreT']." ".$rowT['apellido_paternoT']." ".$rowT['apellido_maternoT']." <br>
					Atentamente corrdinación de terapeutas";
		
				$mail->IsHTML(true);

				if($mail->send()){

					//Enviar correo a terapeuta 
					require_once 'PHPMailer/PHPMailerAutoload.php';

					$mail = new PHPMailer();
					$mail->isSMTP();
					$mail->SMTPDebug=0;//SMTP::DEBUG_SERVER;
					$mail->SMTPAuth = true;
					$mail->SMTPSecure = 'tls'; 
					$mail->Host = 'smtp.gmail.com'; //uaemex.com.mx
					$mail->Port = 587; 


					$mail->Username = 'coorterasegit@gmail.com'; 
					$mail->Password = ' UteAraEpeuMtaEX$20'; 

					$mail->setFrom('uaemexsegit@gmail.com', 'SEGIT');
					$mail->addAddress($rowT['correo_personalT'], $rowT['nombreT']);
					$mail->Subject = "SEGIT Cita para terapia ha sido agendada";
					$mail->Body    = "Estimada(o) ".$rowT['nombreT']." ".$rowT['apellido_paternoT']." ".$rowT['apellido_maternoT']." <br><br>
						Le informamos que se ha generado una cita en su agenda, deberá acudir a la siguiente dirección: <br>
						".$_POST['direccionCita']." <br>
						En el horario ".$_POST['horarioCita']." <br>
						Apartir del ".$_POST['diaCita']."<br>
						Estará atendiendo al paciente: ".$row['nombreA']." ".$row['apellido_paternoA']." ".$row['apellido_maternoA']."<br>
						Atentamente corrdinación de terapeutas";
		
					$mail->IsHTML(true);

					if($mail->send()){
					header("location: ListaPacTerap.php");
    					exit;
					return true;
					
					}else{
					return false;
					echo "Error al enviar el mensaje: " . $mail­->ErrorInfo;

				}

					
				header("location: ListaPacTerap.php");
    				exit;
				return true;

    

				}else{
					return false;
					echo "Error al enviar el mensaje: " . $mail­->ErrorInfo;

				}

				


			     header("location: ListaPacTerap.php");
    				exit;
    


                        }else{
                            echo "<p>Error al actualizar el horario del terapeuta</p>";  
                        }
                    }
                    
                }else{
                    $errors[]="<p>Error al actualizar el alumno</p>"; 
                }
            	
			}else{
				$errors[]="<p>Error al registrar</p>";
			}
        }
        
    }

?>

<!DOCTYPE HTML>
<html>

<head>


    <link rel="apple-touch-icon" sizes="57x57" href="images/iconos/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="images/iconos/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/iconos/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="images/iconos/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/iconos/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/iconos/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="images/iconos/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/iconos/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/iconos/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="images/iconos/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/iconos/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/iconos/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/iconos/favicon-16x16.png">
    <link rel="manifest" href="images/iconos/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="images/iconos/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <title>AGENDAR CITA</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->


    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>


    <link href="css/style.css" rel='stylesheet' type='text/css' />



    
</head>  

</head>

<script language="javascript">
function soloLetras62031(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = [8, 37, 39, 46];
    tecla_especial = false

    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        //alert('Solo acepta letras');
        return false;


    }
} //fin de la funcion

function limpia62031() {
    var val = document.getElementById("miInput62031").value;
    var tam = val.length;
    for (i = 0; i < tam; i++) {
        if (!isNaN(val[i]))
            document.getElementById("miInput62031").value = '';
    }
}

function soloNumeros(evt) {
    evt = (evt) ? evt : window.event
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        status = "SOLO NUMEROS."
        //alert('Solo acepta numeros');
        return false

    }
    status = ""
    return true
} //fin funcion

function soloLetras(evt) {
    evt = (evt) ? evt : window.event
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && (charCode < 160 ||
            charCode > 165))) {
        status = "SOLO NUMEROS."
        //alert('Solo acepta letras');
        return false
    }
    status = ""
    return true
} //fin funcion
</script>


<body>
    <section class="tituloCita">
        <br>
        <p align="center">SEGIT TUTORIA UAEMEX</p>
    </section>


    <div >
    
        <div class="">
        
            <div class="book-appointment">

                <p align="center" style="color:white" ;> Lista de horarios del alumno: </p>



                <br>

                <div class="row table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No. Horario</th>
                                <th>Dia</th>
                                <th>Hora</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php while($row1 = $resultadoHorarioA->fetch_array(MYSQLI_ASSOC)) {  $i=$i+1;?>
                            
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row1['diaSemanaA']; ?></td>
                                <td><?php echo $row1['horaA']; ?></td>

                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="">
            <div class="book-appointment">

                <p align="center" style="color:white;">Lista de horarios de los terapeuta: </p>

                <br>

                <div class="row table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                
                                <th>No. Horario</th>
                                <th>Dia</th>
                                <th>Hora</th>
                                <th>Nombre del Terapeuta</th>
                                <th>Marcar Dia</th>
                  

                            </tr>
                        </thead>

                        <tbody>
                            <?php while($row2 = $resultadoHorarioT->fetch_array(MYSQLI_ASSOC)) { $j=$j+1;?>
                            <tr>
                            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                <td><?php echo $j; ?></td>
                            
                                <td><?php echo $row2['diaSemanaT']; ?></td>
                                <td><?php echo $row2['horaT']; ?></td>
                                <td><?php echo $row2['nombreT'].' '.$row2['apellido_paternoT'].' '.$row2['apellido_maternoT']; ?></td>
                                <td><input type="checkbox" name="hora" value="<?php echo $row2['id_horarioT']; ?>" > </td>
            
                                
                           
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <section class="bloqueCita">
        <!--background-->
        <br>

        <div class="bg-agile">
            <div class="book-appointment">

                <h2>Agendar cita </h2>
                <br>
                <br>

               

                    <div id="resultados_ajax" class="gaps"></div>
                    <div class="left-agileits-w3layouts same">

                        <div class="gaps">
                            <p>Nombre(s) del Paciente:</p>
                            <input onkeypress="return soloLetras62031(event)" title="Ingresa un nombre valido"
                                type="text" name="nombreA" required disabled
                                value="<?php echo $filaAlumno['nombreA'].' '.$filaAlumno['apellido_paternoA'].' '.$filaAlumno['apellido_maternoA']; ?>" />
                        </div>
                        <div class="gaps">
                            <p>Terapeuta:</p>
                            <select class="form-control" name="TerapeutaCita" placeholder="selecionar" required>
                                <option disabled selected>seleciona el terapeuta</option>
                                <?php while($filaTerapeuta = $resultadoT->fetch_array(MYSQLI_ASSOC)) { ?>
                                <option value="<?php echo $filaTerapeuta['id_terapeuta']; ?>">
                                    <?php echo $filaTerapeuta['nombreT'].' '.$filaTerapeuta['apellido_paternoT'].' '.$filaTerapeuta['apellido_maternoT']; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="gaps">
                            <p>Estado de la cita:</p>
                            <select class="form-control" name="EstadoCita" placeholder="selecionar" required>
                                <option disabled selected>seleciona el estado</option>
                                <option value="En Atencion">En Atencion</option>
                                <option value="En Espaera">En Espaera</option>

                            </select>
                        </div>

                        <div class="gaps">
                            <p>Estado del Paciente:</p>
                            <select class="form-control" name="EstadoPaciente" placeholder="selecionar" required>
                                <option disabled selected>seleciona el estado</option>
                                <option value="bajo">Riesgo Bajo</option>
                                <option value="medio">Riesgo Medio</option>
                                <option value="alto">Riesgo Alto</option>
                            </select>
                        </div>


                    </div>
                    <div class="right-agileinfo same">

                        <div class="gaps">
                            <p>Dia de la semana:</p>
                            <select class="form-control" name="diaCita" placeholder="Seleccionar" required>
                                <option disabled selected>Seleciona el dia</option>
                                <option value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miercoles">Miercoles</option>
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>

                            </select>
                        </div>
                        <div class="gaps">
                            <p>Horario:</p>
                            <select class="form-control" name="horarioCita" placeholder="Seleccionar" required>
                                <option disabled selected>Seleciona el horario</option>
                                <option value="8 : 00 - 9 : 00">8 : 00 - 9 : 00</option>
                                <option value="9 : 00 - 10 : 00">9 : 00 - 10 : 00</option>
                                <option value="10 : 00 - 11 : 00">10 : 00 - 11 : 00</option>
                                <option value="11 : 00 - 12 : 00">11 : 00 - 12 : 00</option>
                                <option value="12 : 00 - 13 : 00">12 : 00 - 13 : 00</option>
                                <option value="13 : 00 - 14 : 00">13 : 00 - 14 : 00</option>
                                <option value="14 : 00 - 15 : 00">14 : 00 - 15 : 00</option>
                                <option value="15 : 00 - 16 : 00">15 : 00 - 16 : 00</option>
                                <option value="16 : 00 - 17 : 00">16 : 00 - 17 : 00</option>
                                <option value="17 : 00 - 18 : 00">17 : 00 - 18 : 00</option>
                            </select>
                        </div>

                        <div class="gaps">
                            <p>Direcciòn de la cita:</p>
                            <textarea name="direccionCita" placeholder="Describe brevemente " required
                                onpaste="return false"></textarea>
                        </div>

                    </div>
                    <div class="clear"></div>
                    <div class="gaps">
                        <?php
					  if($errors){
		          		echo resultBlock($errors); }?>
                    </div>
                    <input type="submit" value="Confirmar Cita">
                    <input type="submit" onclick="location.href='ListaPacTerap.php'" value="Cancelar Cita"
                        style="   margin-left: 10px  ">
                </form>

            </div>
        </div>
    </section>
    <br>
</body>

</html>