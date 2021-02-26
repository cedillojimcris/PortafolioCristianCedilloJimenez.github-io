<?php
require 'funts/conexionBD.php';
require 'funts/funcionCoorTerapeutas.php';

$id = $_GET['id_coorTerapeuta'];

if(eliminaCoordTerapeuta($id)==true){
  header("location:ELICoordinadorT.php");
}else{
  echo '
  <!DOCTYPE HTML>
  <html>
  <head>
  <title>Error al eliminar</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
  <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  
  <!-- Los iconos tipo Solid de Fontawesome-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
  <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>


<link href="css/style.css" rel="stylesheet" type="text/css" /><link href="css/style.css" rel="stylesheet" type="text/css" />

  </head>
  <body>
  <!--background-->
   <h1>   </h1>
 
 <div class="bg-agile">
    <div align="center" class="book-appointment">
        <h1 style="color:white" ;> <pre>SEGIT TUTORIA UAEMEX</pre></h1>
 
           <h2>ERROR AL ELIMINAR EL COORDINADOR</h2>
               <p > Para eliminar al coordinador de terapeuta, primero debe eliminar sus terapeutas a cargo.</p>
               <br>
          <div class="clear"></div>
      <div class="clear"></div>
                  
                    <a type="submit" class="btn btn-dark" href="ELITera.php" role="button"><i class="fas fa-arrow-alt-circle-left"></i> Eliminar Terapeutas</a>
                    <br>
                    <br>
                    <a type="submit" class="btn btn-dark" href="ELICoordinadorT.php" role="button"><i class="fas fa-arrow-alt-circle-left"></i> Cancelar</a>
 
      
    </div>
 </div>
  </body>
  </html>';
}

?>
