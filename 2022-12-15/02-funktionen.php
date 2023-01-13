<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funktionen</title>
</head>
<body>
    <h1>Funktionen</h1>

    <?php
    /* Eine Function wird definiert */
    function hallo () {
        echo'<p>Hallo </p>';
    }

    /* Function mit Parametr */
    function begruessung( $ausgabe) {
        if(!empty($ausgabe))
        return "<p> Hallo $ausgabe!</p>";
        /* Anweisungen nach return werden nicht ausgefürt */
        return '<p>Hallo!</p>';
    }
    
    /* Eine Function wird aufgerufen  und tut das was sie tut */
    hallo();

    /* echo begruessung('Peter'); */
        $msg= begruessung('Dieter','Klaus');
        echo $msg;

        /* optionale Parametr */
        /* gehören IMMEr ans Ende der Parameter-Kette */
        function gesamtpreis( $anzahl=0, $preis = 42, $waehrung = '€') {
            $erg = $anzahl * $preis;
            return "<p> Ihr Einkauf kostet $erg $waehrung.</p>";
        }

        echo gesamtpreis(5,12.5,'€');
        echo gesamtpreis ();

        /* beliebig viele Parameter */
        function viele_parameter( $a ) {

            $num_args = func_num_args();
            $args = func_get_args();

            echo "<p>Das erste Parameter ist $a.</p>";
            echo "<p>Es wurden $num_args Parameter übergeben.</p>";
            echo '<pre>';
            var_dump($args);
            echo '</pre>';
        }
        viele_parameter( 5, 'Quatsch', true, 12.5 );

        /* variadische Parameter  seit PHP 5.7*/
        function variadisch(...$params ) {
            echo '<pre>', print_r($params,true), '</pre>';
        }
        variadisch('Butter','Mehl','Milch','Eier',true, 6.8);

        function mitarbeiter( $m_name, $m_vorname, $beruf, $alter) {
            if(is_array($m_vorname)){
                $vn = implode(', ', $m_vorname);
            } else {
                $vn = $m_vorname;
            }
            return "<p>$vn  $m_name ist $beruf und $alter Jahre alt.</p>";
        }

        /* normaler Aufruf */
        echo mitarbeiter('Kenobi','Obi-Wan', 'Jedi',185);

        /* variadischer Aufruf */
        $m_array = array (
            'Duck',
            array('Donald', 'Fauntleroy'),
            'Ente',
            76
        );
        echo mitarbeiter(...$m_array);

        /* explizierte Datentypen bei Parametern und return
        Wichtig! vorher declare (strict_types=1) als erste Anweisung in der Datei angeben */

        function addiere (int $a, int $b):int {
            return $a + $b;
        }

        echo addiere(1, 2) . '<br>';



        function addieren ($a, $b){
            return $a + $b;
        }

        echo addieren('1','2') . '<br>';    // string, wichtig ist am Anfang '...php declare(strict_types=1);...' schreiben
        //echo addieren(true,'2abc') . '<br>';
    ?>

   

</body>

</html>