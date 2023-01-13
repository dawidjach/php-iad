<?php
    
    session_start();
    require_once('../includes/functions.inc.php');
    $args = array(
        'Sessions',
        NULL,
        false,
        'Sessions - Auswertung, Daten zerstören'
    );
    get_header(...$args);

    /* einzelne Einträge aus Session-Array löschen */
    echo '<pre>', print_r($_SESSION),'</pre>';

    unset($_SESSION['vorname']);    // Vorname ausblenden

    echo '<pre>', print_r($_SESSION, true),'</pre>';

    /* === Session zerstören
    ============================================================================================= */
    
    /* 1. Session-Array leeren */
    $_SESSION = array();
    echo '<p>Die Session mit der ID: ' .session_id(). ' wurde ';

    /* 2. Session zerstören */
    if(session_destroy()) {
        echo '<b>erfolgreich zerstört</b>';
    } else {
        echo '<b>nicht zerstört</b>';
    }
    echo '</p>';


    get_footer();

?>