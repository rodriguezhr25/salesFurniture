function nuevoAjax(){
	var xmlhttp=false;
	try{
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	}catch(e){
		try {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}catch(E){
			xmlhttp = false;
		}
	}	
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}
function enviarMail(){
       c = document.getElementById('resultado_mensaje');
   
       //variable=documenet.nombre_del_form.nombre_del_control.value
       let nombre =document.enviar_email.name.value;
       let phone=document.enviar_email.phone.value;
       let email=document.enviar_email.email.value;
      let message =document.enviar_email.message.value;
   
       ajax=nuevoAjax();
       c.innerHTML = '<p style="width: 140px; height: 120px" class="precarga"></p>'; 
       ajax.open("POST", "sendbymail.php",true);
       ajax.onreadystatechange=function() {
       if (ajax.readyState==4) {
       c.innerHTML = ajax.responseText
       var alert = $('div.alert[auto-close]');
       alert.each(function() {
         var that = $(this);
         var time_period = that.attr('auto-close');
         setTimeout(function() {
           that.alert('close');
         }, time_period);
       });
       }
       borrarCampos()
       }
       ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
       ajax.send("name="+nombre+"&phone="+phone+"&email="+email +"&message="+message)
}
function borrarCampos(){
       document.enviar_email.name.value="";
       document.enviar_email.phone.value="";
       document.enviar_email.email.value="";
       document.enviar_email.message.value="";
       document.enviar_email.email.focus();
}