<?php
require_once( '../../includes/functions.inc.php' );
$database = 'hardware';
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
    'Eingabe von Datensätzen',
    '../../css/styles.css',
    true
);
get_header( ...$args );
require_once( '../../includes/pdo-connect.inc.php' );

if( !empty($_POST) ) {
    $hersteller = $_POST['hersteller'];
    $typ = $_POST['typ'];
    $gb = $_POST['gb'];
    $preis = $_POST['preis'];
    $artnummer = $_POST['artnummer'];
    $prod = $_POST['prod'];

    /* Prepared Statements:
    Anstelle der Werte für die DB-Felder werden benannte Platzhalter in der Form ":nameDesParameters" eingesetzt */
    $sql = 'INSERT INTO `fp`
    (
        `hersteller`,
        `typ`,
        `gb`,
        `preis`,
        `artnummer`,
        `prod`
    )
    VALUES
    (
        :hersteller,
        :typ,
        :gb,
        :preis,
        :artnummer,
        :prod
    );';

    

    if( $stmt = $db->prepare( $sql ) ) {

        // Vorbereitete Variablen werden an die benannten Platzhalter gebunden und ein Datentyp wird festgelegt
        $stmt->bindParam( 'hersteller', $hersteller, PDO::PARAM_STR );
        $stmt->bindParam( 'typ', $typ, PDO::PARAM_STR );
        $stmt->bindParam( 'gb', $gb, PDO::PARAM_INT );
        $stmt->bindParam( 'preis', $preis, PDO::PARAM_STR );
        $stmt->bindParam( 'artnummer', $artnummer, PDO::PARAM_STR );
        $stmt->bindParam( 'prod', $prod, PDO::PARAM_STR );

        // Die Abfrage wird mit den ersetzten Platzhaltern ausgeführt
        $stmt->execute();

        echo '<p class="alert alert-success">';
        echo $stmt->rowCount();
        echo ' Datensatz wurde hinzugefügt.</p>';
    }
}

?>

<p>Geben Sie bitte einen Datensatz ein und senden Sie das Formlar ab:</p>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <p><input type="text" name="hersteller">&nbsp;Hersteller</p>
    <p><input type="text" name="typ">&nbsp;Typ</p>
    <p><input type="text" name="gb">&nbsp;GB</p>
    <p><input type="text" name="preis">&nbsp;Preis</p>
    <p><input type="text" name="artnummer">&nbsp;Artikelnummer</p>
    <p><input type="date" name="prod">&nbsp;Datum der ersten Produktion</p>
    <p><input type="submit" value="Senden">&nbsp;<input type="reset" value="Zurücksetzen"></p>
</form>

<p><a href="u_db_eingabe.php?suche=">Alle anzeigen</a></p>

<?php get_footer(); ?>