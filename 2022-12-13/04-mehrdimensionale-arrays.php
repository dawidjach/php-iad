<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mehrdimensionale Arrays</title>
</head>
<body>
    <h1>Mehrdimensionale Arrays</h1>
    <?php 
        $personen = array(
            array(
                'Manfred',
                'deutsch',
                53,
                'männlich'
            ),
            array (
                'Cindy',
                'englisch',
                23,
                'weiblich'
            ),
            array(
                'Sergio',
                'spanisch',
                31,
                'diverse'
            ),
            array(
                'Ryoyu',
                'japanisch',
                54,
                'männlich'
            )
        );

        // Werte ausgeben
        echo '<h3>Werte ausgeben</h3>';
        echo '<p>'
            .$personen[2][0].' ist '
            .$personen[2][2]. ' Jahre alt, spricht '
            .$personen[2][1]. ' und ist '
            .$personen[2][3]. '.</p>';

        // Ändern
        echo '<h3>Ändern</h3>';
        echo '<pre>', print_r($personen), '</pre>';

        // Hinzufügen
        echo '<h3>Hinzufügen</h3>';
        $personen[] = array(
            'Ursula',
            'schwedisch',
            47,
            'weiblich'
        );
        $personen[4][0] = 'Johanna';
        $personen[4][1] = 'dänisch';
        $personen[4][2] = 22;
        $personen[4][3] = 'weiblich';

        echo '<pre>', print_r($personen), '</pre>';
    ?>

<!--  -->
    <h2>Ausgabe der Personalliste mit verschachtelter foreach-Schleife</h2>
    <table style="border: 1px solid gray">
        <tr>
            <th>Name</th>
            <th>Sprache</th>
            <th>Alter</th>
            <th>Geschlecht</th>
        </tr>
        <!-- Schleife für das äußere Array (Zeilen) -->
        <?php foreach ($personen as $person) : ?> <!-- jetzt aus PHP rausgehen -->
            <tr>
                <?php foreach ($person as $eigenschaft) : ?> <!-- aus PHP raus -->
                    <td>
                        <!-- in PHP reingehen -->
                        <?php echo $eigenschaft; ?>
                        <!-- aus PHP raus -->
                    </td>
                    <!-- endforeach -->
                    <?php endforeach; ?>
                </tr>
                <!-- endforeach -->
            <?php endforeach; ?>
    </table>

<!--  -->
    <h2>Ausgabe der Personalliste mit der list()-Funktion</h2>
    <table style="border: 1px solid gray;">
        <tr>
            <th>Name</th>
            <th>Geschlecht</th>
            <th>Sprache</th>
            <th>Alter</th>
        </tr>
        
        <!-- Schleife für das äußere Array (Zeilen) -->
        <?php foreach($personen as $person) : ?>
            <tr>
                <!-- list()-Funktion für das innere Array (Spalten) -->
                <!-- list(Variablen aus $person - Reihenfolge ist egal) -->
                <?php list($pname, $sprache, $alter, $geschlecht) = $person ?>
                <td><?php echo $pname; ?></td>
                <td><?php echo $geschlecht; ?></td>
                <td><?php echo $sprache; ?></td>
                <td><?php echo $alter; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    

<!--  -->
    <h2>mehrdimensionale assoziative Arrays</h2>
    <?php 
    $laender = array(
        'Spanien' => array (
            'Hauptstadt' => 'Madrid',
            'Sprache' => 'spanisch',
            'Währung' => 'Euro',
            'Fläche' => '504.645 qkm'
        ),

        'England' => array (
            'Hauptstadt' => 'London',
            'Sprache' => 'englisch',
            'Währung' => 'Pfund Sterling',
            'Fläche' => '130.395 qkm'
        ),

        'Portugal' => array (
            'Hauptstadt' => 'Lissabon',
            'Sprache' => 'portugiesisch',
            'Währung' => 'Euro',
            'Fläche' => '92.345 qkm'
        )
    );

    // Zugriff
    $land = 'Portugal';
    echo "<p>Angaben zu: $land<br>";
    echo 'Hauptstadt: '.$laender[$land]['Hauptstadt'].'<br>';
    echo 'Sprache: '.$laender[$land]['Sprache'].'<br>';
    echo 'Währung: '.$laender[$land]['Währung'].'<br>';
    echo 'Fläche: '.$laender[$land]['Fläche'].'</p>';

    $land = 'England';
    echo"<p>Angaben zu: $land<br>";
    echo 'Sprache: '.$laender[$land]['Sprache'].'<br>';

    ?>

<!--  -->
    <table style="border: 1px solid gray;">
        <tr>
            <th>Land</th>
            <th>Capital city</th>
            <th>Language</th>
            <th>Value</th>
            <th>Area</th>
        </tr>
        <?php foreach($laender as $land => $infos) : ?>
        <tr>    
            <!-- Land ist der Schlüssel des äußeren Arrays, weshalb er hier bereits
            ausgegebn werden sollte. -->
            <td><?php echo $land; ?></td>
            <!-- die restlichen Infos kommen aus dem inneren Array -->
            <?php foreach ($infos as $info) : ?>
                <td><?php echo $info; ?></td>
            <?php endforeach; ?>
        </tr>
        <?php endforeach; ?>
    </table>


</body>
</html>