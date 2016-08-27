<?php

$f3 = require('lib/base.php');
$f3->route('GET /hola.php',
    function() {
        echo 'Hello, world!';
    }
);
$f3->run();



$db=new DB\SQL( 'mysql:host=localhost;port=3306;dbname=slxcontrol', 'root', 'mysql' );

//FUCKING CRUD
$atencion = new DB\SQL\Mapper($db,'tb_perfil_cont_cfg');
$atencion->load(array('cp_id=?','1'));
$atencion->save();




$rows = $db->exec('SELECT * FROM tb_perfil_cont_cfg');

foreach ($rows as $row) {
  echo $row['cp_id'] . "  -  " . $row['cp_nombre'] . "<br></br>";
}


 ?>
