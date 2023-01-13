<?php
session_start();
require_once( '_init.php' );
$database = 'hotel';
require_once( '../maria_dawid_wassili/includes/pdo-connect.inc.php' );

$page_title = 'Hotel - neue Buchung erstellen';
$page_header = 'Buchung erstellen';

$room_price_overnight='SELECT `rooms_price_overnight` FROM `tbl_rooms`';
$room_price_breakfast='SELECT `rooms_price_breakfast` FROM `tbl_rooms`';
$room_price_halfboard='SELECT `rooms_price_halfboard` FROM `tbl_rooms`';
$bkng_id=$_POST['bkngs_id'] ?? '';
$bkng_num_persons=$_POST['bkngs_num_persons'] ?? '';
$bkng_rooms_id_ref=$_POST['bkngs_rooms_id_ref'] ?? '';
$bkng_arr_day=$_POST['bkngs_arr_day'] ?? '';
$bkng_dep_day=$_POST['bkngs_dep_day'] ?? '';
$users_id=$_SESSION['user']['user_id'];
$msg='';

if( !empty( $_POST)){
    $sql = 'INSERT INTO `tbl_bookings`
        (`bkngs_num_persons`,`bkngs_rooms_id_ref`,`bkngs_arr_day`,`bkngs_dep_day`,`bkngs_users_id_ref`)
    VALUES
        (?,?,?,?,?)';
    $stmt=$db->prepare($sql);
    $stmt->execute([$bkng_num_persons,$bkng_rooms_id_ref,$bkng_arr_day,$bkng_dep_day,$users_id]);
    if($stmt) {
        $msg='<p class="alert alert-success">Buchung erfolgreich angelegt.</p>';
    } else {
        $msg='<p class="alert alert-danger">Buchung konnte nicht angelegt werden!</p>';
    }
}

include_once '_header.php';
echo $msg;
include_once '_post-form.php';

get_footer();