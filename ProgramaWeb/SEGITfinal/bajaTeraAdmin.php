<?php
session_start();
require 'funts/conexionBD.php';
require 'funts/funcionTerapeuta.php';
$id = $_GET['id_terapeuta'];
if(eliminaTerapeuta($id)==true){
    if($_SESSION['tipo_usuario']==1){
        header("location:ELITera.php");
    }else if($_SESSION['tipo_usuario']==3){
        header("location:ELITeraCor.php");
    }
        
        
}else{
	echo "Error al eliminar al terapeuta. Puede que ya tenga una terapea asignanda.\n";
	echo " <br> <a href='ELITera.php'> Regresar </a>";
}
?>