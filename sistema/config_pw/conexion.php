<?php
	# conectare la base de datos
    $con=@mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    //$con=@mysqli_connect(DB_HOST, DB_NAME);
    if (mysqli_connect_errno()) {  
        printf("Connect failed: %s\n", mysqli_connect_error()); 
        exit();
    }
    $con->set_charset("utf8");
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
?>