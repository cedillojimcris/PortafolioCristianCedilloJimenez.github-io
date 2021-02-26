<?php

 require 'funts/conexionBD.php';

 if(!empty($_POST))
  {
	$idcitas = $_POST['idCitaEli'];
	$idalumno = $_POST['idAlumEli'];
	$idTerapeut = $_POST['idTeraEli'];
	$edoCitA = $_REQUEST['estado_cita'];
	$diaTera = $_REQUEST['diaCita'];
	$horaTera = $_REQUEST['horaCita'];
	$query_delete = "DELETE FROM cita WHERE id_cita='$idcitas'";
	$query_cambio ="UPDATE alumno JOIN cita ON cita.id_cita = '$idcitas' AND id_alumno = '$idalumno' SET estado_cita = '0'" ;
	$query_cambioT = "UPDATE horariot JOIN cita ON diaSemanaT = '$diaTera' AND horaT = '$horaTera' AND horariot.id_terapeutaFK = '$idTerapeut' SET estado_horario = '0'";
	
	
		
		$resultadoCam = $mysqli->query($query_cambio);
		$resultadoCambioT = $mysqli->query($query_cambioT);
		$resultado = $mysqli->query($query_delete);

		if($resultado){

			header("location: listaCitas.php"); 
		}
	
  }  

 session_start();
  if(!isset($_SESSION['id_usuario'])){
    header("location: login.php");
  }
  
  

  if(empty($_REQUEST['id_alumno'])) //si la variable id_alumno no tiene valor se redirecciona a listaCitas.php
  {
	header("location: listaCitas.php");  
  }else{ //si lo tiene se consulta la DB 
	
	
	$idAlum = $_REQUEST['id_alumno'];
	$idcita = $_REQUEST['id_cita'];
	$idTera = $_REQUEST['id_terapeuta'];
	$edoCitA = $_REQUEST['estado_cita'];

	$sql = "SELECT id_cita,id_alumno,estadoCita, estado_cita, diaCita, horaCita, fechaGestionCita, estadoAlumno, numero_cuenta, nombreA, apellido_paternoA,apellido_maternoA, id_terapeuta, nombreT,apellido_paternoT,apellido_maternoT  FROM cita INNER JOIN alumno INNER JOIN terapeuta WHERE id_alumno=$idAlum AND id_cita= $idcita AND id_terapeuta = $idTera";
	
	$result= $mysqli->query($sql);
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
    <link rel="apple-touch-icon" sizes="152x152" href="images/iconos/apple-icon-152x152.png"
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

        <h1 style="color:white" ;> ELIMINAR CITA </h1>

     <div class="row table-responsive">
            <table class="table table-striped">
		<h2>¿Está seguro de eliminar esta cita?</h2>
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
                    <?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
                    <tr>
                        <td><?php echo $row['numero_cuenta']; ?></td>
                        <td><?php echo $row['nombreA']." ". $row['apellido_paternoA']." ". $row['apellido_maternoA']; ?>
                        </td>
                        <td><?php echo $row['nombreT'] ." ". $row['apellido_paternoT']." ". $row['apellido_maternoT'];?>
                        </td>
                        <td><?php echo $row['estadoCita']; ?></td>
                        <td><?php echo $row['diaCita']." ".$row['horaCita']; ?> </td>
                        <td><?php echo $row['fechaGestionCita']; ?></td>
               <form method="post" action="">
			<input type="hidden" name="idCitaEli" value="<?php echo $idcita; ?>">
			<input type="hidden" name="idAlumEli" value="<?php echo $idAlum; ?>"> 
			<input type="hidden" name="idTeraEli" value="<?php echo $idTera; ?>">
			<td><input type="image" src="images/eliminar.png" alt="Aceptar" width="120" height="33"></td>	
			<!-- <td><a class="btn btn btn-dark" href="elimListaCita.php?idCitaEli=<?php echo $idcita ?>"><i class="fas fa-edit"></i>Aceptar</a></td> -->	
			<td><a class="btn btn btn-dark" href="listaCitas.php"><i class="fas fa-edit"></i>Cancelar</a></td>
			
		</form>
 		
		    </tr>
				
                    <?php } ?>
		 
                </tbody>
            </table>

        </div>
 


</body>

</html>

