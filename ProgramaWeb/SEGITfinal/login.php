<?php

  require 'funts/conexionBD.php';
  require 'funts/funcionLogin.php';

   session_start(); //Iniciar una nueva sesión o reanudar la existente
   $errors=array();


	if(!empty($_POST)){
		$usuarioForm=$mysqli->real_escape_string($_POST['usuario']);
        $contraseñaForm =$mysqli->real_escape_string($_POST['contrasena']);
        $recaptcha = $_POST["g-recaptcha-response"];

        if($recaptcha==null){
            $errors[]='<b> Verifica el reCAPTCHA</b>';
        }

        if(isNullLogin($usuarioForm, $contraseñaForm)){
            $errors[]='<b> Debe llenar todos los campos</b>';
        }

        if(count($errors) == 0){
            $url = 'https://www.google.com/recaptcha/api/siteverify';
	        $data = array(
		            'secret' => '6LcMe-EUAAAAAISB-EUNsb1u_1FPDZZy3DKp7hpp',
		            'response' => $recaptcha
	                );
	        $options = array(
		                'http' => array (
			            'method' => 'POST',
			            'content' => http_build_query($data))
	                    );
            $context  = stream_context_create($options);
	        $verify = file_get_contents($url, false, $context);
            $captcha_success = json_decode($verify);

            if ($captcha_success->success) {
                if(usuarioExiste($usuarioForm)){
                    $errors[]=login($usuarioForm,$contraseñaForm);
                }else{
                    $errors[]='<b> El nombre de usuario o correo electr&oacute;nico no existen.</b>';
                }
            }
        }

    
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

    <title>INICIO DE SESION</title>
    <meta charset="UTF-8">
    <!--reCAPTCHA-->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>


    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />

    <!--//fonts-->
</head>

<body>
    <!--background-->
    <div class="modal-dialog  text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 imagen-user"> <img src="images/login.png" /></div>
                <div class="col-12">
                    <h3>Inicio de Sesion</h3>
                    <h1></h1>
                </div>

                <form class="col-12" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

                    <div id="resultados_ajax" class="gaps"></div>


                    <div class="form-group" id="user-form">
                        <input type="text" class="form-control" name="usuario"
                            placeholder="Tu correo personal &oacute; tu nombre de usuario" />
                    </div>

                    <div class="form-group" id="password-form">
                        <input type="password" class="form-control" name="contrasena" placeholder="Contraseña" />
                    </div>
                    <div class="g-recaptcha" data-sitekey="6LcMe-EUAAAAAIqq09QTt9_PBh3XWczlDUw9Mb3H"></div>
                    
                    <br>
                    <div class="form-group">
                        <?php if($errors){
                echo resultBlock($errors); 
              }?>
                    </div>

                    <button type="submit" class="btn btn-dark"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                    </button>

                    <br>
                    <a type="submit" class="btn btn-dark" href="index.php" role="button"><i
                            class="fas fa-arrow-alt-circle-left"></i> REGRESAR </a>
                </form>
                <br>
                <div class="col-12 linkL">
                    <br>
                    <a href="recupera.php">¿Se te olvid&oacute; tu contraseña?</a>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>

</body>

</html>