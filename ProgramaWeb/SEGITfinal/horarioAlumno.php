<?php

  require 'funts/conexionBD.php';
  require 'funts/funcionAlumnos.php';
  $ban=false;
  $HorarioRegistrado="";

    if(isset($_POST['hora1L'])){
       $hora1L=$mysqli->real_escape_string($_POST['horaLunes1']); 
       $dia1=$mysqli->real_escape_string($_POST['lunesHora1']); 
       $HorarioRegistrado=HorariosAlumno($dia1,$hora1L);
       if($HorarioRegistrado != true){
            echo 'error al registrar el horario';
       }
    }
    if(isset($_POST['hora1M'])){
        $hora2L=$mysqli->real_escape_string($_POST['horaMartes1']); 
        $dia2=$mysqli->real_escape_string($_POST['martesHora1']); 
        $HorarioRegistrado=HorariosAlumno($dia2,$hora2L);
        if($HorarioRegistrado != true){
             echo 'error al registrar el horario';
        }
     }

     if(isset($_POST['hora1Mi'])){
        $hora3L=$mysqli->real_escape_string($_POST['horaMiercoles1']); 
        $dia3=$mysqli->real_escape_string($_POST['miercolesHora1']); 
        $HorarioRegistrado=HorariosAlumno($dia3,$hora3L);
        if($HorarioRegistrado != true){
             echo 'error al registrar el horario';
        }
     }
     if(isset($_POST['hora1J'])){
        $hora4L=$mysqli->real_escape_string($_POST['horaJueves1']); 
        $dia4=$mysqli->real_escape_string($_POST['juevesHora1']); 
        $HorarioRegistrado=HorariosAlumno($dia4,$hora4L);
        if($HorarioRegistrado != true){
             echo 'error al registrar el horario';
        }
     }
     if(isset($_POST['hora1V'])){
        $hora5L=$mysqli->real_escape_string($_POST['horaViernes1']); 
        $dia5=$mysqli->real_escape_string($_POST['viernesHora1']); 
        $HorarioRegistrado=HorariosAlumno($dia5,$hora5L);
        if($HorarioRegistrado != true){
             echo 'error al registrar el horario';
        }
     }

