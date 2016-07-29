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
    $conn = crearConexion();
  ?>

  <script>
    $(function(){
      $("[data-toggle='popover']").popover({trigger:'hover'});
    });
  </script>

  <div class="container">


    <h2>Categorías</h2>
    <small>Aca podras crear, editar y eliminar las categorias</small>
    <hr></hr>

    <form method="post" action="categoriasMant.php">
      <button class="btn btn-success" style="margin-bottom: 5px;" name="accion" value="crear">
        <span class="glyphicon glyphicon-plus"></span>
        <span>Crear Nueva Categoría</span>
      </button>
    </form>

    <table class="table table-bordered table-hover table-inverse">
      <thead>
        <tr>
          <th class="active">Nombre Categoría</th>
          <th class="active">Descripción</th>
          <th class="active text-center">Cantidad de Campos</th>
          <th class="active">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php

          $sql = "SELECT * FROM tb_categorias_cfg order by cp_nombre";
          $result = $conn->query($sql);

          while ($row = $result->fetch_assoc()) {

            $sql_count_campos = "select campo from tb_campos_lectura where categorias_id=".$row['cp_id'] . " order by orden_lectura_arduino ";
            $result_count     = $conn->query($sql_count_campos);

            $lista_campos_html = " ";
            $cantidad_campos   = 0;
            while( $row_count = $result_count->fetch_assoc() ){
              $cantidad_campos++;
              $lista_campos_html = $lista_campos_html . " " . $row_count['campo'] . "<br> ";
            }


            $cantidad_campos  = $cantidad_campos > 0 ? "<b>".$cantidad_campos."</b>" : $cantidad_campos;


            $clase_tr = $_GET['cat'] == $row['cp_id'] ? 'info' : '' ;

            echo "<tr class='".$clase_tr."'> " .
                 "<form action='categoriasMant.php' method='post'>" .
                 "<input type='hidden' name='cp_id' value='".$row['cp_id'] ."'></input>" .
                 "<td> <input type='hidden' name='cp_nombre'       value='".$row['cp_nombre'] ."'></input> ".$row['cp_nombre']. "</td>" .
                 "<td> <input type='hidden' name='cp_descripcion' value='".$row['cp_descripcion'] ."'></input> ".$row['cp_descripcion']. "</td>" .
                 "<td align=center> <a style='cursor:pointer;' href='campos.php?cat=".$row['cp_id']."' data-html='true' data-toggle='popover' title='Campos Definidos' data-content='".$lista_campos_html."'> " . $cantidad_campos . "</a> </td>" .
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
