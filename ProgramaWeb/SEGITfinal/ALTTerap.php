<?php
  session_start();
  if(!isset($_SESSION['id_usuario'])){
    header("location: login.php");
  }
  require 'funts/funcionTerapeuta.php';
  require 'funts/conexionBD.php';
  $id_usuario=$_SESSION['id_usuario'];
  $errors=array();
  

  $sql1 = "SELECT id_coorTerapeuta FROM coordinador_terapeuta WHERE id_usuarioFK=$id_usuario";

  $resultado1 = $mysqli->query($sql1);
  while($row1 = $resultado1->fetch_array(MYSQLI_ASSOC)) {
	$id_coord=$row1['id_coorTerapeuta'];
  }


	
	
    if(!empty($_POST)){

      $nombre=$mysqli->real_escape_string($_POST['nombreT']);
      $apellidoPaterno=$mysqli->real_escape_string($_POST['apellidoPaT']);
      $apellidoMaterno=$mysqli->real_escape_string($_POST['apellidoMaT']);
      $telefono=$mysqli->real_escape_string($_POST['telefonoT']);
      $celular=$mysqli->real_escape_string($_POST['celularT']);
      $correoPersonal=$mysqli->real_escape_string($_POST['correoPerT']);
      //$coreoEscolar=$mysqli->real_escape_string($_POST['correoEscolarT']);
      

      if(isNull($nombre,$apellidoPaterno,$apellidoMaterno,$telefono,$celular,$correoPersonal)){
          $errors[]="<p>Debe de llenar todos los campos</p>";
      }

      //if(isEmail($correoPersonal) || isEmail($coreoEscolar)){
  			//$errors[]="<p>Direccion de correo invalida!!!</p>";
  		//}
      if(TerapeutaExisteN($nombre) && TerapeutaExisteAP($apellidoPaterno) && TerapeutaExisteAM($apellidoMaterno)){
          $errors[]="<p>Estimado $nombre $apellidoPaterno $apellidoMaterno, ya exite un registro con ese nombre</p>";
      }

      if(count($errors) == 0){
		  if($_SESSION['tipo_usuario']==1){ //SI ES ADMINISTRADOR
			$coordinadorTerapeuta=$mysqli->real_escape_string($_POST['coordinadorT']);
			$registraTerapeutaA=registraTerapeutaA($nombre,$apellidoMaterno,$apellidoPaterno, $correoPersonal, $coreoEscolar, $telefono, $celular,$coordinadorTerapeuta);
			if($registraTerapeutaA==true){
				echo '<p>registro guardado</p>';
				header("location: horarioTera.php");
			}else{
				$errors[]="<p>Error al registrar</p>";
			}
		  }else{ //SI ES COORDINADOR DE TERAPEUTA
			$registraTerapeutaC=registraTerapeutaC($nombre,$apellidoMaterno,$apellidoPaterno, $correoPersonal, $coreoEscolar, $telefono, $celular,$id_coord);
			if($registraTerapeutaC==true){
				echo '<p>registro guardado</p>';
				header("location: horarioTera.php");
			}else{
				$errors[]="<p>Error al registrar</p>";
			}
		  }
  			

  			
  	    }


    }
    //consultamos el nombre y id de los coordinadores de terapeutas
    $sql = "SELECT id_coorTerapeuta, nombre,apellido_materno,apellido_paterno FROM coordinador_terapeuta";
	  $resultado = $mysqli->query($sql);


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

    <title>ALTA DE TERAPEUTA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Custom Theme files -->
    <link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
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
</head>

<body>
    
    <!--background-->
    <br>

    <div class="bg-agile">
        <div class="book-appointment">
            <h1> ALTA TERAPEUTA</h1>

            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

                <div id="resultados_ajax" class="gaps"></div>
                <div class="left-agileits-w3layouts same">
                    <div class="gaps form-group">
                        <p>Nombre(s):</p>
                        <input onkeyup="limpiarletras(this)" onchange="limpiarletras(this)" required type="text" name="nombreT"
                            pattern="([a-zA-Z]*+[ ]+[a-zA-Z])" placeholder="Escribe tu nombre completò" onpaste="return false" />
                    </div>
                    <div class="gaps form-group">
                        <p>Apellido Paterno:</p>
                        <input onkeyup="limpiarletras(this)" onchange="limpiarletras(this)" type="text" name="apellidoPaT"
                            placeholder="Escribe un apellido valido" pattern="([a-zA-Z]*+[ ]+[a-zA-Z])" required onpaste="return false" />
                    </div>
                    <div class="gaps form-group">
                        <p>Apellido Materno:</p>
                        <input onkeyup="limpiarletras(this)" onchange="limpiarletras(this)" type="text" name="apellidoMaT"
                            placeholder="Escribe un apellido valido" pattern="([a-zA-Z]*+[ ]+[a-zA-Z])" required onpaste="return false"/>
                    </div>

                </div>
                <div class="right-agileinfo same">
                    <div class="gaps form-group">
                        <p>Número de teléfono</p>
                        <input onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)" type="tel" name="telefonoT" MAXLENGTH=10
                            pattern="[0-9]{10}" placeholder="Se compone de 10 dígitos" required onpaste="return false" />
                    </div>
                    <div class="gaps form-group">
                        <p>Número de celular</p>
                        <input onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)" type="tel" name="celularT" MAXLENGTH=10
                            pattern="[0-9]{10}" placeholder="Se compone de 10 dígitos" required onpaste="return false"/>
                    </div>

                    <div class="gaps form-group">
                        <p>Correo Personal:</p>
                        <input type="email" name="correoPerT" placeholder="tu@email.com" required />
                    </div>

                    <div class="gaps form-group">
                        <?php if($_SESSION['tipo_usuario']==1){//si es adiministrador ?>
                        <p>Coodinador de Terapeuta:</p>
                        <select class="form-control" name="coordinadorT" placeholder="selecionar" required>
                            <option disabled selected>seleciona tu coordinador de terapeuta</option>
                            <?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                            <option value="<?php echo $row['id_coorTerapeuta']; ?>">
                                <?php echo $row['id_coorTerapeuta']; ?> <?php echo $row['nombre']; ?></option>
                            <?php } ?>
                        </select>

                        <?php } ?>
                    </div>



                </div>
                <div class="clear"></div>
                <div class="gaps">
                    <?php
              if($errors){
                    echo resultBlock($errors); }?>
                </div>
                <input type="submit" value="Guardar y Continuar">
                <input type="submit" onclick="location.href= 'welcome.php'" value="Cancelar">



            </form>




        </div>
    </div>


</body>

</html>