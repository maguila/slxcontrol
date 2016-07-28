<?php

include("connection.php");


if($_POST){

	switch($_POST["tipo"]){
		case 'agregar_com':
			$mysqli = crearConexion();
			$comentario = $_POST["data"];
			$nom_equi = $_POST["equipo"];

			$query = "SELECT * FROM tb_perfil_cont_cfg WHERE cp_nombre = '".$nom_equi."'";
			//print_r($query);
			$result = $mysqli->query($query);	
			$row = $result->fetch_array(MYSQLI_ASSOC);
			//print_r($row);
			$idequipo = $row['cp_id'];
			session_start();
			$usuario = $_SESSION['ID______USR'];
			date_default_timezone_set("Chile/Continental");
			$fecha_actual = time();

			
			$query = "INSERT INTO tb_comentarios (cp_id, cp_perfil_id, cp_usuario_id, cp_oid, cp_coment) VALUES (NULL, '$idequipo', '$usuario' ,'$fecha_actual', '$comentario')";
			$mysqli->query($query);
			if($mysqli){
				print_r(1);
			}
			else{
				print_r(0);
			}
			/* cerrar la conexión */
			$mysqli->close();
			
		break;
	}	
}
if($_GET){
	switch($_GET["tipo"]){
		case 'all_coment':
			$nombre = $_GET["nom"];
			$mysqli = crearConexion();

			$query = "SELECT * FROM tb_perfil_cont_cfg WHERE cp_nombre = '".$nombre."'";
			//print_r($query);
			$result = $mysqli->query($query);	
			$row = $result->fetch_array(MYSQLI_ASSOC);
			//print_r($row);
			$idequipo = $row['cp_id'];

			$query = "SELECT * FROM tb_comentarios WHERE cp_perfil_id = '".$idequipo."'";
			//print_r($query);
			$result = $mysqli->query($query);	
			while($row = $result->fetch_array())	{
				$rows[] = $row;
			}
			echo json_encode($rows);
			$mysqli->close();
		break;
	}
}

?>