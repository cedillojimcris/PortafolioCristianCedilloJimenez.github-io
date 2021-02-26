<?php
//COnectando a base de datos


require 'funts/conexionBD.php';
  $where = "";

	if(!empty($_POST))
	{
		$valor = $_POST['campo'];
		if(!empty($valor)){
			$where = "WHERE nombre LIKE '%$valor' || numero_cuenta='$valor'";
		}
	}




	$sql = "DELETE FROM historial_alumnos   $where" ;

	$resultado = $mysqli->query($sql);
//	$resultado = $mysqli->query($sql);









if ($resultado) {    
	
	echo '<html>
			<head>
			<meta http-equiv="Refresh" content="3;url=http://localhost/SEGIT/PantallaMenu.html">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
			</head>

			<body>
			<h1>HISTORIAL BORRADO EXITOSAMENTE</h1>
			</body>
		  </html>';
      }    
?>