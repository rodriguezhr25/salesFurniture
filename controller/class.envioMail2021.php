<?php
	header('Content-Type: text/html; charset=utf-8');
	session_start();
	require_once ("../sistema/config/db.php");
	require_once ("../sistema/config/conexion.php"); 
	require '../PHPMailer/class.phpmailer.php';
	require '../PHPMailer/PHPMailerAutoload.php';
	$nombres=$_POST['txtFirstname'];
	$apellidos=$_POST['txtLastName'];
	$email=$_POST['txtEmailAddress'];
	$telefono=$_POST['txtPhone'];
	$RUC=$_POST['txtRUC'];
	$TipoDoc=$_POST['cmbTipo'];	
	$Direccion=$_POST['txtdireccion'];	
	
	$mensaje_final="";
	if(isset($_SESSION['detalle']) && count($_SESSION['detalle'])>0){
        $carrito = $_SESSION['detalle'];
			$total=0;
			
			$mensaje="<div style='text-align: center;'><img 
					src='https://refermat.com/img/index/logo.jpeg'
					width='176' height='176'
					style='margin-right: 0px;'><br>
					<strong>REFERMAT SAC RUC:20603430248</strong>
					</div>
					<div style='text-align: center;background-color:whitesmoke;padding: 10px;'>
						<h2>Hemos Recibido su Solicitud de Compra</h2>
					</div>
					<div style='text-align: center'>
						<p>Estimado (a),".$nombres." ".$apellidos.", hemos recibido una solicitud de compra por los siguientes productos:</p>
					</div>
					<div style='text-align: center;padding-left: 40px;padding-right: 40px;'>
					<div style='text-align: center'>
						<table>
						  <tr style='border: 1px solid rgb(0, 0, 0); background-color: rgb(55,55,111); font-weight: bold; color: rgb(255, 255, 255);'>
						  <th style='padding-left: 20px;padding-right: 20px;'>Codigo</th>
						  <th style='padding-left: 20px;padding-right: 20px;'>Cod.Fabricante</th>
						  <th style='padding-left: 20px;padding-right: 20px;'>Descripción</th>
						  <th style='padding-left: 20px;padding-right: 20px;'>Cant.</th>
						  <th style='padding-left: 20px;padding-right: 20px;'>Precio</th>
						  <th style='padding-left: 20px;padding-right: 20px;' class='text-right'>Total</th>				 
					";
	                    
	        $mensaje_part='';
	        foreach ($carrito as $p) {
	            $total_uni=$p['cantidad']*$p['precio'];
				$mensaje_td="<tr>
								<td>".$p['pcodigo']."</td>
								<td>".$p['modelo']."</td>
	            				<td>".$p['producto']."</td>
	            				<td align='right'>".$p['cantidad']."</td>
	                        	<td align='right'>S/ ".$p['precio']."</td>
	                        	<td align='right'>S/ ".$total_uni."</td>
	        				</tr>";
	        	$mensaje_part=$mensaje_part.$mensaje_td;
	        	$total+=$total_uni;
			}
			$mensaje_part=$mensaje_part."</table></div></div>
										<div style='text-align: center;background-color:whitesmoke;padding: 10px;'>
										<h2>TOTAL PEDIDO:".number_format($total,2,".",",")."</h2>
										</div><br>";
			$mensaje_final=$mensaje.$mensaje_part;		
		//$ses = new SimpleEmailService('AKIAYHDXRL5DZCPS6A5M', 'BJ6aFh8ufUEQTYGleX6rJsoQquPuB740eBFRC34MUJp6');

		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->SMTPDebug = 0;
		$mail->Debugoutput = 'html';
		//usando servidor amazon
		//$mail->Host = 'email-smtp.us-east-2.amazonaws.com';
		//$mail->Port = 587;
		$mail->Host = 'email-smtp.us-east-2.amazonaws.com';
		$mail->Port = 25;
		$mail->SMTPSecure = 'ssl';		
		$mail->SMTPAuth = true;

		$mail->Username = "AKIAYHDXRL5D7GREKTD2";
		$mail->Password = "BDOYpm+vDyetyctAKK1AHvgYX2n+HdnTf2C8FELOg0BQ";  

		//$mail->Username = "AKIAYHDXRL5DZCPS6A5M";
		//$mail->Password = "krfe3IPZx1yO1JJxbx8nmEUnGPs1T9v4OwBf1A16";   	
		$mail->setFrom("infoperu@refermat.com", "REFERMAT VENTAS");


		$mail->addAddress($email, "REFERMAT");
		$mail->addAddress("Refermatventasperu@gmail.com", "REFERMAT");
		$mail->Subject ='MENSAJERIA - REFERMAT';
 
		$mail->Body =" ".$mensaje_final."<div style='text-align: center;'>
							<table>
							<tr><td style='text-align:right'><h4>Datos del remitente:</h4></td></tr>
							<tr><td style='text-align:right'>".$TipoDoc.":</td> 	 <td style='text-align:left'>".$RUC."</td></tr>
							<tr><td style='text-align:right'>Nombres:</td>			 <td style='text-align:left'>".$nombres."</td></tr>
							<tr><td style='text-align:right'>Apellidos:</td>		 <td style='text-align:left'>".$apellidos."</td></tr>
							<tr><td style='text-align:right'>E-mail:</td>			 <td style='text-align:left'>".$email."</td></tr>
							<tr><td style='text-align:right'>Teléfono:</td>			 <td style='text-align:left'>".$telefono."</td></tr>
							<tr><td style='text-align:right'>Dirección de Envio:</td><td style='text-align:left'>".$Direccion."</td></tr>
							</table>
							<br><hr/><br>
							<div style='text-align: center;background-color:whitesmoke;padding: 10px;'>
							<p>
							Gracias por tu solicitud, te estaremos contactando a través del correo infoperu@refermat.com ó alguno de nuestros ejecutivos de ventas,
						    con la confirmación del monto y métodos de pago.
							Te recordamos que el envío es gratuito en Lima Metropolitana por pedidos mayores a S./250, de lo contrario será de S./9.9 en Lima Metropolitana.
							<br> Para provincia te llegará junto al monto el costo del envío. 
							</p>
							<br>
							Horario de atención:<br>
							Lunes a viernes de 8:00am a 5:00pm<br>
							Sábado de 8:00am a 12:00pm <br>
							<hr/></div>";
		if (!$mail->send()) {
			echo "Mailer Error_: " . $mail->ErrorInfo;
		} else {
			echo "<script type=\"text/javascript\">alert(\"¡Enviada correctamente...!\");</script>";
			session_destroy();
			echo"<script language='javascript'>window.location='../index.php'</script>";
		}
		
	}else {
        echo "<script type=\"text/javascript\">alert(\"Imposible cotizar. Agregue productos al carrito\");</script>";  
    	echo"<script language='javascript'>window.location='../check-out.php'</script>";
    }

?>