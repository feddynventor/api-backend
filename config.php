<?php

// ====================== RestAPI config - Header per le risposte
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: token, Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Connection: Keep-alive");

// ====================== Messaggi di Debug di PHP
// Warning e Errori
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
// Avvisi (troppo verbose)
// error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

// ====================== Upload ======================
// ini_set('upload-max-filesize', '32768K');
// ini_set('post_max_size', '32768K');

// ====================== Configurazione ======================
define("HOME_DIR", __DIR__);            //senza slash finale
define("TOKEN_JWT", "DpYC6HuHPE");      //salt per hash hmac
// define("SOCKET_SERVER", "127.0.0.1");
// define("SOCKET_PORT", "9000");

// ====================== Database ======================
global $mysql;
$mysql = new mysqli("10.180.231.12", "user1", "IPHZEkrbl0wx0ojn", "db");
// $mysql = new mysqli("127.0.0.1", "user2", "40ee63d03064596a", "db");
