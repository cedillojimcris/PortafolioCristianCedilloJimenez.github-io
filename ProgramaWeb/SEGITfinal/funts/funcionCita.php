<?php

function resultBlock($errors){
    if(count($errors) > 0){
      echo "<div class='gaps' id='error' class='alert alert-danger' role='alert'>
      <a class='gaps' href='#' onclick=\"showHide('error');\">[X]</a>
      <ul class='gaps'>";
      foreach($errors as $error){
        echo "<li class='gaps'>".$error."</li>";
      }
      echo "</ul>";
      echo "</div>";
    }
  }////////////////fin

  function DatosNulos($estadoCita,$estadoAlumno,$diaCita,$horaCita,$direccionCita){

    //valida que los campos del formulario no esten vacios
    if(strlen(trim($estadoCita)) < 1 || strlen(trim($estadoAlumno)) < 1 || strlen(trim($diaCita)) < 1 || strlen(trim($horaCita)) < 1 || strlen(trim($direccionCita)) < 1 ){
      return true;// alguno de los  es nulo
    }else{
      return false; // llenos
    }//finsi
  }//fin_funcion

  function lastSession($id){
    global $mysqli;

    $stmt = $mysqli->prepare("UPDATE cita SET fechaGestionCita=NOW() WHERE id_cita = ?");
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $stmt->close();
}////

    function agendarCita($estadoCita,$estadoAlumno,$diaCita,$horaCita,$direccionCita,$idAlumno,$id_terapeuta){
        global $mysqli;
        if($stmt = $mysqli->prepare("INSERT INTO cita(estadoCita , estadoAlumno, diaCita, horaCita, direccionCita,fechaGestionCita, id_alumnoFK, id_terapeutaFK) VALUES(?,?,?,?,?,NOW(),?,?)")){
            $stmt->bind_param('sssssii',$estadoCita,$estadoAlumno,$diaCita,$horaCita,$direccionCita,$idAlumno,$id_terapeuta);

            if ($stmt->execute()){
                return true;
            } else {
                return false;
            }
        }else{
            $error=$mysqli->errno.''.$mysqli->error;
            echo $error;
        }
    }

    function actualizarAlumno($idAlumno){
        global $mysqli;

		    $stmt = $mysqli->prepare("UPDATE alumno SET estado_cita =1 WHERE id_alumno = ?");
        $stmt->bind_param('i', $idAlumno);
        
		    if($stmt->execute()){
            $stmt->close();
            return true;
        }else{
            return false;
        }
		
    }////
    function actualizarHorarioTerapeuta($id_horarioT){
      global $mysqli;

      $stmt = $mysqli->prepare("UPDATE horarioT SET estado_horario =1 WHERE id_horarioT = ?");
      $stmt->bind_param('i', $id_horarioT);
      
      if($stmt->execute()){
          $stmt->close();
          return true;
      }else{
          return false;
      }
  
  }////

?>