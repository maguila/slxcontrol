<?php
  include("phpmailer/envio.php");

  $correo_destino  = $argv[1];
  $subject_mensaje = $argv[2];
  $mensaje         = $argv[3];
  /*
  $mensaje                = "mascalo pablo ql";
  $subject_mensaje 				= "Mensaje Sistema MIMcontrol";
  $correo_destino         = "gato03@gmail.com";
  */
  enviar($correo_destino, $subject_mensaje, $mensaje);

 ?>
