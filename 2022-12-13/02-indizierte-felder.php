<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>indizierte Felder</title>
</head>
<body>
    <h1>insizierte Felder (Arrays)</h1>

    <?php 
        $staedte = array(
            'Erfurt', 
            'Jena',
            'Frankfurt',
            'Paris',
            'London'
        );
        /* echo "<p>$staedte</p>"; // fehler ! Arrays als String kann nicht ausgegeben werden ! */
        echo "<p>$staedte[2]</p>";  // Frankfurt

        // kurzschreibweise seit php 5.4
        $laender = [
            'Deutschland',
            'Schweiz',
            'Frankreich'
        ];

        // während der Entwicklungsphase: Ausgabe eines Arrays zu Testzwecken
        // a) mit print_r()
        echo '<pre>';   // nach columns sortieren
        print_r ($staedte);
        echo '</pre>';

        echo '<pre>', print_r($laender), '</pre>';

        // 2. mit vard_dump()
        echo '<pre>', var_dump ($laender, $staedte), '</pre>';

        // Anfügen eines Wertes an ein idiziertes Array
        $laender[] = 'Belgien';

        // Ändern eines Wertes
        $laender[2] = 'Luxembourgh';
        echo '<pre>', var_dump($laender), '</pre>';
        
        // Löschen eines Wertes
        unset($laender[1]);
        echo '<pre>', var_dump($laender), '</pre>';

        // Index neu belegen
        $laender[1] = 'Portugal';
        echo '<pre>', print_r($laender), '</pre>';

        // Sortiere das Array nach seinen Indizes aufsteigend
        ksort($laender);
        echo '<h3>Sortiere das Array nach seinen Indizes aufsteigend</h3>';
        echo '<pre>', print_r($laender), '</pre>';

        // Ausgabe für den produktiven Einsatz
        echo '<p>';
        echo '<h3>Ausgabe für den produktiven Einsatz</h3>';
        foreach($staedte as $stadt) {
            echo "$stadt, ";
        }
        echo '</p>';

        // Ausgabe der Anzahl der Array-Einträge
        echo '<h3>Ausgabe der Anzahl der Array-Einträge</h3>';
        echo '<p>Das Array $laender hat '.count($laender).' Einträge.</p>';

        
    ?>
</body>
</html>