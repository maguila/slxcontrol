<?php
	switch($_GET["tipo"]){
		case 'categ':
			$nombre = "json/familia.json";
			if(file_exists($nombre)){
				$linea2 = array();
				$file = fopen($nombre,"r") or exit("No se pudo abrir el archivo");	
				/*$linea = fgets($file);
				fclose($file);
				$linea->datos = $linea;
				$linea2 = array('datos' => $linea);*/

				$linea = fgets($file);
				fclose($file);
				$linea2["Familia"] = $linea;
				echo json_encode($linea2);
			}
		break;
	}
?>