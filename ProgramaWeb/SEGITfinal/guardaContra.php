<?php
require 'funts/conexionBD.php';
require 'funts/funcionLogin.php';

$user_id=$mysqli->real_escape_string($_POST['user_id']);
$token=$mysqli->real_escape_string($_POST['token']);
$password=$mysqli->real_escape_string($_POST['contraseñaU']);
$ConfirPas=$mysqli->real_escape_string($_POST['ConfcontraseñaU']);
$mensajeContraseña="";
$mensajeLiga="";
$mensajeErrorC='';
$mensajeErrorN='';

if(validaPassword($password,$ConfirPas)==true){
  $pass_hash=hashPassword($password);
  if(cambiaPassword($pass_hash, $user_id, $token)){
      $mensajeContraseña='<p align="center">Tu contraseña ha sido modificada correctamente.</p>';
      $mensajeLiga="<br> <a class='btn btn-dark' href='login.php'>INICIAR SESION </a>";
  }else{
   $mensajeErrorC='<p align="center" >Error al modificar la contraseña.</p>';
  }
}else{
  $mensajeErrorN='<p align="center" >Las contraseñas no coinsiden.</p>';
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

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

    <meta charset="utf-8">
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

    <script src="js/bootstrap.min.js"></script>
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <!--fonts-->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <title>GURADA CONTRASEÑA</title>
</head>

<body>

    <!--background-->
    <br>
    <br>
    <br>

    <div class="bg-agile">
        <div class="book-appointment">
            <?php 
      if(!empty($mensajeContraseña)){
          echo $mensajeContraseña."\n";
      }
      if(!empty($mensajeLiga)){
          echo $mensajeLiga."\n";
      }
      if(!empty($mensajeErrorC)){
          echo $mensajeErrorC."\n";
      }
      if(!empty($mensajeErrorN)){
          echo $mensajeErrorN."\n";
      }

     ?>

        </div>
    </div>

</body>

</html>