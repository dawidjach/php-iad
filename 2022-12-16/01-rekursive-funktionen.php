<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rekursive Funktionen</title>
</head>
<body>
    <h1>rekursive Funktionen</h1>

    <?php 
        function halbieren(&$z) {
            $z = $z / 2;
            if($z > 0.1) {    // die if-Anweisung (instrukcja warunkowa) ist sehr wichtig
                echo "z: $z<br>";
                halbieren($z);
            }
        }
        $x = 1.5;
        echo "<p>x = $x </p>";
        halbieren ($x);
        echo "</p><p>x nach halbieren = $x </p>";


        /* Faktorial */
        function factorial( $n ) {
            // Base case
            if ( $n == 0 ) {
              echo "Base case: $n = 0. Returning 1...<br>";
              return 1;
            }          
            // Recursion
            echo "$n = $n: Computing $n * factorial( " . ($n-1) . " )...<br>";
            $result = ( $n * factorial( $n-1 ) );
            echo "Result of $n * factorial( " . ($n-1) . " ) = $result. Returning $result...<br>";
            return $result;
          }       
          echo "The factorial of 5 is: " . factorial( 5 );
    ?>
</body>
</html>