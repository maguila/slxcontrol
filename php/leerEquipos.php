<?php

    $f3 = require('fatfree-master/lib/base.php');
    $db=new DB\SQL('mysql:host=localhost;port=3306;dbname=slxcontrol', 'root', 'mysql');

    $rows = $db->exec('SELECT * FROM tb_perfil_cont_cfg');



    $html_salida = "";
    foreach ($rows as $row) {
      $html_camion = "<div class='estado-camion-l'> " .
                     " <div class='col-lg-6 espacio-ecam-l'> " .
                     "    <div class='col-lg-3'><img src='img/iconos-menu/bidon-b3.png' class='img-bidon-l'></div> " .
                     "      <div class='col-lg-9'> " .
                     "        <div class='div-num-cam-l'><span class='num-cam-l'> ".$row['id_mina']." </span></div> " .
                     "          <img src='img/iconos-menu/camion-c.png' class='img-camion-l'> " .
                     "      </div> " .
                     "  </div>".
                     "</div>";

      $html_salida .= $html_camion;
    }

    echo $html_salida;

    //print_r(json_encode($rows));
?>
