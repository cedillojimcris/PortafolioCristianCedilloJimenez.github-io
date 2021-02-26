<?php
require 'funts/conexionBD.php';
require 'funts/funcionAlumnos.php';
$id = $_GET['id_alumno'];
if(eliminaAlumno($id)==true){
  header("location:ELIAlumno.php");
}else{
  echo "<p>Error al eliminar</p>";
}

?>
