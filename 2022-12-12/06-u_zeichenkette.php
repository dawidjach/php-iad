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
    $mwst_zahl = 19;
    $mwst = ($u1 + $u2 + $u3) * (MWST);
    $brutto = $netto + $mwst;
    echo 'Artikel 1: ' .$u1. ' €<br>';
    echo 'Artikel 2: ' .$u2. ' €<br>';
    echo 'Artikel 3: ' .$u3. ' €<br>';
    echo '<br>';
    echo 'Nettosumme: ' .$netto. ' €<br>';
    echo 'Umsatzsteuer: ' .$mwst_zahl. ' %<br>';
    echo 'Bruttosumme: ' .$brutto. ' €<br>';

?>
</body>
</html>