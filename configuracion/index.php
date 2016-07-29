<!DOCTYPE html>
<html>

<head>
  <title> Configuraciones</title>
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
        $permisos = substr(sprintf('%o', fileperms('../')), -4);

        if($permisos != '0777'){
          $mensaje ="<div class='alert alert-warning'> Los permisos de la carpeta slxcontrol deben ser <b>777</b> (correr comando <b>$ chmod -R 777 slxcontrol</b>) </div>";
        }


        if($_POST["accion"] == "guardar"){
          $mensaje ="<div class='alert alert-success'> Datos guardados correctamente</div>";
          guardar_xml();

        }else if($_POST["accion"] == "probar"){

            $conexion = new mysqli($_POST['host'],$_POST['usuario'],$_POST['password'],$_POST['esquema']);
            if (mysqli_connect_errno()) {
              $mensaje ="<div class='alert alert-danger'> Error en la conexión, ". mysqli_connect_error() ."  </div>";
              guardar_xml();
            }else{
              $mensaje ="<div class='alert alert-info'> Conexion probada exitosamente </div>";
              guardar_xml();
            }
        }

        $path_xml = trim(shell_exec("find /var/www/html/ -name configuracion.xml"));
        $xml      = simplexml_load_file($path_xml);

        $servidor  = $xml->mysql->host;
        $nombre_bd = $xml->mysql->esquema;
        $usuario   = $xml->mysql->usuario;
        $password  = $xml->mysql->password;
        $path_principal = $xml->archivos->pathPrincipal;
        $delay          = $xml->archivos->delay;


        function guardar_xml(){
          $path_xml = trim(shell_exec("find /var/www/html/ -name configuracion.xml"));
          $xml      = simplexml_load_file($path_xml);

          $xml->mysql->host       = trim($_POST['host']);
          $xml->mysql->esquema    = trim($_POST['esquema']);
          $xml->mysql->usuario    = trim($_POST['usuario']);
          $xml->mysql->password   = trim($_POST['password']);
          $xml->archivos->pathPrincipal = trim($_POST['path_principal']);
          $xml->archivos->delay         = trim($_POST['delay']);
          file_put_contents($path_xml ,$xml->asXML());
        }

     ?>

  </head>

  <body>

    <div class="container">

      <?php echo $mensaje; ?>

      <div class="row">

        <form method="post" action="index.php">

          <div class="text-center">
            <button class="btn btn-success" name="accion" value="guardar"> Guardar Cambios</button>
            <button class="btn btn-primary" name="accion" value="probar"> Probar Conexión</button>
          </div>

        <div class="col-md-6">
          <h2>Editar conexión MySQL</h2>
          <hr></hr>

          <div class="form-group">
            <label for="">Host</label>
            <input name="host" class="form-control" value="<?php echo $servidor; ?>" autocomplete="off"/>
          </div>

          <div class="form-group">
            <label for="">Esquema BD</label>
            <input name="esquema" class="form-control" value="<?php echo $nombre_bd; ?>" autocomplete="off"/>
          </div>

          <div class="form-group">
            <label for="">Usuario</label>
            <input name="usuario" class="form-control" value="<?php echo $usuario; ?>" autocomplete="off"/>
          </div>

          <div class="form-group">
            <label for="">Password</label>
            <input name="password" class="form-control" value="<?php echo $password; ?>" autocomplete="off"/>
          </div>


        </div>
        <div class="col-md-6">
          <h2> Otras Configuraciones </h2>
          <hr></hr>

          <div class="form-group">
            <label for="">Path Principal de Trabajo (c++)</label>
            <input name="path_principal" class="form-control" value="<?php echo $path_principal; ?>" autocomplete="off"/>
          </div>

          <div class="form-group">
            <label for="">Tiempo de espera entre lecturas</label>
            <input name="delay" class="form-control" value="<?php echo $delay; ?>" autocomplete="off"/>
          </div>

        </div>

        </form>
      </div>


      <br></br>
      <div style="font-size: 12px;" class="text-center"> <?php echo "MimControl &copy; - " . date("Y") ?></div>

    </div>


  </div>




</body>

</html>
