<?php

include("connection.php");
$db = conn_local();

define("ACCION_CREAR"   , "crear");
define("ACCION_EDITAR"  , "editar");
define("ACCION_ELIMINAR", "eliminar");

function getQuery($sql){
  $link  = conn_local();
  $query = mysql_query($sql, $link);
  return $query;
}

function addrows($sql, $columns, $clase ,$pathMantPage){

  $db = conn_local();
  $query = mysql_query($sql , $db);

  while($row = mysql_fetch_assoc($query)) {
      echo "<tr>";
      foreach ($columns as $key) {
        echo "<td name='".$key."'>" . $row[$key] . "</td>";
      }

      echo "<td> ";

      echo "<div class='' style='width: 100%;'>";

      echo "<form style='float: left; padding-right: 5px;' method='post' action='".$pathMantPage."'>";

      foreach ($row as $key => $value){
        echo "<input type='hidden' name='".$key."' value='".$row[$key]."'/>";
      }

      echo "<input type='hidden' name='id' value='".$row["id"]."'/>";
      echo "<input type='hidden' name='clase' value='".$clase."'/>";
      echo "<input type='hidden' name='accion' value='editar'/>";
      echo "<button type='submit' class='btn btn-default btn-sm'> " .
           "	<span class='glyphicon glyphicon-pencil'></span> Editar " .
           "</button> ";
      echo "</form> ";


      echo "<form style='float: left;' method='post' action='".$pathMantPage."'>";
      foreach ($row as $key => $value){
        echo "<input type='hidden' name='".$key."' value='".$row[$key]."'/>";
      }
      echo "<input type='hidden' name='id' value='".$row["id"]."'/>";
      echo "<input type='hidden' name='clase' value='".$clase."'/>";
      echo "<input type='hidden' name='accion' value='eliminar'/>";
      echo "<button type='submit' class='btn btn-default btn-sm'> " .
           "	<span class='glyphicon glyphicon-trash'></span> Eliminar " .
           "</button>";
      echo "</form> ";

      echo "</div>";


      echo "</td>";
      echo "</tr>";
  }

}

function crear_objeto($_POST_ARRAY){
  //SE INSTANCIA LA CLASE Y SE ASIGNAN SUS ATRIBUTOS TRAIDOS DESDE EL FORMULARIO
  $clase   = $_POST_ARRAY['clase'];
  $entidad = new $clase;
  foreach( array_keys( $entidad->fields ) as $key){
    $entidad->fields[$key] = $_POST_ARRAY[$key];
  }
  $entidad->insert();

  cerrar_conexion($db);
  redirect($_POST_ARRAY['url_redirect']);
}

function editar_objeto($_POST_ARRAY){
  $clase     = $_POST_ARRAY['clase'];
  $campos_pk = $_POST_ARRAY['campos_pk'];
  $entidad   = new $clase;
  foreach( array_keys( $entidad->fields ) as $key){
    $entidad->fields[$key] = $_POST_ARRAY[$key];
  }
  //$eval = "\$entidad->update(\$entidad->get_".$campo_pk."(), ".$campo_pk." );";
  $eval = "\$entidad->update(".$campos_pk.");";
  eval($eval);

  cerrar_conexion($db);
  redirect($_POST_ARRAY['url_redirect']);
}

function eliminar_objeto($_POST_ARRAY){
  //SE INSTANCIA LA CLASE Y SE ASIGNAN SUS ATRIBUTOS TRAIDOS DESDE EL FORMULARIO
  $clase   = $_POST_ARRAY['clase'];
  $campos_pk = $_POST_ARRAY['campos_pk'];
  $entidad = new $clase;
  foreach( array_keys( $entidad->fields ) as $key){
    $entidad->fields[$key] = $_POST_ARRAY[$key];
  }

  $eval = "\$entidad->delete(".$campos_pk.");";
  eval($eval);

  cerrar_conexion($db);
  redirect($_POST_ARRAY['url_redirect']);
}

function getValorAtributo($nombre){
  echo $_POST[$nombre];
}

function isDisable(){
  if($_POST['accion'] == 'eliminar')
    echo " disabled";

}

function mostrar_errores(){
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
}

function redirect($pathPage){
  echo '<script type="text/javascript">' .
       'window.location="'.$pathPage.'"; ' .
       '</script>'
  ;
}


 ?>
