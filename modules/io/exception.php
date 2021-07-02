<?php

$error_list = array(
    "module-loader-error-1" => "Modulo non esistente",

    "module-undefined-function" => "Funzione non definita",

    "file-not-found-exception" => "Il file non è stato trovato",
    
    "invalid-token-exception" => "Token non valido",

    "unknown-user" => "Utente inesistente",

    "unauthorized-user" => "Utente non autorizzato",

    "invalid-token-exception" => "Token non valido",

    "incorrect-password-exception" => "La password inserita non è valida",

    "apikey-not-valid" => "la api key non è valida",

    "sql-error-1" => "Errore database",

    "email-error" => "Errore invio mail",

    "invalid-file-extension" => "Estensione file non valida",

    "socket-exception" => "Errore Socket",

    "dummy" => "Testo esempio"
);

/**
 * Generazione di un errore inviato sottoforma di json.
 * Si richiede l'input di un error code (si possono definire altri errori dall'oggetto in alto)
 * e viene generata l'eccezione con il messaggio relativo.
 *
 * @param string $error
 * @param string $info
 * @param bool $fatal
 */
function exception($error, $info = "", $fatal = true)
{
    global $error_list;
    echo json_encode(array("response" => false, "error_code" => $error, "error_description" => $error_list[$error], "informations" => $info));
    if ($fatal) {
        exit();
    }

}
