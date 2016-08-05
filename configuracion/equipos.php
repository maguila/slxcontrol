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


    <h2>Equipos Registrados</h2>
    <small>Aca se muestran los campos actualmente configurados para todos los módulos</small>
    <hr></hr>

    <form method="post" action="equiposMant.php">
      <button href="equiposMant.php" class="btn btn-success" style="margin-bottom: 5px;" name="accion" value="crear">
          <span class="glyphicon glyphicon-plus"></span>
          <span>Crear Nuevo Equipo</span>
      </button>

      <a href="equipos.php" class="btn btn-primary" style="margin-bottom: 5px;"> Refrescar Tabla</a>
    </form>

    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th class="active">ID</th>
          <th class="active">Nombre</th>
          <th class="active">IP</th>
          <th class="active">ID Mina</th>
          <th class="active">Horómetro Hist.</th>
          <th class="active">Categoria</th>
          <th class="active">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $conn = crearConexion();
          $sql = "SELECT * FROM tb_perfil_cont_cfg order by cp_id";
          $result = $conn->query($sql);

          while ($row = $result->fetch_assoc()) {

            $sql_categoria_nombre = "select * from tb_categorias_cfg where cp_id = '". $row['cp_cat_id'] ."' ";
            $result_categoria     = $conn->query($sql_categoria_nombre);
            $row_categoria        = $result_categoria->fetch_assoc();
            $nombre_categoria     = $row_categoria['cp_nombre'];

            echo "<tr> " .
                 "<form action='equiposMant.php' method='post'>" .
                 "<td> <input type='hidden' name='cp_id' value='".$row['cp_id']."'></input> ".$row['cp_id']. "</td>" .
                 "<td> <input type='hidden' name='cp_nombre' value='".$row['cp_nombre']."'></input> ".$row['cp_nombre']. "</td>" .
                 "<td> <input type='hidden' name='cp_ip'  value='".$row['cp_ip'] ."'></input> ".$row['cp_ip']. "</td>" .
                 "<td> <input type='hidden' name='id_mina'  value='".$row['id_mina'] ."'></input> ".$row['id_mina']. "</td>" .
                 "<td> <input type='hidden' name='cp_horometro_historico'  value='".$row['cp_horometro_historico'] ."'></input> ".$row['cp_horometro_historico']. "</td>" .
                 "<td> <input type='hidden' name='cp_cat_id'  value='".$row['cp_cat_id'] ."'></input>  <a class='btn btn-primary btn-sm' href='categorias.php?cat=".$row['cp_cat_id']."'>".$nombre_categoria."</a> </td>" .
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
