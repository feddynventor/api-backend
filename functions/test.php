<?php

if (isset($input->exception))
    exception("dummy", "Informazioni aggiuntive");

response(true, array(
    "salve"=>"salvino",
    "HOME_DIR"=>HOME_DIR,
    "user"=>array($utente_id,$utente_mail,$utente_ruolo),
    "input_data"=>$input
));