<?php
session_start();
require_once( '_init.php' );
$database = 'blog';
require_once( '../includes/pdo-connect.inc.php' );

$page_title = 'Blog - Logout';
$page_header = NULL;

// Session leeren
$_SESSION = array();
// Session zerstören
if( session_destroy() ) {
    $message = '<p class="alert alert-success">Sie wurden erfolgreich ausgeloggt.</p>';
} else {
    $message = '<p class="alert alert-danger">Ausloggen hat nicht funktioniert... Viel Glück!</p>';
}

include_once '_header.php';

echo $message;

?>

<a href="../2023-01-04" class="btn btn-primary" role="button">Menu</a>
<a href="../2023-01-04/04-index.php" class="btn btn-primary" role="button">Index</a>

<?php get_footer(); ?>