<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>while-Schleife</title>
</head>
<body>
    <h1>Schleifen</h1>

    <!-- while -->
    <h2>while-Schleife</h2>

    <?php 
        $z = $x = 5;

        while ($z <= 10) {
            echo "$z <br>";
            $z++;
        }

    ?>

    <!-- do-while -->
    <h2>do-while</h2>
    <?php 

        do {
            echo "$x<br>";
            $x++;
        } while ($x <= 10);
        echo "x = $x <br> (nach der Schleife).";
    ?>

    <!-- for -->
    <h2>for</h2>
    <?php 
    
        for($i = 1; $i <= 10; $i++) {
            echo "$i <br>";
        }
    ?>
    


</body>
</html>