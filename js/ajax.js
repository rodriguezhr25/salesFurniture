$(function(){
	var ENV_WEBROOT = "../";
	
	$(".eliminar-producto").off("click");
	$(".eliminar-producto").on("click", function(e) {
		var id = $(this).attr("id");
		$.ajax({
			url: 'controller/ProductoController.php?page=2',
			type: 'post',
			data: {'id':id},
			dataType: 'json',
			success: function(data) {
			if(data.success==true){
				$(".detalle-producto").load('detalle.php');
			}else{
				alertify.error(data.msj);
			}
		},
		error: function(jqXHR, textStatus, error) {
			alertify.error(error);
		}
		});
	});

	$(".eliminar-detalle").off("click");
	$(".eliminar-detalle").on("click", function(e) {
		var id = $(this).attr("id");
		$.ajax({
			url: 'controller/ProductoController.php?page=2',
			type: 'post',
			data: {'id':id},
			dataType: 'json'
		}).done(function(data){
			if(data.success==true){
				$(".detalle-producto").load('detalle.php');
				$(".detalle-final").load('detalle_final.php');
			}else{
				alertify.error(data.msj);
			}
		})
	});
	//cambio de precio
	$(".precio-producto").off("focusout");
	$(".precio-producto").on("focusout", function(e) {
		var id = $(this).attr("product_id");
		var precio = $(this).val();
		$.ajax({
			url: 'Controller/ProductoController.php?page=3',
			type: 'post',
			data: {'id':id,'precio':precio},
			dataType: 'json'
		}).done(function(data){
			if(data.success==true){
				alertify.success(data.msj);
				$(".detalle-producto").load('detalle.php');
				$(".detalle-final").load('detalle_final.php');
			}else{
				alertify.error(data.msj);
			}
		})
	});
	//cambio de cantidad
	$(".cambia-cantidad").off("focusout");
	$(".cambia-cantidad").on("focusout", function(e) {
		var id = $(this).attr("product_id");
		var stock = $(this).attr("stock");
		var cantidad = $(this).val();

		if (parseInt(cantidad)>parseInt(stock)) {
			cantidad=stock;
			container="<div class='alert alert-danger'><a class='close' data-dismiss='alert'>×</a><span>This quantity is not available now</span></div>";
			$(".Mensaje").html(container);
		}
		else{$("#Mensaje").html("");}
		

		$.ajax({
			url: 'Controller/ProductoController.php?page=4',
			type: 'post',
			data: {'id':id,'cantidad':cantidad},
			dataType: 'json'
		}).done(function(data){
			if(data.success==true){
				$(".detalle-producto").load('detalle.php');
				$(".detalle-final").load('detalle_final.php');
			}else{
				alertify.error(data.msj);
			}
		})
	});	

});