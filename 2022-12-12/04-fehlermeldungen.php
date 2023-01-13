<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fehlermeldungen</title>
</head>
<body>
    <h1>Fehlermeldungen</h1>
    <?php 
        /* Fehlerausgaben im Script regeln */

        // um Fehlermeldung zu verschwunden:
        error_reporting(0);

        // über Konstante verschwunden: (kann sein dass E-ALL alle Fehlermeldungen verhindert)
        error_reporting(E-ALL);

        // 1. Erzeugt Warnung
        echo "<p>Der Wert der Variable i ist: $i</p>";

        // 2. Erzeugt einen Fatal Error. Folge-Anweisungen werden nicht mehr durchgeführt.
        echo '<p>weitere Anweisungen</p>';
        /* echo 4 / 0 */

        // Tippfehler bei Funktionen:
        prin_r($i); // Parser
    ?>
</body>
</html>