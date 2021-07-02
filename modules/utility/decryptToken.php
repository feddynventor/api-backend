<?php

$token = getallheaders()["token"];

$ruolo = -1;

$uid = json_decode(base64_decode( explode(".", $token)[0] ))->email;
if ( json_last_error() != 0 )
    exception("invalid-token-exception","Parsing fallito");

$result = $mysql->query("SELECT id,Nome,Cognome,Email,Ruolo FROM Utenti WHERE Email='".$uid."'");
if (mysqli_num_rows($result) == 1) {
    
    $row =  mysqli_fetch_assoc($result);
    
    $payload = base64_encode( json_encode( array("id"=>$row["id"], "email"=>$row["Email"], "nome"=>$row["Nome"], "cogn"=>$row["Cognome"], "role"=>$row["Ruolo"]) ) );
    $signature = hash_hmac("SHA256", $payload, TOKEN_JWT);

    if ( strcmp($signature, explode(".", $token)[1])!=0 )
        exception("invalid-token-exception");
    else {
        $utente_ruolo = $row["Ruolo"];
        $utente_id = $row["id"];
        $utente_mail = $row["Email"];

        // prosegui con l'esecuzione
    }

} else {
    exception("unknown-user");
}