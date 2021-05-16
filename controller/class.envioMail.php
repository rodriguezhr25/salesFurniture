<?php
	header('Content-Type: text/html; charset=utf-8');
	session_start();

	require_once("../sistema/config_pw/db.php");
	require_once("../sistema/config_pw/conexion.php");

	$nombres=$_POST['txtFirstname'];
	$apellidos=$_POST['txtLastName'];
	$email=$_POST['txtEmailAddress'];
	$telefono=$_POST['txtPhone'];
	$Direccion=$_POST['txtdireccion'];	
	
	$mensaje_final="";
	if(isset($_SESSION['detalle']) && count($_SESSION['detalle'])>0){
        $carrito = $_SESSION['detalle'];
	        $total=0;
			$mensaje="<div style='text-align: center;'><img 
					src='images/logo.png'
					width='176' height='176'
					style='margin-right: 0px;'><br>
					<strong>SalesFurniture</strong>
					</div>
					<div style='text-align: center;background-color:whitesmoke;padding: 10px;'>
						<h2>We have recieved your order</h2>
					</div>
					<div style='text-align: center'>
						<p>Dear ,".$nombres." ".$apellidos.", we have received your order with this products:</p>
					</div>
					<div style='text-align: center;padding-left: 40px;padding-right: 40px;'>
					<div style='text-align: center'>
						<table>
						  <tr style='border: 1px solid rgb(0, 0, 0); background-color: rgb(55,55,111); font-weight: bold; color: rgb(255, 255, 255);'>
						  <th style='padding-left: 20px;padding-right: 20px;'>Code</th>			
						  <th style='padding-left: 20px;padding-right: 20px;'>Description</th>
						  <th style='padding-left: 20px;padding-right: 20px;'>Quanity</th>
						  <th style='padding-left: 20px;padding-right: 20px;'>Price</th>
						  <th style='padding-left: 20px;padding-right: 20px;' class='text-right'>Total</th>";
	                    
	        $mensaje_part="";
	        foreach ($carrito as $p) {
	            $total_uni=$p['cantidad']*$p['precio'];
				$mensaje_td="<tr>
								<td>".$p['id']."</td>							
	            				<td>".$p['producto']."</td>
	            				<td align='right'>".$p['cantidad']."</td>
	                        	<td align='right'>$".$p['precio']."</td>
	                        	<td align='right'>$ ".$total_uni."</td>
	        				</tr>";
	        	$mensaje_part=$mensaje_part.$mensaje_td;
	        	$total+=$total_uni;
			}
			$mensaje_part=$mensaje_part."</table></div></div>
										<div style='text-align: center;background-color:whitesmoke;padding: 10px;'>
										<h2>TOTAL :".number_format($total,2,".",",")."</h2>
										</div><br>";
			$mensaje_final=$mensaje.$mensaje_part;	

	    	   
 
    	$email_message = $mensaje_final."<div style='text-align: center'>
											<p><b>
											Thanks for your request, we will contact soon.</b><br>
											
											<br> 
											</p>
											<br>
											Schedule<br>
											Monday - Saturday de 8:00am - 5:00pm<br>
											Saturday  8:00am - 12:00pm <br>
											<hr/>
										</div>

										<div style='text-align: center;background-color:whitesmoke;padding: 10px;'>
											<table>
											<tr><td style='text-align:right'><h4>Datos del remitente:</h4></td></tr>					
											<tr><td style='text-align:right'>Name:</td>			 <td style='text-align:left'>".$nombres."</td></tr>
											<tr><td style='text-align:right'>Last Name:</td>		 <td style='text-align:left'>".$apellidos."</td></tr>
											<tr><td style='text-align:right'>E-mail:</td>			 <td style='text-align:left'>".$email."</td></tr>
											<tr><td style='text-align:right'>Phone:</td>			 <td style='text-align:left'>".$telefono."</td></tr>
											<tr><td style='text-align:right'>Shipping Address:</td><td style='text-align:left'>".$Direccion."</td></tr>
											</table>
											<br><hr/><br>
										</div>

									
										<h4>Sales Furniture 2021</h4>";		
										$email_from = "adminweb@starsalesfurniture.com";
										$email_subject = "ORDER";
										
										// Aquí se deberían validar los datos ingresados por el usuario</bold>
										if(!isset($_POST['name']) ||
										!isset($_POST['email']) ||
										!isset($_POST['phone']) ||
										!isset($_POST['message'])) {
										
										echo "<b>Error! </b><br />";
										echo "Plese verify your information and send the message again<br />";
										die();
										}
										
										
										
										$email_to = 'rodriguezhr25@gmail.com';
										
										// Ahora se envía el e-mail usando la función mail() de PHP</bold>
										$headers = 'From: '. $email_from ."\r\n".
										'Reply-To: '. $email_from."\r\n" .
										'X-Mailer: PHP/' . phpversion();
										@mail($email_to, $email_subject, $email_message, $headers);

										echo "<div  class=\"alert alert-success alert-dismissible\" role=\"alert\" auto-close=\"2000\" > <button type=\"button\" class=\"close\" data-dismiss=\"alert\"  >&times;</button> Message sent successfully.</div>";
										echo "<script type=\"text/javascript\">alert(\"Email Send!...!\");</script>";
										session_destroy();
										echo"<script language='javascript'>window.location='../index.php'</script>";
	/* 	if (!$mail->send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			echo "<script type=\"text/javascript\">alert(\"Email Send!...!\");</script>";
			session_destroy();
			echo"<script language='javascript'>window.location='../index.php'</script>";
		} */
	}else {
        echo "<script type=\"text/javascript\">alert(\"Please add products to the cart\");</script>";  
    	echo"<script language='javascript'>window.location='../check-out.php'</script>";
    }

?>