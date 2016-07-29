<!DOCTYPE html>
<html>

<head>
  <title> Equipos y Host Registrados </title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="../img/favicon.png">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  <script src="js/jquery-2.2.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/angular.min.js"></script>

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
      $sql = "insert into tb_campos_lectura (campo, descripcion, tipo_campo, categorias_id, orden_lectura_arduino) values ('".$_POST['campo']."', '".$_POST['descripcion']."', '".$_POST['tipo_campo']."', '".$_POST['categorias_id']."', '".$_POST['orden_lectura_arduino']."' ) ";
      $conn->query($sql);
      $ok = true;

    }else if($_POST['accionBoton'] == 'editar'){
      $sql = "update tb_campos_lectura set campo = '".$_POST['campo']."' , descripcion = '".$_POST['descripcion']."', tipo_campo = '".$_POST['tipo_campo']."', categorias_id = '".$_POST['categorias_id']."', orden_lectura_arduino = '".$_POST['orden_lectura_arduino']."' where id = '".$_POST['id']."' ";
      $conn->query($sql);
      $ok = true;

    }else if($_POST['accionBoton'] == 'eliminar'){
      $sql = "delete from tb_campos_lectura where id = '".$_POST['id']."' ";
      $conn->query($sql);
      $ok = true;
    }

    if($ok)
      header( 'Location: campos.php' );

  ?>

  <div class="container">

    <h2>Campos de Lectura - <?php echo $_POST['campo'] ?> </h2>
    <small>Aca se muestran los campos actualmente configurados para todos los módulos</small>
    <hr></hr>

    <form action="camposMant.php" method="post">

    <div class="text-left">
      <button class="btn btn-success" style="margin-bottom: 15px;" name="accionBoton" value="<?php echo $_POST['accion'];  ?>">
        <span class="glyphicon glyphicon-save"></span>
        <span>Guardar Cambios</span>
      </button>

      <a href="campos.php" class="btn btn-danger" style="margin-bottom: 15px;">
        <span class="glyphicon glyphicon-log-out"></span>
        <span>Volver</span>
      </a>
    </div>


    <div class="row">
        <div class="col-md-6">
          <input type="hidden" name="id" value="<?php echo $_POST['id'];  ?>"></input>

          <div class="form-group">
              <label>Nombre Campo (Columnas Existentes en Base de Datos)</label>
              <select class="form-control" name="campo" value="<?php echo $_POST['campo']; ?>" <?php echo $disable; ?>>
                <option selected="false">Seleccione Campo de Lectura</option>
                <?php
                  $sql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'MIMcontrol' AND TABLE_NAME = 'tb_colection' order by COLUMN_NAME ";
                  $result = $conn->query($sql);
                  while($row = $result->fetch_assoc()){
                    if( $row['COLUMN_NAME'] == $_POST['campo'])
                      echo "<option selected value='".$row['COLUMN_NAME']."'>".$row['COLUMN_NAME']."</option>";
                    else
                      echo "<option value='".$row['COLUMN_NAME']."'>".$row['COLUMN_NAME']."</option>";
                  }

                 ?>
              </select>
          </div>

          <div class="form-group">
              <label>Descripción Campo</label>
              <input type="text" name="descripcion" value="<?php echo $_POST['descripcion']; ?>" class="form-control" <?php echo $disable; ?> ></input>
          </div>

          <div class="form-group">
              <label>Tipo Campo</label>
              <select class="form-control" name="tipo_campo" value="<?php echo $_POST['tipo_campo']; ?>" <?php echo $disable; ?> >
                <?php
                  $array = array("AMPERAJE", "DIGITAL", "HORAS", "LITROS" ,"TEMPERATURA", "VOLTAJE");
                  echo "<option>Seleccione Tipo</option>";
                  foreach ($array as $option) {
                    if($_POST['tipo_campo'] == $option)
                      echo "<option selected>".$option."</option>";
                    else
                      echo "<option>".$option."</option>";
                  }
                 ?>

              </select>
          </div>

          <div class="form-group">
              <label>Categoría (Seleccione la categoria a la que pertenece este campo)</label>
              <select class="form-control" name="categorias_id" value="<?php echo $_POST['categorias_id']; ?>" <?php echo $disable; ?> >
                <?php
                  $sql = "SELECT * FROM tb_categorias_cfg order by cp_nombre";
                  $result = $conn->query($sql);

                  echo "<option>Seleccione Categoria</option>";
                  while($row = $result->fetch_assoc()){
                    if( $row['cp_id'] == $_POST['categorias_id'])
                      echo "<option selected value='".$row['cp_id']."'>".$row['cp_nombre']."</option>";
                    else
                      echo "<option value='".$row['cp_id']."'>".$row['cp_nombre']."</option>";
                  }


                 ?>

              </select>
          </div>

          <div class="form-group">
              <label>Orden Lectura Arduino</label>
              <input type="text" name="orden_lectura_arduino" value="<?php echo $_POST['orden_lectura_arduino']; ?>" class="form-control" <?php echo $disable; ?> ></input>
          </div>

        </div>
    </div>



    </form>


  </div>

  <br></br>
  <div style="font-size: 12px;" class="text-center"> <?php echo "slxcontrol &copy; - " . date("Y") ?></div>

</body>



</html>
