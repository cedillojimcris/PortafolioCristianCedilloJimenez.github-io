<?php

 require 'funts/conexionBD.php';
 require 'funts/funcionLogin.php';
 $errors=array();

 if(!empty($_POST)){
   $correo=$mysqli->real_escape_string($_POST['correoU']);
   if(isEmail($correo)==false){
     $errors[]='<p>Debe ingresar un correo valido</p>';
   }

   if(emailExiste($correo)==true){
     $user_id=getValor('id_usuario','correo_personal', $correo);//optenemos el id del usuario
     $nombreUsu=getValor('nombre_usuario','correo_personal', $correo);//optenemos el nombre de usuario
     $token=generaTokenPass($user_id);//se genera un token para saber si el usuario solisito un cambio de contraseña.

     $url='http://'.$_SERVER["SERVER_NAME"].'/SEGIT/cambia_pass.php?user_id='.$user_id.'&token='.$token;
     $asunto='Recuperaciòn de contraseña - SEGIT';
     $cuerpo="Hola $nombreUsu; <br /><br/> Se ha solicitado un cambio de contrse&ntilde;a. <br /><br/> Para restaurar la contrase&ntilde;a, visita la siguiente direcci&oacute;n <a href='$url'>Cambiar contrase&ntilde;a</a>";

     if(enviarEmail($correo,$nombreUsu,$asunto,$cuerpo)==true){//si se envia el correo correctamente
       header("location: mensajeCanbiaContra.html");
       exit;
     }else{
       $errors[]='<p>Error al enviar el correo</p>';
     }
   }else{
     $errors[]='<p>No existe su correo</p>';
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

    <title>RECUPERACIÒN DE CONTRASEÑA</title>
    <meta charset="UTF-8">
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
    <!--//fonts-->
</head>

<body>
    <!--background-->
    <br>
    <br>
    <br>
    <div class="bg-agile">
        <div class="book-appointment">


            <h1>
                SEGIT TUTORIA UAEMEX
            </h1>

            <h2>Recuperaci&oacute;n de contraseña</h2>


            <form class="col-12" action="" method="POST">

                <div class="text-center">
                    <div class="col-sm-8 ">

                        <div class="gaps form-group">
                            <p>Correo Personal:</p>
                            <input class="form-control" type="email" name="correoU" placeholder="tu@email.com" />
                        </div>
                    </div>

                    <div class="clear"></div>
                    <div class="gaps">
                        <?php if($errors){
                            echo resultBlock($errors);
                          }?>
                    </div>
                    <div class="clear"></div>
                    <input type="submit" value="Enviar">

            </form>

        </div>
    </div>
    </div>
    </div>
    <div class="bg-agile">
        <div class="book-appointment">
            <input type="submit" onclick="location.href='login.php'" value="REGRESAR"
                style="   margin-left: 10px; margin-top: -60px;  ">
        </div>
    </div>


</body>

</html>