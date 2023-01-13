<?php 
    require_once 'Fahrzeug.class.php';
    $vespa = new Fahrzeug('Vespa Piaggio', 25, 'rot');
    echo $vespa;

    /* Daten des Objektes als Zeichenkette in eine Variable speichern */
    $s = serialize($vespa);

    /* Diese Zeichenkette zum Test ausgeben */
    print_r ("<p>$s</p>");

    /* Datei-Inhalt einlesen */
    file_put_contents('vespa.dat', $s);
    echo '<p>Objekt serialisiert und in Datei gespeichert.</p>';
?>