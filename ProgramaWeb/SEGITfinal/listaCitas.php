<?php
  session_start();
  if(!isset($_SESSION['id_usuario'])){
    header("location: login.php");
  }
  require 'funts/conexionBD.php';

  $where = "WHERE id_alumno=id_alumnoFK AND id_terapeuta=id_terapeutaFK";
	if(!empty($_POST))
	{
		$valor = $_POST['campo'];
		if(!empty($valor)){
			$where = "WHERE (nombreA LIKE '%$valor' || numero_cuenta='$valor') AND id_alumnoFK=id_alumno AND id_terapeuta=id_terapeutaFK";
		}
	}
	$sql = "SELECT id_cita,id_alumno,estadoCita, estado_cita, diaCita, horaCita, fechaGestionCita, estadoAlumno, numero_cuenta, nombreA, apellido_paternoA,apellido_maternoA, id_terapeuta,nombreT,apellido_paternoT,apellido_maternoT  FROM cita INNER JOIN alumno INNER JOIN terapeuta $where";
	$resultado1 = $mysqli->query($sql);

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

    <title>Lista de Citas Agendadas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Custom Theme files -->
    <link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <!--fonts-->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <!--//fonts-->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/9c7010aff9.js" crossorigin="anonymous"></script>
</head>

<body>

    <!--background-->
    <div class="book-appointment">

        <h1 style="color:white" ;> LISTA DE CITAS </h1>

        <div class="row">

            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                <b>Buscar por Nombre:</b><input class="form-buscar" type="text" id="campo" name="campo" width="10px" />
                <input type="submit" id="enviar" name="enviar" value="Buscar" class="btn btn-info" />
            </form>
        </div>

        <br>

        <div class="row table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Numero de Cuenta</th>
                        <th>Nombre del alumno</th>
                        <th>Nombre del Terapeuta</th>
                        <th>Estado de la cita</th>
                        <th>Horario de la Cita</th>
                        <th>Fecha de la cita</th>
                        <th></th>
                        <th></th>

                    </tr>
                </thead>

                <tbody>
                    <?php while($row = $resultado1->fetch_array(MYSQLI_ASSOC)) { ?>
                    <tr>
                        <td><?php echo $row['numero_cuenta']; ?></td>
                        <td><?php echo $row['nombreA']." ". $row['apellido_paternoA']." ". $row['apellido_maternoA']; ?>
                        </td>
                        <td><?php echo $row['nombreT'] ." ". $row['apellido_paternoT']." ". $row['apellido_maternoT'];?>
                        </td>
                        <td><?php echo $row['estadoCita']; ?></td>
                        <td><?php echo $row['diaCita']." ".$row['horaCita']; ?> </td>
                        <td><?php echo $row['fechaGestionCita']; ?></td>
                        <td><a class="btn btn btn-dark" href="actualizarCita.php?estado_cita=<?php echo $row['estado_cita']; ?>&id_cita=<?php echo $row['id_cita']; ?>"><i
                                    class="fas fa-edit"></i> Actualizar Cita</a></td>
                        <td><a class="btn btn btn-dark" href="elimListaCita.php?id_alumno=<?php echo $row['id_alumno']; ?>&id_cita=<?php echo $row['id_cita']; ?>&id_terapeuta=<?php echo $row['id_terapeuta']; ?>&estado_cita=<?php echo $row['estado_cita']; ?>&diaCita=<?php echo $row['diaCita']; ?>&horaCita=<?php echo $row['horaCita']; ?>"><i
                                    class="fas fa-trash-alt"></i> Eliminar Cita</a></td>

                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="book-appointment">
        <input type="submit" onclick="location.href='welcome.php'" value="REGRESAR" style="   margin-left: 10px  ">
    </div>

</body>

</html>