<?php
require_once( '../includes/functions.inc.php' );
$database = 'restaurant';
/* get_header(
*	string $title,
*	string/array $css=NULL,
*	bool $bootstrap=false,
*	string $header=NULL,
*	array $nav=NULL,
*	bool $fluid=false
* )
*/
$args = array(
    'Sichere INSERTS',
    NULL,
    true
    
);
get_header( ...$args );
require_once( '../includes/pdo-connect.inc.php' );

//Check ob Formular gesendet wurde

if(!empty($_POST )) {
    $gerte_name = $_POST ['gerte_name'];
    $gerte_beschreibung = $_POST ['gerte_beschreibung'];
    $gerte_kateg_id_ref = $_POST ['gerte_kateg_id_ref'];

    //Prepared Statemants: Anstelle der Werte,
    // die in die DB geshrieben werden nutzen wir Platzhalter(?).

    $sql = 'INSERT INTO `tbl_gerichte`
    (
        `gerte_name`,
        `gerte_beschreibung`,
        `gerte_kateg_id_ref`
    )
    VALUES
    (
        ?,
        ?,
        ?
    );';

    $stmt = $db->prepare($sql) ;

    //Vorbereitete SQL-Abfrage aus führen und die Platzhalter ersetzen
    if($stmt->execute([$gerte_name, $gerte_beschreibung, $gerte_kateg_id_ref] ) ){
        echo '<p class="alert alert-success">';
        echo $stmt->rowCount();
        echo 'Datensatz wurdeeingefügt</p>';
    }else {
        echo '<p class="alert alert-danger">Datensatz nonnte nicht eingefügt werden:<br>';
        $errinfo = $stmt->errorIfo();
        echo $errinfo[2] . '</p>';

    }
}

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>

<h2>Neues Gericht anlegen</h2>


<p>
    Name des Gerichtes:<br>
    <input type="text" name="gerte_name">
</p>

<p>
    Beschreibung:<br>
    <textarea name="gerte_beschreibung" cols= "30" rows="5"></textarea>
</p>

<p>

    Kategorie: <br>

    <select name="gerte_kateg_id_ref">

        <?php

           

            $sql = 'SELECT `kateg_id`,`kateg_name` FROM `tbl_kategorien`';

            if($stmt = $db->query($sql)) {

               foreach($stmt->fetchALL() as $row):?>

                <option value="<?php echo $row['kateg_id']; ?>">

                    <?php echo $row['kateg_name']; ?>

                </option>

                <?php endforeach;

            }?>

    </select>

</p>



<p>

    <button type="submit" class="btn btn-primary">Speichern</button>

</p>



</form>



   

<?php get_footer(); ?>