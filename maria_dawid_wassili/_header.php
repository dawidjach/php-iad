<?php
/* get_header(
*	string $title,
*	string/array $css=NULL,
*	bool $bootstrap=false,
*	string $header=NULL,
*	array $nav=NULL,
*	bool $fluid=false
* )
*/
/* isset($_SESSION['user'])  */

/* Registrieren-Option nur nach Ausloggen möglich */
if(is_logged_in()) {
    $nav = array(
        'Home' => 'index.php',
        'Logout' => 'logout.php'
    );
} else {
    $nav = array(
        'Home' => 'index.php',
        'Registrieren' => 'register.php',
        'Login' => 'login.php'
    );
}
$args = array(
    $page_title,
    NULL,
    true,
    $page_header,
    array(
        'Das Beste Hotel',
        $nav
    )
);

get_header( ...$args );