<?php 
    class Fahrzeug {
        function __construct(private $bezeichnung, private $geschwindigkeit) {}

        function beschleuningen($wert) {
            $this -> geschwindigkeit += $wert;
        }

        // "magische Methode"
        function __toString() {
            return $this -> bezeichnung .', ' .$this -> geschwindigkeit .'km/h<br>';
        }
    }

    // Objekte erzeugen
    $vespa = new Fahrzeug('Vespa Piaggio', 25);
    $scania = new Fahrzeug('Scania TS 360', 62);

    // Objekt ausgeben
    echo $vespa;
    echo $scania;

    $vespa -> beschleuningen(20);
    echo $vespa;
?>