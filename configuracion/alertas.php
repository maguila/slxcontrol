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


</head>

<body>

  <?php
    include "menu.php";
    include("../php/connection.php");
  ?>

  <div class="container">


    <h2>Configuración de Alertas</h2>
    <small>Aca se muestran los campos actualmente configurados para todos los módulos</small>
    <hr></hr>

    <div class="row">

        <div class="col-md-3">
          <form method="post" action="alertasMant.php" class="form-inline" style="margin-bottom: 10px;">
            <button href="camposMant.php" class="btn btn-success" style="margin-bottom: 5px;" name="accion" value="crear">
              <span class="glyphicon glyphicon-plus"></span>
              <span>Crear Nueva Alerta</span>
            </button>
          </form>
        </div>


    </div>

    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th class="active">Nombre Equipo</th>
          <th class="active">Campo de Alerta</th>
          <th class="active">Descripción</th>
          <th class="active">Valor Minimo</th>
          <th class="active">Valor Maximo</th>
          <th class="active">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $conn = crearConexion();
          $sql = "SELECT * FROM tb_alert_cfg order by cp_nombre";
          $result = $conn->query($sql);

          while ($row = $result->fetch_assoc()) {

            $sql_equipo = "select * from tb_perfil_cont_cfg where cp_id = '".$row['cp_perfil_cont_id']."' ";
            $result_equipo = $conn->query($sql_equipo);
            $row_equipo    = $result_equipo->fetch_assoc();

            echo "<tr> " .
                 "<form action='alertasMant.php' method='post'>" .
                 " <input type='hidden' name='cp_id' value='".$row['cp_id']."'></input>" .
                 "<td> <input type='hidden' name='cp_perfil_cont_id' value='".$row['cp_perfil_cont_id']."'></input> ".$row_equipo['cp_nombre']. "</td>" .
                 "<td> <input type='hidden' name='cp_nombre' value='".$row['cp_nombre']      ."'></input> ".$row['cp_nombre']. "</td>" .
                 "<td> <input type='hidden' name='cp_descrip' value='".$row['cp_descrip']."'></input> ".$row['cp_descrip']. "</td>" .
                 "<td> <input type='hidden' name='cp_min' value='".$row['cp_min'] ."'></input> ".$row['cp_min']. "</td>" .
                 "<td> <input type='hidden' name='cp_max' value='".$row['cp_max']."'></input> ".$row['cp_max']. "</td>" .
                 "<td>" .
                 "   <button class='btn btn-success btn-sm' value='editar' name='accion'> " .
                 "      <span class='glyphicon glyphicon-edit'></span>" .
                 "   </button> " .
                 "   <button class='btn btn-danger btn-sm' value='eliminar' name='accion'> " .
                 "      <span class='glyphicon glyphicon-remove'></span>" .
                 "   </button> " .
                 "</td>" .
                 "</form> " .
                 "</tr>";
          }

        ?>
      </tbody>
    </table>

  </div>

  <br></br>
  <div style="font-size: 12px;" class="text-center"> <?php echo "slxcontrol &copy; - " . date("Y") ?></div>

</body>



</html>
