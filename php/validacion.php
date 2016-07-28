<?php
	session_start();
	//print_r("entro al validar");
	if($_SESSION){		
		if($_SESSION['NOMBRE__USR']){
			echo json_encode($_SESSION);
		}
	}
	else{
		echo 0;
	}
?>