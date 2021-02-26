<?php
session_start();

require 'funts/conexionBD.php';

if(!isset($_SESSION['id_usuario'])){
  header("location: login.php");
}

$idUsuario=$_SESSION['id_usuario'];
$id_tipoU=$_SESSION['tipo_usuario'];
$consulta="SELECT id_usuario,nombre_usuario FROM usuario WHERE id_usuario=$idUsuario";
$resultado=$mysqli->query($consulta);
$fila= $resultado->fetch_assoc();


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

    <title>Bienvenido</title>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Custom Theme files -->
    <link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!--fonts-->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="js/all.js">

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>



</head>

<body>

    <!--background-->
<br>

    <div class="bg-agile">


        <div class="book-appointment">
            <h1>SEGIT TUTORIA UAEMEX
                <h3>


                    <?php if($_SESSION['tipo_usuario']==1){ ?> ADMINISTRADOR <?php } ?>
                    <?php if($_SESSION['tipo_usuario']==2){ ?>COORDINACION DE FACULTAD <?php } ?>
                    <?php if($_SESSION['tipo_usuario']==3){ ?>
                    Coordinaciòn de terapeuta <?php } ?>
                </h3>
                <h1>

                    <h2><?php echo '<p> Bienvenid@ </p>'.utf8_decode($fila['nombre_usuario']) ?></h2>




                    <div id="resultados_ajax" class="gaps"></div>
                    <div class="left-agileits-w3layouts same">



                        <?php if($id_tipoU==1){ //administrador ?>

                        <input type="submit" onclick="location.href= 'AltasAdmin.php'" value="Altas"
                            style="margin-right: 30px">


                        <input type="submit" onclick="location.href= 'BajasAdmin.php'" value="Bajas"
                            style="margin-right: 30px">

                        <input type="submit" onclick="location.href= 'Modificaciones.php'" value="Modificaciones"
                            style="margin-right: 30px">

                      <input type="submit" onclick="location.href= 'ListaAlumAdmin.php'" value="Reporte Semestral" style="margin-right: 30px">

			<input type="submit" onclick="location.href= 'Reporte2AdminExcel.php'" value="Reporte General" style="margin-right: 30px">

			<input type="submit" style="background-color: #cb3234" onclick="location.href= 'BorrarHistorialA.php'" value="Borrar Historial" style="margin-right: 30px">


                        <?php }if($id_tipoU==2){ //coordinador facultad ?>

                        <input type="submit" onclick="location.href= 'ListaPacTerap.php'" value="Lista de Pacientes"
                            style="margin-right: 30px">

                        <?php } if($id_tipoU==3){ //coordinador_terapeutas ?>
                        <input type="submit" onclick="location.href= 'ALTTerap.php'" value="Alta de Terapeutas"
                            style="margin-right: 30px">

                        <input type="submit" onclick="location.href= 'BajasTera2.html'" value="Baja de Terapeutas"
                            style="margin-right: 30px">

                        <input type="submit" onclick="location.href= 'tablaModTcord.php'"
                            value="Modificaciones Terapeutas" style="margin-right: 30px">

                        <input type="submit" onclick="location.href= 'ListaPacTerap.php'" value="Lista de Pacientes"
                            style="margin-right: 30px">
                        <input type="submit" onclick="location.href= 'listaCitas.php'" value="Lista de Citas"
                            style="margin-right: 30px">
<input type="submit" onclick="location.href= 'reporteCordiTerap.php'" value="Reporte Terapeutas" style="margin-right: 30px">

                        <?php  }  ?>


                        <input type="submit" onclick="location.href= 'cerrarSesion.php'" value="CERRAR SESION"
                            style="margin-left: 10px ">

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

    <!-- Modal -->
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"> <b>Borrar Historial</b> </h4>
                    <button type="button" class="close" style="width:5px;" data-dismiss="modal" aria-hidden="true">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p>¿Desea borrar el historial de los alumnos?:</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger btn-ok">Eliminar</a>
                </div>
            </div>
        </div>
    </div>

    <script>
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

        $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
    });
    </script>

    </script>

    <!--copyright-->
</body>

</html>