<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variablen</title>
</head>
<body>
    <h1>Variablen</h1>
    <?php 
        // Variablen beginnen mit einem $
        $eine_zahl = 5;
        $keine_ahnung = '5';
        $kaffee = '5 Tassen Kaffee';

        echo '<p>' . gettype($keine_ahnung);    // string

        $erg = $eine_zahl + $keine_ahnung;
        echo '<p>Das Ergebnis ist '.$erg. ' vom Datentyp ' .gettype($erg).'</p>'; // int (int + string = int)

        $erg1 = $keine_ahnung + $eine_zahl;
        echo '<p>'.gettype($erg1);              // auch int

        $erg = $eine_zahl + $kaffee;
        echo '<p>Das Ergebnis ist '.$kaffee. ' vom Datentyp ' .gettype($kaffee).'</p>'; // fehler, das soll man nicht tun! nicht numerischer Wert in mathematischer Operation

        /* Besonderheiten bei Zeichenketten */
        /* Zeichenketten können in 'Single-Quotes' oder in 'Double-Quotes' stehen. */
        $eine_zeichenkette = 'Hier kommt ein Karton';
        echo '<h2>$eine_zeichenkette</h2>';     // fehler, wir wollen den Wert ausgeben
        echo '<h2>' .$eine_zeichenkette. '</h2>';   // der Wert wurde gut ausgegeben. Wichtig ist der Punkt vor der Variable und nach der Variable. Textgröße ist immer innen den Ausführungszeichen.

        /* Inkrement und Dekrement */
        // 1. Pre-Inkrement
        $a = 39; 
        $b = 2;
        echo "<p>\$a = $a, \$b = $b</p>";
        $erg = ++$a + $b;
        echo "<p>Das Ergebnis von ++$a + $b ist <b>$erg</b> </p>";   // vorher a = 39, hier wurde 'a' inkrementiert.

        /* Was macht PHP? */
        // a. Das Inkrement wird ausgeführt: 39 + 1 = 40,
        // b. Die Addition wird durchgeführt: 40 + 2 = 42,
        // c. Das Ergebnis wird der Variable $c zugewiesen.

        // 2. Post-Inkrement
        $a = 39;
        $erg = $a++ + $b;
        echo "<p>Das Ergebnis $a++ + $b ist <b>$erg</b></p>";

        /* Was macht PHP? */
        // a. Die Addition wird durchgeführt: 39 + 2 = 41,
        // b. Das Ergebnis wird der Variable $d zugewiesen,
        // c. Das Inkrement wird ausgeführt: 39 + 1 = 40;

        
        /* 3. Abgekürzte mathematische Operationen */
        $a = 10;
        $a += 5;    // ist das Selbe wie $a = $a + 5
        echo "<p>Der Wert von \$a ist $a </p>";

        /* 4. Datentyp explizit konvertieren */
        $z1 = '25.9';
        $z2 = '17';
        $erg = (int)$z2 + (double)$z1;  // Konvertieren
        echo "<p>Das Ergebnis $z1 + $z2 ist $erg</p>"

        



    ?>
</body>
</html>