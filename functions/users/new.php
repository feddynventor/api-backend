<?php

$result = mysqli_query($mysql, "INSERT INTO Utenti(Email, Password, Nome, Cognome, Ruolo) VALUES('{$input->email}','".hash("sha1",$input->pass)."','".addslashes($input->nome)."','".addslashes($input->cognome)."',{$input->ruolo})");

if ($result) response(true);
else response(false, $mysql->error);