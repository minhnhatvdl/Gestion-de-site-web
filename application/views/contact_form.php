<?php
session_start();
$to = 'contact@filrouge-mode.fr';

$subject = "Prise de contact ";//$_POST['subject'];

	// code for check server side validation
	if((strcasecmp($_SESSION['captcha_code'], $_POST['code']) != 0)){  
		echo "<span style='color:red'>Veuillez vérifier le code de validation</span>";// Captcha verification is incorrect.		
	

}
else{// Captcha verification is Correct. Final Code Execute here!		
	
// Your email address


// Don't edit below unless you know what you're doing
if($to && isset($_POST['email']) && isset($_POST['name'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$email = urldecode($email);
	if(eregi("(\r|\n)",$email)){die("pourquoi tu fais ca??");}
	$phone = $_POST['subject'];
	
	$fields = array(
		0 => array(
			'text' => 'Name',
			'val' => $_POST['name']
		),
		1 => array(
			'text' => 'Email address',
			'val' => $_POST['email']
		),
		2 => array(
			'text' => 'Téléphone',
			'val' => $_POST['subject']
		),
		3 => array(
			'text' => 'Message',
			'val' => $_POST['message']
		)
	);
	
	$message = "Provient du formulaire en Francais <br>\n";
	
	foreach($fields as $field) {
		$message .= $field['text'].": " . sanitize($field['val']) . "<br>\n";
	}
	
	$headers = "MIME-Version: 1.0\r\nContent-type: text/html; charset=utf-8\r\n";
	$headers .= "From: \"" . $name . "\" \r\n";
	$headers .= "Reply-To: " .  $email . "\r\n";
	$message = utf8_decode($message);
	
	mail($to, $subject, $message, $headers);
	
	if ($message){
		
	echo 'sent';
	}else{
	echo 'failed';
	}
} else {echo "Don't access this file directly";	}
	}
	
function sanitize($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return ($data)?:false; 
}


?>