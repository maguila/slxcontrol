<?php
	$fp=fopen("/opt/lampp/htdocs/mimcontrol/php/json/datos.json","r");
	$ar1 = array();
	$ar2 = array();
	$i = 0;
	 while(!feof($fp))
	{
		$linea = fgets($fp);
		//print_r($linea);
		if($linea != null){
			$porsion = explode("|", $linea);
			//print_r($porsion);
			$ar2["Nombre"] = $porsion[0];
			//print_r($porsion[2]);
			if($porsion[2] != "201" && $porsion[2] != "301" && $porsion[2] != ""){
				//print_r("entro al mensaje != null");
				$men = explode("\"",$porsion[2]);
				$ar2["Mensaje"] = $men[1];
			}
			else{
				//print_r("entro al mensaje 201 || 301");
				$ar2["Mensaje"] = '"'+$porsion[2]+'"';
			}
			$ar2["Datos"] = $porsion[1];
			$est = explode("\n",$porsion[3]);
			$ar2["Estado"] = $est[0];
			$ar1[$i] = $ar2;
			$i++;
		}
	}
	$srt = json_encode($ar1);
	//print_r($srt);
	fclose($fp);
		
	$fp=fopen("/opt/lampp/htdocs/mimcontrol/php/json/equipos.json","w+");
	fwrite($fp, $srt);
	fclose($fp);
?>