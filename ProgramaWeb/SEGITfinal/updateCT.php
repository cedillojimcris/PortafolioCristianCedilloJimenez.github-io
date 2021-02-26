<?php
    require 'funts/conexionBD.php';
    require 'funts/funcionCoorTerapeutas.php';

    $id_CT=$mysqli->real_escape_string($_POST['idCoorTera']);
    $idUsuario=$mysqli->real_escape_string($_POST['idUsuario']);
    $nombre=$mysqli->real_escape_string($_POST['nombreCT']);
    $apellidoPaterno=$mysqli->real_escape_string($_POST['apellidoPaCT']);
    $apellidoMaterno=$mysqli->real_escape_string($_POST['apellidoMaCT']);
    $telefono=$mysqli->real_escape_string($_POST['telefonoCT']);
    $celular=$mysqli->real_escape_string($_POST['celularCT']);
    $facultad=$mysqli->real_escape_string($_POST['facultadCT']);
    $correoPernsonal=$mysqli->real_escape_string($_POST['correoPerCT']);
    $opt=$_POST['Conocido1'];
    if(isset($opt)){
        if(isEmail($correoPernsonal)==true){
            if(modificarCT2($id_CT,$nombre,$apellidoMaterno,$apellidoPaterno,$telefono,$celular,$facultad,$correoPernsonal,$idUsuario)==true){
                header("location:tablaModCT.php");
            }else{
                echo "erro al modificar";
            } 
        }else{
            echo "Correo no valido";
        }
    }else{
       if(modificarCT($id_CT,$nombre,$apellidoMaterno,$apellidoPaterno,$telefono,$celular,$facultad)==true){
            header("location:tablaModCT.php");
        }else{
            echo "erro al modificar";
        } 
    }
    
?>