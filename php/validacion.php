<?php
	ini_set("session.cookie_lifetime","0");
	ini_set("session.gc_maxlifetime","0");
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