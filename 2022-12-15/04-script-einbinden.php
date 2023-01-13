<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>externes PHP-script einbinden</title>
</head>
<body>
    <h1>externes PHP-Script einbinden</h1>

    <?php
    /* Zum Einbinden von Scripten kann PHP vier Befehle:  */

    //include - bei fehlender include-Datei wird Folge-Code ausgeführt, 
    //require - bei fehlender include-Datei wird Folge-Code NICHT !!! ausgeführt (Fatal-Error),
    //include_once - 
    //require_once - 

    include '04-externes-script.inc.php';   // gleiche Datei darf nur einmal mit include aufgerufen werden, sonst Error,
    //include_once '04-externes-script.inc.php';  // gleiche Datei werden mit include_once ohne Error ausgeführt, aber wofür?
    echo gib_mir('Kirk', 'James T.', 65);

    echo '<p>Das ist eine folgende Ausgabe</p>';

    ?>

   

</body>
</html>