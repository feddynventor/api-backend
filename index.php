<?php

include_once "config.php";

// Converti POST in Array associativo
include_once "modules/io/post.php";
$input = setPostObject($_POST);

// Inclusione librerie
include_once "modules/io/exception.php";
include_once "modules/io/response.php";

// Non richiedere il token se stai eseguendo il login (ottenimento del token JWT)
if ($input->cmd == "login")
    include_once "functions/login.php";
else if ($input->cmd == "test")
    include_once "functions/test.php";
else
    include_once "modules/utility/decryptToken.php";

switch ($input->cmd) {
    // TESTING avanzato
    case 'curl_test':
        if ($utente_ruolo > 1) exception("unauthorized-user");
        include_once "modules/utility/curl.php";
        response(true, curl_post(
            $input->url,
            json_decode($input->data, TRUE)
        ));
        break;
    case 'sock_test':
        if ($utente_ruolo > 1) exception("unauthorized-user");
        include_once "modules/utility/web_socket.php";
        if ( $sock = websocket_open(SOCKET_SERVER, SOCKET_PORT) )
            websocket_write( $sock, json_encode($input) );
        else
            exception("socket-exception");
        break;
    
    // UTENTE
    case 'list_users':
        include_once "functions/users/list.php";
        break;
    case 'create_user':
        include_once "functions/users/new.php";
        break;
    case 'change_password':
        include_once "functions/users/password_change.php";
        break;

    default:
        exception("undefined-function", json_encode($_POST));
}
$mysql->close();
