<?php
  session_start();
	if(!isset($_SESSION['id_usuario'])){
 	 header("location: login.php");
	}
	require 'funts/conexionBD.php';

	$id = $_GET['id_coordinador_facultad'];

	$sql = "SELECT id_usuario,id_coordinador_facultad, nombre, apellido_paterno, apellido_materno, facultad_procedencia , telefono, celular, correo_personal FROM coordinador_facultad INNER JOIN usuario WHERE id_coordinador_facultad='$id' AND id_usuarioFK=id_usuario;";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);

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

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords"
        content="Medical Appointment Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs Sign up Web Templates,Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design">
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

    function opcionCorreoSI() {
        if (document.h.Conocido1.checked == true) {
            //muestra (cambiando la propiedad display del estilo) el div con id 'correoOculto'
            document.getElementById('correoOculto').style.display = 'block';
            document.getElementById('Conocido_1').checked = false;
            //por el contrario, si no esta seleccionada
        } else {
            //oculta el div con id 'correoOculto'
            document.getElementById('correoOculto').style.display = 'none';
        }
    }
    function opcionCorreoNO() {
        if (document.h.Conocido.checked == true) {
            //muestra (cambiando la propiedad display del estilo) el div con id 'correoOculto'
            document.getElementById('correoOculto').style.display = 'none';
            document.getElementById('Conocido_0').checked = false;
            //por el contrario, si no esta seleccionada
        } 
    
    }
    </script>

</head>

<body>

    
    <!--background-->
    <br>

    <div class="bg-agile">
        <div class="book-appointment">
            <h1>MODIFICAR COORDINADOR FACULTAD </h1>

            <form action="updateCF.php" method="POST" name="h">

                <div class="left-agileits-w3layouts same">

                    <input type="hidden" id="id" name="idCoorFac"
                        value="<?php echo $row['id_coordinador_facultad']; ?>" />
                        <input type="hidden" id="id_u" name="idUsuario" value="<?php echo $row['id_usuario']; ?>" />
                    <div class="gaps form-group">
                        <p>Nombre(s):</p>
                        <input onkeyup="limpiarletras(this)" onchange="limpiarletras(this)" type="text" name="nombreCF"
                            pattern="([a-zA-Z]*+[ ]+[a-zA-Z])" value="<?php echo $row['nombre']; ?>" required onpaste="return false" />
                    </div>
                    <div class="gaps form-group">
                        <p>Apellido Paterno:</p>
                        <input onkeyup="limpiarletras(this)" onchange="limpiarletras(this)" type="text"
                            name="apellidoPaCF" pattern="([a-zA-Z]*+[ ]+[a-zA-Z])" value="<?php echo $row['apellido_paterno']; ?>"
                            required onpaste="return false" />
                    </div>
                    <div class="gaps form-group">
                        <p>Apellido Materno:</p>
                        <input onkeyup="limpiarletras(this)" onchange="limpiarletras(this)" type="text"
                            name="apellidoMaCF" pattern="([a-zA-Z]*+[ ]+[a-zA-Z])" value="<?php echo $row['apellido_materno']; ?>"
                            required onpaste="return false" />
                    </div>
                    <div class="gaps form-group">
                        <p>Desea actualizar el correo personal:</p>
                        <p>(* si elige Si debe ser uno diferente)</p><br>
                    </div>
                            <p>
                            <input style="margin-left:30px;" type="radio" name="Conocido" checked value="No" id="Conocido_1"
                                onclick="opcionCorreoNO();"  /> No
                            <input type="radio" name="Conocido1" value="Si" id="Conocido_0"
                                onclick="opcionCorreoSI();" /> Si</p>
                   

                    <div class="gaps form-group" id="correoOculto" style="display:none;">
                        <p>Correo Personal:</p>
                        <input type="email" name="correoPerCT" value="<?php echo $row['correo_personal']; ?>"
                            placeholder="tu@email.com" required onpaste="return false" />
                    </div>
                </div>
                <div class="right-agileinfo same">
                    <div class="gaps form-group">
                        <p>Facultad:</p>
                        <select class="form-control" name="facultadCF" required>
                            <option disabled selected>seleciona tu facultad </option>
                            <option value="Ingenieria"
                                <?php if($row['facultad_procedencia']=='Ingenieria') echo 'selected'; ?>>
                                Ingenieria</option>
                            <option value="Derecho"
                                <?php if($row['facultad_procedencia']=='Derecho') echo 'selected'; ?>>Derecho
                            </option>

                        </select>
                    </div>
                    <div class="gaps form-group">
                        <p>Número de teléfono</p>
                        <input onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)" type="tel"
                            name="telefonoCF" MAXLENGTH=10 pattern="[0-9]{10}" value="<?php echo $row['telefono']; ?>"
                            required onpaste="return false" />
                    </div>
                    <div class="gaps">
                        <p>Número de celular</p>
                        <input onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)" type="tel" name="celularCF"
                            MAXLENGTH=10 pattern="[0-9]{10}" value="<?php echo $row['celular']; ?>" required
                            onpaste="return false" />
                    </div>



                </div>
                <div class="clear"></div>
                <div class="gaps">


                    <input type="submit" value="Guardar ">
            </form>

        </div>
    </div>
    <div class="book-appointment">
        <input type="submit" onclick="location.href='tablaModCF.php'" value="CANCELAR" style="   margin-left: 10px  ">
    </div>
    </div>
 



</body>

</html>