<?php

  require 'funts/conexionBD.php';
  
  if(empty($_REQUEST['id_cita'])){

	header("location: listaCitas.php"); 

  }else{
   
   $estadoCita = $_REQUEST['estado_cita'];
   $idCita = $_REQUEST['id_cita'];
  
   if($estadoCita == 1){

   $sql = "UPDATE cita SET estadoCita= 'En Atencion' WHERE id_cita = $idCita";  
   $resultado1 = $mysqli->query($sql);
   }
	header("location: listaCitas.php"); 
  }

?>