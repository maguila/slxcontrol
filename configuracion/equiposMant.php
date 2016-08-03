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
      $values .= "'".$_POST['cp_nombre']."' ,";
      $values .= "'".$_POST['cp_ip']."' ,";
      $values .= "'".$_POST['cp_cat_id']."' ,";
      $values .= "'".$_POST['id_mina']."' ,";
      $values .= "'".$_POST['cp_horometro_historico']."' ,";
      $values .= "'1' ";

      $sql = "insert into tb_perfil_cont_cfg (cp_nombre, cp_ip, cp_cat_id, id_mina, cp_horometro_historico ,cp_modelo_id ) values (".$values.") ";
      $conn->query($sql);
      $ok = true;

    }else if($_POST['accionBoton'] == 'editar'){
      $sets .= "cp_nombre = '".$_POST['cp_nombre']."' ,";
      $sets .= "cp_cat_id = '".$_POST['cp_cat_id']."' ,";
      $sets .= "id_mina = '".$_POST['id_mina']."' ,";
      $sets .= "cp_horometro_historico = '".$_POST['cp_horometro_historico']."'";

      $sql = "update tb_perfil_cont_cfg set ".$sets."  where cp_id = '".$_POST['cp_id']."' ";
      $conn->query($sql);
      $ok = true;

    }else if($_POST['accionBoton'] == 'eliminar'){
      $sql = "delete from tb_perfil_cont_cfg where cp_id = '".$_POST['cp_id']."' ";
      $conn->query($sql);
      $ok = true;
    }

    if($ok)
      header( 'Location: equipos.php' );

  ?>

  <div class="container">

    <h2>Equipos Registrados</h2>
    <small>Aca se muestran los campos actualmente configurados para todos los módulos</small>
    <hr></hr>

    <form action="equiposMant.php" method="post">

    <div class="text-left">
      <button class="btn btn-success" style="margin-bottom: 15px;" name="accionBoton" value="<?php echo $_POST['accion'];  ?>">
        <span class="glyphicon glyphicon-save"></span>
        <span>Guardar Cambios</span>
      </button>

      <a href="equipos.php" class="btn btn-danger" style="margin-bottom: 15px;">
        <span class="glyphicon glyphicon-log-out"></span>
        <span>Volver</span>
      </a>
    </div>


    <div class="row">
        <div class="col-md-6">

          <input type="hidden" name="cp_id" value="<?php echo $_POST['cp_id']; ?>"></input>

          <div class="form-group">
            <label>Nombre Equipo</label>
            <input type="text" name="cp_nombre" value="<?php echo $_POST['cp_nombre']; ?>" class="form-control" <?php echo $disable; ?> ></input>
          </div>

          <div class="form-group">
            <label>Direccion IP</label>
            <input type="text" name="cp_ip" value="<?php echo $_POST['cp_ip']; ?>" class="form-control" <?php echo $disable; ?> ></input>
          </div>

          <div class="form-group">
            <label>ID Mina</label>
            <input type="text" name="id_mina" value="<?php echo $_POST['id_mina']; ?>" class="form-control" <?php echo $disable; ?> ></input>
          </div>

          <div class="form-group">
            <label>Horómetro Acumulado</label>
            <input type="text" name="cp_horometro_historico" value="<?php echo $_POST['cp_horometro_historico']; ?>" class="form-control" <?php echo $disable; ?> ></input>
          </div>

          <div class="form-group">
              <label>Categoria (Seleccione al modulo que pertenece este equipo)</label>
              <select class="form-control" name="cp_cat_id" value="<?php echo $_POST['cp_cat_id']; ?>" <?php echo $disable; ?> >
                <?php
                  $sql = "SELECT * FROM tb_categorias_cfg order by cp_nombre ";
                  $result = $conn->query($sql);

                  echo "<option>Seleccione Categoria</option>";
                  foreach($result as $row){
                    if( $row['cp_id'] == $_POST['cp_cat_id'])
                      echo "<option selected value='".$row['cp_id']."'>".$row['cp_nombre']."</option>";
                    else
                      echo "<option value='".$row['cp_id']."'>".$row['cp_nombre']."</option>";
                  }

                 ?>

              </select>
          </div>



        </div>
    </div>



    </form>


  </div>

  <br></br>
  <div style="font-size: 12px;" class="text-center"> <?php echo "slxcontrol &copy; - " . date("Y") ?></div>

</body>



</html>
