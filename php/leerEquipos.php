<?php

    include("connection.php");
    $categoria_post = $_POST['categoria_id'];


    $rows = get_equipos_rows($categoria_post);
    echo get_html_equipos($rows);


    //TRAE TODOS LOS CAMIONES EN SU FORMATO HTML
    function get_html_equipos($rows){
      $conn = crearConexion();

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


        if($porcentaje <= 30){

            $html_camion_rojo = "<div class='camion-rojo'>" .
                                "<div id='".$row['cp_id']."' data_horometro_historico='".$row['cp_horometro_historico']."' class='col-md-6 camion estado-camion-l'>" .
                                "  <div class='espacio-ecam-l'> " .
                                "     <div class='col-lg-3'><img src='img/iconos-menu/bidon-b3.png' class='img-bidon-l'></div> " .
                                "       <div class='col-lg-9'> " .
                                "         <div class='div-num-cam-l'><span class='num-cam-l'> ".$row['id_mina']." </span></div> " .
                                "           <img src='img/iconos-menu/camion-c.png' class='img-camion-l' title='altura actual: [".$altura_value."] , ".$porcentaje."% '> " .
                                "      </div> " .
                                "     </div>".
                                "  </div>".
                                "</div>".
                                "</div>";
            $html_salida .= $html_camion_rojo;

         }else if($porcentaje > 30 && $porcentaje <= 40){

            $html_camion_amarillo = "<div class='camion camion-amarrillo'>" .
                                    "<div id='".$row['cp_id']."' class='col-lg-4 camion estado-camion-m'>" .
                                    "  <div class='espacio-ecam-m'> " .
                                    "    <div class='col-lg-3'><img src='img/iconos-menu/bidon-a3.png' class='img-bidon-m'></div>" .
                                    "      <div class='col-lg-9'>" .
                                    "        <div class='div-num-cam-m'><span class='num-cam-m'>".$row['id_mina']."</span></div>" .
                                    "          <img src='img/iconos-menu/camion-b2.png' class='img-camion-m' title='altura actual: [".$altura_value."] , ".$porcentaje."% '> " .
                                    "        </div>" .
                                    "     </div>" .
                                    "  </div>" .
                                    "</div>" .
                                    "</div>";
           $html_salida .= $html_camion_amarillo;

         }else if($porcentaje > 40 ){
           $html_camion_azul = "<div id='".$row['cp_id']."' class='camion camion-azul'> CTMM </div>";
           $html_salida .= $html_camion_azul;
         }

      }

      return $html_salida;
    }


    //TRAE EQUIPOS POR CATEGORIA
    function get_equipos_rows($categoria_id){
      $conn = crearConexion();
      $rows_equipos = $conn->query("SELECT * FROM tb_perfil_cont_cfg where cp_cat_id = '".$categoria_id."' ");
      return $rows_equipos;
    }
?>
