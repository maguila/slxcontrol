<?php

	include("connection.php");

	switch($_POST["tipo"]){ 
		case 'alerta': 
			//print_r($usuario);
			$i = 0;
			$lsnom = $_POST["lsnom"];
			$mysqli = crearConexion();

			$query = "SELECT * FROM tb_perfil_cont_cfg WHERE id_mina = '".$lsnom."'";
			//print_r($query);
			$result = $mysqli->query($query);	
			$row = $result->fetch_array(MYSQLI_ASSOC);
			//print_r($row);
			$idequipo = $row['cp_id'];
			print_r($idequipo);

		    $query = "SELECT * FROM tb_alert_cfg WHERE cp_perfil_cont_id = $idequipo";
			$result = $mysqli->query($query);
			$rows[$i] = $i;
			//print_r($result);
			if($mysqli->affected_rows>1){
				//print_r(1);
				//$row = $result->fetch_array();
				//print_r($row);
				while($row = $result->fetch_array()){
					//print_r($row['cp_id']);
					//print_r($row);
					$est_id = $row['cp_id'];
					print_r($est_id);
					$j = 0;
					$query = "SELECT * FROM tb_alert WHERE cp_perfil_cont_id = $est_id";
					$result = $mysqli->query($query);
				    if($mysqli->affected_rows==0){
				    	//print_r(-1);
				    	$i++;
				    }
				    if($mysqli->affected_rows==1){
				    	$rows[$i] = $row_temp;
				    	$i++;
				    }
				    if($mysqli->affected_rows>1){
						while($row_temp = $result->fetch_array())	{
							$rows[$i] = $row_temp;
							$i++;
						}
					
					}
				}
			}
			/*foreach($rows as $row)	{
			}*/
			print_r(json_encode($rows));

			/* liberar la serie de resultados */
			$result->free();

			/* cerrar la conexión */
			$mysqli->close();
		break;
		case 'mensaje': 
			//print_r($usuario);
			$i = 0;
			$id = $_POST["id"];
			$mysqli = crearConexion();
		    $query = "SELECT * FROM tb_comentarios WHERE EQUIPO__COM =$id ORDER BY FECHA___COM DESC";
			$result = $mysqli->query($query);
			$rows[$i] = $i;
			//print_r($result);
			while($row = $result->fetch_array()){
				$rows[$i] = $row;
				$i++;
			}
			/*foreach($rows as $row)	{
			}*/
			print_r(json_encode($rows));

			/* liberar la serie de resultados */
			$result->free();

			/* cerrar la conexión */
			$mysqli->close();
		break;
		case 'contusuario': 
			//print_r($usuario);
			$i = 0;
			$id = $_POST["id"];
			$mysqli = crearConexion();
		    $query = "SELECT * FROM tb_control_usuario WHERE ID______EQP =$id ORDER BY TIME____CUS DESC";
			$result = $mysqli->query($query);
			$rows[$i] = $i;
			//print_r($result);
			while($row = $result->fetch_array()){
				//$rows[$i] = $row;
				$query2 = "SELECT NOMBRE__USR FROM tb_usuario WHERE ID______USR =".$row['ID______USR'];
				$result2 = $mysqli->query($query2);	
				$row2 = $result2->fetch_array();
				$row[] = $row2;
				$rows[$i] = $row;
				$i++;
			}
			/*foreach($rows as $row)	{
			}*/
			print_r(json_encode($rows));

			/* liberar la serie de resultados */
			$result->free();

			/* cerrar la conexión */
			$mysqli->close();
		break;
		case 'eliminar_mensaje': 
			//print_r($usuario);
			$id = $_POST['id']; 
			$mysqli = crearConexion();
		    $query = "DELETE FROM tb_comentarios WHERE ID______COM =$id";
			$result = $mysqli->query($query);
			//print_r($result);
			while($row = $result->fetch_array()){
				$rows[] = $row;
			}
			/*foreach($rows as $row)	{
			}*/
			print_r(json_encode($rows));

			/* liberar la serie de resultados */
			$result->free();

			/* cerrar la conexión */
			$mysqli->close();
		break;
		case 'eliminar_alerta': 
			//print_r($usuario);
			$id = $_POST['id']; 
			$mysqli = crearConexion();
		    $query = "DELETE FROM tb_alerta WHERE ID______ALE =$id";
			$result = $mysqli->query($query);
			//print_r($result);
			while($row = $result->fetch_array()){
				$rows[] = $row;
			}
			/*foreach($rows as $row)	{
			}*/
			print_r(json_encode($rows));

			/* liberar la serie de resultados */
			$result->free();

			/* cerrar la conexión */
			$mysqli->close();
		break;
	}
?>