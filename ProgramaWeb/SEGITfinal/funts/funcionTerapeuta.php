<?php

function isNull($nombre,$apellidoPaterno,$apellidoMaterno,$telefono,$celular,$correoPersonal){
    if( strlen(trim($nombre)) < 1 || strlen(trim($apellidoPaterno)) < 1 || strlen(trim($apellidoMaterno)) < 1 || strlen(trim($telefono)) < 1 || strlen(trim($celular)) < 1  || strlen(trim($correoPersonal)) < 1  ){
        return true;
    } else {
        return false;
    }
}///

  function isEmail($email){
		if (filter_var($email, FILTER_VALIDATE_EMAIL)){
			return true;
			} else {
			return false;
		}
  }//

function resultBlock($errors){
  if(count($errors) > 0){
    echo "<div class='gaps' id='error' class='alert alert-danger' role='alert'>
    <a class='gaps' href='#' onclick=\"showHide('error');\">[X]</a>
    <ul class='gaps'>";
    foreach($errors as $error)
    {
      echo "<li class='gaps'>".$error."</li>";
    }
    echo "</ul>";
    echo "</div>";
  }
}///

function TerapeutaExisteN($nombre){
		global $mysqli;

		if($stmt = $mysqli->prepare('SELECT nombreT FROM terapeuta WHERE nombreT LIKE ? LIMIT 1')){
      $stmt->bind_param('s',$nombre);
  		$stmt->execute();
  		$stmt->store_result();
  		$num = $stmt->num_rows;
  		$stmt->close();

  		if ($num > 0){
  			return true;
  		} else {
  			return false;
  		}
    }else{
  	  $error=$mysqli->errno.''.$mysqli->error;
  	  echo $error;
    }

  }///funcion

  function TerapeutaExisteAP($apellidoPaterno){
  		global $mysqli;

  		if($stmt = $mysqli->prepare('SELECT apellido_paternoT FROM terapeuta WHERE apellido_paternoT LIKE ? LIMIT 1')){
        $stmt->bind_param('s',$apellidoPaterno);
    		$stmt->execute();
    		$stmt->store_result();
    		$num = $stmt->num_rows;
    		$stmt->close();

    		if ($num > 0){
    			return true;
    		} else {
    			return false;
    		}
      }else{
    	  $error=$mysqli->errno.''.$mysqli->error;
    	  echo $error;
      }

    }///funcion

    function TerapeutaExisteAM($apellidoMaterno){
    		global $mysqli;

    		if($stmt = $mysqli->prepare('SELECT apellido_maternoT FROM terapeuta WHERE apellido_maternoT LIKE ? LIMIT 1')){
          $stmt->bind_param('s',$apellidoMaterno);
      		$stmt->execute();
      		$stmt->store_result();
      		$num = $stmt->num_rows;
      		$stmt->close();

      		if ($num > 0){
      			return true;
      		} else {
      			return false;
      		}
        }else{
      	  $error=$mysqli->errno.''.$mysqli->error;
      	  echo $error;
        }

      }///funcion

      function registraTerapeutaA($nombre,$apellidoMaterno,$apellidoPaterno, $correoPersonal, $coreoEscolar, $telefono, $celular,$coordinadorTerapeuta){

        global $mysqli;


        if($stmt = $mysqli->prepare("INSERT INTO terapeuta(nombreT , apellido_maternoT, apellido_paternoT, correo_escolarT, correo_personalT, telefonoT, celularT,id_coorTerapeutaFK) VALUES(?,?,?,?,?,?,?,?)")){
          $stmt->bind_param('sssssssi',$nombre,$apellidoMaterno,$apellidoPaterno, $coreoEscolar, $correoPersonal, $telefono, $celular, $coordinadorTerapeuta);

          if ($stmt->execute()){
            return true;
          } else {
            return false;
          }
        }else{
          $error=$mysqli->errno.''.$mysqli->error;
          echo $error;
        }
        
      }////


      function registraTerapeutaC($nombre,$apellidoMaterno,$apellidoPaterno, $correoPersonal, $coreoEscolar, $telefono, $celular,$coordinadorTerapeuta){

        global $mysqli;


        if($stmt = $mysqli->prepare("INSERT INTO terapeuta(nombreT , apellido_maternoT, apellido_paternoT, correo_escolarT, correo_personalT, telefonoT, celularT,id_coorTerapeutaFK) VALUES(?,?,?,?,?,?,?,?)")){
          $stmt->bind_param('sssssssi',$nombre,$apellidoMaterno,$apellidoPaterno, $coreoEscolar, $correoPersonal, $telefono, $celular, $coordinadorTerapeuta);

          if ($stmt->execute()){
            return true;
          } else {
            return false;
          }
        }else{
          $error=$mysqli->errno.''.$mysqli->error;
          echo $error;
        }
        
      }////

    function eliminaTerapeuta($id){
      /*para dar de baja un terapeuta debemos eliminar todas sus claves foraneas
        dentro de otras tablas como(horarioT,cita).
        En este caso de la tabla horarioT primero eliminamos todas las llaves foraneas
        de sus horario registrados y despues se elimina.

        En el caso de las citas primero eliminamos la cita y despues implementamos esta funcion.
      */
        global $mysqli;

        $stmt1 = $mysqli->prepare("DELETE FROM horarioT where id_terapeutaFK=?");
        $stmt1->bind_param('i',$id);
        if ($stmt1->execute()) {
          
          $stmt2 = $mysqli->prepare("DELETE FROM terapeuta where id_terapeuta=?");
          $stmt2->bind_param('i',$id);

          if ($stmt2->execute()){
            return true;
          } else {
           return false;
          }
        }else{
          return false;
        }

        
     }

     function modificarT1($id,$nombre,$apellidoMaterno,$apellidoPaterno,$telefono,$celular,$correoEscolar,$correoPersonal,$coordinadorTerapeuta){
      global $mysqli;
    
      if($stmt = $mysqli->prepare('UPDATE terapeuta SET nombreT=?,apellido_maternoT=?,apellido_paternoT=?,correo_escolarT=?,correo_personalT=?,telefonoT=?,celularT=?,id_coorTerapeutaFK=? WHERE id_terapeuta=?')){
        $stmt->bind_param('sssssssii',$nombre,$apellidoMaterno,$apellidoPaterno,$correoEscolar,$correoPersonal,$telefono,$celular,$coordinadorTerapeuta,$id);
    
        if ( $stmt->execute() ){
          return true;
        } else {
          return false;
        }
      }else{
        $error=$mysqli->errno.''.$mysqli->error;
        echo $error;
      }
    
    }///

    function modificarT2($id,$nombre,$apellidoMaterno,$apellidoPaterno,$telefono,$celular,$correoEscolar,$correoPersonal){
      global $mysqli;
    
      if($stmt = $mysqli->prepare('UPDATE terapeuta SET nombreT=?,apellido_maternoT=?,apellido_paternoT=?,correo_escolarT=?,correo_personalT=?,telefonoT=?,celularT=? WHERE id_terapeuta=?')){
        $stmt->bind_param('sssssssi',$nombre,$apellidoMaterno,$apellidoPaterno,$correoEscolar,$correoPersonal,$telefono,$celular,$id);
    
        if ( $stmt->execute() ){
          return true;
        } else {
          return false;
        }
      }else{
        $error=$mysqli->errno.''.$mysqli->error;
        echo $error;
      }
    
    }///

    function HorariosTerapeuta($diaSemana,$Hora){
      global $mysqli;
    
      if($stmt = $mysqli->prepare('INSERT INTO horarioT(diaSemanaT, horaT, id_terapeutaFK) VALUES (?,?,(SELECT id_terapeuta FROM terapeuta order by id_terapeuta desc limit 1))')){
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