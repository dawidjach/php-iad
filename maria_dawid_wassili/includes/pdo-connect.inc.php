<?php 
    // Konstanten für die Zugangsdaten anlegen
    define('DB_DSN', 'mysql:host=localhost;port=3306;dbname=' . $database . ';charset=utf8');
    define('DB_USER', 'admin');
    define('DB_PW', 'Pa$$w0rd');


    // Datenbank-Server verbinden mit neuem PDO-Objekt
    //$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PW);

    // Verbindung zum DB-Server aufnehmen
    $db = new PDO(DB_DSN,DB_USER,DB_PW);

?>