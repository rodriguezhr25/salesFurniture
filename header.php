<?php 
session_start();
require_once("sistema/config_pw/db.php");
require_once("sistema/config_pw/conexion.php"); 
require_once ("controller/producto.php");

$objProducto = new Producto();
$json = array();
$json['msj'] = 'Producto Agregado';
$json['success'] = true;

if (isset($_POST['cod']) && $_POST['cod']!='' && isset($_POST['cant']) && $_POST['cant']!='') {
	if($_POST['cant']<=10000 && $_POST['cant']>0){
		try {
			$cantidad = $_POST['cant'];
			$id = $_POST['cod'];
			$stock = $_POST['stk'];
			
			$producto = $objProducto->getById($id);
			//$producto = $resultado_producto->fetchObject();
			$descripcion = $producto['descripcion'];
			//$precio = $producto->buying_price;
			$precio = $_POST['pre'];
			$imagen = $producto['imagen'];
			$pcodigo=$producto['codbarras'];
			
			$subtotal = $cantidad * $precio;
			
			$_SESSION['detalle'][$id] = array('id'=>$id, 'producto'=>$descripcion, 'cantidad'=>$cantidad, 'precio'=>$precio, 'subtotal'=>$subtotal
			                                 ,'imagen'=>$imagen,'pcodigo'=>$pcodigo,'stock'=>$stock);

			$json['success'] = true;

			echo json_encode($json);
		} catch (PDOException $e) {
			$json['msj'] = $e->getMessage();
			$json['success'] = false;
			echo json_encode($json);
		}
	}else{
		$json['msj'] = 'Solo se permite cotizar hasta 10 mil productos';
		$json['success'] = false;
		echo json_encode($json);
	}
}else{
	$json['msj'] = 'Ingrese un producto y/o ingrese cantidad';
	$json['success'] = false;
	echo json_encode($json);
}

?>