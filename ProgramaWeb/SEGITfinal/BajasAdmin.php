<?php
	session_start();
	if(!isset($_SESSION['id_usuario'])){
	  header("location: login.php");
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

    <title>PANTALLA MENU</title>
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
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!--fonts-->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="js/all.js">

    <!--//fonts-->


</head>

<body>

    <!--background-->
    <br>

    <div class="bg-agile">


        <div class="book-appointment">

            <h1> SEGIT TUTORIA UAEMEX
                ADMINISTRACION </h1>


            <div id="resultados_ajax" class="gaps"></div>
            <div class="left-agileits-w3layouts same">



                <input type="submit" onclick="location.href= 'ELICoord.php'" value="Eliminar Coordinador Facultad"
                    style="margin-right: 30px">
                <input type="submit" onclick="location.href= 'ELICoordinadorT.php'"
                    value="Eliminar Coordinador Terapeuta" style="margin-right: 30px">
                <input type="submit" onclick="location.href= 'ELITera.php'" value="Eliminar Teraputa"
                    style="margin-right: 30px">
                <input type="submit" onclick="location.href= 'ELIAlumno.php'" value="Eliminar Alumno"
                    style="margin-right: 30px">



                <input type="submit" onclick="location.href= 'welcome.php'" value="SALIR" style="margin-left: 10px ">

            </div>


            <div class="right-agileinfo same">

                <img src="images/img.png" style="margin-right: 30px">

                <div class="clear"></div>

            </div>
            <div class="clear"></div>

        </div>
        <div class="clear"></div>

    </div>
    </div>

</body>

</html>