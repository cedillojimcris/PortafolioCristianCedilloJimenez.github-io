<?php
    require 'funts/conexionBD.php';
    require 'funts/funcionFacultad.php';

    $id=$mysqli->real_escape_string($_POST['idCoorFac']);
    $idUsuario=$mysqli->real_escape_string($_POST['idUsuario']);
    $nombre=$mysqli->real_escape_string($_POST['nombreCF']);
    $apellidoPaterno=$mysqli->real_escape_string($_POST['apellidoPaCF']);
    $apellidoMaterno=$mysqli->real_escape_string($_POST['apellidoMaCF']);
    $telefono=$mysqli->real_escape_string($_POST['telefonoCF']);
    $celular=$mysqli->real_escape_string($_POST['celularCF']);
    $facultad=$mysqli->real_escape_string($_POST['facultadCF']);
    $correoPernsonal=$mysqli->real_escape_string($_POST['correoPerCT']);
    $opt=$_POST['Conocido1'];
    if(isset($opt)){
        if(isEmail($correoPernsonal)==true){
            if(modificarCFu($id,$nombre,$apellidoMaterno,$apellidoPaterno,$telefono,$celular,$facultad,$correoPernsonal,$idUsuario)==true){
                header("location:tablaModCF.php");
            }else{
                echo "erro al modificar";
            }
        }else{
            echo "Correo no valido";
        }
    }else{
        if(modificarCF($id,$nombre,$apellidoMaterno,$apellidoPaterno,$telefono,$celular,$facultad)==true){
            header("location:tablaModCF.php");
        }else{
            echo "erro al modificar";
        }
    }


?>
