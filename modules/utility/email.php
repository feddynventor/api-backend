<?php

function sendEmailTempPass($email, $password){
	$subject = "Oggetto";
	$message .= "Cordiali saluti.<br>";
	
	sendEmail($email, $subject, $message);
}
function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); 
    $alphaLength = strlen($alphabet) - 1; 
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); 
}


function sendEmail($email, $subject, $message){

	$post = [
	    "address" => $email,
	    "obj" => $subject,
	    "msg"   => $message,
	];

	try {
	    $ch = curl_init();

	    curl_setopt($ch, CURLOPT_URL,"http://feddynventor.altervista.org/mail.php");
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	                                            'Content-Type: application/x-www-form-urlencoded'));
	    curl_setopt($ch, CURLOPT_POST, 1);
	    curl_setopt($ch, CURLOPT_FRESH_CONNECT, TRUE);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));

	    $request=  curl_getinfo($ch);
	    $content = curl_exec($ch);

	} catch(Exception $e) {

	    exception("email-error", "", false);

	}
}
