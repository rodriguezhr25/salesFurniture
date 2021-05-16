<?php
class Producto
{
	function get(){
		$sql = "SELECT * FROM articulos";
		global $con;
		return $con->query($sql);
	}
	
	function getById($id){
		$sql = "SELECT * FROM articulos WHERE codbarras='$id'";
		global $con;
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		return $row;
	}
}