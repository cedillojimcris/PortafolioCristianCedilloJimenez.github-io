<?php
    session_start();
    require 'funts/conexionBD.php';
    require 'funts/funcionTerapeuta.php';

    $id=$_POST['idTera'];
    $nombre=$_POST['nombreT'];
    $apellidoPaterno=$_POST['apellidoPaT'];
    $apellidoMaterno=$_POST['apellidoMaT'];
    $telefono=$_POST['telefonoT'];
    $celular=$_POST['celularT'];
    $correoEscolar=$_POST['correoEscolarT'];
    $correoPersonal=$_POST['correoPerT'];
    if($_SESSION['tipo_usuario']==1){//si es adiministrador
        $coordinadorTerapeuta=$_POST['coordinadorT'];
        if(modificarT1($id,$nombre,$apellidoMaterno,$apellidoPaterno,$telefono,$celular,$correoEscolar,$correoPersonal,$coordinadorTerapeuta)==true){
            header("location:tablaModT.php");
        }else{
            echo "erro al modificar";
        } 
    }else{//si es cooordinador de terpautas
        if(modificarT2($id,$nombre,$apellidoMaterno,$apellidoPaterno,$telefono,$celular,$correoEscolar,$correoPersonal)==true){
            header("location:tablaModTcord.php");
        }else{
            echo "erro al modificar";
        }
    }
?>