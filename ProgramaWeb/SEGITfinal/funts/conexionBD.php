<?php
	$mysqli=new mysqli('localhost','root','','seg');
	$mysqli->set_charset("utf8");
	if(!$mysqli){
		die('error en la conexion'.$mysqli->connect_error);
	}
?>
