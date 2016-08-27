<?php

    include("connection.php");
    $categoria_post = $_POST['categoria_id'];


    get_equipos_rows($categoria_post);




    //TRAE EQUIPOS POR CATEGORIA
    function get_equipos_rows($categoria_id){

      switch ($categoria_id) {
        case  'all':
          $conn = crearConexion();
          $result = $conn->query("SELECT * FROM tb_categorias_cfg");
          //print_r($result);
          $myArray = array();
          while($row = $result->fetch_object())  {
             $tempArray = $row;
             array_push($myArray, $tempArray);
          }
          echo json_encode($myArray);
        break;
        case 'obtenerId':
          $catnombre = $_POST['nombreCategoria'];
          $conn = crearConexion();
          $result = $conn->query("SELECT cp_id FROM tb_categorias_cfg where cp_nombre = '".$catnombre."' ");
          $row = $result->fetch_array();
          $idcat = $row['cp_id'];

          $rows_equipos = $conn->query("SELECT cp_id,cp_nombre,id_mina FROM tb_perfil_cont_cfg where cp_cat_id = '".$idcat."' ");
          $numeroEquipos = 0;
          $myArray = [];
            foreach ($rows_equipos as $row) {
               $myArray[] = $row;
               $numeroEquipos++;
            }

          echo json_encode($myArray);
        break;
        case 'leerDatos':
          //echo "hola datos";
          $contnombre = $_POST['nombreCategoria'];
          print_r($catnombre);
          $conn = crearConexion();
          $result = $conn->query("SELECT cp_id FROM tb_perfil_cont_cfg where id_mina = '".$contnombre."' ");
          $row = $result->fetch_array();
          //$idcat = $row['cp_id'];

         // $rows_equipos = $conn->query("SELECT cp_id FROM tb_perfil_cont_cfg where cp_cat_id = '".$idcat."' ");

          //foreach ($rows_equipos as $row) {
            $id_equipo = $row["cp_id"];
            //print_r($id_equipo);
            $sql_ultima_lectura = "SELECT * FROM tb_colection where cp_id_perfil_cont= '".$id_equipo."' and cp_oid = (select max(cp_oid) from tb_colection where cp_id_perfil_cont= '".$id_equipo."' ) ";
            //print_r($sql_ultima_lectura);
            $result = $conn->query($sql_ultima_lectura);

            $myArray = [];
            foreach ($result as $row) {
               $myArray[] = $row;
               $numeroEquipos++;
            }

            echo json_encode($myArray);
         // }


        break;
      }

    }
?>