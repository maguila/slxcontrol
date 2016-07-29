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

    if($_GET['cat']!=NULL){
      $filtro = $_GET['cat'];
    }

    if($_POST['filtro'] != NULL){
      $filtro = $_POST['filtro'];
    }

  ?>

  <div class="container">

    <h2>Campos de Lectura</h2>
    <small>Aca se muestran los campos actualmente configurados para todos los módulos</small>
    <hr></hr>


      <div class="row">

          <div class="col-md-4">
            <form method="post" action="camposMant.php" class="form-inline" style="margin-bottom: 10px;">
              <button href="camposMant.php" class="btn btn-success" style="margin-bottom: 5px;" name="accion" value="crear">
                <span class="glyphicon glyphicon-plus"></span>
                <span>Crear Nuevo Campo de Lectura</span>
              </button>
            </form>
          </div>

          <div class="col-md-8">
            <form method="post" action="campos.php" class="form-inline" style="margin-bottom: 10px;">

              <div class="form-group">
                <label style="margin-right: 10px;">Filtro Categoría </label>
                  <select class="form-control" onchange="this.form.submit();" name="filtro">
                    <?php
                    $sql = "SELECT * FROM tb_categorias_cfg order by cp_nombre";
                    $result = $conn->query($sql);
                    echo "<option value='%'>Seleccione una Categoria</option>";
                    while($row = $result->fetch_assoc()){
                      if( $row['cp_id'] == $filtro)
                        echo "<option selected value='".$row['cp_id']."'>".$row['cp_nombre']."</option>";
                      else
                        echo "<option value='".$row['cp_id']."'>".$row['cp_nombre']."</option>";
                    }
                    ?>
                  </select>
              </div>

            </form>
          </div>

      </div>
    </form>




    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Nombre Campo</th>
          <th>Descripción</th>
          <th>Tipo Campo</th>
          <th>Categoría</th>
          <th class="text-center">Orden Lectura</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php

          if($filtro != NULL)
            $sql = "SELECT * FROM tb_campos_lectura where categorias_id like '%".$filtro."%' order by categorias_id, orden_lectura_arduino";
          else
            $sql = "SELECT * FROM tb_campos_lectura order by categorias_id, orden_lectura_arduino";

          $result = $conn->query($sql);

          while ($row = $result->fetch_assoc()) {

            $sql_categoria_nombre = "select * from tb_categorias_cfg where cp_id = '". $row['categorias_id'] ."' ";
            $result_categoria     = $conn->query($sql_categoria_nombre);
            $row_categoria        = $result_categoria->fetch_assoc();
            $nombre_categoria     = $row_categoria['cp_nombre'];

            $clase_tr = $_GET['cat'] == $row['cp_id'] ? 'info' : '' ;



            echo "<tr> " .
                 "<form action='camposMant.php' method='post'>" .
                 "<input type='hidden' name='id' value='".$row['id'] ."'></input> " .
                 "<td> <input type='hidden' name='campo'         value='".$row['campo']      ."'>   </input> ".$row['campo']. "</td>" .
                 "<td> <input type='hidden' name='descripcion'   value='".$row['descripcion']."'>   </input> ".$row['descripcion']. "</td>" .
                 "<td> <input type='hidden' name='tipo_campo'    value='".$row['tipo_campo'] ."'>   </input> ".$row['tipo_campo']. "</td>" .
                 "<td> <input type='hidden' name='categorias_id' value='".$row['categorias_id']."'> </input>  <a href='categorias.php?cat=".$row['categorias_id']."'>" . $nombre_categoria . "</a> </td>" .
                 "<td align=CENTER> <input type='hidden' name='orden_lectura_arduino'   value='".$row['orden_lectura_arduino']."'>   </input> ".$row['orden_lectura_arduino']. "</td>" .
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
