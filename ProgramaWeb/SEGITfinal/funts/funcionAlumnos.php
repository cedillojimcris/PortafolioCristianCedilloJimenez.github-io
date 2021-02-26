<?php

function isNull($numeroCuenta,$nombre,$apellidoPaterno,$apellidoMaterno,$telefono,$celular,$facultad,$semetre,$correoPersonal,$descripcionProblema,$tipoProblema){
    if( strlen(trim($numeroCuenta)) < 1 || strlen(trim($nombre)) < 1 || strlen(trim($apellidoPaterno)) < 1 || strlen(trim($apellidoMaterno)) < 1 || strlen(trim($telefono)) < 1 || strlen(trim($celular)) < 1 || strlen(trim($facultad)) < 1 || strlen(trim($semetre)) < 1 || strlen(trim($correoPersonal))  < 1  || strlen(trim($descripcionProblema)) < 1 || strlen(trim($tipoProblema)) < 1 )
    {
        return true;
    } else {
        return false;
    }
}

  function isEmail($email){
		if (filter_var($email, FILTER_VALIDATE_EMAIL)){
			return true;
			} else {
			return false;
		}
  }

function resultBlock($errors){
  if(count($errors) > 0)
{
    echo "<div class='gaps' id='error' class='alert alert-danger' role='alert'>
    <a class='gaps'</a>
    <ul class='gaps'>";
    foreach($errors as $error)
    {
      echo "<li class='form-group'><i class='fas fa-exclamation-circle'></i>".$error."</li>";
    }
    echo "</ul>";
    echo "</div>";
  }
}

function alumnoExiste($numeroCuenta)
	{
		global $mysqli;

		$stmt = $mysqli->prepare("SELECT numero_cuenta FROM alumno WHERE numero_cuenta= ? LIMIT 1");
		$stmt->bind_param("i", $numeroCuenta);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();

		if ($num > 0){
			return true;
		} else {
			return false;
		}
  }

  function emailExiste($email)
	{
		global $mysqli;

		$stmt = $mysqli->prepare("SELECT id FROM usuarios WHERE correo = ? LIMIT 1");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();

		if ($num > 0){
			return true;
			} else {
			return false;
		}
  }

  function registraAlumnoA($numeroCuenta,$nombre,$apellidoPaterno,$apellidoMaterno,$coreoEscolar,$correoPersonal,$telefono,$celular,$facultad,$semetre,$tipoProblema,$descripcionProblema){

		global $mysqli;

		if($stmt = $mysqli->prepare("INSERT INTO alumno(numero_cuenta, nombreA,apellido_maternoA, apellido_paternoA, correo_escolarA, correo_personalA, telefonoA, celularA, facultad_origenA, semestreA, tipoProblemaA, descripcionProblemaA) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)")){
			$stmt->bind_param('issssssssiss',$numeroCuenta,$nombre,$apellidoMaterno,$apellidoPaterno,$coreoEscolar,$correoPersonal,$telefono,$celular,$facultad,$semetre,$tipoProblema,$descripcionProblema);

			if ($stmt->execute()){
				if($stmt1 = $mysqli->prepare("INSERT INTO historial_alumnos(numero_cuentaH, nombreH,apellido_maternoH, apellido_paternoH) VALUES(?,?,?,?)")){
					$stmt1->bind_param('isss',$numeroCuenta,$nombre,$apellidoMaterno,$apellidoPaterno);
					if($stmt1->execute()){
						return true;
						exit;
					}
				}else{
					$error=$mysqli->errno.''.$mysqli->error;
					echo $error;
			  	}
					

			} else {
				return false;
			}
		}else{
			$error=$mysqli->errno.''.$mysqli->error;
			echo $error;
		}
  }//////


  function registraAlumnoB($numeroCuenta,$nombre,$apellidoPaterno,$apellidoMaterno,$correoPersonal,$telefono,$celular,$facultad,$semetre,$tipoProblema,$descripcionProblema){

	global $mysqli;

	if($stmt = $mysqli->prepare("INSERT INTO alumno(numero_cuenta, nombreA,apellido_maternoA, apellido_paternoA, correo_personalA, telefonoA, celularA, facultad_origenA, semestreA, tipoProblemaA, descripcionProblemaA) VALUES(?,?,?,?,?,?,?,?,?,?,?)")){
		$stmt->bind_param('isssssssiss',$numeroCuenta,$nombre,$apellidoMaterno,$apellidoPaterno,$correoPersonal,$telefono,$celular,$facultad,$semetre,$tipoProblema,$descripcionProblema);

		if ($stmt->execute()){
			if($stmt1 = $mysqli->prepare("INSERT INTO historial_alumnos(numero_cuentaH, nombreH,apellido_maternoH, apellido_paternoH) VALUES(?,?,?,?)")){
				$stmt1->bind_param('isss',$numeroCuenta,$nombre,$apellidoMaterno,$apellidoPaterno);
				if($stmt1->execute()){
					return true;
					exit;
				}
			}else{
				$error=$mysqli->errno.''.$mysqli->error;
				echo $error;
			  }
				

		} else {
			return false;
		}
	}else{
		$error=$mysqli->errno.''.$mysqli->error;
		echo $error;
	}
}//////


  function eliminaAlumno($id){
	  /*
		Para dar de baja un alumno, debemos todas las claves foraneas dentro otras tablas como:
		horarioA y cita.
		 En este caso de la tabla horarioA primero eliminamos todas las llaves foraneas
        de sus horario registrados y despues se elimina.

        En el caso de las citas primero eliminamos la cita y despues implementamos esta funcion.

	  */

      global $mysqli;

      $stmt = $mysqli->prepare("DELETE FROM horarioA where id_alumnoFK=?");
      $stmt->bind_param('i',$id);

      if ($stmt->execute()){

			$stmt2 = $mysqli->prepare("DELETE FROM alumno where id_alumno=?");
			$stmt2->bind_param('i',$id);
  
			if ($stmt2->execute()){
		  		return true;
			} else {
		  		return false;
			}
      } else {
        return false;
      }
   }///

   function modificarAlumno($id,$nombre,$apellidoPaterno,$apellidoMaterno,$noSemestre,$celular,$telefono,$facultad,$correoPersonal){
	global $mysqli;

    if($stmtU = $mysqli->prepare('UPDATE alumno SET nombreA=?,apellido_maternoA=?,apellido_paternoA=?,correo_personalA=?,telefonoA=?,celularA=?,facultad_origenA=?,semestreA=? WHERE id_alumno=?')){
      $stmtU->bind_param('ssssssssi',$nombre,$apellidoMaterno,$apellidoPaterno,$correoPersonal,$telefono,$celular,$facultad,$noSemestre,$id);

      if ( $stmtU->execute() ){
        	return true;
      } else {
        return false;
      }
    }else{
      $error=$mysqli->errno.''.$mysqli->error;
      echo $error;
    }

  }///

   function HorariosAlumno($diaSemana,$Hora){
	global $mysqli;
  
	if($stmt = $mysqli->prepare('INSERT INTO horarioA(diaSemanaA, horaA, id_alumnoFK) VALUES (?,?,(SELECT id_alumno FROM alumno order by id_alumno desc limit 1))')){
	  $stmt->bind_param('ss',$diaSemana,$Hora);
  
	  if ( $stmt->execute() ){
		return true;
	  } else {
		return false;
	  }
	}else{
	  $error=$mysqli->errno.''.$mysqli->error;
	  echo $error;
	}
  }



 ?>