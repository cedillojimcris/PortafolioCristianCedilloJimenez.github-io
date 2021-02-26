<?php
session_start();
if(!isset($_SESSION['id_usuario'])){
	header("location: login.php");
  }

  require 'funts/conexionBD.php';
  require 'funts/funcionAlumnos.php';
  $errors=array();
  
	  if(!empty($_POST)){
		  $numeroCuenta=$mysqli->real_escape_string($_POST['numeroCuentaA']);
		  $nombre=$mysqli->real_escape_string($_POST['nombreA']);
		  $apellidoPaterno=$mysqli->real_escape_string($_POST['apellidoPa']);
		  $apellidoMaterno=$mysqli->real_escape_string($_POST['apellidoMa']);
		  $telefono=$mysqli->real_escape_string($_POST['telefonoA']);
		  $celular=$mysqli->real_escape_string($_POST['celularA']);
		  $facultad=$mysqli->real_escape_string($_POST['facultadA']);
		  $semetre=$mysqli->real_escape_string($_POST['noSemestreA']);
		  $correoPersonal=$mysqli->real_escape_string($_POST['correoPerA']);
		  $correoEscolar=$mysqli->real_escape_string($_POST['correoEscolar']);
		  $descripcionProblema =$mysqli->real_escape_string($_POST['descripPromA']);
		  $tipoProblema=$mysqli->real_escape_string($_POST['tipoProblema']);
  
		  if(isNull($numeroCuenta,$nombre,$apellidoPaterno,$apellidoMaterno,$telefono,$celular,$facultad,$semetre,$correoPersonal,$descripcionProblema,$tipoProblema)){
			  $errors[]="<p>Debe de llenar todos los campos</p>";
		  }
  
		  if(!isEmail($correoPersonal) ){
			  $errors[]="<p>Direccion de correo invalida!!!</p>";
		  }
  
		  if(alumnoExiste($numeroCuenta)){
			  $errors[]="<p>Tu numero de cuenta $numeroCuenta, ya existe, solo puedes realizar una cita la vez</p>";
		  }
		  if(count($errors) == 0){
  
			  if($coreoEscolar!=null){//SI EL ALUMNO LLENA EL CAMPO DE CORREO ESCOLAR
				  if(!isEmail($coreoEscolar) ){
					  $errors[]="<p>Direccion de correo invalida!!!</p>";
				  }else{//SI EL CORREO ES VALIDO
					  $registroAlumnoA=registraAlumnoA($numeroCuenta,$nombre,$apellidoPaterno,$apellidoMaterno,$coreoEscolar,$correoPersonal,$telefono,$celular,$facultad,$semetre,$tipoProblema,$descripcionProblema);
					  if($registroAlumnoA==true){
						  header("location: horarioAlumno.php");
						  exit;
					  }else{
						  echo 'error al registrar';
					  }
				  }
  
			  }else {
				  $registroAlumnoB=registraAlumnoB($numeroCuenta,$nombre,$apellidoPaterno,$apellidoMaterno,$correoPersonal,$telefono,$celular,$facultad,$semetre,$tipoProblema,$descripcionProblema);
					  if($registroAlumnoB==true){
						  header("location: horarioAlumno.php");
						  exit;
					  }else{
						  echo 'error al registrar';
					  }
				  
			  }//FIN VALIDACION DE CORERO ESCOLAR
  
			  
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

    <title>TUTORIA UAEMEX</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords"
        content="Medical Appointment Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs Sign up Web Templates,
 Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design">
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/gips.js" type="text/javascript"></script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Custom Theme files -->
    <link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
    <link rel="stylesheet" href="./css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <!--fonts-->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9c7010aff9.js" crossorigin="anonymous"></script>
    <!--//fonts-->

    <script language="javascript">
    function limpiarNumero(obj) {
        /* El evento "change" sólo saltará si son diferentes */
        obj.value = obj.value.replace(/\D/g, '');
    } ////

    function limpiarletras(obj) {

        /* El evento "change" sólo saltará si son diferentes */
        obj.value = obj.value.replace(/[((0-9)|(\x21-\x2F)|(\x3A-\x40)|(\x5B-\x60)|(\x7B-\x81)|(\x98-\x9F)|(\xA6-\xB6)|(\xD5-\xDF)|\xE1|\xE2|(\xE4-\xE8)|(\xF4-\xFF)|¡)*]/g,'');

    } ////
    </script>
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/wickedpicker.js"></script>
    <script type="text/javascript">
    $('.timepicker').wickedpicker({
        twentyFour: false
    });
    </script>

</head>

<body>

    <br>

    <div class="bg-agile">
        <div class="book-appointment">
            <h1>SEGIT TUTORIA UAEMEX ALUMNO </h1>

            <h2>Hacer una cita </h2>
            <br>
            <br>

            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

                <div id="resultados_ajax" class="gaps"></div>
                <div class="left-agileits-w3layouts same">

                    <div class="gaps form-group">
                        <p>Número de Cuenta:</p>
                        <input onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)"
                            title="Tu numero de cuenta se componde de 7 digitos" type="tel" name="numeroCuentaA"
                            MAXLENGTH="7" minlength="7" pattern="([0-9]{7})*" placeholder="Se compone de 7 dígitos"
                            required onpaste="return false">
                    </div>
                    <div class="gaps form-group">
                        <p>Nombre(s):</p>
                        <input onkeyup="limpiarletras(this)" onchange="limpiarletras(this)"
                            title="Ingresa un nombre valido" type="text" name="nombreA"
                            pattern="([a-zA-Z]*+[ ]+[a-zA-Z]*)" placeholder="Escribe tu nombre(s)" required
                            onpaste="return false" />
                    </div>
                    <div class="gaps form-group">
                        <p>Apellido Paterno:</p>
                        <input onkeyup="limpiarletras(this)" onchange="limpiarletras(this)" title="Ingresa un apellido valido" type="text"
                            name="apellidoPa" pattern="([a-zA-Z]*+[ ]+[a-zA-Z]*)"
                            placeholder="Escribe un apellido valido" required="" onpaste="return false" />
                    </div>
                    <div class="gaps form-group">
                        <p>Apellido Materno:</p>
                        <input onkeyup="limpiarletras(this)" onchange="limpiarletras(this)" title="Ingresa un apellido valido" type="text"
                            name="apellidoMa" pattern="([a-zA-Z]*+[ ]+[a-zA-Z]*)"
                            placeholder="Escribe un apellido valido" required="" onpaste="return false" />
                    </div>

                    <div class="gaps form-group">
                        <p>Número de teléfono</p>
                        <input onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)"
                            title="El numero telefonico se componde de 10 digitos" type="tel" name="telefonoA"
                            MAXLENGTH="10" minlength="10" pattern="[0-9]{10}" placeholder="Se compone de 10 dígitos"
                            required onpaste="return false" />
                    </div>
                    <div class="gaps form-group">
                        <p>Número de celular</p>
                        <input onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)"
                            title="El numero telefonico se componde de 10 digitos" type="tel" name="celularA"
                            MAXLENGTH="10" minlength="10" pattern="[0-9]{10}" placeholder="Se compone de 10 dígitos"
                            required onpaste="return false" />
                    </div>
                    <div class="gaps form-group">
                        <p>Facultad:</p>
                        <select class="form-control" name="facultadA" placeholder="selecionar" required>
                            <option disabled selected>Elige tu facultad</option>
                            <option value="Ingenieria">Ingenieria</option>
                            <option value="Derecho">Derecho</option>

                        </select>
                    </div>




                </div>
                <div class="right-agileinfo same">

                    <div class="gaps form-group">
                        <p>No. de semestre actualmente cursando:</p>
                        <select class="form-control" name="noSemestreA" placeholder="Seleccionar" required>
                            <option disabled selected>Elige tu semestre</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>

                        </select>
                    </div>
                    <div class="gaps form-group">
                        <p>Correo Personal:</p>
                        <input type="email" name="correoPerA" placeholder="tu@email.com" required
                             />
                    </div>
                    <div class="gaps form-group">
                        <p>Correo Escolar( *campo opcional):</p>
                        <input type="email" name="correoEscolar" placeholder="tu@email.com"  />
                    </div>

                    <div class="gaps form-group">

                        <p>Posible problema:</p>
                        <select class="form-control" name="tipoProblema" required>
                            <option disabled selected> Elige un caso</option>
                            <option value="Depresiòn">Depresiòn</option>
                            <option value="Ansiedad">Ansiedad</option>
                            <option value="Estrès">Estrès</option>
                            <option value="Problemas Emocionales">Problemas Emocionales</option>
                            <option value="Desgano">Desgano</option>
                            <option value="Apatìa">Apatìa</option>
                            <option value="Perdida de un ser querido">Perdida de un ser querido</option>
                            <option value="Duelo">Duelo</option>
                        </select>
                    </div>

                    <div class="gaps form-group">
                        <p>Descripción del Problema:</p>
                        <textarea  name="descripPromA" placeholder="Describe brevemente tu situacion emocional actual"
                            required onpaste="return false"></textarea>
                    </div>

                </div>
                <div class="clear"></div>
                <div class="gaps">
                    <?php
					  if($errors){
		          		echo resultBlock($errors); }?>
                </div>
                <input type="submit" value="Guardar y Continuar">

            </form>

        </div>
    </div>
    <!--copyright-->

</body>

</html>