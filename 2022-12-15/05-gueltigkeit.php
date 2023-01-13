<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gültigkeitsbereiche von Variablen (Namespaces)</title>
</head>
<body>
    <h1>Gültigkeitsbereiche von Variablen (Namespaces)</h1>

    <?php 
        $ausgabe = 'Das ist ein Brot';

        function tue_etwas($n) {
            global $ausgabe; // nicht empfohlen
            global $innen;

            echo '<pre>1. aus der Funktion. ';
            print_r( $n );
            echo '</pre>';

            $ausgabe = 'Das ist ein Brett';

            echo '<pre>2. aus der Funktion. ';
            print_r( $ausgabe );
            echo '</pre>';

            $innen = 'Noch ein Brett';

            return $innen;
        }

        tue_etwas($ausgabe);

        echo '<pre>3. aus dem Script. ', print_r( $ausgabe, true ), '</pre>';

        echo tue_etwas($ausgabe);

        echo '<pre>4. innen. ', print_r( $innen, true ), '</pre>';
    ?>
</body>
</html>