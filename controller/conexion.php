<?php
$manejador="mysql";
$servidor="sql155.main-hosting.eu";
$usuario="u386209434_2021";
$pass="EZ/ih~A9*";
$base="u386209434_2021";
$cadena="$manejador:host=$servidor;dbname=$base";
$con = new PDO($cadena,$usuario,$pass);
$con->exec("set names utf8");
?>