<?php
session_start();
require_once ("../sistema/config_pw/db.php");
require_once ("../sistema/config_pw/conexion.php");
$id=$_GET['id'];
$url=$_GET['url'];
$url2="";

$urlx=$_GET['urlx'];
$pagina=$_GET['pagina'];

if(isset($urlx)&&isset($_GET['fam'])){
	$url2="&".$urlx."=".$_GET['fam'];
}

if(isset($urlx)&&isset($_GET['sub_fam'])){
	$url2="&".$urlx."=".$_GET['sub_fam'];
}

if(isset($urlx)&&isset($_GET['categ'])){
	$url2="&".$urlx."=".$_GET['categ'];
}
$url_final=$url."?pagina=".$pagina.$url2;

if(isset($_POST['cant'])){
	$cantidad=$_POST['cant'];
}else{
	$cantidad=1;
}
$sql_prodcuts=mysqli_query($con, "SELECT * FROM products WHERE status='1' AND product_id='$id'");
$row=mysqli_fetch_array($sql_prodcuts);
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];
$carro[md5($id)]=array('idr'=>md5($id), 'name'=>$row['product_name'], 'price'=>$row['buying_price'], 'price_old'=>$row['selling_price'], 'product_id'=>$row['product_id'], 'image'=>$row['image_path'], 'cantidad'=>$cantidad);
$_SESSION['detalle']=$carro;
header("location: ../".$url_final);
?>