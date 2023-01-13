<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>assoziative Felder</title>
</head>
<body>
    <h1>assoziative Felder</h1>
    <?php 
        // Array anlegen
        $hauptstaedte = array(
            'Schweiz' => 'Bern',
            'Frankreich' => 'Paris',
            'Spanien' => 'Madrid',
        );

        // Array-Werte ausgeben
        echo '<h3>$hauptstaedte [Schweiz]</h3>';
        echo "<p>{$hauptstaedte['Schweiz']}</p>";

        // Hinzufügen
        echo '<h3>Polen mit Haupstadt hinzüfugen</h3>';
        $hauptstaedte['Polen'] = 'Warschau';
        echo '<pre>', print_r($hauptstaedte), '</pre>';

        // Löschen
        echo '<h3>Spanien löschen</h3>';
        unset($hauptstaedte['Spanien']);
        echo '<pre>', print_r($hauptstaedte), '</pre>';

        // produktiver Einsatz
    ?>
    <table style="border: 1px solid gray">
        <tr>
            <th>Land</th>
            <ht>Haupstadt</th>
        </tr>
        <?php 
        /* Syntax für assoziative Arrays: */
        /* forech ($array as $key => $value) */
        foreach ($hauptstaedte as $land => $stadt) {
            echo '<tr>'; 
                echo "<td>$land</td>";
                echo "<td>$stadt</td>";
            echo '</tr>';
        }
        ?>
    </table>
</body>
</html>