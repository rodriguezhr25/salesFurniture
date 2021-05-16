<?php
session_start();
extract($_GET);
$url=$_GET['url'];
$carro=$_SESSION['detalle'];
unset($carro[md5($id)]);
$_SESSION['detalle']=$carro;
header("location: ../".$url);
?>