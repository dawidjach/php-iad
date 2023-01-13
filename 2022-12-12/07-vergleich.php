<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vergleich</title>
</head>
<body>

    <?php  
        /* 
        $a == $b	Gleich	Gibt true zurück, wenn nach der Typumwandlung $a gleich $b ist.
        $a === $b	Identisch	Gibt true zurück, wenn $a gleich $b ist und beide denselben Typ haben.
        $a != $b	Ungleich	Gibt true zurück, wenn nach der Typumwandlung $a nicht gleich $b ist.
        $a <> $b	Ungleich	Gibt true zurück, wenn nach der Typumwandlung $a nicht gleich $b ist.
        $a !== $b	Nicht identisch	Gibt true zurück, wenn $a nicht gleich $b ist, oder wenn beide nicht denselben Typ haben.
        $a < $b	Kleiner als	Gibt true zurück, wenn $a kleiner als $b ist.
        $a > $b	Größer als	Gibt true zurück, wenn $a größer als $b ist.
        $a <= $b	Kleiner oder gleich	Gibt true zurück, wenn $a kleiner oder gleich $b ist.
        $a >= $b	Größer oder gleich	Gibt true zurück, wenn $a größer oder gleich $b ist.
        $a <=> $b	Raumschiff	Eine Ganzzahl (int), die kleiner als, gleich oder größer als 0 ist, wenn $a kleiner als, gleich oder größer als $b ist.
        */
        // ist gleich
        if (6 == '6') {
            echo 'wahr<br>';
        } else {
            echo 'falsch<br>';
        }

        // ist identisch - vergleicht Wert UND Datentyp
        if (6 == '6') {
            echo 'wahr<br>';
        } else {
            echo 'falsch<br>';
        }

        // Ternär-Operator
        $schalter = true;
        echo ($schalter === true) ? 'AN' : 'AUS';

        /* Mehrfachverzweigungen */
        $status = 200;
        switch($status) {
            case 200:
                $erg = 'okay';
                break;
            case 300:
                $erg = 'Zugriff verweigert';
                break;
            case 400:
                $erg = 'Datei nicht gefunden';
                break;
            case 500:
                $erg = 'Server-Fehler';
            default: 
                $erg = 'Ungultiger Status-Code';
        }
        echo "<p>Server-Status: $erg ($status)</p>";


        /* Mehrfachverzweigung mit match seit PHP 8.0 */
        $erg2 = match($status) {
            200 => 'okay',
            300 => 'Zugriff verweigert',
            400 => 'Datei nicht gefunden',
            500 => 'Server-Fehler',
            default => 'Ungultiger Status-Code'
        };

        echo "<p>Server-Status: $erg2 ($status)</p>";

        /* Spaceship-Operator */
        $a = 14;
        $b = 9;
        echo $a <=> $b; // a < b = 1,    a == b = 0,    a > b = -1


        // Koalenszenz-Operatoren seit PHP 7
        echo $t ?? '$t nicht vorhanden<br>';
        $t = 42;
        echo $t ?? '<br> $t nicht vorhanden <br>';

        $l ??= '$l nicht vorhanden<br>';    // auf Leertaste aufpassen
        echo $l;

        $l = 4200;
        $l ??= '$l nicht vorhanden<br>';
        echo $l;

    ?>
</body>
</html>