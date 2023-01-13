<?php
session_start();
require_once( '_init.php' );
$database = 'hotel';
require_once( '../maria_dawid_wassili/includes/pdo-connect.inc.php' );

$page_title = 'Hilton - Kosten prüfen';
$page_header = NULL;
$message = '';

include_once '_header.php';

if(isset($_POST['rooms_typ']) && ($_POST['customer_number']) && ($_POST['days']) && ($_POST['breakfast']) && ($_POST['halfboard'])) {
  if($_POST['rooms_typ'] && $_POST['customer_number'] && $_POST['days'] && ($_POST['breakfast']) && ($_POST['halfboard']) == -1) {
        echo '<p>Nicht alle Artikeln wurden gewählt.</p>';
    } elseif ($_POST['rooms_typ'] == "Standard") {

        $standard=$_POST['rooms_typ'];
        if($_POST['breakfast'] == "kein" && $_POST['halfboard'] == "kein") {
            $standard_sum = 20 * $_POST['customer_number'] * $_POST['days'];
        } elseif ($_POST['breakfast'] == 10 && $_POST['halfboard'] == 20) {
            $standard_sum = 20 * $_POST['customer_number'] * $_POST['days'] + ($_POST['breakfast'] * $_POST['days']) + ($_POST['halfboard'] 
            * $_POST['days']); 
        } elseif ($_POST['breakfast'] == 10 && $_POST['halfboard'] == "kein") {
            $standard_sum = (20 * $_POST['customer_number'] * $_POST['days'] + ($_POST['breakfast'] * $_POST['days']));
        } elseif ($_POST['halfboard'] == 20 && $_POST['breakfast'] == "kein") {
            $standard_sum = (20 * $_POST['customer_number'] * $_POST['days']) + ($_POST['halfboard'] * $_POST['days']);
        }
        
        echo '<p><b>Kosten: </b><br>
        Room-Typ: '.$_POST['rooms_typ'].' (20€/Tag)
        <br>Anzahl Personen: '.$_POST['customer_number']. 
        '<br>Anzahl Tage: '.$_POST['days']. 
        '<br>Frühstück: '.$_POST['breakfast'].' €/Tag
        <br>Halbpension: '.$_POST['halfboard'].' €/Tag
        <br><b>Summe: '.$standard_sum.' €</b></p>';

    } elseif($_POST['rooms_typ'] == "Suite") {
        $suite=$_POST['rooms_typ'];
        if($_POST['breakfast'] == "kein" && $_POST['halfboard'] == "kein") {
            $suite_sum = 30 * $_POST['customer_number'] * $_POST['days'];
        } elseif ($_POST['breakfast'] == 10 && $_POST['halfboard'] == 20) {
            $suite_sum = 30 * $_POST['customer_number'] * $_POST['days'] + ($_POST['breakfast'] * $_POST['days']) + ($_POST['halfboard'] 
            * $_POST['days']); 
        } elseif ($_POST['breakfast'] == 10 && $_POST['halfboard'] == "kein") {
            $suite_sum = (30 * $_POST['customer_number'] * $_POST['days'] + ($_POST['breakfast'] * $_POST['days']));
        } elseif ($_POST['halfboard'] == 20 && $_POST['breakfast'] == "kein") {
            $suite_sum = (30 * $_POST['customer_number'] * $_POST['days']) + ($_POST['halfboard'] * $_POST['days']);
        }

        echo '<p><b>Kosten: </b><br>
        Room-Typ: '.$_POST['rooms_typ'].' (30€/Tag)
        <br>Anzahl Personen: '.$_POST['customer_number']. 
        '<br>Anzahl Tage: '.$_POST['days'].
        '<br>Frühstück: '.$_POST['breakfast'].' €/Tag
        <br>Halbpension: '.$_POST['halfboard'].' €/Tag
        <br><b>Summe: '.$suite_sum.' €</b></p>';

    } elseif($_POST['rooms_typ'] == "Superior") {
        $superior=$_POST['rooms_typ'];
        if($_POST['breakfast'] == "kein" && $_POST['halfboard'] == "kein") {
            $superior_sum = 40 * $_POST['customer_number'] * $_POST['days'];
        } elseif ($_POST['breakfast'] == 10 && $_POST['halfboard'] == 20) {
            $superior_sum = 40 * $_POST['customer_number'] * $_POST['days'] + ($_POST['breakfast'] * $_POST['days']) + ($_POST['halfboard'] 
            * $_POST['days']); 
        } elseif ($_POST['breakfast'] == 10 && $_POST['halfboard'] == "kein") {
            $superior_sum = (40 * $_POST['customer_number'] * $_POST['days'] + ($_POST['breakfast'] * $_POST['days']));
        } elseif ($_POST['halfboard'] == 20 && $_POST['breakfast'] == "kein") {
            $superior_sum = (40 * $_POST['customer_number'] * $_POST['days']) + ($_POST['halfboard'] * $_POST['days']);
        }

        echo '<p><b>Kosten: </b><br>
        Room-Typ: '.$_POST['rooms_typ'].' (40€/Tag)
        <br>Anzahl Personen: '.$_POST['customer_number']. 
        '<br>Anzahl Tage: '.$_POST['days'].
        '<br>Frühstück: '.$_POST['breakfast'].' €/Tag
        <br>Halbpension: '.$_POST['halfboard'].' €/Tag
        <br><b>Summe: '.$superior_sum.' €</b></p>';
    }
}
?>


<br><br>
<p>
    <h2>Kosten prüfen</h2>
</p>
<form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
<p>Room-Übersicht: 
    <select name="rooms_typ">
        <option value="-1">- Bitte wählen -</option>
        <option value="Standard">Standard</option>
        <option value="Suite">Suite</option>
        <option value="Superior">Superior</option>
    </select>
</p>
<p>Anzahl Personen: 
    <select name="customer_number">
        <option value="-1">- Bitte wählen -</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="4">5</option>
    </select>
</p>

<p>Anzahl Tagen:
    <input type="number" name="days" min="1" max="365">
</p>

<p>Frühstück: 
    <select name="breakfast">
        <option value="-1">- Bitte wählen -</option>
        <option value="10">Ja</option>
        <option value="kein">Nein</option>
    </select>
</p>

<p>Halbpension: 
    <select name="halfboard">
        <option value="-1">- Bitte wählen -</option>
        <option value="20">Ja</option>
        <option value="kein">Nein</option>
    </select>
</p>

<p><input type="submit" name="submit" value="Prüfen"></p>
</form>

<?php get_footer(); ?>

