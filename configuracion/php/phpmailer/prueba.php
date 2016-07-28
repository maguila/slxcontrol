<?php
require("class.phpmailer.php");

function enviar($correo_destino, $subject_mensaje, $mensaje){
  $id = null;
  $nombre= null;

  $host_mail              = "smtp.gmail.com";
  $correo_sender          = "gato03@gmail.com";
  $nombre_sender          = "Mensajes MIMcontrol";
  $password_correo_sender = "gato2826722!";

  if($_POST){
      $mensaje = $_POST["mensaje"];
      $id = $_POST["id"];
      $nombre = $_POST["nombre"];
  }

  $mail = new PHPMailer();
  $mail->IsSMTP();
  $mail->Host = $host_mail;
  $mail->Port = 465;
  $mail->SMTPAuth = true;
  $mail->Username = $correo_sender;
  $mail->Password = $password_correo_sender;

  $mail->From     = $correo_sender;
  $mail->FromName = $nombre_sender;
  $mail->Sender   = $correo_sender;
  $mail->AddReplyTo($correo_sender, "Responde a este mail");

  //$mail->AddAddress("p.campillay@solcloud.cl");
  //$mail->AddAddress("mcontreras@mimec.cl");
  //$mail->AddAddress("mchamorro@mimec.cl");
  //$mail->AddAddress("victor.campillay@solarlex.cl");
  //$mail->AddAddress("claudio.campillay@solarlex.cl");
  $mail->AddAddress($correo_destino);
  $mail->Subject = $subject_mensaje;
  $mail->IsHTML(true);
   // adjunta files/imagen.jpg
  //$mail->AddEmbeddedImage('files/logo2.png', 'logo');
  //$mail->AddAttachment("http://190.209.132.36/phpmailer/files/logo2.png", "imagen.jpg");
  //$mail->AddEmbeddedImage("http://190.209.132.36/phpmailer/files/logo2.png","logo","file/logo2.png","base64","image/png");

  //$mail->Body = file_get_contents("plantilla_mail.html","r");

  $logo= "http://www.mimlook.cl/images/logo.png";
  //$logo_cliente = "http://186.36.193.34/phpmailer/files/logo-cliente.jpg";
  //$logo2 = "http://186.36.193.34/phpmailer/files/logo-mimlook2.png";
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

  			<!-- Table header -->

  				<thead>
  					<tr class="titulo">
  						<th scope="col" colspan="4" style="padding:20px 10px 40px 10px;
      color:#fff;
      font-size: 26px;
      background-color:#222;
      font-weight:normal;
      border-right:1px dotted #666;
      border-top:3px solid #666;
      -moz-box-shadow:0px -1px 4px #000;
      -webkit-box-shadow:0px -1px 4px #000;
      box-shadow:0px -1px 4px #000;
      text-shadow:0px 0px 1px #fff;
      text-shadow:1px 1px 1px #000;
      -webkit-border-top-left-radius:5px;
      -webkit-border-top-right-radius:5px;
      -moz-border-radius:5px 5px 0px 0px;
      border-top-left-radius:5px;
      border-top-right-radius:5px;"><img src="'.$logo.'" width="200" style="margin-top:10px;" ></th>
  					</tr>
  				</thead>


  			<!-- Table body -->

  				<tbody>
  					<tr style="padding:10px;
      color:#333;
      text-shadow:1px 1px 1px #ccc;
      background-color:#f9f9f9;">
  						<td colspan="4" style="padding:10px;
      background-color:#f0f0f0;
      text-shadow:-1px 1px 1px #fff;
      color:#333;"> <div class="row"><span><h3>Mensaje generado por MIMcontrol</h3></span></div></td>
  					</tr>
  					<tr style="padding:10px;
      color:#333;
      text-shadow:1px 1px 1px #ccc;
      background-color:#f9f9f9;">
  						<td colspan="2" style="padding:10px;
      background-color:#f0f0f0;
      text-shadow:-1px 1px 1px #fff;
      color:#333;"><span><h5>Cliente:</h5></span></td>
  						<td colspan="2" style="padding:10px;
      background-color:#f0f0f0;
      text-shadow:-1px 1px 1px #fff;
      color:#333;"><span >CMDIC</span></td>
  					</tr>
  			<!--		<tr style="padding:10px;
      color:#333;
      text-shadow:1px 1px 1px #ccc;
      background-color:#f9f9f9;">
  						<td colspan="2" style="padding:10px;
      background-color:#f0f0f0;
      text-shadow:-1px 1px 1px #fff;
      color:#333;"><span><h5>Ubicaci&oacute;n:</h5></span></td>
  						<td colspan="2" style="padding:10px;
      background-color:#f0f0f0;
      text-shadow:-1px 1px 1px #fff;
      color:#333;"><span style="font-size:12px;">Padre Orellana #1586 </br>Santiago</br></td>
  					</tr>-->
  					<tr style="padding:10px;
      color:#333;
      text-shadow:1px 1px 1px #ccc;
      background-color:#f9f9f9;">
  						<td colspan="2" style="padding:10px;
      background-color:#f0f0f0;
      text-shadow:-1px 1px 1px #fff;
      color:#333;"><span><h5>Equipo:</h5></span></td>
  						<td colspan="2" style="padding:10px;
      background-color:#f0f0f0;
      text-shadow:-1px 1px 1px #fff;
      color:#333;"><span >'.$nombre .'</td>
  					</tr>
  					<tr style="padding:10px;
      color:#333;
      text-shadow:1px 1px 1px #ccc;
      background-color:#f9f9f9;">
  						<td colspan="2" style="padding:10px;
      background-color:#f0f0f0;
      text-shadow:-1px 1px 1px #fff;
      color:#333;"><span><h5>Su mensaje es:</h5></span></td>
  						<td colspan="2" style="padding:10px;
      background-color:#f0f0f0;
      text-shadow:-1px 1px 1px #fff;
      color:#333;"><span >'.$mensaje.'</span></td>
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
      <!-- Table footer -->

          <!--        <tfoot class="footer">
                      <tr>
                            <td colspan="3"></td>
                            <td>
                                <img src="'.$logo.'" width="150" style="margin-top:10px;">
                            </td>
                      </tr>
                  </tfoot>-->
  		</table>
      </div> <!-- /container -->
    </body>
  </html>

  ';

  $mail->Body = $body_code;
  if(!$mail->Send()){
     echo "Error enviando: " . $mail->ErrorInfo. "</n>";
  }
  else{
     echo "Mandado! </n> ";
  }
}

?>
