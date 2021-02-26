<?php

session_start();
session_unset(); //se liberan todas las variables de sesión actualmente registradas. 
session_destroy();
header("location: login.php");
 ?>
