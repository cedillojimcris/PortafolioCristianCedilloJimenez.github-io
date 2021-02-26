<?php
    session_start();
	require 'funts/conexionBD.php';
	if(!isset($_SESSION['id_usuario'])){
 	 header("location: login.php");
	}

	$id = $_GET['id_terapeuta'];

	$sql1 = "SELECT * FROM terapeuta WHERE id_terapeuta = '$id'";
	$resultado1 = $mysqli->query($sql1);
    $row = $resultado1->fetch_array(MYSQLI_ASSOC);
    
    //consultamos el nombre y id de los coordinadores de terapeutas
    $sql2 = "SELECT id_coorTerapeuta, nombre,apellido_materno,apellido_paterno FROM coordinador_terapeuta";
	$resultado2 = $mysqli->query($sql2);

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

    <title>MODIFICACIONES</title>
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
</head>

<body>
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
    <!--background-->
    <br>

    <div class="bg-agile">
        <div class="book-appointment">
            <h1>MODIFICAR TERAPEUTA</h1>
            <form action="updateT.php" method="POST">

                <div id="resultados_ajax" class="gaps"></div>
                <div class="left-agileits-w3layouts same">
                    <input type="hidden" id="id" name="idTera" value="<?php echo $row['id_terapeuta']; ?>" />

                    <div class="gaps form-group">
                        <p>Nombre(s):</p>
                        <input onkeyup="limpiarletras(this)" onchange="limpiarletras(this)" required type="text"
                            name="nombreT" pattern="([a-zA-Z]*+[ ]+[a-zA-Z])" value="<?php echo $row['nombreT']; ?>"
                            onpaste="return false" />
                    </div>
                    <div class="gaps form-group">
                        <p>Apellido Paterno:</p>
                        <input onkeyup="limpiarletras(this)" onchange="limpiarletras(this)" type="text"
                            name="apellidoPaT" pattern="([a-zA-Z]*+[ ]+[a-zA-Z])" value="<?php echo $row['apellido_paternoT']; ?>"
                            required onpaste="return false" />
                    </div>
                    <div class="gaps form-group">
                        <p>Apellido Materno:</p>
                        <input onkeyup="limpiarletras(this)" onchange="limpiarletras(this)" type="text"
                            name="apellidoMaT" pattern="([a-zA-Z]*+[ ]+[a-zA-Z])" value="<?php echo $row['apellido_maternoT']; ?>"
                            required onpaste="return false" />
                    </div>

                </div>
                <div class="right-agileinfo same">

                    <div class="gaps form-group">
                        <p>Número de teléfono</p>
                        <input onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)" type="tel" name="telefonoT"
                            MAXLENGTH=10 pattern="[0-9]{10}" value="<?php echo $row['telefonoT']; ?>" required
                            onpaste="return false" />
                    </div>
                    <div class="gaps form-group">
                        <p>Número de celular</p>
                        <input onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)" type="tel" name="celularT"
                            MAXLENGTH=10 pattern="[0-9]{10}" value="<?php echo $row['celularT']; ?>" required
                            onpaste="return false" />
                    </div>
                    <div class="gaps form-group">
                        <p>Correo Personal:</p>
                        <input type="email" name="correoPerT" placeholder="tu@email.com" required
                            value="<?php echo $row['correo_personalT']; ?>" onpaste="return false" />
                    </div>
                    <div class="gaps form-group">
                        <?php if($_SESSION['tipo_usuario']==1){//si es adiministrador ?>
                        <p>Coodinador de Terapeuta:</p>
                        <select class="form-control" name="coordinadorT" placeholder="selecionar" required>
                            <option disabled selected>seleciona tu coordinador de terapeuta</option>
                            <?php while($row2 = $resultado2->fetch_array(MYSQLI_ASSOC)) { ?>
                            <option value="<?php echo $row2['id_coorTerapeuta']; ?>" <?php if($row2['id_coorTerapeuta']==$row['id_coorTerapeutaFK']) echo 'selected'; ?> > <?php echo $row2['nombre']." ".$row2['apellido_paterno']." ".$row2['apellido_materno']; ?></option>
                            <?php } ?>
                        </select>

                        <?php } ?>
                    </div>

                </div>
                <div class="clear"></div>
                <input type="submit" value="Guardar ">
            </form>

        </div>
    </div>
    <div class="bg-agile">
        <div class="book-appointment">
            <?php if($_SESSION['tipo_usuario']==1){//si es adiministrador ?>
            <input type="submit" onclick="location.href='tablaModT.php'" value="CANCELAR"
                style="   margin-left: 10px; margin-top:-40px; ">
            <?php } ?>

            <?php if($_SESSION['tipo_usuario']==3){//si es adiministrador ?>
            <input type="submit" onclick="location.href='tablaModTcord.php'" value="CANCELAR"
                style="   margin-left: 10px; margin-top:-40px;">
            <input type="submit" value="Modificar Horario" style=" margin-top:-90px; "
                onclick="location.href='horarioTerapeutaM.php?id_terapeuta=<?php echo $row['id_terapeuta'];?>'">

            <?php } ?>

        </div>
    </div>

</body>

</html>