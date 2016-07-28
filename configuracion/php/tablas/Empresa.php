<?php

class Empresa extends ObjetoDB{

  function __construct()
  {
    parent::__construct( 'empresa', array("id","rut", "razon_social", "host_mysql", "usuario_mysql", "password_mysql", "correo_notificacion" ,"estado_portal", "nombre_imagen"));
  }

}

?>
