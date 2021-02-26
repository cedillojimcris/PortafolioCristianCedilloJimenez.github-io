<?php


function resultBlock($errors){
  if(count($errors) > 0)
{
    echo "<div class='form-group' >
    <a class='form-group' href='#'<i class='fas fa-exclamation-circle'></i></a>
    <ul class='form-group'>";
    foreach($errors as $error)
    {
      echo "<li class='form-group'><i class='fas fa-exclamation-circle'></i>".$error."</li>";
    }
    echo "</ul>";
    echo "</div>";
  }
}

function isNullLogin($usuario, $password){

  //valida que los campos del formulario no esten vacios
  if(strlen(trim($usuario)) < 1 || strlen(trim($password)) < 1){
    return true;// alguno de los 2 es nulo
  }else{
    return false; // llenos
  }//finsi
}//fin_funcion

function usuarioExiste($usuario){
		global $mysqli;

		if($stmt = $mysqli->prepare('SELECT id_usuario FROM usuario WHERE nombre_usuario=? || correo_personal=? LIMIT 1')){
      $stmt->bind_param('ss',$usuario,$usuario);
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

  function emailExiste($email){
		global $mysqli;

		$stmt = $mysqli->prepare("SELECT id_usuario FROM usuario WHERE correo_personal = ? LIMIT 1");
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
  }///

  function lastSession($id){
		global $mysqli;

		$stmt = $mysqli->prepare("UPDATE usuario SET last_session=NOW(),password_request=0 WHERE id_usuario = ?");
		$stmt->bind_param('s', $id);
		$stmt->execute();
		$stmt->close();
	}////


function login($usuariof, $password){
  //valida si el inicio de sesion
  global $mysqli;

  if($stmt=$mysqli->prepare("SELECT id_usuario, id_tipoUsuarioFK, contrasena,nombre_usuario,correo_personal FROM usuario WHERE nombre_usuario = ? || correo_personal = ? LIMIT 1")){
	 $stmt->bind_param('ss', $usuariof,$usuariof);
  	$stmt->execute();
  	$stmt->store_result();
  	$rows = $stmt->num_rows;
  }else{
	  $error=$mysqli->errno.''.$mysqli->error;
	  echo $error;
  }

  if($rows > 0) {

	$stmt->bind_result($id,$id_tipo,$contra,$nomU,$correoPer);
	$stmt->fetch();


      $validaPassw = password_verify($password, $contra);

      if($validaPassw){//verifica las contraeñas que sean correctas
          if($nomU==$usuariof || $correoPer==$usuariof){//verifica el nombre de usuario o el correo personal del usuario
            lastSession($id);
            //a las variables de sesion le asignamos las variables de la consulta
            $_SESSION['id_usuario'] = $id;
			$_SESSION['tipo_usuario'] = $id_tipo;
			$_SESSION['nombreUsu'] = $nomU;

            header("location: welcome.php");
          }else{
              $errors = " El nombre de usuario o correo electr&oacute;nico no existen</p>";
        }

      } else {
        $errors = " La contrase&ntilde;a es incorrecta";
      }
    } else {
      $errors = " El nombre de usuario o correo electr&oacute;nico no existe</p>";
  }
  return $errors;
}//fin funcion

function hashPassword($password){
		$hash = password_hash($password, PASSWORD_DEFAULT);
		return $hash;
	}///

  function isEmail($email){
		if (filter_var($email, FILTER_VALIDATE_EMAIL)){
			return true;
			} else {
			return false;
		}
  }///

  function getValor($campo, $campoWhere, $valor){
		global $mysqli;

		$stmt = $mysqli->prepare("SELECT $campo FROM usuario WHERE $campoWhere = ? LIMIT 1");
		$stmt->bind_param('s', $valor);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;

		if ($num > 0)
		{
			$stmt->bind_result($_campo);
			$stmt->fetch();
			return $_campo;
		}
		else
		{
			return null;
		}
	}///

  function generateToken(){
		$gen = md5(uniqid(mt_rand(), false));
		return $gen;
	}/////


  function generaTokenPass($user_id){
		global $mysqli;

		$token = generateToken();

		$stmt = $mysqli->prepare("UPDATE usuario SET token_password=?, password_request=1 WHERE id_usuario = ?");
		$stmt->bind_param('ss', $token, $user_id);
		$stmt->execute();
		$stmt->close();

		return $token;
	}///

  function enviarEmail($email, $nombre, $asunto, $cuerpo){

		require_once 'PHPMailer/PHPMailerAutoload.php';

		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->SMTPDebug=SMTP::DEBUG_SERVER;
		$mail­->CharSet= 'UTF­8';
		$mail­->Encoding = 'quoted­printable';
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls'; 
		$mail->Host = 'smtp.gmail.com'; //uaemex.com.mx
		$mail->Port = 587; 


		$mail->Username = 'uaemexsegit@gmail.com'; 
		$mail->Password = 'UadAmiEnisMtraEdorX$20'; 

		$mail->setFrom('uaemexsegit@gmail.com', 'SEGIT');
		$mail->addAddress($email, $nombre);
		$mail­->CharSet= 'UTF­8';
		$mail­->Encoding = 'quoted­printable';
		$mail->Subject = $asunto;
		$mail->Body    = $cuerpo;
		
		$mail->IsHTML(true);

		if($mail->send()){
			return true;
		}else{
			return false;
			echo "Error al enviar el mensaje: " . $mail­->ErrorInfo;
		}
		
	}/////


  function verificaTokenPass($user_id, $token){

		global $mysqli;

		$stmt = $mysqli->prepare("SELECT id_usuario FROM usuario WHERE id_usuario = ? AND token_password = ? AND password_request = 1 LIMIT 1");
		$stmt->bind_param('is', $user_id, $token);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;

		if ($num > 0){
				return true;
	 }else{
			return false;
		}
	}////

  function cambiaPassword($password, $user_id, $token){

		global $mysqli;

		$stmt = $mysqli->prepare("UPDATE usuario SET contrasena = ?, token_password='', password_request=0 WHERE id_usuario = ? AND token_password = ?");
		$stmt->bind_param('sis', $password, $user_id, $token);

		if($stmt->execute()){
			return true;
		} else {
			return false;
		}
	}/////

  function validaPassword($var1, $var2){
    if (strcmp($var1, $var2) !== 0){
      return false;
    } else {
      return true;
    }
  }

 ?>
