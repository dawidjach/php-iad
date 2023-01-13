<?php
require_once( '_init.php' );
$database = 'hotel';
require_once( '../maria_dawid_wassili/includes/pdo-connect.inc.php' );

$page_title = 'Hotel - Registrierung';
$page_header = NULL;

include_once '_header.php';

// Prüfe, ob das Formular gesendet wurde
if( !empty($_POST) ) {
    // Variablen definieren
    $users_email = $_POST['users_email'] ?? NULL;
    $users_password = password_hash( $_POST['users_password'], PASSWORD_DEFAULT );
    $users_salutation = $_POST['users_salutation'] ?? NULL;
    $users_forename = $_POST['users_forename'] ?? NULL;
    $users_lastname = $_POST['users_lastname'] ?? NULL;
    $users_street = $_POST['users_street'] ?? NULL;
    $users_city = $_POST['users_city'] ?? NULL;
    $users_tel = $_POST['users_tel'] ?? NULL;
    $users_company = $_POST['users_company'] ?? NULL;
    $users_status = $_POST['users_status'];
    $users_status = 'c';

    // SQL-Anweisung vorbereiten, Platzhalter (?) für Werte werden benutzt
    $sql = 'INSERT INTO `tbl_users`
    (
        `users_email`,
        `users_password`,
        `users_salutation`,
        `users_forename`,
        `users_lastname`,
        `users_street`,
        `users_city`,
        `users_tel`,
        `users_company`,
        `users_status`
    )
    VALUES
    ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);';

    // SQL-Anweisung an den Datenbankserver senden
    $stmt = $db->prepare( $sql );

    // Datenbankserver anweisen die vorbereitete SQL-Anweisung mit den ersetzten Platzhaltern auszuführen
    if( $stmt->execute(array($users_email,$users_password,$users_salutation,$users_forename,$users_lastname,$users_street,$users_city,$users_tel,$users_company,$users_status))) {
        echo '<p class="alert alert-success">Der Benutzer ' .$users_email. ' wurde angelegt!</p>'; 
    } else {
        echo '<p class="alert alert-danger">Benutzer konnte nicht angelegt werden!</p>';
    }

    $stmt = NULL;
}
?>

<p class="lead">Bitte registrieren Sie sich.</p>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <p>
        <input type="email" name="users_email" placeholder="Benutzermail eintragen" required>
        <input type="password" name="users_password" placeholder="Passwort" required>
    </p>

    <p> 
        <select name="users_salutation">
            <option value="-1">- Bitte Anrede wählen -</option>
            <option value=" "></option>
            <option value="Frau">Frau</option>
            <option value="Herr">Herr</option>
        </select>
    </p>
    
    <p>
        <input type="text" name="users_forename" placeholder="Vorname" required>
        <input type="text" name="users_lastname" placeholder="Nachname" required>
    </p>

    <p>
        <input type="text" name="users_street" placeholder="Straße/Hausnummer" required>
        <input type="text" name="users_city" placeholder="PLZ/Ort" required>
    </p>
    
    <p>
        <input type="text" name="users_tel" placeholder="Telefon" required>
    </p>

    <p>
        <input type="text" name="users_company" placeholder="Unternehmen">
    </p>    
    
    <p> 
        <select name="users_status">
            <option value="c">Kunde</option>
        </select>
    </p>

    <p>
        <button type="submit" class="btn btn-warning">Registrieren</button>
    </p>

</form>

<?php get_footer(); ?>