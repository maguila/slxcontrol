<?php

    include("connection.php");
    $conn = crearConexion();
    $rows = $conn->query('SELECT * FROM tb_perfil_cont_cfg');

    $html_salida = "";
    foreach ($rows as $row) {

      $id_equipo = $row["cp_id"];
      $sql_ultima_lectura = "SELECT * FROM tb_colection where cp_id_perfil_cont= '".$id_equipo."' and cp_oid = (select max(cp_oid) from tb_colection where cp_id_perfil_cont= '".$id_equipo."' ) ";

      $result = $conn->query($sql_ultima_lectura);

      $altura_value = 0;
      $altura_total = 20000;
      $porcentaje = 0;
      foreach ($result as $row1) {
        $altura_value = $row1['cp_campo4'];
      }

      $altura_value = $altura_value + 0;
      $porcentaje = ($altura_value * 100) / $altura_total;


        if($porcentaje < 20){
          $html_camion =
                         "<div id='".$row1['cp_id_perfil_cont']."' class='col-md-6 espacio-ecam-l camion-rojo'> " .
                         "    <div class='col-lg-3'><img src='img/iconos-menu/bidon-b3.png' class='img-bidon-l'></div> " .
                         "      <div class='col-lg-9'> " .
                         "        <div class='div-num-cam-l'><span class='num-cam-l'> ".$row['id_mina']." </span></div> " .
                         "          <img src='img/iconos-menu/camion-c.png' class='img-camion-l' title='altura actual: [".$altura_value."] , ".$porcentaje."% '> " .
                         "      </div> " .
                         "  </div>".
                         "</div>";
          $html_salida .= $html_camion;
       }

    }

    echo $html_salida;

    //print_r(json_encode($rows));
?>
