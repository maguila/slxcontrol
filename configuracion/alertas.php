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

    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Nombre Alerta</th>
          <th>Descripción</th>
          <th>Valor Maximo</th>
          <th>Valor Minimo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $conn = crearConexion();
          $sql = "SELECT * FROM tb_alert_cfg order by cp_nombre";
          $result = $conn->query($sql);

          while ($row = $result->fetch_assoc()) {
            echo "<tr> " .
                 "<form action='camposMant.php' method='post'>" .
                 "<td> <input type='hidden' name='cp_nombre'       value='".$row['cp_nombre']      ."'></input> ".$row['cp_nombre']. "</td>" .
                 "<td> <input type='hidden' name='cp_descrip' value='".$row['cp_descrip']."'></input> ".$row['cp_descrip']. "</td>" .
                 "<td> <input type='hidden' name='cp_max'  value='".$row['cp_max'] ."'></input> ".$row['cp_max']. "</td>" .
                 "<td> <input type='hidden' name='cp_mim' value='".$row['cp_mim']."'></input> ".$row['cp_mim']. "</td>" .
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
  <div style="font-size: 12px;" class="text-center"> <?php echo "MimControl &copy; - " . date("Y") ?></div>

</body>



</html>
