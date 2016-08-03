<?php

    include("connection.php");
    $conn = crearConexion();
    $rows = $conn->query('SELECT * FROM tb_perfil_cont_cfg');

    $html_salida = "";
    foreach ($rows as $row) {

      $id_equipo = $row["cp_id"];
      $sql_ultima_lectura = "SELECT * FROM tb_colection where cp_id_perfil_cont= '".$id_equipo."' and cp_oid = (select max(cp_oid) from tb_colection where cp_id_perfil_cont= '".$id_equipo."' ) ";

      $result = $conn->query($sql_ultima_lectura);

      $altura_value = "-";
      foreach ($result as $key => $value) {
        $altura_value = "$value";
      }

      $html_camion = "<div class='estado-camion-l'> " .
                     " <div class='col-lg-6 espacio-ecam-l'> " .
                     "    <div class='col-lg-3'><img src='img/iconos-menu/bidon-b3.png' class='img-bidon-l'></div> " .
                     "      <div class='col-lg-9'> " .
                     "        <div class='div-num-cam-l'><span class='num-cam-l'> ".$altura_value." </span></div> " .
                     "          <img src='img/iconos-menu/camion-c.png' class='img-camion-l'> " .
                     "      </div> " .
                     "  </div>".
                     "</div>";

      $html_salida .= $html_camion;
    }

    echo $html_salida;

    //print_r(json_encode($rows));
?>
