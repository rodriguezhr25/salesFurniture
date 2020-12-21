<?php
if(isset($_POST['email'])) {

// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias</bold>
$email_from = "adminweb@starsalesfurniture.com";
$email_subject = "Contacto desde el sitio web";

// Aquí se deberían validar los datos ingresados por el usuario</bold>
if(!isset($_POST['name']) ||
!isset($_POST['email']) ||
!isset($_POST['phone']) ||
!isset($_POST['message'])) {

echo "<b>Error! </b><br />";
echo "Plese verify your information and send the message again<br />";
die();
}

$email_message = "Detalles del formulario de contacto:\n\n";
$email_message .= "Nombre: " . $_POST['name'] . "\n";
$email_message .= "E-mail: " . $_POST['email'] . "\n";
$email_message .= "Teléfono: " . $_POST['phone'] . "\n";
$email_message .= "Comentarios: " . $_POST['message'] . "\n\n";

$email_to = $_POST['email'];

// Ahora se envía el e-mail usando la función mail() de PHP</bold>
$headers = 'From: '. $email_from ."\r\n".
'Reply-To: '. $email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);

echo "<div style=\"background-color:green;color:white;padding:4px;text-align:center;\">Thanks, we have received your message.</div>";
}
?>
