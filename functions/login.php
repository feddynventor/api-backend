<?php
$result = $mysql->query("SELECT id,Nome,Cognome,Email,Ruolo FROM Utenti WHERE Email='".addslashes($input->email)."' AND Password='".hash("sha1",$input->pass)."'");

if (mysqli_num_rows($result) > 0) {
    
    $row =  mysqli_fetch_assoc($result);
    
    $payload = base64_encode( json_encode( array("id"=>$row["id"], "email"=>$row["Email"], "nome"=>$row["Nome"], "cogn"=>$row["Cognome"], "role"=>$row["Ruolo"]) ) );
    $signature = hash_hmac("SHA256", $payload, TOKEN_JWT);

    response(true, $payload.".".$signature);
} else {
    response(false);
}