<?php 
declare(strict_types=1);
require_once('../includes/functions.inc.php');
$args = array(
    'Titel der Seite',

    /* mehrere CSS-Dateien aufrufen/einbinden */   
    array (
        'css/fonts.css',
        'css/styles.css'
    ),
    true,
    'Header der Seite',
    array(
        '<img src="../includes/rs-logo.png" alt="logo" width="120">',
        array(
            'Start' => 'index.php',
            'Über uns' => 'ueber-uns.php',
            'Datumsfunktionen' => '01-datumsfunktionen.php'
        )
    ),
    true    //fluid - mit true gibt kein margin/Zetralisierung des Inhalts in der Webseite
);
get_header( ...$args );


?>

<!-- <!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
</head>
<body>
    <header>
        <nav><a href="index.php">Start</a> | <a href="ueber-uns.php">Über uns</a> | <a href="01-datumsfunktionen.php">Datumsfunktionen</a></nav>
        <h1>Kopf meiner coolen Seite</h1>
    </header>
</body>
</html> -->