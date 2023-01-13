<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konstanten</title>
</head>
<body>
    <h1>Konstanten</h1>
    <?php 
        /* Konstanten definiren und initialisieren (Konstante sind großgeschrieben und ohne $) */
        // 1. klassische Variante
        define('MWST', 0.19);

        echo '<p>Die Mehrwertsteuer in Deutschland beträgt zurzeit ' .(MWST *100) . '%</p>';
        
        // 2. alternative Variante (seit PHP 5.3)
        const MWST7 = 0.07; // diese Variante funktioniert nur im Top-Level-Scope !
        
        echo '<p>Mehrwertsteuer in Deutschland beträgt zurzeit auch '.(MSWT7*100) . '%</p>'; // fehler, wahrscheinlich kein Top-Level-Scope
    ?>
</body>
</html>