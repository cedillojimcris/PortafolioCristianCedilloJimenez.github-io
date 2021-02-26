<?php

    session_start();
	require 'funts/conexionBD.php';
	if(!isset($_SESSION['id_usuario'])){
 	 header("location: login.php");
	}

	$id = $_GET['id_alumno'];

	$sql1 = "SELECT id_alumno,nombreA ,apellido_maternoA ,apellido_paternoA, correo_escolarA, correo_personalA , telefonoA , celularA,facultad_origenA , semestreA FROM alumno WHERE id_alumno = '$id'";
	$resultado1 = $mysqli->query($sql1);
    $row = $resultado1->fetch_array(MYSQLI_ASSOC);
    
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
            <h1>MODIFICAR ALUMNO</h1>
            <form action="updateA.php" method="POST">

                <div id="resultados_ajax" class="gaps"></div>
                <div class="left-agileits-w3layouts same">
                    <input type="hidden" id="id" name="id_alumno" value="<?php echo $row['id_alumno']; ?>" />

                    <div class="gaps form-group">
                        <p>Nombre(s):</p>
                        <input onkeyup="limpiarletras(this)" onchange="limpiarletras(this)" required type="text"
                            name="nombreA" pattern="([a-zA-Z]*+[ ]+[a-zA-Z])" value="<?php echo $row['nombreA']; ?>"
                            onpaste="return false" />
                    </div>
                    <div class="gaps form-group">
                        <p>Apellido Paterno:</p>
                        <input onkeyup="limpiarletras(this)" onchange="limpiarletras(this)" type="text"
                            name="apellidoPaA" pattern="([a-zA-Z]*+[ ]+[a-zA-Z])" value="<?php echo $row['apellido_paternoA']; ?>"
                            required onpaste="return false" />
                    </div>
                    <div class="gaps form-group">
                        <p>Apellido Materno:</p>
                        <input onkeyup="limpiarletras(this)" onchange="limpiarletras(this)" type="text"
                            name="apellidoMaA" pattern="([a-zA-Z]*+[ ]+[a-zA-Z])" value="<?php echo $row['apellido_maternoA']; ?>"
                            required onpaste="return false" />
                    </div>
                    <div class="gaps form-group">
                        <p>No. de semestre actualmente cursando:</p>
                        <select class="form-control" name="noSemestreA" placeholder="Seleccionar" required>
                            <option disabled selected>Elige tu semestre</option>
                            <option value="1"<?php if($row['semestreA']==1) echo 'selected'; ?>>1</option>
                            <option value="2"<?php if($row['semestreA']==2) echo 'selected'; ?>>2</option>
                            <option value="3"<?php if($row['semestreA']==3) echo 'selected'; ?>>3</option>
                            <option value="4"<?php if($row['semestreA']==4) echo 'selected'; ?>>4</option>
                            <option value="5"<?php if($row['semestreA']==5) echo 'selected'; ?>>5</option>
                            <option value="6"<?php if($row['semestreA']==6) echo 'selected'; ?>>6</option>
                            <option value="7"<?php if($row['semestreA']==7) echo 'selected'; ?>>7</option>
                            <option value="8"<?php if($row['semestreA']==8) echo 'selected'; ?>>8</option>
                            <option value="9"<?php if($row['semestreA']==9) echo 'selected'; ?>>9</option>
                            <option value="10"<?php if($row['semestreA']==10) echo 'selected'; ?>>10</option>
                            <option value="11"<?php if($row['semestreA']==11) echo 'selected'; ?>>11</option>
                            <option value="12"<?php if($row['semestreA']==12) echo 'selected'; ?>>12</option>
                            <option value="13"<?php if($row['semestreA']==13) echo 'selected'; ?>>13</option>
                            <option value="14"<?php if($row['semestreA']==14) echo 'selected'; ?>>14</option>
                            <option value="15"<?php if($row['semestreA']==15) echo 'selected'; ?>>15</option>
                            <option value="16"<?php if($row['semestreA']==16) echo 'selected'; ?>>16</option>
                            <option value="17"<?php if($row['semestreA']==17) echo 'selected'; ?>>17</option>
                            <option value="18"<?php if($row['semestreA']==18) echo 'selected'; ?>>18</option>
                            <option value="19"<?php if($row['semestreA']==19) echo 'selected'; ?>>19</option>
                            <option value="20"<?php if($row['semestreA']==20) echo 'selected'; ?>>20</option>

                        </select>
                    </div>
                </div>
                <div class="right-agileinfo same">

                    <div class="gaps form-group">
                        <p>Número de teléfono</p>
                        <input onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)" type="tel" name="telefonoA"
                            MAXLENGTH=10 pattern="[0-9]{10}" value="<?php echo $row['telefonoA']; ?>" required
                            onpaste="return false" />
                    </div>
                    <div class="gaps form-group">
                        <p>Número de celular</p>
                        <input onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)" type="tel" name="celularA"
                            MAXLENGTH=10 pattern="[0-9]{10}" value="<?php echo $row['celularA']; ?>" required
                            onpaste="return false" />
                    </div>
                    <div class="gaps form-group">
                        <p>Correo Personal:</p>
                        <input type="email" name="correoPerA" placeholder="tu@email.com" required
                            value="<?php echo $row['correo_personalA']; ?>" onpaste="return false" />
                    </div>
                    <div class="gaps form-group">

                        <p>Facultad:</p>
                        <select class="form-control" name="facultadA" placeholder="selecionar" required>
                            <option disabled selected>Elige tu facultad</option>
                            <option value="Ingenieria"
                                <?php if($row['facultad_origenA']=='Ingenieria') echo 'selected'; ?>>Ingenieria</option>
                            <option value="Derecho" <?php if($row['facultad_origenA']=='Derecho') echo 'selected'; ?>>
                                Derecho</option>
                        </select>

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
            <input type="submit" onclick="location.href='tablaModA.php'" value="CANCELAR"
                style="   margin-left: 10px; margin-top:-40px; ">
            <?php } ?>

            <?php if($_SESSION['tipo_usuario']==3){//si es coordinador de terapeutas ?>
            <input type="submit" onclick="location.href='#'" value="CANCELAR"
                style="   margin-left: 10px; margin-top:-40px;">


            <?php } ?>

        </div>
    </div>


</body>

</html>