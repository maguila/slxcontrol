<?php

    //http://www.ibm.com/developerworks/library/os-php-7oohabits/
	//include("../connection.php");
	//$db = conectarse();

	class ObjetoDB{

		public $id = 0;
		public $table;
		public $fields     = array();
    public $typeFields = array();
		public $count = 0;

		function __construct($table, $fields){

			$this->table = $table;
			foreach( $fields as $key )
				$this->fields[ $key ] = null;

		}

		function __call( $method, $args ){
			if ( preg_match( "/set_(.*)/", $method, $found ) ){
				if ( array_key_exists( $found[1], $this->fields ) ){
					$this->fields[ $found[1] ] = $args[0];
					return true;
				}
			}
			else if ( preg_match( "/get_(.*)/", $method, $found ) ){
				if ( array_key_exists( $found[1], $this->fields ) ){
					return $this->fields[ $found[1] ];
				}
			}
			return false;
		}


		function loadPK( $id ){
			global $db;
			$res = mysql_query( "SELECT * FROM ".$this->table." WHERE ".$this->table."_id =".$id , $db);
			$row  = mysql_fetch_array($res);

			if($row!=''){
				$keys = array_keys($row);
				print_r($id);

				foreach($keys as $v){
					if(!is_int($v)){
						$this->fields[$v]=$row[$v];
					}

				}
			}
		}




		function insert(){
			global $db;
			$fields = "";

			foreach( array_keys( $this->fields ) as $field ){
				$v = $this->fields[ $field ];
				if($v!=null){
					$fields = $fields. $field . ", ";
				}

			}
			$fields = substr($fields,0,strlen($fields)-2);


			$inspoints = array();
			foreach( array_keys( $this->fields ) as $field ){
				$v = $this->fields[ $field ];
				if($v!=null)
					$inspoints []= "'$v'";
			}


			$inspt = join( ", ", $inspoints );

			$sql = "INSERT INTO ".$this->table." ( $fields ) VALUES ( $inspt )";


			$values = array();
			foreach( array_keys( $this->fields ) as $field )
			  $values []= $this->fields[ $field ];


			mysql_query($sql, $db);

			if( mysql_errno($db) != 0){
				echo "ERROR";
				echo mysql_errno($db) . "-" . mysql_error();
			}else{
				//echo "insert_ok";
				echo "";
			}
		}

    function update($camposPK){
			global $db;
			$sets            = "";
			$arregloCampoPK  = split(",", $camposPK);
			$sql_condiciones = "";
			foreach( array_keys( $this->fields ) as $field ){
				$v = $this->fields[ $field ];
				if($v!=null){
					$sets = $sets. $field . "='".$v."' , ";
				}
			}
			$sets = substr($sets,0,strlen($sets)-2);

			foreach ($arregloCampoPK as $key => $nombreColuma) {
				$sql_condiciones = $sql_condiciones . $nombreColuma ."= '". $this->fields[ $camposPK ] ."' AND";
			}
			$sql_condiciones = substr($sql_condiciones, 0, -3);

			$sql = "UPDATE ".$this->table. " SET $sets WHERE ". $sql_condiciones;

			//echo $sql;

			$result = mysql_query($sql, $db);

			if( mysql_errno($db) != 0){
				echo "ERROR";
				echo mysql_errno($db) . "-" . mysql_error();
			}else{
				//echo "update_ok";
				echo "";
			}
	  }



   	function delete($camposPK){
				global $db;
				$arregloCampoPK  = split(",", $camposPK);
				$sql_condiciones = "";

				foreach ($arregloCampoPK as $key => $nombreColuma) {
					$sql_condiciones = $sql_condiciones . $nombreColuma ."= '". $this->fields[ $camposPK ] ."' AND";
				}
				$sql_condiciones = substr($sql_condiciones, 0, -3);
				$sql = "DELETE FROM ".$this->table. " WHERE ".$sql_condiciones;

				$result = mysql_query($sql, $db);
				//echo $sql . " --- " . $camposPK;

				if( mysql_errno($db) != 0){
					echo "ERROR";
					echo mysql_errno($db) . "-" . mysql_error();
				}else{
					//echo "delete_ok";
					echo "";
				}
	  }


  }


	$obj = new ObjetoDB('paciente', array('paciente_id' ,
										  'paciente_nombre',
										  'paciente_tipo',
										  'paciente_raza',
										  'paciente_edad',
										  'paciente_color',
										  'paciente_propietario',
										  'paciente_fono',
										  'paciente_direccion'
										  ) );


	//$obj->set_paciente_nombre("qqqqq");
	//$obj->set_paciente_numero("wqwqwqwq");
	//$obj->set_paciente_tipo("PERRO");
	//$obj->set_paciente_edad("33");
	//$obj->set_paciente_color("AMARILLO");

	//$obj->insert();
	//$obj->update("25");
	//$obj->load("80");
	//$obj->loadObjects();
	//$obj->delete("26");

	//echo $obj->get_paciente_nombre();


?>
