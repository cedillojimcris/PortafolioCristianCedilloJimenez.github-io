<?php
include_once 'funts/usuario_sesion.php';
include_once 'funts/usuario.php';

$usuarioSecion = new UsuaruioSesion();
$usuario= new usuario();

if(isset($_SESSION['usuariofusuariof'])){
  echo 'hay sesion';

}else if(isset($_POST['usuariof']) && isset($_POST['contrasena'])){
  //echo 'validacioj de contraseña';
  $usuarioForm=$_POST['usuariof'];
  $contraseñaForm=$_POST['contrasena'];

  if($usuario->existeUsuario($usuarioForm,$contraseñaForm)==true){
    //echo "usuario validado";
    $usuarioSecion->setCourrentUsuario($usuarioForm);

    $usuario->setusuario($usuarioForm);
    $tipoU = $usuario->getTipoUsurio();
    if($tipoU==1){
      include_once 'homeAdmin.php';
    }else{
      echo "no es ADMINISTRADOR";
    }

  }else{
    //echo "nombre incorr3ecto";
    $erroLogin="<p>Nombre/correo incorrecto y/o contraseña incorrecta</p>";
    include_once 'login.php';
  }

}else{
  //echo 'login';
  include_once 'login.php';
}


 ?>
