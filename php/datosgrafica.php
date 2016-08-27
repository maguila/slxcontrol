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

	switch($_POST["grafico"]){ 

		case 'all': 
			//print_r($usuario);
			$mysqli = crearConexion();
		    $query = "SELECT * FROM tb_datos_equipo";
			$result = $mysqli->query($query);
			while($row = $result->fetch_array())	{
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

		case 'diario':
			$id = $_POST["id"];
			ini_set('memory_limit', '1024M'); 
			date_default_timezone_set("Chile/Continental");
			$fecha_actual = strtotime('now');
			$hora_actual = strftime("%H:%M:%S", $fecha_actual);
			$hora_dia_final = strtotime("23:59:55", $fecha_actual);
			$fecha_actual_set = strftime("%Y-%m-%d %H:%M:%S", $fecha_actual);
			//print_r($fecha_actual_set."\n");

			/*print_r("<--------------------------------------------->\n");
			print_r("hora dia final = ".$hora_dia_final."\n");
			print_r("<--------------------------------------------->\n");*/
			$dia_anterior = strtotime('-24 HOURS',$fecha_actual);
			$dia_anterior_set = strftime("%Y-%m-%d", $dia_anterior);
			//print_r($dia_anterior_set."\n");
			
			//$fecha_temp = strftime("%H:%M",$dia_anterior);
			//print_r($fecha_temp);
			$hora_dia_anterior = strftime("%H:%M:%S", $dia_anterior);
			$hora_sola = strtotime($hora_dia_anterior);
			$rows2 =  array();
			$fila =  array();
			$fila_temp = array(); 
			/*$fecha = date('Y-m-d H:i:s', $semana_anterior);*/
			//print_r($hora_dia_anterior."\n");
			/*$hora_tem = strftime("%H", $dia_anterior).":00";
			$hora_tem = strtotime($hora_tem);
			$hora_tem = strtotime('+1 HOURS',$hora_tem);*/
			//print_r($hora_tem."\n");
			$hora_tem = $hora_sola;
			//print_r($hora_tem."\n");
			$mysqli = crearConexion();
		    $query = "SELECT * FROM tb_datos_equipo WHERE ID_EQUIPDEQ = $id AND TIEMPO__DEQ BETWEEN '$dia_anterior_set' AND '$fecha_actual_set'";
			$result = $mysqli->query($query);			
			while($row = $result->fetch_array())	{				
				$rows[] = $row;
			}
			/*$hora_control = "00:00:00";
			$hora_formateada = strtotime($hora_control);
			$inicio = 0;
			$suma = 0;
			$contador = 0;*/
			$hora_tem = strtotime('+2 HOURS',$hora_tem);
			//print_r("Hora temporal ----------------------->   ".$hora_tem."\n");
			/*$fecha_espacial;
			$temp_espacial;*/
			$i = 0;
			foreach($rows as $row)	{
				$fecha_tem = $row['TIEMPO__DEQ'];
				//print_r($fecha_tem."\n");
				$fecha_tem = strtotime($fecha_tem);
				$fecha_tem_hora = strftime("%H:%M:%S", $fecha_tem);
				$fecha_tem_hora2 = strftime("%H:%M", $fecha_tem);
				//$fechaEsp = $row['TIEMPO__DEQ'];
				//$fecha = strftime("%H:%M", strtotime($fechaEsp));
				$fecha = strtotime($fecha_tem_hora);
				//print_r(strftime("%H:%M",$fechaEsp)."\n");
				//print_r($fecha."\n");

				if($fecha_tem >= $dia_anterior){
					//print_r("entro al if");
					if($fecha_tem < $fecha_actual){
						if($i == 0){
							$fila['fecha'] = $fecha_tem_hora2;
							$fila['temp_alta'] = floatval($row['TEMPALTADEQ']);							
							/*$fila['temp_baja'] = floatval($row['TEMPBAJADEQ']);*/
							$fila['temp_control'] = floatval($row['TEMPCONTDEQ']);
							$rows2[] = $fila;
							$i++;
							/*print_r($fecha."-".$hora_tem."\n");
							print_r("entro al 1 if \n");
							print_r($fecha_tem_hora."\n");*/
						}
						if($fecha < $hora_tem){
							$fila_temp['temp_alta'] = floatval($row['TEMPALTADEQ']);
							$fila_temp['fecha'] = $fecha_tem_hora2;
							/*$fila_temp['temp_baja'] = floatval($row['TEMPBAJADEQ']);*/
							$fila_temp['temp_control'] = floatval($row['TEMPCONTDEQ']);
							//print_r($fecha."-".$hora_tem."\n");
							$fecha_tem2 = strftime("%H:%M:%S", $hora_tem);
							/*print_r("hora siguiente temp ".$fecha_tem2."\n");
							print_r("entro al 2 if \n");
							print_r($fecha_tem_hora."\n");*/
						}
						if($fecha >= $hora_tem){
							$fila['fecha'] = $fila_temp['fecha'];
							$fila['temp_alta'] = $fila_temp['temp_alta'];							
							/*$fila['temp_baja'] = $fila_temp['temp_baja'];*/
							$fila['temp_control'] = $fila_temp['temp_control'];
							$rows2[] = $fila;
							$hora_tem = strtotime('+2 HOURS',$hora_tem);
							$fecha_tem_hora = strftime("%H:%M:%S", $hora_tem);
							/*print_r("<--------------------------------------------->\n");
							print_r("hora siguiente = ".$fecha_tem_hora."\n");
							print_r($fecha."-".$hora_tem."\n");
							print_r("entro al 3 if \n");
							print_r($fila_temp['fecha']."\n");							
							print_r("<--------------------------------------------->\n");*/

						}
						if($fecha >= $hora_dia_final){
							$hdf_temp = $hora_dia_final + 1;
							if($hora_tem > $hdf_temp && $i==1){
								//print_r("hora temp ".$hora_tem);
								$temp2 = strftime("%H:%M", $hora_tem);
								//print_r("hora = ".$temp2."\n");
								$hora_r = strftime("%H", $hora_tem);
								//print_r($hora_r);
								$minutos = strftime("%M", $hora_tem);
								/*$hora_r2 = strtotime($hora_r);
								print_r($hora_r2);
								if($hora_r2 > 3600){
									print_r("hola");
								}*/
								//$hora_tem = $hdf_temp - 86400;
								$hora_tem = strtotime('-24 HOURS',$hdf_temp);
								//print_r("hora temp 2 ".$hora_tem);
								$temp2 = strftime("%H:%M", $hora_tem);
								//print_r("hora 2 = ".$temp2."\n");
								$hora_tem = strtotime('+'.$hora_r.'HOURS',$hora_tem);
								//print_r($hora_tem);
								$hora_tem = strtotime('+'.$minutos.'MINUTES',$hora_tem);
								$hora_tem = strtotime('+1 MINUTES',$hora_tem);
								$temp2 = strftime("%H:%M", $hora_tem);
								//print_r("hora 3 = ".$temp2."\n");
								//print_r($hora_tem);
								$i++;
							}
						}
					}
				}				
			}
			print_r(json_encode($rows2));

			/* liberar la serie de resultados */
			$result->free();

			/* cerrar la conexión */
			$mysqli->close();
		break;
		case 'diario_e2':
			ini_set('memory_limit', '1024M'); 
			date_default_timezone_set("Chile/Continental");
			$fecha_actual = strtotime('now');
			$hora_actual = strftime("%H:%M:%S", $fecha_actual);
			$hora_dia_final = strtotime("23:59:55", $fecha_actual);
			$fecha_actual_set = strftime("%Y-%m-%d %H:%M:%S", $fecha_actual);
			//print_r($fecha_actual_set."\n");

			/*print_r("<--------------------------------------------->\n");
			print_r("hora dia final = ".$hora_dia_final."\n");
			print_r("<--------------------------------------------->\n");*/
			$dia_anterior = strtotime('-24 HOURS',$fecha_actual);
			$dia_anterior_set = strftime("%Y-%m-%d", $dia_anterior);
			//print_r($dia_anterior_set."\n");
			
			//$fecha_temp = strftime("%H:%M",$dia_anterior);
			//print_r($fecha_temp);
			$hora_dia_anterior = strftime("%H:%M:%S", $dia_anterior);
			$hora_sola = strtotime($hora_dia_anterior);
			$rows2 =  array();
			$fila =  array();
			$fila_temp = array(); 
			/*$fecha = date('Y-m-d H:i:s', $semana_anterior);*/
			//print_r($hora_dia_anterior."\n");
			/*$hora_tem = strftime("%H", $dia_anterior).":00";
			$hora_tem = strtotime($hora_tem);
			$hora_tem = strtotime('+1 HOURS',$hora_tem);*/
			//print_r($hora_tem."\n");
			$hora_tem = $hora_sola;
			//print_r($hora_tem."\n");
			$mysqli = crearConexion();
		    $query = "SELECT * FROM tb_datos_equipo WHERE ID_EQUIPDEQ = 2 AND TIEMPO__DEQ BETWEEN '$dia_anterior_set' AND '$fecha_actual_set'";
			$result = $mysqli->query($query);			
			while($row = $result->fetch_array())	{				
				$rows[] = $row;
			}
			/*$hora_control = "00:00:00";
			$hora_formateada = strtotime($hora_control);
			$inicio = 0;
			$suma = 0;
			$contador = 0;*/
			$hora_tem = strtotime('+2 HOURS',$hora_tem);
			//print_r("Hora temporal ----------------------->   ".$hora_tem."\n");
			/*$fecha_espacial;
			$temp_espacial;*/
			$i = 0;
			foreach($rows as $row)	{
				$fecha_tem = $row['TIEMPO__DEQ'];
				//print_r($fecha_tem."\n");
				$fecha_tem = strtotime($fecha_tem);
				$fecha_tem_hora = strftime("%H:%M:%S", $fecha_tem);
				$fecha_tem_hora2 = strftime("%H:%M", $fecha_tem);
				//$fechaEsp = $row['TIEMPO__DEQ'];
				//$fecha = strftime("%H:%M", strtotime($fechaEsp));
				$fecha = strtotime($fecha_tem_hora);
				//print_r(strftime("%H:%M",$fechaEsp)."\n");
				//print_r($fecha."\n");

				if($fecha_tem >= $dia_anterior){
					//print_r("entro al if");
					if($fecha_tem < $fecha_actual){
						if($i == 0){
							$fila['fecha'] = $fecha_tem_hora2;
							$fila['temp_alta'] = floatval($row['TEMPALTADEQ']);							
							/*$fila['temp_baja'] = floatval($row['TEMPBAJADEQ']);*/
							$fila['temp_control'] = floatval($row['TEMPCONTDEQ']);
							$rows2[] = $fila;
							$i++;
							/*print_r($fecha."-".$hora_tem."\n");
							print_r("entro al 1 if \n");
							print_r($fecha_tem_hora."\n");*/
						}
						if($fecha < $hora_tem){
							$fila_temp['temp_alta'] = floatval($row['TEMPALTADEQ']);
							$fila_temp['fecha'] = $fecha_tem_hora2;
							/*$fila_temp['temp_baja'] = floatval($row['TEMPBAJADEQ']);*/
							$fila_temp['temp_control'] = floatval($row['TEMPCONTDEQ']);
							//print_r($fecha."-".$hora_tem."\n");
							$fecha_tem2 = strftime("%H:%M:%S", $hora_tem);
							/*print_r("hora siguiente temp ".$fecha_tem2."\n");
							print_r("entro al 2 if \n");
							print_r($fecha_tem_hora."\n");*/
						}
						if($fecha >= $hora_tem){
							$fila['fecha'] = $fila_temp['fecha'];
							$fila['temp_alta'] = $fila_temp['temp_alta'];							
							/*$fila['temp_baja'] = $fila_temp['temp_baja'];*/
							$fila['temp_control'] = $fila_temp['temp_control'];
							$rows2[] = $fila;
							$hora_tem = strtotime('+2 HOURS',$hora_tem);
							$fecha_tem_hora = strftime("%H:%M:%S", $hora_tem);
							/*print_r("<--------------------------------------------->\n");
							print_r("hora siguiente = ".$fecha_tem_hora."\n");
							print_r($fecha."-".$hora_tem."\n");
							print_r("entro al 3 if \n");
							print_r($fila_temp['fecha']."\n");							
							print_r("<--------------------------------------------->\n");*/

						}
						if($fecha >= $hora_dia_final){
							$hdf_temp = $hora_dia_final + 1;
							if($hora_tem > $hdf_temp && $i==1){
								$minutos = strftime("%M", $hora_tem);
								$hora_tem = $hdf_temp - 86400;
								$hora_tem = strtotime('+'.$minutos.'MINUTES',$hora_tem);
								$hora_tem = strtotime('+1 MINUTES',$hora_tem);
								$i++;
							}
						}
					}
				}				
			}
			print_r(json_encode($rows2));

			/* liberar la serie de resultados */
			$result->free();

			/* cerrar la conexión */
			$mysqli->close();
		break;
		case 'diario_informe':
			$id = $_POST["id"];
			ini_set('memory_limit', '1024M'); 
			date_default_timezone_set("Chile/Continental");
			$fecha_actual = strtotime('now');
			$hora_actual = strftime("%H:%M:%S", $fecha_actual);
			$hora_dia_final = strtotime("23:59:55", $fecha_actual);
			$fecha_actual_set = strftime("%Y-%m-%d %H:%M:%S", $fecha_actual);
			//print_r($fecha_actual_set."\n");

			/*print_r("<--------------------------------------------->\n");
			print_r("hora dia final = ".$hora_dia_final."\n");
			print_r("<--------------------------------------------->\n");*/
			$dia_anterior = strtotime('-24 HOURS',$fecha_actual);
			$dia_anterior_set = strftime("%Y-%m-%d", $dia_anterior);
			//print_r($dia_anterior_set."\n");
			
			//$fecha_temp = strftime("%H:%M",$dia_anterior);
			//print_r($fecha_temp);
			$hora_dia_anterior = strftime("%H:%M:%S", $dia_anterior);
			$hora_sola = strtotime($hora_dia_anterior);
			$rows2 =  array();
			$fila =  array();
			$fila_temp = array(); 
			/*$fecha = date('Y-m-d H:i:s', $semana_anterior);*/
			//print_r($hora_dia_anterior."\n");
			/*$hora_tem = strftime("%H", $dia_anterior).":00";
			$hora_tem = strtotime($hora_tem);
			$hora_tem = strtotime('+1 HOURS',$hora_tem);*/
			//print_r($hora_tem."\n");
			$hora_tem = $hora_sola;
			//print_r($hora_tem."\n");
			$mysqli = crearConexion();
		    $query = "SELECT * FROM tb_datos_equipo WHERE ID_EQUIPDEQ = $id AND TIEMPO__DEQ BETWEEN '$dia_anterior_set' AND '$fecha_actual_set'";
			$result = $mysqli->query($query);			
			while($row = $result->fetch_array())	{				
				$rows[] = $row;
			}
			/*$hora_control = "00:00:00";
			$hora_formateada = strtotime($hora_control);
			$inicio = 0;
			$suma = 0;
			$contador = 0;*/
			$hora_tem = strtotime('+30 MINUTES',$hora_tem);
			//print_r("Hora temporal ----------------------->   ".$hora_tem."\n");
			/*$fecha_espacial;
			$temp_espacial;*/
			$i = 0;
			foreach($rows as $row)	{
				$fecha_tem = $row['TIEMPO__DEQ'];
				//print_r($fecha_tem."\n");
				$fecha_tem = strtotime($fecha_tem);
				$fecha_tem_hora = strftime("%H:%M:%S", $fecha_tem);
				$fecha_tem_hora2 = strftime("%H:%M", $fecha_tem);
				//$fechaEsp = $row['TIEMPO__DEQ'];
				//$fecha = strftime("%H:%M", strtotime($fechaEsp));
				$fecha = strtotime($fecha_tem_hora);
				//print_r(strftime("%H:%M",$fechaEsp)."\n");
				//print_r($fecha."\n");

				if($fecha_tem >= $dia_anterior){
					//print_r("entro al if");
					if($fecha_tem < $fecha_actual){
						if($i == 0){
							$fila['fecha'] = $fecha_tem_hora2;
							$fila['temp_alta'] = floatval($row['TEMPALTADEQ']);							
							/*$fila['temp_baja'] = floatval($row['TEMPBAJADEQ']);*/
							$fila['temp_control'] = floatval($row['TEMPCONTDEQ']);
							$rows2[] = $fila;
							$i++;
							/*print_r($fecha."-".$hora_tem."\n");
							print_r("entro al 1 if \n");
							print_r($fecha_tem_hora."\n");*/
						}
						if($fecha < $hora_tem){
							$fila_temp['temp_alta'] = floatval($row['TEMPALTADEQ']);
							$fila_temp['fecha'] = $fecha_tem_hora2;
							/*$fila_temp['temp_baja'] = floatval($row['TEMPBAJADEQ']);*/
							$fila_temp['temp_control'] = floatval($row['TEMPCONTDEQ']);
							//print_r($fecha."-".$hora_tem."\n");
							$fecha_tem2 = strftime("%H:%M:%S", $hora_tem);
							/*print_r("hora siguiente temp ".$fecha_tem2."\n");
							print_r("entro al 2 if \n");
							print_r($fecha_tem_hora."\n");*/
						}
						if($fecha >= $hora_tem){
							$fila['fecha'] = $fila_temp['fecha'];
							$fila['temp_alta'] = $fila_temp['temp_alta'];							
							/*$fila['temp_baja'] = $fila_temp['temp_baja'];*/
							$fila['temp_control'] = $fila_temp['temp_control'];
							$rows2[] = $fila;
							$hora_tem = strtotime('+30 MINUTES',$hora_tem);
							$fecha_tem_hora = strftime("%H:%M:%S", $hora_tem);
							/*print_r("<--------------------------------------------->\n");
							print_r("hora siguiente = ".$fecha_tem_hora."\n");
							print_r($fecha."-".$hora_tem."\n");
							print_r("entro al 3 if \n");
							print_r($fila_temp['fecha']."\n");							
							print_r("<--------------------------------------------->\n");*/

						}
						if($fecha >= $hora_dia_final){
							$hdf_temp = $hora_dia_final + 1;
							if($hora_tem > $hdf_temp && $i==1){
								//print_r("hora temp ".$hora_tem);
								$temp2 = strftime("%H:%M", $hora_tem);
								//print_r("hora = ".$temp2."\n");
								$hora_r = strftime("%H", $hora_tem);
								//print_r($hora_r);
								$minutos = strftime("%M", $hora_tem);
								/*$hora_r2 = strtotime($hora_r);
								print_r($hora_r2);
								if($hora_r2 > 3600){
									print_r("hola");
								}*/
								//$hora_tem = $hdf_temp - 86400;
								$hora_tem = strtotime('-24 HOURS',$hdf_temp);
								//print_r("hora temp 2 ".$hora_tem);
								$temp2 = strftime("%H:%M", $hora_tem);
								//print_r("hora 2 = ".$temp2."\n");
								$hora_tem = strtotime('+'.$hora_r.'HOURS',$hora_tem);
								//print_r($hora_tem);
								$hora_tem = strtotime('+'.$minutos.'MINUTES',$hora_tem);
								$hora_tem = strtotime('+1 MINUTES',$hora_tem);
								$temp2 = strftime("%H:%M", $hora_tem);
								//print_r("hora 3 = ".$temp2."\n");
								//print_r($hora_tem);
								$i++;
							}
						}
					}
				}				
			}
			print_r(json_encode($rows2));

			/* liberar la serie de resultados */
			$result->free();

			/* cerrar la conexión */
			$mysqli->close();
		break;

		case 'semanal':
			$id = $_POST["id"];
			ini_set('memory_limit', '1024M'); 
			date_default_timezone_set("Chile/Continental");
			$fecha_actual = strtotime('now');
			$semana_anterior = strtotime('-6 DAYS',$fecha_actual);
			$dia_posterior = strtotime('+1 DAYS',$semana_anterior);
			$dia_posterior = strftime("%Y-%m-%d 00:00:00", $dia_posterior);			
			//print_r("Dia porterior ----------------->".$dia_posterior."\n");
			$dia_posterior = strtotime($dia_posterior);
			//print_r("Dia porterior ------------------------------------------->".$dia_posterior."\n");
			$fecha_actual_set = strftime("%Y-%m-%d %H:%M:%S", $fecha_actual);
			//print_r($fecha_actual_set."\n");
			$semana_anterior_set = strftime("%Y-%m-%d", $semana_anterior);

			$hora_semana_anterior = strftime("%H:%M", $semana_anterior);
			//$hora_sola = strtotime($hora_semana_anterior);
			//$hora_tem = $hora_sola;
			$rows2 =  array();
			$fila =  array();
			//$suma = array();
			$fila_temp = array();
			$fila_temp2 = array();  

			$mysqli = crearConexion();
		    $query = "SELECT * FROM tb_datos_equipo WHERE ID_EQUIPDEQ = $id AND TIEMPO__DEQ BETWEEN '$semana_anterior_set' AND '$fecha_actual_set'";
			$result = $mysqli->query($query);
			while($row = $result->fetch_array())	{
				$rows[] = $row;
			}
			//$hora_tem = strtotime('+1 HOURS',$hora_tem);
			$temp_alta = 0;
			$temp_baja = 50;
			$i = 0;
			foreach($rows as $row)	{
				$fecha_tem = $row['TIEMPO__DEQ'];
				$fecha_tem = strtotime($fecha_tem);
				/*print_r("Fecha temp --> ".$fecha_tem." - dia_posterior --> ".$dia_posterior."\n");
				print_r(strftime("%d/%m %H:%M:%S",$fecha_tem)."\n");*/
				//$fecha_tem_hora = strftime("%H:%M", $fecha_tem);
				//$fecha = strtotime($fecha_tem_hora);
				$temp_alta_tem = floatval($row['TEMPALTADEQ']);
				//print_r("$temp_alta =".$temp_alta ."\n");
				if($fecha_tem > $semana_anterior || $fecha_tem == $semana_anterior){
					//$i++;
					//print_r($i."\n");
					/*if($i == 0){
						$fila['temp_alta'] = floatval($row['TEMPALTADEQ']);
						$fila['fecha'] = strftime("%d/%m",$fecha_tem);
						$rows2[] = $fila;
						$i++;
					}*/
					if($i == 0){
						if($fecha_tem <= $dia_posterior){

							if($temp_alta_tem > $temp_alta){
								//print_r("dia a ingresar --------->".strftime("%d/%m",$fecha_tem)."\n");
								$fila_temp['fecha'] = strftime("%d/%m",$fecha_tem);
								$fila_temp['temp_alta'] = floatval($row['TEMPALTADEQ']);	
								$fila_temp['temp_control'] = floatval($row['TEMPCONTDEQ']);
								$temp_alta = $temp_alta_tem;
							}
							if($temp_alta_tem < $temp_baja){
								$fila_temp['temp_baja'] = floatval($row['TEMPALTADEQ']);
								$temp_baja = $temp_alta_tem;	
							}						
						}
						if($fecha_tem > $dia_posterior){
							//print_r("cambio de dia --------->".strftime("%d/%m",$fecha_tem)."\n");						
							$dia_posterior = strtotime('+1 DAYS',$dia_posterior);
							$temp_alta = 0;
							$temp_baja = 50;
							if($dia_posterior >= $fecha_actual){
								//print_r("dia_posterior =".$dia_posterior." - fecha_actual =".$fecha_actual ."\n");							
								$i = 1;
							}
							else{
								$fila['fecha'] = $fila_temp['fecha'];
								$fila['temp_alta'] = $fila_temp['temp_alta'];						
								$fila['temp_baja'] = $fila_temp['temp_baja'];
								$fila['temp_control'] = $fila_temp['temp_control'];
								$rows2[] = $fila;
								//print_r($rows2);
							}
						}
					}
					if($i == 1){
						/*print_r("Entro al if\n");
						print_r("----> Temp alta =".$temp_alta." ----> Temp temporal =".$temp_alta_tem."---->  Temp baja =".$temp_baja."\n");*/
						if($temp_alta_tem > $temp_alta){
							//print_r("dia a ingresar --------->".strftime("%d/%m",$fecha_tem)."\n");
							$fila_temp2['fecha'] = strftime("%d/%m",$fecha_actual);
							$fila_temp2['temp_alta'] = floatval($row['TEMPALTADEQ']);	
							$fila_temp2['temp_control'] = floatval($row['TEMPCONTDEQ']);
							$temp_alta = $temp_alta_tem;
						}	
						if($temp_alta_tem < $temp_baja){
							$fila_temp2['temp_baja'] = floatval($row['TEMPALTADEQ']);
							$temp_baja = $temp_alta_tem;	
						}
					}

				}
			}
			$fila['fecha'] = $fila_temp2['fecha'];
			$fila['temp_alta'] = $fila_temp2['temp_alta'];						
			$fila['temp_baja'] = $fila_temp2['temp_baja'];
			$fila['temp_control'] = $fila_temp2['temp_control'];
			$rows2[] = $fila;
			print_r(json_encode($rows2));

			/* liberar la serie de resultados */
			$result->free();

			/* cerrar la conexión */
			$mysqli->close();
		break;

		case 'quincenal':
			$id = $_POST["id"];
			ini_set('memory_limit', '1024M'); 
			date_default_timezone_set("Chile/Continental");
			$fecha_actual = strtotime('now');
			$semana_anterior = strtotime('-14 DAYS',$fecha_actual);
			$dia_posterior = strtotime('+1 DAYS',$semana_anterior);
			$dia_posterior = strftime("%Y-%m-%d 00:00:00", $dia_posterior);			
			//print_r("Dia porterior ----------------->".$dia_posterior."\n");
			$dia_posterior = strtotime($dia_posterior);

			$fecha_actual_set = strftime("%Y-%m-%d %H:%M:%S", $fecha_actual);
			$semana_anterior_set = strftime("%Y-%m-%d", $semana_anterior);

			$rows2 =  array();
			$fila =  array();
			$fila_temp = array(); 

			$mysqli = crearConexion();
		    $query = "SELECT * FROM tb_datos_equipo WHERE ID_EQUIPDEQ = $id AND TIEMPO__DEQ BETWEEN '$semana_anterior_set' AND '$fecha_actual_set'";
			$result = $mysqli->query($query);
			while($row = $result->fetch_array())	{
				$rows[] = $row;				
			}
			//$hora_tem = strtotime('+1 HOURS',$hora_tem);
			$temp_alta = 0;
			$temp_baja = 50;
			$i = 0;
			foreach($rows as $row)	{
				$fecha_tem = $row['TIEMPO__DEQ'];
				$fecha_tem = strtotime($fecha_tem);
				//$fecha_tem_hora = strftime("%H:%M", $fecha_tem);
				//$fecha = strtotime($fecha_tem_hora);
				$temp_alta_tem = floatval($row['TEMPALTADEQ']);
				
				if($fecha_tem > $semana_anterior || $fecha_tem == $semana_anterior){
					//print_r(strftime("%d/%m",$fecha_tem)."\n");
					//print_r("Entro al primer if\n");
					//$suma[$i] = floatval($row['TEMPALTADEQ']);
					//$semana_temp = strtotime('+1 DAYS',$semana_anterior);
					//print_r(strftime("%d/%m",$semana_temp)."\n");

					if($fecha_tem > $semana_anterior || $fecha_tem == $semana_anterior){
						/*$fila['temp_alta'] = floatval($row['TEMPALTADEQ']);
						$fila['fecha'] = strftime("%d/%m",$fecha_tem);
						$rows2[] = $fila;*/
						if($fecha_tem <= $dia_posterior){

							if($temp_alta_tem > $temp_alta){
								$fila_temp['temp_alta'] = floatval($row['TEMPALTADEQ']);
								$fila_temp['fecha'] = strftime("%d/%m",$fecha_tem);
								$fila_temp['temp_control'] = floatval($row['TEMPCONTDEQ']);
							}		
							if($temp_alta_tem < $temp_baja){
								$fila_temp['temp_baja'] = floatval($row['TEMPALTADEQ']);
								$temp_baja = $temp_alta_tem;	
							}					
						}
						if($fecha_tem > $dia_posterior){
							$fila['temp_alta'] = $fila_temp['temp_alta'];
							$fila['fecha'] = $fila_temp['fecha'];
							$fila['temp_control'] = $fila_temp['temp_control'];
							$fila['temp_baja'] = $fila_temp['temp_baja'];
							$rows2[] = $fila;
							$dia_posterior = strtotime('+1 DAYS',$dia_posterior);
							$temp_alta = 0;
							$temp_baja = 50;
							if($dia_posterior >= $fecha_actual){
								//print_r("$dia_posterior =".$dia_posterior." - $fecha_actual =".$fecha_actual ."\n");
								$i = 1;
							}
						}
						if($i == 1){
							/*print_r("Entro al if\n");
							print_r("Temp alta =".$temp_alta." - Temp temporal =".$temp_alta_tem ."\n");*/
							if($temp_alta_tem > $temp_alta){
								$fila_temp2['fecha'] = strftime("%d/%m",$fecha_tem);
								$fila_temp2['temp_alta'] = floatval($row['TEMPALTADEQ']);	
								$fila_temp2['temp_control'] = floatval($row['TEMPCONTDEQ']);
								$temp_alta = $temp_alta_tem;
							}	
							if($temp_alta_tem < $temp_baja){
								$fila_temp2['temp_baja'] = floatval($row['TEMPALTADEQ']);
								$temp_baja = $temp_alta_tem;	
							}
						}
					}

				/*	if($fecha_tem > $semana_temp || $fecha_tem == $semana_temp){
						//print_r("Entro al segundo if\n");
						//print_r(" control 1 ".strftime("%d/%m",$fecha_tem)."\n");
						$contador = count($suma);
						$total = 0;
						//print_r($contador."\n");
						//print_r($suma."\n");
						$i = -1;

						for($j=0; $j < $contador;$j++){
							$total = $total + $suma[$j];
						}
						$total = ($total/$contador);
						//print_r(strftime("%d/%m",$semana_anterior)."\n");

						$fila['temp_alta'] = floatval($total);
						$fila['fecha'] = strftime("%d/%m",$fecha_tem);
						//print_r(" Fecha Final ".$fila['fecha']."\n");
						$rows2[] = $fila;
						$semana_anterior = strtotime('+1 DAYS',$semana_anterior);
					}*/

					$i++;					
					
				}
			}
			$fila['fecha'] = $fila_temp2['fecha'];
			$fila['temp_alta'] = $fila_temp2['temp_alta'];						
			$fila['temp_baja'] = $fila_temp2['temp_baja'];
			$fila['temp_control'] = $fila_temp2['temp_control'];
			$rows2[] = $fila;
			print_r(json_encode($rows2));

			/* liberar la serie de resultados */
			$result->free();

			/* cerrar la conexión */
			$mysqli->close();
		break;

		case 'mensual':
			$id = $_POST["id"];
			ini_set('memory_limit', '1024M'); 
			date_default_timezone_set("Chile/Continental");
			$fecha_actual = strtotime('now');
			$semana_anterior = strtotime('-29 DAYS',$fecha_actual);
			$dia_posterior = strtotime('+1 DAYS',$semana_anterior);
			$dia_posterior = strftime("%Y-%m-%d 00:00:00", $dia_posterior);			
			//print_r("Dia porterior ----------------->".$dia_posterior."\n");
			$dia_posterior = strtotime($dia_posterior);

			$fecha_actual_set = strftime("%Y-%m-%d %H:%M:%S", $fecha_actual);
			$semana_anterior_set = strftime("%Y-%m-%d", $semana_anterior);

			$rows2 =  array();
			$fila =  array();
			//$suma = array();
			$fila_temp = array(); 

			$mysqli = crearConexion();
		    $query = "SELECT * FROM tb_datos_equipo WHERE ID_EQUIPDEQ = $id AND TIEMPO__DEQ BETWEEN '$semana_anterior_set' AND '$fecha_actual_set'";
			$result = $mysqli->query($query);
			while($row = $result->fetch_array())	{
				$rows[] = $row;
			}
			$temp_alta = 0;
			$temp_baja = 50;
			$i = 0;
			foreach($rows as $row)	{
				$fecha_tem = $row['TIEMPO__DEQ'];
				$fecha_tem = strtotime($fecha_tem);
				$temp_alta_tem = floatval($row['TEMPALTADEQ']);

				if($fecha_tem > $semana_anterior || $fecha_tem == $semana_anterior){
					//print_r(strftime("%d/%m",$fecha_tem)."\n");
					//print_r("Entro al primer if\n");
					//$suma[$i] = floatval($row['TEMPALTADEQ']);
					//$semana_temp = strtotime('+1 DAYS',$semana_anterior);
					//print_r(strftime("%d/%m",$semana_temp)."\n");

					if($fecha_tem > $semana_anterior || $fecha_tem == $semana_anterior){
						/*$fila['temp_alta'] = floatval($row['TEMPALTADEQ']);
						$fila['fecha'] = strftime("%d/%m",$fecha_tem);
						$rows2[] = $fila;*/
						if($fecha_tem <= $dia_posterior){

							if($temp_alta_tem > $temp_alta){
								$fila_temp['temp_alta'] = floatval($row['TEMPALTADEQ']);
								$fila_temp['fecha'] = strftime("%d/%m",$fecha_tem);
								$fila_temp['temp_control'] = floatval($row['TEMPCONTDEQ']);
							}		
							if($temp_alta_tem < $temp_baja){
								$fila_temp['temp_baja'] = floatval($row['TEMPALTADEQ']);
								$temp_baja = $temp_alta_tem;	
							}				
						}
						if($fecha_tem > $dia_posterior){
							$fila['temp_alta'] = $fila_temp['temp_alta'];
							$fila['fecha'] = $fila_temp['fecha'];
							$fila['temp_control'] = $fila_temp['temp_control'];
							$fila['temp_baja'] = $fila_temp['temp_baja'];
							$rows2[] = $fila;
							$dia_posterior = strtotime('+1 DAYS',$dia_posterior);
							$temp_alta = 0;
							$temp_baja = 50;
							if($dia_posterior >= $fecha_actual){
								//print_r("$dia_posterior =".$dia_posterior." - $fecha_actual =".$fecha_actual ."\n");
								$i = 1;
							}
						}
						if($i == 1){
							/*print_r("Entro al if\n");
							print_r("Temp alta =".$temp_alta." - Temp temporal =".$temp_alta_tem ."\n");*/
							if($temp_alta_tem > $temp_alta){
								$fila_temp2['fecha'] = strftime("%d/%m",$fecha_tem);
								$fila_temp2['temp_alta'] = floatval($row['TEMPALTADEQ']);	
								$fila_temp2['temp_control'] = floatval($row['TEMPCONTDEQ']);
								$temp_alta = $temp_alta_tem;
							}	
							if($temp_alta_tem < $temp_baja){
								$fila_temp2['temp_baja'] = floatval($row['TEMPALTADEQ']);
								$temp_baja = $temp_alta_tem;	
							}
						}
					}

					/*if($fecha_tem > $semana_temp || $fecha_tem == $semana_temp){
						//print_r("Entro al segundo if\n");
						//print_r(" control 1 ".strftime("%d/%m",$fecha_tem)."\n");
						$contador = count($suma);
						$total = 0;
						//print_r($contador."\n");
						//print_r($suma."\n");
						$i = -1;

						for($j=0; $j < $contador;$j++){
							$total = $total + $suma[$j];
						}
						$total = ($total/$contador);
						//print_r(strftime("%d/%m",$semana_anterior)."\n");

						$fila['temp_alta'] = floatval($total);
						$fila['fecha'] = strftime("%d/%m",$fecha_tem);
						//print_r(" Fecha Final ".$fila['fecha']."\n");
						$rows2[] = $fila;
						$semana_anterior = strtotime('+1 DAYS',$semana_anterior);
					}

					$i++;	*/				
					
				}
			}
			$fila['fecha'] = $fila_temp2['fecha'];
			$fila['temp_alta'] = $fila_temp2['temp_alta'];						
			$fila['temp_baja'] = $fila_temp2['temp_baja'];
			$fila['temp_control'] = $fila_temp2['temp_control'];
			$rows2[] = $fila;
			print_r(json_encode($rows2));

			/* liberar la serie de resultados */
			$result->free();

			/* cerrar la conexión */
			$mysqli->close();
		break;
		case 'fechas':
			$id = $_POST["id"];
			$desde = $_POST["desde"];
			$hasta = $_POST["hasta"];
			ini_set('memory_limit', '1024M'); 
			date_default_timezone_set("Chile/Continental");
			$desde_temp = strtotime($desde);
			$hasta_temp = strtotime($hasta);
			$desde_temp = strtotime('-1 DAYS',$desde_temp);
			$hasta_temp = strtotime('+1 DAYS',$hasta_temp);
			$fecha_actual = $hasta_temp;

			$hasta_set = strftime("%Y-%m-%d %H:%M:%S", $hasta_temp);
			$desde_set = strftime("%Y-%m-%d",$desde_temp);

			/*$fecha_temp = strftime("%d/%m/%Y",$fecha_actual);
			$desde_temp = strftime("%d/%m/%Y",$desde_temp);
			$hasta_temp = strftime("%d/%m/%Y",$hasta_temp);
			print_r($fecha_temp);
			print_r("----");
			/*print_r($desde_temp);
			print_r("----");
			print_r($hasta_temp);*/
			$semana_anterior = $desde_temp;
			$dia_posterior = strtotime('+1 DAYS',$semana_anterior);
			$dia_posterior = strftime("%Y-%m-%d 00:00:00", $dia_posterior);			
			//print_r("Dia porterior ----------------->".$dia_posterior."\n");
			$dia_posterior = strtotime($dia_posterior);
			/*print_r("----");
			print_r("Semana anterior = ");
			print_r($semana_anterior);
			print_r("//");
			print_r(strftime("%d/%m",$semana_anterior)."\n");
			print_r("----");*/
			$rows2 =  array();
			$fila =  array();
			//$suma = array();
			$fila_temp = array(); 


			$mysqli = crearConexion();
		    $query = "SELECT * FROM tb_datos_equipo WHERE ID_EQUIPDEQ = $id AND TIEMPO__DEQ BETWEEN '$desde_set' AND '$hasta_set'";
			$result = $mysqli->query($query);
			while($row = $result->fetch_array())	{
				$rows[] = $row;
			}
			$temp_alta = 0;
			$temp_baja = 50;
			$i = 0;
			foreach($rows as $row)	{
				$fecha_tem = $row['TIEMPO__DEQ'];
				$fecha_tem = strtotime($fecha_tem);
				/*print_r($fecha_tem."\n");
				print_r("----");
				print_r(strftime("%d/%m",$semana_anterior)."\n");
				print_r("----");*/
				$temp_alta_tem = floatval($row['TEMPALTADEQ']);

				if($semana_anterior <= $fecha_actual ){

					if($fecha_tem > $semana_anterior || $fecha_tem == $semana_anterior){

						if($fecha_tem <= $fecha_actual){
							/*$fila['temp_alta'] = floatval($row['TEMPALTADEQ']);
							$fila['fecha'] = strftime("%d/%m",$fecha_tem);
							$rows2[] = $fila;*/
							if($fecha_tem <= $dia_posterior){

								if($temp_alta_tem > $temp_alta){
									$fila_temp['temp_alta'] = floatval($row['TEMPALTADEQ']);
									$fila_temp['fecha'] = strftime("%d/%m",$fecha_tem);
									$fila_temp['temp_control'] = floatval($row['TEMPCONTDEQ']);
								}		
								if($temp_alta_tem < $temp_baja){
									$fila_temp['temp_baja'] = floatval($row['TEMPALTADEQ']);
									$temp_baja = $temp_alta_tem;	
								}				
							}
							if($fecha_tem > $dia_posterior){
								$fila['temp_alta'] = $fila_temp['temp_alta'];
								$fila['fecha'] = $fila_temp['fecha'];
								$fila['temp_control'] = $fila_temp['temp_control'];
								$fila['temp_baja'] = $fila_temp['temp_baja'];
								$rows2[] = $fila;
								$dia_posterior = strtotime('+1 DAYS',$dia_posterior);
								$temp_alta = 0;
								$temp_baja = 50;
								if($dia_posterior >= $fecha_actual){
									//print_r("$dia_posterior =".$dia_posterior." - $fecha_actual =".$fecha_actual ."\n");
									$i = 1;
								}
							}
							/*if($i == 1){
								/*print_r("Entro al if\n");
								print_r("Temp alta =".$temp_alta." - Temp temporal =".$temp_alta_tem ."\n");*/
							/*	if($temp_alta_tem > $temp_alta){
									$fila_temp2['fecha'] = strftime("%d/%m",$fecha_tem);
									$fila_temp2['temp_alta'] = floatval($row['TEMPALTADEQ']);	
									$fila_temp2['temp_control'] = floatval($row['TEMPCONTDEQ']);
									$temp_alta = $temp_alta_tem;
								}	
								if($temp_alta_tem < $temp_baja){
									$fila_temp2['temp_baja'] = floatval($row['TEMPALTADEQ']);
									$temp_baja = $temp_alta_tem;	
								}
							}*/
						}
					}
				
					/*if($fecha_tem > $semana_anterior || $fecha_tem == $semana_anterior){
						//print_r(strftime("%d/%m",$fecha_tem)."\n");
						//print_r("Entro al primer if\n");
						$suma[$i] = floatval($row['TEMPALTADEQ']);
						$semana_temp = strtotime('+1 DAYS',$semana_anterior);
						/*print_r(strftime("%d/%m",$semana_temp)."\n");
						print_r("----");

					/*	if($fecha_tem > $semana_temp || $fecha_tem == $semana_temp){
							//print_r("Entro al segundo if\n");
							//print_r(" control 1 ".strftime("%d/%m",$fecha_tem)."\n");
							$contador = count($suma);
							$total = 0;
							//print_r($contador."\n");
							//print_r($suma."\n");
							$i = -1;

							for($j=0; $j < $contador;$j++){
								$total = $total + $suma[$j];
							}
							$total = ($total/$contador);
							//print_r(strftime("%d/%m",$semana_anterior)."\n");

							$fila['temp_alta'] = floatval($total);
							$fila['fecha'] = strftime("%d/%m",$fecha_tem);
							//print_r(" Fecha Final ".$fila['fecha']."\n");
							$rows2[] = $fila;
							$semana_anterior = strtotime('+1 DAYS',$semana_anterior);
						}

						$i++;	*/				
						
					//}
				}
			}
			/*$fila['fecha'] = $fila_temp2['fecha'];
			$fila['temp_alta'] = $fila_temp2['temp_alta'];						
			$fila['temp_baja'] = $fila_temp2['temp_baja'];
			$fila['temp_control'] = $fila_temp2['temp_control'];
			$rows2[] = $fila;*/
			print_r(json_encode($rows2));

			/* liberar la serie de resultados */
			$result->free();

			/* cerrar la conexión */
			$mysqli->close();


		break;
		case 'fecha':
			$id = $_POST["id"];
			$dia = $_POST["dia"];
			$cont = $_POST["cont"];
			//print_r($dia."\n");
			$rows2 =  array();
			$fila =  array();
			$fila_temp = array(); 
			date_default_timezone_set("Chile/Continental");

			if ($dia == 0) {
				$fecha_final = strtotime('now');
				$fecha_final_set = strftime("%Y-%m-%d %H:%M:%S", $fecha_final);

				$fecha_inicial = strtotime('-1 DAYS',$fecha_final);
				$fecha_inicial_set = strftime("%Y-%m-%d %H:%M:%S", $fecha_inicial);

			}
			else{
				$fecha_inicial = strtotime($dia);
				$fecha_inicial_set = strftime("%Y-%m-%d %H:%M:%S", $fecha_inicial);
				//print_r($fecha_inicial_set."\n");
				$fecha_final = strtotime('+1 DAYS',$fecha_inicial);
				$fecha_final_set = strftime("%Y-%m-%d %H:%M:%S", $fecha_final);
				//print_r($fecha_final_set."\n");
			}

			$mysqli = crearConexion();

			$query = "SELECT * FROM tb_perfil_cont_cfg WHERE id_mina = '".$cont."'";
			//print_r($query);
			$result = $mysqli->query($query);	
			$row = $result->fetch_array(MYSQLI_ASSOC);
			//print_r($row);
			$idequipo = $row['cp_id'];
			//print_r($idequipo);
			//print_r($fecha_inicial);
			//print_r($fecha_final);
		    $query = "SELECT * FROM tb_colection WHERE cp_id_perfil_cont = '".$idequipo."' AND cp_oid BETWEEN '".$fecha_inicial."' AND '".$fecha_final."'";
			$result = $mysqli->query($query);
			while($row = $result->fetch_array())	{
				$rows[] = $row;
			}
			$i = 0;
			//print_r($rows);
			$fecha_tem_hora3 = strftime("%H:%M", $fecha_inicial);
			foreach($rows as $row)	{
				//$tiempo_temp =  $row['cp_oid'];
				//$fecha_tem = strtotime($tiempo_temp);
				$fecha_tem = $row['cp_oid'];
				$fecha_tem_hora2 = strftime("%H:%M", $fecha_tem);

			/*	print_r($row['cp_volt2']);
				print_r($row['cp_amp2']);
				print_r($row['cp_amp3']);*/

				if($i == 0){
					//print_r("entro 1 if");
					$fila['fecha'] = $fecha_tem_hora3;
					if($fecha_tem_hora2 == $fecha_tem_hora3){
						//print_r("entro 2 if");	
						/*if($row['TEMPSALADEQ'] == null || $id == 2){
							$fila['temp_alta'] = 20;
						}
						else{
							$fila['temp_alta'] = floatval($row['TEMPSALADEQ']);
						}*/
						$fila['Vb'] = floatval($row['cp_campo6']);							
						/*$fila['temp_baja'] = floatval($row['TEMPBAJADEQ']);*/
						$fila['Ib'] = floatval($row['cp_campo5']);
						$fila['Il'] = floatval($row['cp_campo7']);
						if($fila['Il'] < 0){
							$fila['Il'] = $fila['Il'] * -1;
						}
						//$fila['lim_temp'] = 28;
						/*if($row['LIMTALTADEQ'] == null){
							$fila['lim_temp'] = 28;
						}
						else{
							$fila['lim_temp'] = floatval($row['LIMTALTADEQ']);
						}*/
					}
					else{
						//print_r("entro 1 else");
						$fila['Vb'] = 0;							
						$fila['Ib'] = 0;
						$fila['Il'] = 0;
						//$fila['lim_temp'] = 0;
					}
					$rows2[] = $fila;
					$i++;
					$fecha_tem_2 = strtotime('+15 MINUTES',$fecha_inicial);
					/*print_r($fecha."-".$hora_tem."\n");
					print_r("entro al 1 if \n");
					print_r($fecha_tem_hora."\n");*/
					$k = 0;
					while($k == 0){
						if($fecha_tem > $fecha_tem_2){
							//print_r("entro 3 if");
							$fila['fecha'] = strftime("%H:%M", $fecha_tem_2);
							//$fila['temp_alta'] = 0;							
							/*$fila['temp_baja'] = $fila_temp['temp_baja'];*/
							//$fila['temp_control'] = 0;
							//$fila['lim_temp'] = 0;
							$rows2[] = $fila;
							$fecha_tem_2 = strtotime('+15 MINUTES',$fecha_tem_2);
						}
						else{
							//print_r("entro 2 else");
							$k = 1;
						}
					}
					
				}
				else{
					//print_r("entro 3 else");
					if($fecha_tem <= $fecha_tem_2){
						//print_r("entro 4 if");
						/*if($row['TEMPSALADEQ'] == null || $id == 2){
							$fila_temp['temp_alta'] = 20;
						}
						else{
							$fila_temp['temp_alta'] = floatval($row['TEMPSALADEQ']);
						}*/
						//$fila_temp['temp_alta'] = 28;
						$fila_temp['fecha'] = strftime("%H:%M",$fecha_tem_2);
						$fila_temp['Vb'] = floatval($row['cp_campo6']);
						$fila_temp['Ib'] = floatval($row['cp_campo5']);
						$fila_temp['Il'] = floatval($row['cp_campo7']);

						$fila_temp['Il'] = floatval($row['cp_campo7']);
						if($fila_temp['Il'] < 0){
							$fila_temp['Il'] = $fila_temp['Il'] * -1;
						}
						/*$fila_temp['temp_baja'] = floatval($row['TEMPBAJADEQ']);*/
						//$fila_temp['temp_control'] = 20;
					/*	if($row['LIMTALTADEQ'] == null){
							$fila_temp['lim_temp'] = 28;
						}
						else{
							$fila_temp['lim_temp'] = 28;
						}
						//print_r($fecha."-".$hora_tem."\n");
						/*print_r("hora siguiente temp ".$fecha_tem2."\n");
						print_r("entro al 2 if \n");
						print_r($fecha_tem_hora."\n");*/
					}
					if($fecha_tem > $fecha_tem_2){
						//print_r("entro 5 if");
						$fila['fecha'] = $fila_temp['fecha'];
						$fila['Vb'] = $fila_temp['Vb'];
						$fila['Ib'] = $fila_temp['Ib'];
						$fila['Il'] = $fila_temp['Il'];
						//$fila['temp_alta'] = $fila_temp['temp_alta'];							
						/*$fila['temp_baja'] = $fila_temp['temp_baja'];*/
						//$fila['temp_control'] = $fila_temp['temp_control'];
						//$fila['lim_temp'] = $fila_temp['lim_temp'];
						$rows2[] = $fila;
						$fecha_tem_2 = strtotime('+15 MINUTES',$fecha_tem_2);
						$j = 0;
						while($j == 0){
							if($fecha_tem > $fecha_tem_2){
								//print_r("entro 6 if");
								$fila['fecha'] = strftime("%H:%M", $fecha_tem_2);
								$fila['Vb'] = 0;							
								$fila['Ib'] = 0;
								$fila['Il'] = 0;
							//	$fila['temp_alta'] = 0;							
								/*$fila['temp_baja'] = $fila_temp['temp_baja'];*/
							//	$fila['temp_control'] = 0;
							//	$fila['lim_temp'] = 0;
								$rows2[] = $fila;
								$fecha_tem_2 = strtotime('+15 MINUTES',$fecha_tem_2);
							}
							else{
								//print_r("entro 3 else");
								$j = 1;
							}
						}
						/*print_r("<--------------------------------------------->\n");
						print_r("hora siguiente = ".$fecha_tem_hora."\n");
						print_r($fecha."-".$hora_tem."\n");
						print_r("entro al 3 if \n");
						print_r($fila_temp['fecha']."\n");							
						print_r("<--------------------------------------------->\n");*/

					}
				}
			}
			while($fecha_tem_2 < $fecha_final){
				$fila['fecha'] = strftime("%H:%M", $fecha_tem_2);
			//	$fila['temp_alta'] = 0;							
				/*$fila['temp_baja'] = $fila_temp['temp_baja'];*/
			//	$fila['temp_control'] = 0;
				$rows2[] = $fila;
				$fecha_tem_2 = strtotime('+15 MINUTES',$fecha_tem_2);
			}

			print_r(json_encode($rows2));
			/* liberar la serie de resultados */
			$result->free();

			/* cerrar la conexión */
			$mysqli->close();







		break;
	}
?>