<?php
session_start();
require_once( '_init.php' );
$database = 'hotel';
require_once( '../maria_dawid_wassili/includes/pdo-connect.inc.php' );

$page_title = 'Hilton - Startseite';
$page_header = 'Willkomen im Hilton-Hotel';

include_once '_header.php';

$sql='SELECT
    `rooms_id`,
    `rooms_typ`,
    `rooms_num_beds`,
    `rooms_img`,
    `rooms_extrabed`,
    `rooms_equipment`,
    `rooms_price_overnight`,
    `rooms_price_breakfast`,
    `rooms_price_halfboard`
    FROM `tbl_rooms`
    ORDER BY `rooms_id`
    DESC';

$stmt=$db->query($sql);

?>

<h2>Bookings-Übersicht</h2>
<ul>
    <?php while($row=$stmt->fetch()): ?>
        <li>
            <a href="post.php?room_id=<?= $row['rooms_id']; ?>">
                <?= $row['rooms_typ']; ?>
            </a>
        </li>
    <?php endwhile ?>
</ul>
<p>
    <a class="btn btn-warning" href="costs_checker.php" target="_blank">Kosten prüfen!</a><br><br>
</p>

<iframe width="560" height="315" src="https://www.youtube.com/embed/9I2xta0ahIs?start=5" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>


<?php get_footer(); ?>