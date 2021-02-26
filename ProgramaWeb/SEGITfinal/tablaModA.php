<?php
  session_start();
	require 'funts/conexionBD.php';
	if(!isset($_SESSION['id_usuario'])){
 	 header("location: login.php");
	}
 
  $where = "";

	if(!empty($_POST))
	{
		$valor = $_POST['campo'];
		if(!empty($valor)){
			$where = "WHERE nombreA LIKE '%$valor' || numero_cuenta='$valor'";
		}
	}
	$sql = "SELECT id_alumno,numero_cuenta,nombreA,apellido_maternoA,apellido_paternoA FROM alumno $where";
	$resultado = $mysqli->query($sql);

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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>


    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/9c7010aff9.js" crossorigin="anonymous"></script>
</head>

<body>

    <!--background-->
    <br>
    <div class="book-appointment">

        <h1 style="color:white" ;>MODIFICACIONES ALUMNO </h1>
        <div class="row">

            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                <b>Buscar por Nombre ò Numero de Cuenta: </b><input type="text" id="campo" name="campo" />
                <button type="submit" class="btn btn-dark" id="enviar" name="enviar"><i class="fas fa-search"></i>
                    Buscar</button>
            </form>
        </div>

        <br>

        <div class="row table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th></th>

                    </tr>
                </thead>

                <tbody>
                    <?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                    <tr>
                        <td><?php echo $row['numero_cuenta']; ?></td>
                        <td><?php echo $row['nombreA']; ?></td>
                        <td><?php echo $row['apellido_paternoA']; ?></td>
                        <td><?php echo $row['apellido_maternoA']; ?></td>
                        <td><a class="btn btn btn-dark" href="motA.php?id_alumno=<?php echo $row['id_alumno'];?>"><i
                                    class="fas fa-edit"></i> Modificar</a></td>
                    </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="book-appointment">
        <input type="submit" onclick="location.href='Modificaciones.php'" value="REGRESAR"
            style="   margin-left: 10px  ">
    </div>



    <!-- Modal -->
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
                </div>

                <div class="modal-body">
                    ¿Desea eliminar este registro?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Delete</a>
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

</body>

</html>