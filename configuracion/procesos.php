<!DOCTYPE html>
<html>

<head>
  <title> Configuraciones </title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="../img/favicon.png">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  <script src="js/jquery-2.2.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/angular.min.js"></script>

<body>


  <?php
    include "menu.php";
    include "../php/connection.php";

  ?>

  <div class="container">

    <?php
        include("../connection.php");


        $accion = $_POST["accion"];
        $mensaje   = "";

        $path_xml = trim(shell_exec("find /var/www/html/ -name configuracion.xml"));
        $xml      = simplexml_load_file($path_xml);
        $path_principal = $xml->archivos->pathPrincipal;


        if($accion == "iniciar"){
           $cmd = "nohup ".$path_principal."ejecutable &";
           shell_exec($cmd);
           $mensaje ="<div class='alert alert-info'> Proceso iniciado correctamente </div>";
        }

     ?>

  </head>

  <body>

    <div class="container">

      <?php echo $mensaje; ?>

      <div class="row">

        <form method="post" action="procesos.php">

        <div>
          <h2> Procesos del Sistema </h2>
          <h4> Path de c++: <small><?php echo $path_principal ?></small>   </h4>
          <hr></hr>

          <label>Salida batch</label>
          <textarea class="form-control" style="height: 200px;">Iniciando ejecutable c++ ....
          </textarea>
          <br></br>

          <button class="btn btn-danger" name="accion" value="detener"> Detener Proceso</button>
          <button class="btn btn-primary" name="accion" value="iniciar"> Iniciar Proceso</button>

        </div>

        </form>
      </div>


      <br></br>
      <div style="font-size: 12px;" class="text-center"> <?php echo "MimControl &copy; - " . date("Y") ?></div>

    </div>


  </div>




</body>

</html>
