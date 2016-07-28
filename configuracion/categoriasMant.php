<!DOCTYPE html>
<html>

<head>
  <title> Equipos y Host Registrados </title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="../img/favicon.png">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
  <script src="../js/jquery-2.2.4.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/angular.min.js"></script>

  <script>
    $(function(){
      $("input[type='text']").attr("autocomplete","off");
    });
  </script>

</head>

<body>

  <?php
    include "menu.php";
    include("../php/connection.php");
    $conn = crearConexion();

    $disable = $_POST['accion'] == 'eliminar' ? 'disabled' : '';

    $ok = false;
    if($_POST['accionBoton'] == 'crear'){
      $sql = "insert into tb_categorias_cfg (cp_nombre, cp_descripcion) values ('".$_POST['cp_nombre']."', '".$_POST['cp_descripcion']."' ) ";
      $conn->query($sql);
      $ok = true;

    }else if($_POST['accionBoton'] == 'editar'){
      $sql = "update tb_categorias_cfg set cp_nombre = '".$_POST['cp_nombre']."' , cp_descripcion = '".$_POST['cp_nombre']."' where cp_id = '".$_POST['cp_id']."' ";
      $conn->query($sql);
      $ok = true;

    }else if($_POST['accionBoton'] == 'eliminar'){
      $sql = "delete from tb_categorias_cfg where cp_id = '".$_POST['cp_id']."' ";
      $conn->query($sql);
      $ok = true;
    }

    if($ok)
      header( 'Location: categorias.php' );

  ?>

  <div class="container">

    <h2>Categorias</h2>
    <small>Aca podras crear, editar y eliminar las categorias</small>
    <hr></hr>

    <form action="categoriasMant.php" method="post">

      <div class="text-left">
        <button class="btn btn-success" style="margin-bottom: 15px;" name="accionBoton" value="<?php echo $_POST['accion'];  ?>">
          <span class="glyphicon glyphicon-save"></span>
          <span>Guardar Cambios</span>
        </button>

        <a href="categorias.php" class="btn btn-danger" style="margin-bottom: 15px;">
          <span class="glyphicon glyphicon-log-out"></span>
          <span>Volver</span>
        </a>
      </div>


      <div class="row">
          <div class="col-md-6">

            <input type="hidden" name="cp_id" value="<?php echo $_POST['cp_id'];?>"> </input>
            <div class="form-group">
                <label>Nombre Categoria</label>
                <input type="text" name="cp_nombre" value="<?php echo $_POST['cp_nombre']; ?>" class="form-control" <?php echo $disable; ?> > </input>
            </div>

            <div class="form-group">
                <label>Descripción Categoría</label>
                <input type="text" name="cp_descripcion" value="<?php echo $_POST['cp_descripcion']; ?>" class="form-control" <?php echo $disable; ?> ></input>
            </div>

          </div>
      </div>

    </form>

  </div>

  <br></br>
  <div style="font-size: 12px;" class="text-center"> <?php echo "MimControl &copy; - " . date("Y") ?></div>

</body>



</html>
