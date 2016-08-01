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


    <h2>Últimas Lecturas</h2>
    <small>A continuacion se muestras las ultimas <b>40 lecturas</b> desde arduino</small>
    <hr></hr>

    <a class="btn btn-primary" href="lecturas.php" style="margin-bottom: 5px;">
        Refrescar Tabla de Lecturas
    </a>

    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th class="active">ID</th>
          <th class="active">cp_oid</th>
          <th class="active">Fecha Normal</th>
          <th class="active">id_equipo</th>
          <th class="bg-primary">campo1</th>
          <th class="bg-primary">campo2</th>
          <th class="bg-primary">campo3</th>
          <th class="bg-primary">campo4</th>
          <th class="bg-primary">campo5</th>
          <th class="bg-primary">campo6</th>
          <th class="bg-primary">campo7</th>
          <th class="bg-primary">campo8</th>
          <th class="bg-primary">campo9</th>
          <th class="bg-primary">campo10</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $conn = crearConexion();
          $sql = "SELECT * FROM tb_colection order by cp_id DESC LIMIT 40";
          $result = $conn->query($sql);


          while ($row = $result->fetch_assoc()) {

            $epoch = $row['cp_oid'];
            $fecha_convertida = date('d-m-Y H:i:s ', $epoch);

            $sql_equipo    = "select * from tb_perfil_cont_cfg where cp_id = '". $row['cp_id_perfil_cont'] ."' ";
            $result_equipo = $conn->query($sql_equipo);
            $row_equipo    = $result_equipo->fetch_assoc();
            $nombre_equipo = $row_equipo['cp_nombre'];

            echo "<tr> " .
                 "<form action='camposMant.php' method='post'>" .
                 "<td> <input type='hidden' name='cp_id'  value='".$row['cp_id'] ."'></input> ".$row['cp_id']. "</td>" .
                 "<td> <input type='hidden' name='cp_oid' value='".$row['cp_oid'] ."'></input> ".$row['cp_oid']. "</td>" .
                 "<td> <input type='hidden' name='cp_oid' value='". $row['cp_oid']  ."'></input> ". $fecha_convertida  . "</td>" .
                 "<td> <input type='hidden' name='cp_id_perfil_cont' value='".$row['cp_id_perfil_cont']."'></input> ". $nombre_equipo  . "</td>" .
                 "<td> <input type='hidden' name='cp_campo1'  value='".$row['cp_campo1'] ."'></input> ".$row['cp_campo1']. "</td>" .
                 "<td> <input type='hidden' name='cp_campo2' value='".$row['cp_campo2']."'></input> ".$row['cp_campo2']. "</td>" .
                 "<td> <input type='hidden' name='cp_campo3' value='".$row['cp_campo3']."'></input> ".$row['cp_campo3']. "</td>" .
                 "<td> <input type='hidden' name='cp_campo4' value='".$row['cp_campo4']."'></input> ".$row['cp_campo4']. "</td>" .
                 "<td> <input type='hidden' name='cp_campo5' value='".$row['cp_campo5']."'></input> ".$row['cp_campo5']. "</td>" .
                 "<td> <input type='hidden' name='cp_campo6' value='".$row['cp_campo6']."'></input> ".$row['cp_campo6']. "</td>" .
                 "<td> <input type='hidden' name='cp_campo7' value='".$row['cp_campo7']."'></input> ".$row['cp_campo7']. "</td>" .
                 "<td> <input type='hidden' name='cp_campo8' value='".$row['cp_campo8']."'></input> ".$row['cp_campo8']. "</td>" .
                 "<td> <input type='hidden' name='cp_campo9' value='".$row['cp_campo9']."'></input> ".$row['cp_campo9']. "</td>" .
                 "<td> <input type='hidden' name='cp_campo10' value='".$row['cp_campo10']."'></input> ".$row['cp_campo10']. "</td>" .
                 "</form> " .
                 "</tr>";
          }

          $conn->close();


        ?>
      </tbody>
    </table>

  </div>

  <br></br>
  <div style="font-size: 12px;" class="text-center"> <?php echo "slxcontrol &copy; - " . date("Y") ?></div>

</body>



</html>
