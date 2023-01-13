<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>u_Zahl</title>
</head>
<body>
<?php  
    $u1 = 22.50;
    $u2 = 12.30;
    $u3 = 5.20;
    $netto = $u1 + $u2 + $u3;
    const MWST = 0.19;
    $mwst = ($u1 + $u2 + $u3) * (MWST);
    $brutto = $netto + $mwst;
    echo '<p>Der Bruttopreis eines Einkaufs beträgt ' .$brutto. ' €</p>';


    
?>
</body>
</html>