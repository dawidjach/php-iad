<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>u-For</title>
</head>
<body>
    <?php 
    for ($i = 13; $i <= 29; $i = $i + 4) {
        echo "$i ";
    }
    echo "<br>";
    for ($j = 2; $j >= -1; $j = $j - 0.5) {
        echo "$j ";
    }
    echo "<br>";

    $k = 2000;
    while ($k <= 6000) {
        echo "$k ";
        $k += 1000;
    }
    echo "<br>";

    $l = 5;
    while ($l <=13) {
        echo "Z$l ";
        $l += 2;
    }
    echo "<br>";

   $b = 1;
   for ($b; $b <= 3; $b++) {
    echo "a b$b ";
   }
   echo "<br>";


   for ($c = 2; $c <= 23; $c += 10) {
    echo "c$c ";
    $d = $c + 1;
    echo "c$d ";
   }
   echo "<br>";

   for ($i = 13; $i <= 45; $i+=4) {
    if($i > 21 && $i < 33) continue;
    echo "$i ";
   }


    


    ?>
</body>
</html>