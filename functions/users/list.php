<?php

$result = $mysql->query("SELECT * FROM Utenti");

$return = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($return, $row);
    }
    response(true, $return);
} else {
    response(false, $return);
}