//////////////////////////////////////////
     if(isset($_POST['hora2L'])){
        $hora6L=$mysqli->real_escape_string($_POST['horaLunes2']); 
        $dia6=$mysqli->real_escape_string($_POST['lunesHora2']); 
        $HorarioRegistrado=HorariosAlumno($dia6,$hora6L);
        if($HorarioRegistrado != true){
             echo 'error al registrar el horario';
        }
     }
     if(isset($_POST['hora2M'])){
         $hora7L=$mysqli->real_escape_string($_POST['horaMartes2']); 
         $dia7=$mysqli->real_escape_string($_POST['martesHora2']); 
         $HorarioRegistrado=HorariosAlumno($dia7,$hora7L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }
 
      if(isset($_POST['hora2Mi'])){
         $hora8L=$mysqli->real_escape_string($_POST['horaMiercoles2']); 
         $dia8=$mysqli->real_escape_string($_POST['miercolesHora2']); 
         $HorarioRegistrado=HorariosAlumno($dia8,$hora8L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }
      if(isset($_POST['hora2J'])){
         $hora9L=$mysqli->real_escape_string($_POST['horaJueves2']); 
         $dia9=$mysqli->real_escape_string($_POST['juevesHora2']); 
         $HorarioRegistrado=HorariosAlumno($dia9,$hora9L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }
      if(isset($_POST['hora2V'])){
         $hora10L=$mysqli->real_escape_string($_POST['horaViernes2']); 
         $dia10=$mysqli->real_escape_string($_POST['viernesHora2']); 
         $HorarioRegistrado=HorariosAlumno($dia10,$hora10L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }

      //////////////////////////////////////////
     if(isset($_POST['hora3L'])){
        $hora11L=$mysqli->real_escape_string($_POST['horaLunes3']); 
        $dia11=$mysqli->real_escape_string($_POST['lunesHora3']); 
        $HorarioRegistrado=HorariosAlumno($dia11,$hora11L);
        if($HorarioRegistrado != true){
             echo 'error al registrar el horario';
        }
     }
     if(isset($_POST['hora3M'])){
         $hora12L=$mysqli->real_escape_string($_POST['horaMartes3']); 
         $dia12=$mysqli->real_escape_string($_POST['martesHora3']); 
         $HorarioRegistrado=HorariosAlumno($dia12,$hora12L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }
 
      if(isset($_POST['hora3Mi'])){
         $hora13L=$mysqli->real_escape_string($_POST['horaMiercoles3']); 
         $dia13=$mysqli->real_escape_string($_POST['miercolesHora3']); 
         $HorarioRegistrado=HorariosAlumno($dia13,$hora13L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }
      if(isset($_POST['hora3J'])){
         $hora14L=$mysqli->real_escape_string($_POST['horaJueves3']); 
         $dia14=$mysqli->real_escape_string($_POST['juevesHora2']); 
         $HorarioRegistrado=HorariosAlumno($dia14,$hora14L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }
      if(isset($_POST['hora3V'])){
         $hora15L=$mysqli->real_escape_string($_POST['horaViernes3']); 
         $dia15=$mysqli->real_escape_string($_POST['viernesHora3']); 
         $HorarioRegistrado=HorariosAlumno($dia15,$hora15L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }

      //////////////////////////////////////////
     if(isset($_POST['hora4L'])){
        $hora16L=$mysqli->real_escape_string($_POST['horaLunes4']); 
        $dia16=$mysqli->real_escape_string($_POST['lunesHora4']); 
        $HorarioRegistrado=HorariosAlumno($dia16,$hora16L);
        if($HorarioRegistrado != true){
             echo 'error al registrar el horario';
        }
     }
     if(isset($_POST['hora4M'])){
         $hora17L=$mysqli->real_escape_string($_POST['horaMartes4']); 
         $dia17=$mysqli->real_escape_string($_POST['martesHora4']); 
         $HorarioRegistrado=HorariosAlumno($dia17,$hora17L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }
 
      if(isset($_POST['hora4Mi'])){
         $hora18L=$mysqli->real_escape_string($_POST['horaMiercoles4']); 
         $dia18=$mysqli->real_escape_string($_POST['miercolesHora4']); 
         $HorarioRegistrado=HorariosAlumno($dia18,$hora18L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }
      if(isset($_POST['hora4J'])){
         $hora19L=$mysqli->real_escape_string($_POST['horaJueves4']); 
         $dia19=$mysqli->real_escape_string($_POST['juevesHora4']); 
         $HorarioRegistrado=HorariosAlumno($dia19,$hora19L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }
      if(isset($_POST['hora4V'])){
         $hora20L=$mysqli->real_escape_string($_POST['horaViernes4']); 
         $dia20=$mysqli->real_escape_string($_POST['viernesHora4']); 
         $HorarioRegistrado=HorariosAlumno($dia20,$hora20L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }

      //////////////////////////////////////////
     if(isset($_POST['hora5L'])){
        $hora21L=$mysqli->real_escape_string($_POST['horaLunes5']); 
        $dia21=$mysqli->real_escape_string($_POST['lunesHora5']); 
        $HorarioRegistrado=HorariosAlumno($dia21,$hora21L);
        if($HorarioRegistrado != true){
             echo 'error al registrar el horario';
        }
     }
     if(isset($_POST['hora5M'])){
         $hora22L=$mysqli->real_escape_string($_POST['horaMartes5']); 
         $dia22=$mysqli->real_escape_string($_POST['martesHora5']); 
         $HorarioRegistrado=HorariosAlumno($dia22,$hora22L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }
 
      if(isset($_POST['hora5Mi'])){
         $hora23L=$mysqli->real_escape_string($_POST['horaMiercoles5']); 
         $dia23=$mysqli->real_escape_string($_POST['miercolesHora5']); 
         $HorarioRegistrado=HorariosAlumno($dia23,$hora23L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }
      if(isset($_POST['hora5J'])){
         $hora24L=$mysqli->real_escape_string($_POST['horaJueves5']); 
         $dia24=$mysqli->real_escape_string($_POST['juevesHora5']); 
         $HorarioRegistrado=HorariosAlumno($dia24,$hora24L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }
      if(isset($_POST['hora5V'])){
         $hora25L=$mysqli->real_escape_string($_POST['horaViernes5']); 
         $dia25=$mysqli->real_escape_string($_POST['viernesHora5']); 
         $HorarioRegistrado=HorariosAlumno($dia25,$hora25L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }

      //////////////////////////////////////////
     if(isset($_POST['hora6L'])){
        $hora26L=$mysqli->real_escape_string($_POST['horaLunes6']); 
        $dia26=$mysqli->real_escape_string($_POST['lunesHora6']); 
        $HorarioRegistrado=HorariosAlumno($dia26,$hora26L);
        if($HorarioRegistrado != true){
             echo 'error al registrar el horario';
        }
     }
     if(isset($_POST['hora6M'])){
         $hora27L=$mysqli->real_escape_string($_POST['horaMartes6']); 
         $dia27=$mysqli->real_escape_string($_POST['martesHora6']); 
         $HorarioRegistrado=HorariosAlumno($dia27,$hora27L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }
 
      if(isset($_POST['hora6Mi'])){
         $hora28L=$mysqli->real_escape_string($_POST['horaMiercoles6']); 
         $dia28=$mysqli->real_escape_string($_POST['miercolesHora6']); 
         $HorarioRegistrado=HorariosAlumno($dia28,$hora28L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }
      if(isset($_POST['hora6J'])){
         $hora29L=$mysqli->real_escape_string($_POST['horaJueves6']); 
         $dia29=$mysqli->real_escape_string($_POST['juevesHora6']); 
         $HorarioRegistrado=HorariosAlumno($dia29,$hora29L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }
      if(isset($_POST['hora6V'])){
         $hora30L=$mysqli->real_escape_string($_POST['horaViernes6']); 
         $dia30=$mysqli->real_escape_string($_POST['viernesHora6']); 
         $HorarioRegistrado=HorariosAlumno($dia30,$hora30L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }

      //////////////////////////////////////////
     if(isset($_POST['hora7L'])){
        $hora31L=$mysqli->real_escape_string($_POST['horaLunes7']); 
        $dia31=$mysqli->real_escape_string($_POST['lunesHora7']); 
        $HorarioRegistrado=HorariosAlumno($dia31,$hora31L);
        if($HorarioRegistrado != true){
             echo 'error al registrar el horario';
        }
     }
     if(isset($_POST['hora7M'])){
         $hora32L=$mysqli->real_escape_string($_POST['horaMartes7']); 
         $dia32=$mysqli->real_escape_string($_POST['martesHora7']); 
         $HorarioRegistrado=HorariosAlumno($dia32,$hora32L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }
 
      if(isset($_POST['hora7Mi'])){
         $hora33L=$mysqli->real_escape_string($_POST['horaMiercoles7']); 
         $dia33=$mysqli->real_escape_string($_POST['miercolesHora7']); 
         $HorarioRegistrado=HorariosAlumno($dia33,$hora33L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }
      if(isset($_POST['hora7J'])){
         $hora34L=$mysqli->real_escape_string($_POST['horaJueves7']); 
         $dia34=$mysqli->real_escape_string($_POST['juevesHora7']); 
         $HorarioRegistrado=HorariosAlumno($dia34,$hora34L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }
      if(isset($_POST['hora7V'])){
         $hora35L=$mysqli->real_escape_string($_POST['horaViernes7']); 
         $dia35=$mysqli->real_escape_string($_POST['viernesHora7']); 
         $HorarioRegistrado=HorariosAlumno($dia35,$hora35L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }

      //////////////////////////////////////////
     if(isset($_POST['hora8L'])){
        $hora36L=$mysqli->real_escape_string($_POST['horaLunes8']); 
        $dia36=$mysqli->real_escape_string($_POST['lunesHora8']); 
        $HorarioRegistrado=HorariosAlumno($dia36,$hora36L);
        if($HorarioRegistrado != true){
             echo 'error al registrar el horario';
        }
     }
     if(isset($_POST['hora8M'])){
         $hora37L=$mysqli->real_escape_string($_POST['horaMartes8']); 
         $dia37=$mysqli->real_escape_string($_POST['martesHora8']); 
         $HorarioRegistrado=HorariosAlumno($dia37,$hora37L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }
 
      if(isset($_POST['hora8Mi'])){
         $hora38L=$mysqli->real_escape_string($_POST['horaMiercoles8']); 
         $dia38=$mysqli->real_escape_string($_POST['miercolesHora8']); 
         $HorarioRegistrado=HorariosAlumno($dia38,$hora38L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }
      if(isset($_POST['hora8J'])){
         $hora39L=$mysqli->real_escape_string($_POST['horaJueves8']); 
         $dia39=$mysqli->real_escape_string($_POST['juevesHora8']); 
         $HorarioRegistrado=HorariosAlumno($dia39,$hora39L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }
      if(isset($_POST['hora8V'])){
         $hora40L=$mysqli->real_escape_string($_POST['horaViernes8']); 
         $dia40=$mysqli->real_escape_string($_POST['viernesHora8']); 
         $HorarioRegistrado=HorariosAlumno($dia40,$hora40L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }

      //////////////////////////////////////////
     if(isset($_POST['hora9L'])){
        $hora41L=$mysqli->real_escape_string($_POST['horaLunes9']); 
        $dia41=$mysqli->real_escape_string($_POST['lunesHora9']); 
        $HorarioRegistrado=HorariosAlumno($dia41,$hora41L);
        if($HorarioRegistrado != true){
             echo 'error al registrar el horario';
        }
     }
     if(isset($_POST['hora9M'])){
         $hora42L=$mysqli->real_escape_string($_POST['horaMartes9']); 
         $dia42=$mysqli->real_escape_string($_POST['martesHora9']); 
         $HorarioRegistrado=HorariosAlumno($dia42,$hora42L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }
 
      if(isset($_POST['hora9Mi'])){
         $hora43L=$mysqli->real_escape_string($_POST['horaMiercoles9']); 
         $dia43=$mysqli->real_escape_string($_POST['miercolesHora9']); 
         $HorarioRegistrado=HorariosAlumno($dia43,$hora43L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }
      if(isset($_POST['hora9J'])){
         $hora44L=$mysqli->real_escape_string($_POST['horaJueves9']); 
         $dia44=$mysqli->real_escape_string($_POST['juevesHora9']); 
         $HorarioRegistrado=HorariosAlumno($dia44,$hora4L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }
      if(isset($_POST['hora9V'])){
         $hora45L=$mysqli->real_escape_string($_POST['horaViernes9']); 
         $dia45=$mysqli->real_escape_string($_POST['viernesHora9']); 
         $HorarioRegistrado=HorariosAlumno($dia45,$hora45L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }

      //////////////////////////////////////////
     if(isset($_POST['hora10L'])){
        $hora46L=$mysqli->real_escape_string($_POST['horaLunes10']); 
        $dia46=$mysqli->real_escape_string($_POST['lunesHora10']); 
        $HorarioRegistrado=HorariosAlumno($dia46,$hora46L);
        if($HorarioRegistrado != true){
             echo 'error al registrar el horario';
        }
     }
     if(isset($_POST['hora10M'])){
         $hora47L=$mysqli->real_escape_string($_POST['horaMartes10']); 
         $dia47=$mysqli->real_escape_string($_POST['martesHora10']); 
         $HorarioRegistrado=HorariosAlumno($dia47,$hora47L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }
 
      if(isset($_POST['hora10Mi'])){
         $hora48L=$mysqli->real_escape_string($_POST['horaMiercoles10']); 
         $dia48=$mysqli->real_escape_string($_POST['miercolesHora10']); 
         $HorarioRegistrado=HorariosAlumno($dia48,$hora48L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }
      if(isset($_POST['hora10J'])){
         $hora49L=$mysqli->real_escape_string($_POST['horaJueves10']); 
         $dia49=$mysqli->real_escape_string($_POST['juevesHora10']); 
         $HorarioRegistrado=HorariosAlumno($dia49,$hora49L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }
      if(isset($_POST['hora10V'])){
         $hora50L=$mysqli->real_escape_string($_POST['horaViernes10']); 
         $dia50=$mysqli->real_escape_string($_POST['viernesHora10']); 
         $HorarioRegistrado=HorariosAlumno($dia50,$hora50L);
         if($HorarioRegistrado != true){
              echo 'error al registrar el horario';
         }
      }

      if($HorarioRegistrado==true){
        $ban=true;
          header("location: confriRegistroAlumno.php");
          exit;
      }

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

    <title>HORARIOS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>


    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/9c7010aff9.js" crossorigin="anonymous"></script>
</head>

<body>

    <!--background-->
    <br>
    <div class="book-appointment">

        <h1 style="color:white" ;> HORARIOS ALUMNO </h1>


        <br>
        <div class="horarioTera">
            <p>Aqui debe elegir sus horarios que tiene libre a la semana:</p>
        </div>
        <br>

        <div class="row table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Horas</th>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miercoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>

                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td>8 : 00 - 9 : 00</td>
                        <td>
                            <!--lunes-->
                            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                                <input type="checkbox" name="hora1L" />
                                <input type="hidden" name="horaLunes1" value="8 : 00 - 9 : 00">
                                <input type="hidden" name="lunesHora1" value="Lunes">
                        </td>

                        <td>
                            <!--martes-->
                            <input type="checkbox" name="hora1M">
                            <input type="hidden" name="horaMartes1" value="8 : 00 - 9 : 00">
                            <input type="hidden" name="martesHora1" value="Martes">
                        </td>
                        <!--miercoles-->
                        <td>
                            <input type="checkbox" name="hora1Mi">
                            <input type="hidden" name="horaMiercoles1" value="8 : 00 - 9 : 00">
                            <input type="hidden" name="miercolesHora1" value="Miercoles">
                        </td>
                        <td>
                            <!--jueves-->
                            <input type="checkbox" name="hora1J">
                            <input type="hidden" name="horaJueves1" value="8 : 00 - 9 : 00">
                            <input type="hidden" name="juevesHora1" value="Jueves">
                        </td>
                        <td>
                            <!--viernes-->
                            <input type="checkbox" name="hora1V">
                            <input type="hidden" name="horaViernes1" value="8 : 00 - 9 : 00">
                            <input type="hidden" name="viernesHora1" value="Viernes">
                        </td>

                    </tr>
                    <tr>
                        <td>9 : 00 - 10 : 00</td>
                        <td>
                            <!--lunes-->
                            <input type="checkbox" name="hora2L" />
                            <input type="hidden" name="horaLunes2" value="9 : 00 - 10 : 00">
                            <input type="hidden" name="lunesHora2" value="Lunes">
                        </td>

                        <td>
                            <!--martes-->
                            <input type="checkbox" name="hora2M">
                            <input type="hidden" name="horaMartes2" value="9 : 00 - 10 : 00">
                            <input type="hidden" name="martesHora2" value="Martes">
                        </td>
                        <!--miercoles-->
                        <td>
                            <input type="checkbox" name="hora2Mi">
                            <input type="hidden" name="horaMiercoles2" value="9 : 00 - 10 : 00">
                            <input type="hidden" name="miercolesHora2" value="Miercoles">
                        </td>
                        <td>
                            <!--jueves-->
                            <input type="checkbox" name="hora2J">
                            <input type="hidden" name="horaJueves2" value="9 : 00 - 10 : 00">
                            <input type="hidden" name="juevesHora2" value="Jueves">
                        </td>
                        <td>
                            <!--viernes-->
                            <input type="checkbox" name="hora2V">
                            <input type="hidden" name="horaViernes2" value="9 : 00 - 10 : 00">
                            <input type="hidden" name="viernesHora2" value="Viernes">
                        </td>
                    </tr>
                    <tr>
                        <td>10 : 00 - 11 : 00</td>
                        <td>
                            <!--lunes-->
                            <input type="checkbox" name="hora3L" />
                            <input type="hidden" name="horaLunes3" value="10 : 00 - 11 : 00">
                            <input type="hidden" name="lunesHora3" value="Lunes">
                        </td>

                        <td>
                            <!--martes-->
                            <input type="checkbox" name="hora3M">
                            <input type="hidden" name="horaMartes3" value="10 : 00 - 11 : 00">
                            <input type="hidden" name="martesHora3" value="Martes">
                        </td>
                        <!--miercoles-->
                        <td>
                            <input type="checkbox" name="hora3Mi">
                            <input type="hidden" name="horaMiercoles3" value="10 : 00 - 11 : 00">
                            <input type="hidden" name="miercolesHora3" value="Miercoles">
                        </td>
                        <td>
                            <!--jueves-->
                            <input type="checkbox" name="hora3J">
                            <input type="hidden" name="horaJueves3" value="10 : 00 - 11 : 00">
                            <input type="hidden" name="juevesHora3" value="Jueves">
                        </td>
                        <td>
                            <!--viernes-->
                            <input type="checkbox" name="hora3V">
                            <input type="hidden" name="horaViernes3" value="10 : 00 - 11 : 00">
                            <input type="hidden" name="viernesHora3" value="Viernes">
                        </td>
                    </tr>
                    <tr>
                        <td>11 : 00 - 12 : 00</td>
                        <td>
                            <!--lunes-->
                            <input type="checkbox" name="hora4L" />
                            <input type="hidden" name="horaLunes4" value="11 : 00 - 12 : 00">
                            <input type="hidden" name="lunesHora4" value="Lunes">
                        </td>

                        <td>
                            <!--martes-->
                            <input type="checkbox" name="hora4M">
                            <input type="hidden" name="horaMartes4" value="11 : 00 - 12 : 00">
                            <input type="hidden" name="martesHora4" value="Martes">
                        </td>
                        <!--miercoles-->
                        <td>
                            <input type="checkbox" name="hora4Mi">
                            <input type="hidden" name="horaMiercoles4" value="11 : 00 - 12 : 00">
                            <input type="hidden" name="miercolesHora4" value="Miercoles">
                        </td>
                        <td>
                            <!--jueves-->
                            <input type="checkbox" name="hora4J">
                            <input type="hidden" name="horaJueves4" value="11 : 00 - 12 : 00">
                            <input type="hidden" name="juevesHora4" value="Jueves">
                        </td>
                        <td>
                            <!--viernes-->
                            <input type="checkbox" name="hora4V">
                            <input type="hidden" name="horaViernes4" value="11 : 00 - 12 : 00">
                            <input type="hidden" name="viernesHora4" value="Viernes">
                        </td>
                    </tr>
                    <tr>
                        <td>12 : 00 - 13 : 00</td>
                        <td>
                            <!--lunes-->
                            <input type="checkbox" name="hora5L" />
                            <input type="hidden" name="horaLunes5" value="12 : 00 - 13 : 00">
                            <input type="hidden" name="lunesHora5" value="Lunes">
                        </td>

                        <td>
                            <!--martes-->
                            <input type="checkbox" name="hora5M">
                            <input type="hidden" name="horaMartes5" value="12 : 00 - 13 : 00">
                            <input type="hidden" name="martesHora5" value="Martes">
                        </td>
                        <!--miercoles-->
                        <td>
                            <input type="checkbox" name="hora5Mi">
                            <input type="hidden" name="horaMiercoles5" value="12 : 00 - 13 : 00">
                            <input type="hidden" name="miercolesHora5" value="Miercoles">
                        </td>
                        <td>
                            <!--jueves-->
                            <input type="checkbox" name="hora5J">
                            <input type="hidden" name="horaJueves5" value="12 : 00 - 13 : 00">
                            <input type="hidden" name="juevesHora5" value="Jueves">
                        </td>
                        <td>
                            <!--viernes-->
                            <input type="checkbox" name=" ">
                            <input type="hidden" name="horaViernes5" value="12 : 00 - 13 : 00">
                            <input type="hidden" name="viernesHora5" value="Viernes">
                        </td>
                    </tr>
                    <tr>
                        <td>13 : 00 - 14 : 00</td>
                        <td>
                            <!--lunes-->
                            <input type="checkbox" name="hora6L" />
                            <input type="hidden" name="horaLunes6" value="13 : 00 - 14 : 00">
                            <input type="hidden" name="lunesHora6" value="Lunes">
                        </td>

                        <td>
                            <!--martes-->
                            <input type="checkbox" name="hora6M">
                            <input type="hidden" name="horaMartes6" value="13 : 00 - 14 : 00">
                            <input type="hidden" name="martesHora6" value="Martes">
                        </td>
                        <!--miercoles-->
                        <td>
                            <input type="checkbox" name="hora6Mi">
                            <input type="hidden" name="horaMiercoles6" value="13 : 00 - 14 : 00">
                            <input type="hidden" name="miercolesHora6" value="Miercoles">
                        </td>
                        <td>
                            <!--jueves-->
                            <input type="checkbox" name="hora6J">
                            <input type="hidden" name="horaJueves6" value="13 : 00 - 14 : 00">
                            <input type="hidden" name="juevesHora6" value="Jueves">
                        </td>
                        <td>
                            <!--viernes-->
                            <input type="checkbox" name="hora6V">
                            <input type="hidden" name="horaViernes6" value="13 : 00 - 14 : 00">
                            <input type="hidden" name="viernesHora6" value="Viernes">
                        </td>
                    </tr>
                    <tr>
                        <td>14 : 00 - 15 : 00</td>
                        <td>
                            <!--lunes-->
                            <input type="checkbox" name="hora7L" />
                            <input type="hidden" name="horaLunes7" value="14 : 00 - 15 : 00">
                            <input type="hidden" name="lunesHora7" value="Lunes">
                        </td>

                        <td>
                            <!--martes-->
                            <input type="checkbox" name="hora7M">
                            <input type="hidden" name="horaMartes7" value="14 : 00 - 15 : 00">
                            <input type="hidden" name="martesHora7" value="Martes">
                        </td>
                        <!--miercoles-->
                        <td>
                            <input type="checkbox" name="hora7Mi">
                            <input type="hidden" name="horaMiercoles7" value="14 : 00 - 15 : 00">
                            <input type="hidden" name="miercolesHora7" value="Miercoles">
                        </td>
                        <td>
                            <!--jueves-->
                            <input type="checkbox" name="hora7J">
                            <input type="hidden" name="horaJueves7" value="14 : 00 - 15 : 00">
                            <input type="hidden" name="juevesHora7" value="Jueves">
                        </td>
                        <td>
                            <!--viernes-->
                            <input type="checkbox" name="hora7V">
                            <input type="hidden" name="horaViernes7" value="14 : 00 - 15 : 00">
                            <input type="hidden" name="viernesHora7" value="Viernes">
                        </td>
                    </tr>
                    <tr>
                        <td>15 : 00 - 16 : 00</td>
                        <td>
                            <!--lunes-->
                            <input type="checkbox" name="hora8L" />
                            <input type="hidden" name="horaLunes8" value="15 : 00 - 16 : 00">
                            <input type="hidden" name="lunesHora8" value="Lunes">
                        </td>

                        <td>
                            <!--martes-->
                            <input type="checkbox" name="hora8M">
                            <input type="hidden" name="horaMartes8" value="15 : 00 - 16 : 00">
                            <input type="hidden" name="martesHora8" value="Martes">
                        </td>
                        <!--miercoles-->
                        <td>
                            <input type="checkbox" name="hora8Mi">
                            <input type="hidden" name="horaMiercoles8" value="15 : 00 - 16 : 00">
                            <input type="hidden" name="miercolesHora8" value="Miercoles">
                        </td>
                        <td>
                            <!--jueves-->
                            <input type="checkbox" name="hora8J">
                            <input type="hidden" name="horaJueves8" value="15 : 00 - 16 : 00">
                            <input type="hidden" name="juevesHora8" value="Jueves">
                        </td>
                        <td>
                            <!--viernes-->
                            <input type="checkbox" name="hora8V">
                            <input type="hidden" name="horaViernes8" value="15 : 00 - 16 : 00">
                            <input type="hidden" name="viernesHora8" value="Viernes">
                        </td>
                    </tr>
                    <tr>
                        <td>16 : 00 - 17 : 00</td>
                        <td>
                            <!--lunes-->
                            <input type="checkbox" name="hora9L" />
                            <input type="hidden" name="horaLunes9" value="16 : 00 - 17 : 00">
                            <input type="hidden" name="lunesHora9" value="Lunes">
                        </td>

                        <td>
                            <!--martes-->
                            <input type="checkbox" name="hora9M">
                            <input type="hidden" name="horaMartes9" value="16 : 00 - 17 : 00">
                            <input type="hidden" name="martesHora9" value="Martes">
                        </td>
                        <!--miercoles-->
                        <td>
                            <input type="checkbox" name="hora9Mi">
                            <input type="hidden" name="horaMiercoles9" value="16 : 00 - 17 : 00">
                            <input type="hidden" name="miercolesHora9" value="Miercoles">
                        </td>
                        <td>
                            <!--jueves-->
                            <input type="checkbox" name="hora9J">
                            <input type="hidden" name="horaJueves9" value="16 : 00 - 17 : 00">
                            <input type="hidden" name="juevesHora9" value="Jueves">
                        </td>
                        <td>
                            <!--viernes-->
                            <input type="checkbox" name="hora9V">
                            <input type="hidden" name="horaViernes9" value="16 : 00 - 17 : 00">
                            <input type="hidden" name="viernesHora9" value="Viernes">
                        </td>
                    </tr>
                    <tr>
                        <td>17 : 00 - 18 : 00</td>
                        <td>
                            <!--lunes-->
                            <input type="checkbox" name="hora10L" />
                            <input type="hidden" name="horaLunes10" value="17 : 00 - 18 : 00">
                            <input type="hidden" name="lunesHora10" value="Lunes">
                        </td>

                        <td>
                            <!--martes-->
                            <input type="checkbox" name="hora10M">
                            <input type="hidden" name="horaMartes10" value="17 : 00 - 18 : 00">
                            <input type="hidden" name="martesHora10" value="Martes">
                        </td>
                        <!--miercoles-->
                        <td>
                            <input type="checkbox" name="hora10Mi">
                            <input type="hidden" name="horaMiercoles10" value="17 : 00 - 18 : 00">
                            <input type="hidden" name="miercolesHora10" value="Miercoles">
                        </td>
                        <td>
                            <!--jueves-->
                            <input type="checkbox" name="hora10J">
                            <input type="hidden" name="horaJueves10" value="17 : 00 - 18 : 00">
                            <input type="hidden" name="juevesHora10" value="Jueves">
                        </td>
                        <td>
                            <!--viernes-->
                            <input type="checkbox" name="hora10V">
                            <input type="hidden" name="horaViernes10" value="17 : 00 - 18 : 00">
                            <input type="hidden" name="viernesHora10" value="Viernes">
                        </td>
                    </tr>

                </tbody>
            </table>
            <input type="submit" value="Guardar Horario">
            </form>
        </div>
    </div>

</body>

</html>