<?php
  require 'funts/conexionBD.php';
  $where = "";

	if(!empty($_POST))
	{
		$valor = $_POST['campo'];
		if(!empty($valor)){
			$where = "WHERE nombre LIKE '%$valor' || numero_cuenta='$valor'";
		}
	}
	$sql = "SELECT * FROM historial_alumnos  $where";
	$resultado = $mysqli->query($sql);

?>

<!DOCTYPE HTML>
<html>
<head>
  <title>Lista de Pacientes</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Medical Appointment Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs Sign up Web Templates,Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design">
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <!-- Custom Theme files -->
  <link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
  <link href="css/style.css" rel='stylesheet' type='text/css' /><link href="css/style.css" rel='stylesheet' type='text/css' />
  <!--fonts-->
  <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
  <!--//fonts-->
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  <script src="https://kit.fontawesome.com/9c7010aff9.js" crossorigin="anonymous"></script>
</head>

<body>

<!--background-->

 <h1> </h1>

    <div class="book-appointment">

    <h1 style="color:white";> LISTA DE ALUMNOS <h1>

        <h2></h2>

        <div class="row">

          <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <b>Buscar por Nombre:</b><input class="form-buscar" type="text" id="campo" name="campo" width="10px"/>
            <input type="submit" id="enviar" name="enviar" value="Buscar" class="btn btn-info" />
          </form>
        </div>

        <br>

        <div class="row table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Numero de Cuenta</th>
                <th>Nombre</th>
                <th>Apellido Materno</th>
                <th>Apellido paterno</th>
               
                
              </tr>
            </thead>

            <tbody>
              <?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                <tr>
                  <td><?php echo $row['numero_cuentaH']; ?></td>
                  <td><?php echo $row['nombreH']; ?></td>
                  <td><?php echo $row['apellido_maternoH']; ?></td>
                  <td><?php echo $row['apellido_paternoH']; ?></td>
                 
                  
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="book-appointment">
           <input type="submit" onclick="location.href='welcome.php'" value="REGRESAR"  style="   margin-left: 10px  ">

            <input type="submit" onclick="location.href='BorrarHistorial.php '" value="BORRAR HISTORIAL"  style="   margin-left: 10px  ">
      </div>

    </body>

</html>