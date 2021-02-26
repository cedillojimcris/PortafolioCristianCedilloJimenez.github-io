<?php
  session_start();
  if(!isset($_SESSION['id_usuario'])){
    header("location: login.php");
  }
require 'funts/conexionBD.php';
require 'funts/funcionUsuario.php';
$errors=array();

if(!empty($_POST)){
  $nombreUsuario=$mysqli->real_escape_string($_POST['nombreUCF']);
  $correoPersonal=$mysqli->real_escape_string($_POST['correoPerCF']);
  //$coreoEscolar=$mysqli->real_escape_string($_POST['correoEscolarCF']);
  $contraseña=$mysqli->real_escape_string($_POST['contraseñaCF']);
  $ConfContraseña=$mysqli->real_escape_string($_POST['conf_contraseñaCF']);
  //$tipoUForm=$mysqli->real_escape_string($_POST['tipoUsuario']);

  if(isNullDatos($nombreUsuario,$correoPersonal,$contraseña,$ConfContraseña)){
    $errors[]="<p>Debe llenar todos los campos</p>";
  }

  if(emailExiste($correoPersonal)){
    $errors[]="<p>Tu correo ya fue registrado, intenta con otro</p>";
  }
  if(usuarioExiste($nombreUsuario)){
    $errors[]="<p>Ya existe una cuenta con ese nombre, intenta con otro</p>";

  }

  if(!validaPassword($contraseña,$ConfContraseña)){
    $errors[]="<p>Las contraseñas no coinciden</p>";
  }

  if(count($errors) == 0){

    $tipo_usuario=2;
    $contra_hash=hashPassword($contraseña);
    $registroUsuario=registraUsuario($nombreUsuario,$correoPersonal,$contra_hash,$tipo_usuario);
    if($registroUsuario==true){
      echo '<p>registro guardado</p>';
      header("location: alta_coordinador_Factultad.php");
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

    <title>Alta de usuarios de coordinadores de facultad</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300">

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
        /** /W que no sean alfanumerico */
        obj.value = obj.value.replace(/\W/g, '');
    } ////
    </script>
</head>

<body>


    <!--background-->
    <br>

    <div class="bg-agile">
        <div class="book-appointment">
            <h1> ALTA DE USUARIOS COORDINACION DE FACULTAD</h1>



            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                <div id="resultados_ajax" class="gaps"></div>
                <div class="left-agileits-w3layouts same">

                    <div class="gaps form-group">
                        <p>Nombre de Usuario</p>
                        <input onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)" type="text" name="nombreUCF"
                            placeholder="Ejemplo: nombreUsuario123" required onpaste="return false" />
                    </div>
                    <div class="gaps form-group">
                        <p>Correo Personal:</p>
                        <input type="email" name="correoPerCF" placeholder="tu@email.com" required
                            onpaste="return false" />
                    </div>
                </div>

                <div class="right-agileinfo same">
                    <div class="gaps form-group">
                        <p>Contraseña:</p>
                        <input type="password" name="contraseñaCF" placeholder="Contraseña" required
                            onpaste="return false" />
                    </div>
                    <div class="gaps form-group">
                        <p>Confirmar contraseña:</p>
                        <input type="password" name="conf_contraseñaCF" placeholder="Confirma tu contraseña" required
                            onpaste="return false" />
                    </div>


                </div>

                <div class="clear"></div>
                <div class="gaps">
                    <?php
   					  if($errors){
   		          		echo resultBlock($errors); }?>
                </div>
                <input type="submit" value="Guardar y Continuar ">
                <input type="submit" onclick="location.href= 'AltasAdmin.php'" value="Cancelar">
            </form>
        </div>
    </div>

</body>

</html>