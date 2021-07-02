<?php
/**
 * Eseguono chiamate HTTP con metodo POST o GET
 */
function curl_post($url, $data){
    $ch = curl_init();
    # Setup request to send json via POST.
    $payload = json_encode( $data );
    curl_setopt( $ch, CURLOPT_URL, $url);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt( $ch, CURLOPT_TIMEOUT, 5); //timeout in seconds
    # Return response instead of printing.
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    # Send request.
    $result = curl_exec($ch);
    curl_close($ch);
    
    return $result; //false se TimeOUT
}
function curl_get($url){
    $handle = curl_init();


    // Set the url
    curl_setopt($handle, CURLOPT_URL, $url);
    // Set the result output to be a string.
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

    $output = curl_exec($handle);

    curl_close($handle);

    return $output;
}
?>