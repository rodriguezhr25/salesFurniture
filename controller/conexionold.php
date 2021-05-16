<?php
$manejador="mysql";
$servidor="localhost";
$usuario="refermat_admin";
$pass="r3f3rm@t";
$base="refermat_bd";
$cadena="$manejador:host=$servidor;dbname=$base";
$con = new PDO($cadena,$usuario,$pass);
$con->exec("set names utf8");
?>