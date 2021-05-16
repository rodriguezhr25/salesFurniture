<?php
session_start();
if(isset($_GET["page"])){
	$page=$_GET["page"];
}else{
	$page=0;
}

require_once("../sistema/config_pw/db.php");
require_once("../sistema/config_pw/conexion.php"); 
require_once ("producto.php");

switch($page){

	case 2:
		$json = array();
		$json['msj'] = 'Producto Eliminado';
		$json['success'] = true;
	
		if (isset($_POST['id'])) {
			try {
				unset($_SESSION['detalle'][$_POST['id']]);
				$json['success'] = true;
	
				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}
		break;
		
	case 3:
		$json = array();
		$json['msj'] = 'Precio actualizado';
		$json['success'] = true;
	
		if (isset($_POST['id'])) {
			try {
				//unset($_SESSION['detalle'][$_POST['id']]);
				$producto_id = $_POST['id'];
				$cantidad = $_SESSION['detalle'][$producto_id]['cantidad'];
				$descripcion = $_SESSION['detalle'][$producto_id]['producto'];
				$precio = $_POST['precio'];
				
				$subtotal = $cantidad * $precio;
				
				$_SESSION['detalle'][$producto_id] = array('id'=>$producto_id, 'producto'=>$descripcion, 'cantidad'=>$cantidad, 'precio'=>$precio, 'subtotal'=>$subtotal);
				
				$json['success'] = true;
	
				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}
		break;

		case 4:   //cambio de cantidad
			$json = array();
			$json['msj'] = 'Cantidad actualizada';
			$json['success'] = true;
			if (isset($_POST['id'])) {
				try {
					$producto_id = $_POST['id'];
					$cantidad =$_POST['cantidad'];

					$descripcion = $_SESSION['detalle'][$producto_id]['producto'];
					$precio = $_SESSION['detalle'][$producto_id]['precio']; 
					$stock = $_SESSION['detalle'][$producto_id]['stock']; 
					$imagen = $_SESSION['detalle'][$producto_id]['imagen'];
					$subtotal = $cantidad * $precio;
					
					$_SESSION['detalle'][$producto_id] = array('id'=>$producto_id, 'producto'=>$descripcion, 'cantidad'=>$cantidad
					                                          ,'precio'=>$precio, 'subtotal'=>$subtotal,'stock'=>$stock,'imagen'=>$imagen);
					
					$json['success'] = true;	
					echo json_encode($json);		
				} catch (PDOException $e) {
					$json['msj'] = $e->getMessage();
					$json['success'] = false;
					echo json_encode($json);
				}
			}
			break;	

}
?>