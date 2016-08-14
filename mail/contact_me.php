<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['tx'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['tx'],FILTER_VALIDATE_EMAIL) ||
   !empty($_POST['email']))
   {
	   echo "Falten dades!";
	   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['tx']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'sergio@gruposir.net'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Formulari de contacte de la web:  $name";
$email_body = "S'ha rebut un missatge al formulari de contacte de la web.\n\n"."Detalls::\n\nNom: $name\n\nEmail: $email_address\n\nTelèfon: $phone\n\nMissatge:\n$message";
$headers = "From: noreply@gruposir.net\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;         
?>
