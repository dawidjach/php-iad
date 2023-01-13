<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exceptions (Fehlerbehandlung)</title>
</head>
<body>
    <h1>Exceptions (Fehlerbehandlung)</h1>

    <?php 

        /* 1. Variable unbekannt */
        echo "<h3>1. Variable unbekannt</h3>";

        // $x muss vordefiniert werden, sonst funktioniert nicht
        $x = 'Test';

        try {
            if (!isset($x )) {
                throw new Exception('Mein Fehler z.B. Variable unbekannt');
            }
            echo "<p>Variable: $x</p>"; 
        }catch (Exception $e) {
            echo '<p>' .$e->getMessage(). '</p>';
        }finally {
            echo "<p>finally z.B. Ende, Variable unbekannt</p>";
        }

        /* 2. Division durch 0 */
        echo "<h3>2. Division durch 0</h3>";

        $x = 42; 
        $y = 7; // y ist fehlerhafter Wert

        try {
            if($y === 0) {
                throw new Exception ('Fehler! Division durch 0!');
            }
            $z = $x / $y;
            echo "<p>Division $x / $y = $z<br>";
        } catch (Exception $e) {
            echo '<p>' .$e->getMessage(). '<br>';
        } finally {
            echo 'Ende Division durch 0 </p>';
        }

        /* 3. Zugriff auf Funktion */
        echo "<h3>3. Zugriff auf Funktion </h3>";
        try {
            if(!function_exists('testFunktion')) {
                throw new Exception('Fehler! Funktion unbekannt!');
            }
            testFunktion();
        } catch(Exception $e) {
            echo '<p>' .$e->getMessage(). '<br>';
        } finally {
            echo 'Ende, Funktion unbekannt. </p>';
        }

        echo '<p><i>E N D E-D E S-P R O G R A M M S<i></p>';
        
    ?>

</body>
</html>