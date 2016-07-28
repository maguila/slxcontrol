<?php 
require("class.phpmailer.php");

$nombre = strip_tags($_POST['Nombre']);
$correo = strip_tags($_POST['Email']);
$telefono = strip_tags($_POST['Telefono']);
$comentario = strip_tags($_POST['Mensaje']);

$mail = new PHPMailer(); 
$mail->IsSMTP();
$mail->Host = "mail.mdsproductos.cl";
$mail->Port = 25;
$mail->SMTPAuth = true;
$mail->Username = 'contacto@mdsproductos.cl';
$mail->Password = 'cont-2015';

$mail->From="contacto@mdsproductos.cl";
$mail->FromName="Contacto web mdsproductos";
$mail->Sender="contacto@mdsproductos.cl";
$mail->AddReplyTo("mdiaz@mdsproductos.cl", "Responde a este mail");

$mail->AddAddress("mdiaz@mdsproductos.cl");

$mail->Subject = "Contacto web mdsproductos";

$mail->IsHTML(true);

//$mensaje='<img src="'. $logo .'" width="300">';
//$mail->MsgHTML($mensaje);
//$mail->Body = 'Este es mi logotipo: <img xsrc="cid:logo" alt="Logo" width="85" height="75">';
//$mail->AltBody = "Si el cliente de correo del destinatario no acepta HTML se verá este texto.";
date_default_timezone_set("Chile/Continental");
$fecha_actual = strtotime('now');
$hora_actual = strftime("%d/%m/%Y %H:%M", $fecha_actual);
$body_code = ' 


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>MIMcontrol</title>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
    <!-- Custom styles for this template 
    <link rel="stylesheet" href="css/inicio.css" type="text/css"/>-->

  </head>
  <body>
    <div class="container"> 

    	  <table class="table1" cellpadding="0" cellspacing="0" style="font-size: 16px;
    font-weight: bold;
    line-height: 1.4em;
    font-style: normal;
    border-collapse:separate;
    width: 500px;
     text-align:center;">

			
			<!-- Table body -->
			
				<tbody>
					<tr style="padding:10px;
    color:#333;
    text-shadow:1px 1px 1px #ccc;
    background-color:#f9f9f9;">
						<td colspan="4" style="padding:10px;
    background-color:#f0f0f0;
    text-shadow:-1px 1px 1px #fff;
    color:#333;"> <div class="row"><span><h3>Mensaje generado por Web MDSProductos</h3></span></div></td>
					</tr>
					<tr style="padding:10px;
    color:#333;
    text-shadow:1px 1px 1px #ccc;
    background-color:#f9f9f9;">
						<td colspan="2" style="padding:10px;
    background-color:#f0f0f0;
    text-shadow:-1px 1px 1px #fff;
    color:#333;"><span><h5>Nombre :</h5></span></td>
						<td colspan="2" style="padding:10px;
    background-color:#f0f0f0;
    text-shadow:-1px 1px 1px #fff;
    color:#333;"><span >'.$nombre.'</span></td>
					</tr>
					<tr style="padding:10px;
    color:#333;
    text-shadow:1px 1px 1px #ccc;
    background-color:#f9f9f9;">
						<td colspan="2" style="padding:10px;
    background-color:#f0f0f0;
    text-shadow:-1px 1px 1px #fff;
    color:#333;"><span><h5>Correo :</h5></span></td>
						<td colspan="2" style="padding:10px;
    background-color:#f0f0f0;
    text-shadow:-1px 1px 1px #fff;
    color:#333;"><span style="font-size:12px;">'.$correo.'</span></td>
					</tr>
					<tr style="padding:10px;
    color:#333;
    text-shadow:1px 1px 1px #ccc;
    background-color:#f9f9f9;">
						<td colspan="2" style="padding:10px;
    background-color:#f0f0f0;
    text-shadow:-1px 1px 1px #fff;
    color:#333;"><span><h5>Telefono :</h5></span></td>
						<td colspan="2" style="padding:10px;
    background-color:#f0f0f0;
    text-shadow:-1px 1px 1px #fff;
    color:#333;"><span >'.$telefono.'</span></td>
					</tr>
					<tr style="padding:10px;
    color:#333;
    text-shadow:1px 1px 1px #ccc;
    background-color:#f9f9f9;">
						<td colspan="2" style="padding:10px;
    background-color:#f0f0f0;
    text-shadow:-1px 1px 1px #fff;
    color:#333;"><span><h5>Comentario :</h5></span></td>
						<td colspan="2" style="padding:10px;
    background-color:#f0f0f0;
    text-shadow:-1px 1px 1px #fff;
    color:#333;"><span >'.$comentario.'</span></td>
					</tr>
					<tr style="padding:10px;
    color:#333;
    text-shadow:1px 1px 1px #ccc;
    background-color:#f9f9f9;">
						<td colspan="2" style="padding:10px;
    background-color:#f0f0f0;
    text-shadow:-1px 1px 1px #fff;
    color:#333;"><span><h5>Generado a las:</h5></span></td>
						<td colspan="2" style="padding:10px;
    background-color:#f0f0f0;
    text-shadow:-1px 1px 1px #fff;
    color:#333;"><span>'.$hora_actual.'</span></td>
					</tr>
				</tbody>
		</table>
    </div> <!-- /container -->
  </body>
</html>


'; 

$mail->Body = $body_code;
if(!$mail->Send())
{
   echo "Error enviando: " . $mail->ErrorInfo;;
}
else
{
   echo "Mandado!";
}
?>