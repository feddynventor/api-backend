<?php
/**
 * Generazione della risposta sottoforma di json
 * Si richiede un valore boolean se è andata a buon fine ed un eventuale corpo
 *
 * @param bool $result
 * @param string $output
 * @param bool $exit
 */
function response(bool $result, $output = "", $exit = true)
{
    global $mysql;
    echo json_encode(array("response" => $result ? true : false, "data" => $output), JSON_UNESCAPED_SLASHES);
    if ($exit) {
        $mysql->close();
        exit();
    }

}
