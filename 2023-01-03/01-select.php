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
    'SELECT mit PDO',
    NULL,
    true
);
get_header( ...$args );
require_once( '../includes/pdo-connect.inc.php' );

$sql = "SELECT `gerte_name`, `gerte_beschreibung` FROM `tbl_gerichte`;";
    //SQL-Anweisung an den Server senden
    //Erzeugt ein PDO-Statement

    $stmt = $db->query( $sql);


    //Ergebnismenge als Array ausgeben

    foreach( $stmt->fetchALL() as $gerichte) {
        echo$gerichte['gerte_name'] . '<br>' . $gerichte['gerte_beschreibung'] . '<br>';
    }
?>
    
<?php get_footer(); ?>

