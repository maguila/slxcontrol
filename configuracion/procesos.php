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

        $mensaje   = "";

        if($_POST["accion"] == "guardar"){
            $mensaje ="<div class='alert alert-danger'> Proceso detenido exitosamente correctamente</div>";

        }else if($_POST["accion"] == "probar"){
            $mensaje ="<div class='alert alert-success'> Proceso Iniciado exitosamente</div>";
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
          <hr></hr>

          <label>Salida batch</label>
          <textarea class="form-control" style="height: 200px;">Iniciando ejecutable c++ ....
          </textarea>
          <br></br>

          <button class="btn btn-danger" name="accion" value="guardar"> Detener Proceso</button>
          <button class="btn btn-primary" name="accion" value="probar"> Iniciar Proceso</button>



        </div>


        </form>
      </div>


      <br></br>
      <div style="font-size: 12px;" class="text-center"> <?php echo "MimControl &copy; - " . date("Y") ?></div>

    </div>


  </div>




</body>

</html>
