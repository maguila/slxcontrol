<?php

	if($_POST){
		$tipo = $_POST['tipo'];
		if($tipo == "categoria"){
			$fp=fopen("json/familia.json","w+");
			fwrite($fp, $_POST['datos']);
			fclose($fp);
		}
		if($tipo == "equipos"){
			$fp=fopen("json/equipos.json","w+");
			fwrite($fp, $_POST['datos']);
			fclose($fp);
		}
	}
?>