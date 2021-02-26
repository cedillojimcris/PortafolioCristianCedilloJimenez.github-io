<?php
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

  function isNullDatos($nombreUsuario,$correoPersonal,$contraseña,$ConfContraseña){

    //valida que los campos del formulario no esten vacios
    if(strlen(trim($nombreUsuario)) < 1 || strlen(trim($correoPersonal)) < 1 || strlen(trim($contraseña)) < 1 || strlen(trim($ConfContraseña)) < 1){
      return true;// alguno de los datos es nulo
    }else{
      return false; // llenos
    }//finsi
  }//fin_funcion



  function registraUsuario($nombreUsuario,$correoPersonal, $contraseña,$tipo_usuario){

    global $mysqli;

    if($stmt = $mysqli->prepare("INSERT INTO usuario(nombre_usuario , correo_personal , contrasena , id_tipoUsuarioFK) VALUES(?,?,?,?)")){
      $stmt->bind_param('sssi', $nombreUsuario,$correoPersonal,$contraseña,$tipo_usuario);

      if ($stmt->execute()){
        //return $mysqli->insert_i;
        return true;
        } else {
        return false;
      }

    }else{
      $error=$mysqli->errno.''.$mysqli->error;
      echo $error;
    }


  }

  function hashPassword($password)
    {
      $hash = password_hash($password, PASSWORD_DEFAULT);
      return $hash;
    }


    function isEmail($email){
      if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
        } else {
        return false;
      }
    }

    function validaPassword($var1, $var2){
      if (strcmp($var1, $var2) !== 0){
        return false;
      } else {
        return true;
      }
    }

 ?>
