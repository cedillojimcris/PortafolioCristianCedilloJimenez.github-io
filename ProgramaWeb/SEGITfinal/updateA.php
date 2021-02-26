<?php
    require 'funts/conexionBD.php';
    require 'funts/funcionAlumnos.php';

    $id=$mysqli->real_escape_string($_POST['id_alumno']);
    $nombre=$mysqli->real_escape_string($_POST['nombreA']);
    $apellidoPaterno=$mysqli->real_escape_string($_POST['apellidoPaA']);
    $apellidoMaterno=$mysqli->real_escape_string($_POST['apellidoMaA']);
    $noSemestre=$mysqli->real_escape_string($_POST['noSemestreA']);
    $celular=$mysqli->real_escape_string($_POST['celularA']);
    $telefono=$mysqli->real_escape_string($_POST['telefonoA']);
    $facultad=$mysqli->real_escape_string($_POST['facultadA']);
    $correoPersonal=$mysqli->real_escape_string($_POST['correoPerA']);

    if(modificarAlumno($id,$nombre,$apellidoPaterno,$apellidoMaterno,$noSemestre,$celular,$telefono,$facultad,$correoPersonal)==true){
        
        header("location:tablaModA.php");
    }else{
        echo $noSemestre;
        echo "error al modficicar.";
    }
    


?>