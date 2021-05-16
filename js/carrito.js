$('#agregar').click(function()
{
    var producto = document.getElementById('producto').value;
    var precio = document.getElementById('precio').value;
    var cantidad= document.getElementById('cantidad').value;

    $.ajax({
        url : 'header.php',
        type : 'POST',
        data : ('producto='+producto+'&precio='+precio+'&cantidad='+cantidad),
        })

    .done(function(resultado){
        $("#respuesta").html(resultado);
    })
})