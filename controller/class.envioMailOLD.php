<?php
	header('Content-Type: text/html; charset=utf-8');
	session_start();
	require_once ("../sistema/config/db.php");
	require_once ("../sistema/config/conexion.php"); 

	$nombres=$_POST['txtFirstname'];
	$apellidos=$_POST['txtLastName'];
	$email=$_POST['txtEmailAddress'];
	$telefono=$_POST['txtPhone'];
	
	$mensaje_final="";
	if(isset($_SESSION['detalle']) && count($_SESSION['detalle'])>0){
        $carrito = $_SESSION['detalle'];
        if(isset($_SESSION['user_name'])){
	        $total=0;
	        $mensaje="<table>
	                    <tr>
	                        <th>Productos</th>
	                        <th style='padding-left: 20px;'>Cant.</th>
	                        <th style='padding-left: 20px;'>Precio</th>
	                        <th style='padding-left: 20px;' class='text-right'>Total</th>
	                    </tr>";
	                    
	        $mensaje_part='';
	        foreach ($carrito as $p) {
	            $total_uni=$p['cantidad']*$p['precio'];
		    	$mensaje_td="<tr>
	            				<td>".$p['producto']."</td>
	            				<td class='text-right'>".$p['cantidad']."</td>
	                        	<td class='text-right'>S/ ".$p['precio']."</td>
	                        	<td class='text-right'>S/ ".$total_uni."</td>
	        				</tr>";
	        	$mensaje_part=$mensaje_part.$mensaje_td;
	        	$total+=$total_uni;
			}
	        $mensaje_final=$mensaje.$mensaje_part."<tr>
	                    <td class='text-uppercase'><b>Total</b></td>
	                    <td></td>
	                    <td></td>
	                    <td class='total text-right'>S/ ".$total."</td>
	                </tr>
	                </table>";
	    } else if (!isset($_SESSION['user_name'])) {
	    	$mensaje="<table>
                	<tr>
                        <th>Productos</th>
                        <th class='text-right'>Cantidad</th>
                    </tr>";
                    
            $mensaje_part='';
	        foreach ($carrito as $p) {
		    	$mensaje_td="<tr>
	            				<td>".$p['producto']."</td>
	            				<td class='text-right'>".$p['cantidad']."</td>
	        				</tr>";
	        	$mensaje_part=$mensaje_part.$mensaje_td;
			}
	        $mensaje_final=$mensaje.$mensaje_part."</table>";
	    }
	    
	    require '../PHPMailer/PHPMailerAutoload.php';
		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->SMTPDebug = 0;
		$mail->Debugoutput = 'html';
	/*	$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465;
		$mail->SMTPSecure = 'ssl';
		*/
		//usando servidor amazon
		$mail->Host = 'email-smtp.us-west-2.amazonaws.com';
		$mail->Port = 465;
		$mail->SMTPSecure = 'ssl';		
		$mail->SMTPAuth = true;

		$mail->Username = "AKIAYBGTRTRLX6BEHFHT";
		$mail->Password = "BPVkh1TqOOYRV4OqLiZaPivA5k0Zo6RjZ5hKVKiO813v";    	
		$mail->setFrom("infoperu@refermat.com", "REFERMAT VENTAS");
/*
		$mail->Username = "refermatventasperu@gmail.com";
		$mail->Password = "refermat2020";    	
		$mail->setFrom("refermatventasperu@gmail.com", "REFERMAT");
		*/
		$mail->Subject = 'MENSAJERIA - REFERMAT';
		$mail->addAddress($email, "REFERMAT");
		$mail->addAddress("Refermatventasperu@gmail.com", "REFERMAT");		
		$mail->addAddress($email, "REFERMAT");
    	$mail->addAddress("Refermatventasperu@gmail.com", "REFERMAT");
 
    	$mail->Body = "	<p><b>Su mensaje: </b>".$mensaje_final."</p>
    	    		  		<p><b>Datos del remitente:</p>
    	    		  		<p>Nombres: ".$nombres."</p>
    	    		  		<p>Apellidos: ".$apellidos."</p>
    	    		  		<p>E-mail: ".$email."</p>
    	    		  		<p>Teléfono: ".$telefono."</p>
    	    		  		<hr/>
    	    		  		<p>*Enviado desde Mensajería de REFERMAT</p>
    						<p>-----------------------------------</p>";		
		$mail->AltBody = "Enviado desde Mensajería de REFERMAT";
		
		if (!$mail->send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
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