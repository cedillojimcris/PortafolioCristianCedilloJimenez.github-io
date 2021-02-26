<?php
require 'funts/conexionBD.php';
require 'funts/funcionFacultad.php';
$id = $_GET['id_coordinador_facultad'];
if(eliminaCoordFacultad($id)==true){
  header("location:ELICoord.php");
}else{
  echo "erro al eliminar";
}

?>
