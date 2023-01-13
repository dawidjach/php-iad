<?php 
    class Fahrzeug {
        function __construct(private $bezeichnung = 'unbekannt', private $geschwindigkeit = 0) {}

        function beschleunigen($wert) {
            $this->geschwindigkeit += $wert;
        }

        function __toString() {
            return "$this->bezeichnung, $this->geschwindigkeit km/h<br>";
        }

        /* Methode zum klonen eines Objektes */
        function __clone() {
            $this -> bezeichnung = 'Klon von ' .$this -> bezeichnung;
            $this -> geschwindigkeit = $this -> geschwindigkeit +1;
        }

        static function kopieVon($original) {
            $neu = new Fahrzeug();
            $neu -> bezeichnung = 'Kopie von ' .$original -> bezeichnung;
            $neu -> geschwindigkeit = $original -> geschwindigkeit +1;
            return $neu;
        }
    }

    /* Originalobjekt */
    $vespa = new Fahrzeug('Vespa Piaggio', 25);

    /* zweite Referenz auf Originalobjekt */
    $suzuki = $vespa;

    /* Klonen eines Objektes */
    $yamaha = clone $vespa;

    /* Kopie eines Objektes */
    $honda = Fahrzeug::kopieVon($vespa);

    /* Auswirkung auf die zweite Referenz */
    $vespa -> beschleunigen(20);
    echo $suzuki;

    /* Ausgabe des Klons */
    echo $yamaha;
?>