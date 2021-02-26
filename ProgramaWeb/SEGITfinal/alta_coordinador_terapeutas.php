<?php
session_start();
if(!isset($_SESSION['id_usuario'])){
  header("location: login.php");
}
require 'funts/conexionBD.php';
require 'funts/funcionCoorTerapeutas.php';
$errors=array();

if(!empty($_POST)){
  $nombre=$mysqli->real_escape_string($_POST['nombreCT']);
  $apellidoPaterno=$mysqli->real_escape_string($_POST['apellidoPaCT']);
  $apellidoMaterno=$mysqli->real_escape_string($_POST['apellidoMaCT']);
  $telefono=$mysqli->real_escape_string($_POST['telefonoCT']);
  $celular=$mysqli->real_escape_string($_POST['celularCT']);
  $facultad=$mysqli->real_escape_string($_POST['facultadCT']);



  if(isNullDatos($nombre,$apellidoPaterno,$apellidoMaterno,$telefono,$celular,$facultad)){
    $errors[]="<p>Debe de llenar todos los campos</p>";
  }
  //if(isEmail($correoPersonal) || isEmail($coreoEscolar)){
    //$errors[]="<p>Direccion de correo invalida!!!</p>";
  //}

  if(CoordinadorExisteN($nombre) && CoordinadorExisteAM($apellidoMaterno) && CoordinadorExisteAP($apellidoPaterno)){
    $errors[]="<p>Estimado $nombre $apellidoPaterno $apellidoMaterno, ya exite un registro con ese nombre</p>";

  }


  if(count($errors) == 0){
    
    $registraCordinador=registraCoordinador($nombre,$apellidoMaterno,$apellidoPaterno, $telefono, $celular, $facultad);

    if($registraCordinador==true){
      echo "<script language='javascript'> function registroExitoso(){alert ('registro guardado');}</script";
      header("location: AltasAdmin.php");
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

    <title>TUTORIA UAEMEX</title>
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
            <h1> ALTA COORDINADOR TERAPEUTA</h1>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

                <div id="resultados_ajax" class="gaps"></div>
                <div class="left-agileits-w3layouts same">





                    <div class="gaps form-group">
                        <p>Nombre(s):</p>
                        <input onkeyup="limpiarletras(this)" onchange="limpiarletras(this)" type="text" name="nombreCT"
                            pattern="([a-zA-Z]*+[ ]+[a-zA-Z]*)" placeholder="Escribe tu nombre(s)" required onpaste="return false" />
                    </div>
                    <div class="gaps form-group">
                        <p>Apellido Paterno:</p>
                        <input onkeyup="limpiarletras(this)" onchange="limpiarletras(this)" type="text" name="apellidoPaCT"
                            pattern="([a-zA-Z]*+[ ]+[a-zA-Z]*)" placeholder="Escribe un apellido valido" required="" onpaste="return false"/>
                    </div>
                    <div class="gaps form-group">
                        <p>Apellido Materno:</p>
                        <input onkeyup="limpiarletras(this)" onchange="limpiarletras(this)" type="text"
                            pattern="([a-zA-Z]*+[ ]+[a-zA-Z]*)" name="apellidoMaCT"
                            placeholder="Escribe un apellido valido" required="" onpaste="return false"/>
                    </div>
                </div>


                <div class="right-agileinfo same">
                    <div class="gaps form-group">
                        <p>Facultad:</p>
                        <select class="form-control" name="facultadCT">
                            <option disabled selected>Elige tu facultad</option>
                            <option value="Ingenieria">Ingenieria</option>
                            <option value="Derecho">Derecho</option>

                        </select>
                    </div>


                    <div class="gaps form-group">
                        <p>Número de teléfono</p>
                        <input onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)" type="tel" name="telefonoCT" minlength="10"
                            MAXLENGTH=10 pattern="[0-9]{10}" placeholder="Se compone de 10 dígitos" required="" />
                    </div>


                    <div class="gaps form-group">
                        <p>Número de celular</p>
                        <input onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)" type="tel" name="celularCT" minlength="10"
                            MAXLENGTH=10 pattern="[0-9]{10}" placeholder="Se compone de 10 dígitos" required="" />
                    </div>

                </div>
                <div class="clear"></div>
                <div class="gaps">
                    <?php
              if($errors){
                    echo resultBlock($errors); }?>
                </div>
                <input type="submit" value="Finalizar">



            </form>




        </div>
    </div>
    <!--copyright-->


</body>

</html>