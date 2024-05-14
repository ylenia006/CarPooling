<?php

$db = "Carpooling";
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_connection = mysqli_connect($db_host, $db_user, $db_password); 
//parametri per la connessione al databse 

if (!$db_connection) {
	print "si è verificato un problema tecnico";
	exit;
}
error_log("giglo si è connesso");
mysqli_select_db($db_connection, $db);
