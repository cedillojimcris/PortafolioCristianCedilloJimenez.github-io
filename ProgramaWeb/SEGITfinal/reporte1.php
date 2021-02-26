<?php

$db = mysqli_connect('localhost','root','','citas') or die('Error de conexion');



$result_id = mysqli_query($db, "SELECT id_persona FROM persona  "); 
$result_nombre = mysqli_query($db, "SELECT nombre FROM persona  "); 



$extraido_id = mysqli_fetch_array($result_id);
$extraido_nombre = mysqli_fetch_array($result_nombre);



$file = fopen("archivo.txt", "w");
fwrite($file, "Esto es una nueva linea de texto" . PHP_EOL);
fwrite($file, "Otra más" . PHP_EOL);
fclose($file);

?>

<!DOCTYPE HTML>


<html>
    

    <head>

    <link rel="apple-touch-icon" sizes="57x57" href="images/iconos/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="images/iconos/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/iconos/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="images/iconos/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/iconos/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/iconos/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="images/iconos/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/iconos/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/iconos/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="images/iconos/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/iconos/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/iconos/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/iconos/favicon-16x16.png">
    <link rel="manifest" href="images/iconos/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="images/iconos/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

       <title>BAJAS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Medical Appointment Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs Sign up Web Templates, 
 Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
<link href="css/style.css" rel='stylesheet' type='text/css' /><link href="css/style.css" rel='stylesheet' type='text/css' />
<!--fonts--> 
<link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
<!--//fonts--> 
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="https://kit.fontawesome.com/9c7010aff9.js" crossorigin="anonymous"></script>
    </head>
<body>

<!--background-->

 <h1> </h1>

    <div class="bg-agile">
        
        
    <div class="book-appointment">

    <h1 style="color:white";> BAJAS <h1> 

        <h2></h2>   
                    
                    <form action="EliminarCoord.php" method="POST"  >
                 
                 

            <div id="resultados_ajax" class="gaps"></div>
            <div class="left-agileits-w3layouts same">
                        <tr>

                             <h4 style="color:white";> Buscar por No.Cuenta <h4> 

                            <form>
                          <div>
                          <input type="search" id="miBusqueda" name="q">
                             <button>Buscar </button>
                            </div>
                        </form>

                             <h4 style="color:white";> <?php echo "-----------------------------------------------" ?> </h4>
                              <h4 style="color:white";> <?php echo "-----------------------------------------------" ?> </h4>

                                 <?php
                                while ($extraido_id=mysqli_fetch_array($result_id) and $extraido_nombre=mysqli_fetch_array($result_nombre)){
                                
                            ?>

                          
                               
                                <h4 style="color:white";> <label>No. de Cuenta:</label> <?php  echo  $extraido_id[0] ?>   </h4> 
                                <h4 style="color:white";>   <label>Nombre: </label> <?php echo $extraido_nombre[0] ?>  </h4> 
                                
                              

                             
                                 <h4 style="color:white";> <?php echo "-----------------------------------------------" ?> </h4>
                               



                 
                        <input type="submit"  value="ELIMINAR"  style="margin-left: 10px "/>
                                 <h4 style="color:white";> <?php echo "-----------------------------------------------" ?> </h4>



                            <div class="right-agileinfo same">
                                



            <div class="clear"></div>
                         
                          </div>
            <div class="clear"></div>
                         
                          </div>
            <div class="clear"></div>
                <div class="right-agileinfo same">      

   
                                           <?php
                              
                }
            
?>

                     


             
            </form>


        
    </body>

</html>

