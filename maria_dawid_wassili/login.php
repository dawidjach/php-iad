<?php
session_start();
require_once( '_init.php' );
$database = 'hotel';
require_once( '../maria_dawid_wassili/includes/pdo-connect.inc.php' );

$page_title = 'Hilton - Login';
$page_header = NULL;
$message = '';

// Prüfe ob Formular gesendet ist
if( !empty( $_POST ) ) {
    // Variablen anlegen
    $users_email    = $_POST['users_email'];
    $users_password = $_POST['users_password'];
    $users_status = 'c';
    $admin_status = 'a';
    
    $sql = 'SELECT
        `users_id`,
        `users_email`,
        `users_password`,
        `users_status`
    FROM
        `tbl_users`
    WHERE
        `users_email` = ?';

$stmt = $db->prepare( $sql );

if( $stmt->execute( array($users_email) ) ) {
    $row = $stmt->fetch();
    
        
        
        // Prüfung auf Übereinstimmung des Passwortes
        if( password_verify( $users_password, $row['users_password']) ) {
            $_SESSION['user'] = array(
                'user_id' => $row['users_id'],
                'user_email' => $row['users_email'],
                $users_status => $row['users_status']
            );
            if ($row['users_status'] != $admin_status) {
                $message = '<p class="alert alert-success">Login als Kunde erfolgreich!</p>';

            } else {
                $message = '<p class="alert alert-success">Login als Admin erfolgreich!</p>';

            }
        } else {
            $message = '<p class="alert alert-danger">Login fehlgeschlagen!</p>';
        } 

    } 
    $stmt = NULL;
}

include_once '_header.php';

if( !empty( $_POST ) ) {
    echo $message;
}
?>

<?php if(!is_logged_in()): ?>
<p class="lead">Bitte geben Sie einen Benutzer E-Mail und ein Passwort ein.</p>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    
    <p>
        <input type="text" name="users_email" placeholder="Benutzermail eintragen">
    </p>

    <p>
        <input type="password" name="users_password" placeholder="Passwort">
    </p>

    <p>
        <button type="submit" class="btn btn-warning">Login</button>
    </p>

</form>
<?php endif; ?>
<?php get_footer(); ?>