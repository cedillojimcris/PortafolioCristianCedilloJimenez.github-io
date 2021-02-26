<?php

  $regisUsuario=false;//no se registro un coordinador de facultad

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
}

function CoordinadorExisteN($nombre){
		global $mysqli;

		if($stmt = $mysqli->prepare('SELECT nombre FROM coordinador_facultad WHERE nombre LIKE ? LIMIT 1')){
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

  function CoordinadorExisteAP($apellidoPaterno){
  		global $mysqli;

  		if($stmt = $mysqli->prepare('SELECT apellido_paterno FROM coordinador_facultad WHERE apellido_paterno LIKE ? LIMIT 1')){
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

    function CoordinadorExisteAM($apellidoMaterno){
    		global $mysqli;

    		if($stmt = $mysqli->prepare('SELECT apellido_materno FROM coordinador_facultad WHERE apellido_materno LIKE ? LIMIT 1')){
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


  function emailExiste($email){
    global $mysqli;

    $stmt = $mysqli->prepare('SELECT * FROM usuario WHERE correo_personal=? LIMIT 1');
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
  }//fin

  function usuarioExiste($nombreUsuario){
  		global $mysqli;

  		if($stmt = $mysqli->prepare('SELECT id_usuario FROM usuario WHERE nombre_usuario LIKE ? LIMIT 1')){
        $stmt->bind_param('s',$nombreUsuario);
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

    }///

  function isNullDatos($nombre,$apellidoPaterno,$apellidoMaterno,$telefono,$celular,$facultad){

    //valida que los campos del formulario no esten vacios
    if(strlen(trim($nombre)) < 1 || strlen(trim($apellidoPaterno)) < 1 || strlen(trim($apellidoMaterno)) < 1 || strlen(trim($telefono)) < 1 || strlen(trim($celular)) < 1 || strlen(trim($facultad)) < 1){
      return true;// alguno de los  es nulo
    }else{
      return false; // llenos
    }//finsi
  }//fin_funcion



  function registraCoordinador($nombre,$apellidoMaterno,$apellidoPaterno, $telefono, $celular, $facultad){

    global $mysqli;


    $stmt = $mysqli->prepare("INSERT INTO coordinador_facultad(nombre , apellido_materno, apellido_paterno, telefono, celular, facultad_procedencia,id_usuarioFK) VALUES(?,?,?,?,?,?,(SELECT id_usuario FROM usuario order by id_usuario desc limit 1))");
    $stmt->bind_param('ssssss',$nombre,$apellidoMaterno,$apellidoPaterno, $telefono, $celular, $facultad);

    if ($stmt->execute()){
      return true;
      $regisUsuario=true;//se registro un cordinador de facultad
    } else {
      return false;
    }
  }

  function eliminaCoordFacultad($id){
    ///esta funcion elimina al coordinador de facultad y a su usuario, que registro cuando se dio de alta;
      global $mysqli;
      //se obtiene el id del su usuario
      if($stmt = $mysqli->prepare("SELECT id_usuarioFK FROM coordinador_facultad WHERE id_coordinador_facultad=?")){
        $stmt->bind_param('i',$id);
        if($stmt->execute()){// si se realiza la consulta
          $stmt->store_result();
          //se guarda ese id de usuario en la variable $idUsuarioFK;
          $stmt->bind_result($idUsuarioFK);
        	$stmt->fetch();
          //se elimina el coordinador de facultad
          $stmt1 = $mysqli->prepare("DELETE FROM coordinador_facultad where id_coordinador_facultad=?");
          $stmt1->bind_param('i',$id);
          if($stmt1->execute()){//si se elimina el coordinador
            //se elimina su usuario del coordinador de facultad
            $stmt2 = $mysqli->prepare("DELETE FROM usuario where id_usuario=?");
            $stmt2->bind_param('i',$idUsuarioFK);
              if($stmt2->execute()){// si se elimina el usuario del coordinador de facultad
                  return true;

              } else {
                  return false;
              }
          }//if eliminacion de coordinador_facultad
        }//if select
      }else{
    	  $error=$mysqli->errno.''.$mysqli->error;
    	  echo $error;
      }

  }/////

  function isEmail($email){
    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
      return true;
      } else {
      return false;
    }
  }
  

  function modificarCF($id,$nombre,$apellidoMaterno,$apellidoPaterno,$telefono,$celular,$facultad){
    global $mysqli;

    if($stmt = $mysqli->prepare('UPDATE coordinador_facultad SET nombre=?,apellido_materno=?,apellido_paterno=?,telefono=?,celular=?,facultad_procedencia=? WHERE id_coordinador_facultad=?')){
      $stmt->bind_param('ssssssi',$nombre,$apellidoMaterno,$apellidoPaterno,$telefono,$celular,$facultad,$id);

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

  function modificarCFu($id,$nombre,$apellidoMaterno,$apellidoPaterno,$telefono,$celular,$facultad,$correoPernsonal,$idUsuario){
    global $mysqli;

    if(emailExiste($correoPernsonal)==false){

      if($stmt = $mysqli->prepare('UPDATE coordinador_facultad SET nombre=?,apellido_materno=?,apellido_paterno=?,telefono=?,celular=?,facultad_procedencia=? WHERE id_coordinador_facultad=?')){
        $stmt->bind_param('ssssssi',$nombre,$apellidoMaterno,$apellidoPaterno,$telefono,$celular,$facultad,$id);

        if ( $stmt->execute() ){
          if($stmtU = $mysqli->prepare('UPDATE usuario SET correo_personal=? WHERE id_usuario=?')){
              $stmtU->bind_param('si',$correoPernsonal,$idUsuario);
        
              if ( $stmtU->execute() ){
                return true;
              } else {
                return false;
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

  }else{
    echo "El correo ya existe.";
  }

  }///


 ?>