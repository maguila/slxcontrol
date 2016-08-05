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


    $path_xml = trim(shell_exec("find /var/www/html/ -name configuracion.xml"));
    $xml      = simplexml_load_file($path_xml);


    $disable = $_POST['accion'] == 'eliminar' ? 'disabled' : '';

    $ok = false;
    if($_POST['accionBoton'] == 'crear'){
      $values .= "'".$_POST['cp_nombre']."' , ";
      $values .= "'".$_POST['cp_descrip']."' , ";
      $values .= "'".$_POST['cp_min']."' , ";
      $values .= "'".$_POST['cp_max']."' , ";
      $values .= "'".$_POST['cp_perfil_cont_id']."'";

      $sql = "insert into tb_alert_cfg (cp_nombre, cp_descrip, cp_min, cp_max, cp_perfil_cont_id) values (".$values.") ";
      $conn->query($sql);
      $ok = true;

    }else if($_POST['accionBoton'] == 'editar'){
      $sets .= "cp_nombre = '".$_POST['cp_nombre']."' ,";
      $sets .= "cp_descrip = '".$_POST['cp_descrip']."' ,";
      $sets .= "cp_min = '".$_POST['cp_min']."' ,";
      $sets .= "cp_max = '".$_POST['cp_max']."' ,";
      $sets .= "cp_perfil_cont_id = '".$_POST['cp_perfil_cont_id']."' ";

      $sql = "update tb_alert_cfg set ".$sets." where cp_id = '".$_POST['cp_id']."' ";
      echo $sql;
      $conn->query($sql);
      $ok = true;

    }else if($_POST['accionBoton'] == 'eliminar'){
      $sql = "delete from tb_alert_cfg where cp_id = '".$_POST['cp_id']."' ";
      $conn->query($sql);
      $ok = true;
    }

    if($ok)
      header( 'Location: alertas.php?cat=' . $_POST['categorias_id'] );

  ?>

  <div class="container">

    <h2>Configuración de Alertas</h2>
    <small>Aca se muestran los campos actualmente configurados para todos los módulos</small>
    <hr></hr>

    <form action="alertasMant.php" method="post">

    <div class="text-left">
      <button class="btn btn-success" style="margin-bottom: 15px;" name="accionBoton" value="<?php echo $_POST['accion'];  ?>">
        <span class="glyphicon glyphicon-save"></span>
        <span>Guardar Cambios</span>
      </button>

      <a href="alertas.php?cat=<?php echo $_POST['categorias_id']; ?>" class="btn btn-danger" style="margin-bottom: 15px;">
        <span class="glyphicon glyphicon-log-out"></span>
        <span>Volver</span>
      </a>

    </div>


    <div class="row">
        <div class="col-md-6">
          <input type="hidden" name="cp_id" value="<?php echo $_POST['cp_id'];  ?>"></input>

          <div class="form-group">
              <label>Equipo</label>
              <select class="form-control" name="cp_perfil_cont_id" value="<?php echo $_POST['cp_perfil_cont_id']; ?>" <?php echo $disable; ?> >
                <?php
                  $sql_equipos = "select * from tb_perfil_cont_cfg ";
                  $result_equipo = $conn->query($sql_equipos);

                  echo "<option>Seleccione Tipo</option>";
                  foreach ($result_equipo as $row) {
                    if($_POST['cp_perfil_cont_id'] == $row['cp_id'])
                      echo "<option value='".$row['cp_id']."' selected>".$row['cp_nombre']."</option>";
                    else
                      echo "<option value='".$row['cp_id']."'>".$row['cp_nombre']."</option>";
                  }
                 ?>

              </select>
          </div>

          <div class="form-group">
              <label>Campo de Alerta (Columnas Existentes en Base de Datos)</label>
              <select class="form-control" name="cp_nombre" value="<?php echo $_POST['cp_nombre']; ?>" <?php echo $disable; ?>>
                <option selected="false">Seleccione Campo de Lectura</option>
                <?php
                  $sql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '".$xml->mysql->esquema."' AND TABLE_NAME = 'tb_colection' AND COLUMN_NAME not in('cp_id', 'cp_oid') ";
                  $result = $conn->query($sql);
                  while($row = $result->fetch_assoc()){
                    if( $row['COLUMN_NAME'] == $_POST['cp_nombre'])
                      echo "<option selected value='".$row['COLUMN_NAME']."'>".$row['COLUMN_NAME']."</option>";
                    else
                      echo "<option value='".$row['COLUMN_NAME']."'>".$row['COLUMN_NAME']."</option>";
                  }

                 ?>
              </select>
          </div>

          <div class="form-group">
              <label>Descripción Alerta</label>
              <input type="text" name="cp_descrip" value="<?php echo $_POST['cp_descrip']; ?>" class="form-control" <?php echo $disable; ?> ></input>
          </div>

    </div>

    <div class="col-md-6">

          <div class="form-group">
              <label>Valor Mínimo</label>
              <input type="text" name="cp_min" value="<?php echo $_POST['cp_min']; ?>" class="form-control" <?php echo $disable; ?> ></input>
          </div>

          <div class="form-group">
              <label>Valor Máximo</label>
              <input type="text" name="cp_max" value="<?php echo $_POST['cp_max']; ?>" class="form-control" <?php echo $disable; ?> ></input>
          </div>

        </div>
    </div>



    </form>


  </div>

  <br></br>
  <div style="font-size: 12px;" class="text-center"> <?php echo "slxcontrol &copy; - " . date("Y") ?></div>

</body>



</html>
