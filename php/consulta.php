<?php	
	/*if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400'); 
	}

	if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

	    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
	        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

	    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
	        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
	}*/
	include("connection.php");
	$usuario  = $_POST['usuario'];
	$password = $_POST['password'];
	
	//print_r($usuario);
	$mysqli = crearConexion();
    $query = "SELECT * FROM tb_usuario";
	$result = $mysqli->query($query);
    if($mysqli->affected_rows==0){
    	print_r(-1);
    }else{
	/* array asociativo */
	//$row = $result->fetch_array(MYSQLI_ASSOC);
	//print_r($row)
	while($row = $result->fetch_array())	{
		$rows[] = $row;
	}
	$bandera = 2;
	
	foreach($rows as $row)	{
		if($row['cp_rut'] == $usuario){
			if($row['cp_password'] == $password){
				$bandera = 0;
				$nomnbre_usr = $row['cp_nombre'];
				$id_usuario = $row['cp_id'];
				$email_usuario = $row['cp_correo'];
				$nivel_usuario = $row['cp_nivel_id'];
				$foto_usuario = $row['cp_foto'];	
				$estado_usuario = $row['cp_estado_cfg_id']; 

				 $query = "SELECT * FROM tb_cliente_cfg";
				 $result = $mysqli->query($query);
				 $row = $result->fetch_array(MYSQLI_ASSOC);

				 $cliente_nom = $row['cp_nombre']; 

			}
			else{
				$bandera = 1;
			}
		}
	}
	
	if($bandera == 0){	
		if($estado_usuario == 1){
			session_start();
			print_r($bandera);
			$_SESSION['ID______USR'] = $id_usuario;
			$_SESSION['NOMBRE__USR'] = $nomnbre_usr;
			$_SESSION['EMAIL___USR'] = $email_usuario;
			$_SESSION['tipo'] = $nivel_usuario;
			$_SESSION['FOTO____USR'] = $foto_usuario;
			$_SESSION['cliente'] = $cliente_nom;
		}
		else{
			$bandera = 3;
			print_r($bandera);
		}
	}
	else{
		//$bandera = 4;
		print_r($bandera);
	}	
}
	//printf ("%s (%s)\n", $row["NOMBRE__USR"], $row["PASSWORDUSR"]);

	/* liberar la serie de resultados */
	$result->free();

	/* cerrar la conexión */
	$mysqli->close();
		
?>