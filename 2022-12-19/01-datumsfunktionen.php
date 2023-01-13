<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datumsfunktionen</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <h1>Datumsfunktionen</h1>
    
    <?php
        echo '<body style="background: color #666;">';


        echo '<pre>', var_dump( getdate() ), '</pre>';

        $zeitstempel = getdate();
        printf('<p>Datum: %s, %d. %s %d</p>', $zeitstempel['weekday'], $zeitstempel['mday'], $zeitstempel['month'], $zeitstempel['year']);

        /* Funktionen zur formatierten Datumsausgabe */

        // 1. strftime()
        echo '<pre>', print_r( time(), true ), '</pre>';    //1671436819

        echo '<p>';
        echo strftime('%A, the %e. %B %Y');
        echo'</p>';

        // 2. date
        echo '<p>';
        echo date('d.m.Y H:i:s');   //19.12.2022 09:10:40
        echo'</p>';

        echo '<p>';
        echo date('l, d.m.Y H:i \U\h\r');   //Monday, 19.12.2022 09:15 Uhr
        echo'</p>';

        /* Zeitmessung mit microtime() */
        echo '<p>';
        echo 'microtime(): ' .microtime(). '<br>';  //microtime(): 0.99890000 1671438059
        echo 'microtime(true): ' .microtime(true);  //microtime(true): 1671438059.999
        echo'</p>';

        /* Zeitunterschied zw. beiden microtimes() messen */
        $start = microtime(true);
        for ($i =1; $i <  100000; $i++) {
            $quadrat = sqrt($i);
        }
        $end = microtime(true);
        echo '<p>Die Ausführungsdauer = ' .($end-$start). ' Sekunden</p>';
    ?>




    <!--  Formular mit Datum  -->
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <p>Geben Sie bitte das Datum in der Form tt.mm.jjjj ein!</p>
        <input type="date" name="datum">
        <input type="submit" value="Prüfen" name="senden">
    </form>

    <?php 
        if(isset($_POST['senden'])) {

            /* zum Prüfen der korrekten Datumsangabe mit der Funktion checkdate() benötigen wir das Datum in seine einzelnen Teile zerlegt */
            $datum = explode('-', $_POST['datum']);
            echo '<pre>', var_dump( $datum ), '</pre>';

            $check = checkdate((int)$datum[1], (int)$datum[2], (int)$datum[0]);            
            
            if ($check) {
                echo '<p>'.$_POST['datum'].' ist korrekt. </p>';
            } else {
                echo '<p>'.$_POST['datum'].' ist <b>nicht</b> korrekt. </p>';
            }
        }
    ?>
    

</body>
</html>