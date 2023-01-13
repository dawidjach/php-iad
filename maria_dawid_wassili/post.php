<?php
session_start();
require_once( '_init.php' );
$database = 'hotel';
require_once( '../maria_dawid_wassili/includes/pdo-connect.inc.php' );

$page_title = 'Hilton - Roomsdetails';
$page_header = '';

if(empty($_GET)) {
    header('Location: index.php');
}

$post_id=$_GET['room_id'];

$sql='SELECT * 
    FROM `tbl_rooms` 
    JOIN `tbl_bookings` 
    ON `bkngs_rooms_id_ref`=`bkngs_id` 
    JOIN `tbl_users`
    ON `bkngs_users_id_ref`=`users_id`
    WHERE `rooms_id`=?';

$stmt=$db->prepare($sql);
$stmt->execute([$post_id]);

if($stmt->rowCount() !== 1) {
    include '_header.php';
    echo '<p class="alert alert-danger">Error!</p>';
    get_footer();
    exit;
}

$post=$stmt->fetch();

$post_title=$post['rooms_typ'];
$page_header = $post_title;

include_once '_header.php';
?>

<article>
    <header>
        <p>
            <?= '<b>Preis pro Übernachtung: </b>' .number_format ($post['rooms_price_overnight']).' €'; ?>   <br>
            <?= '<b>Preis Frühstück: </b>' .number_format ($post['rooms_price_breakfast']).' €'; ?>   <br>
            <?= '<b>Preis Halbpension: </b>' .number_format ($post['rooms_price_halfboard']).' €'; ?>   <br>
        </p>
    </header>
    
    <main>
        <figure>
            <img class="figure-img img-fluid" src="<?= $post['rooms_img']; ?>">
        </figure>
        
        <p>
            <?= '<b>Anzahl Betten:</b><br>'.nl2br($post['rooms_num_beds']); ?>
        </p>   
        
        <p>
            <?= '<b>Anzahl Extra-Bett:</b><br>'.nl2br($post['rooms_extrabed']); ?>
        </p>
        
        <p>
            <?= '<b>Zimmeraustattung:</b><br>'.nl2br($post['rooms_equipment']); ?>
        </p>
    </main>
    
    <footer>
        <p>          
            <a class="btn btn-warning" href="costs_checker.php" target="_blank">Kosten prüfen!</a>
            <?php if(is_logged_in()): ?>
                <?= '<i><p style="color:green">Eingellogt als '.$post['users_email']; ?> </p></i>
                <a href="booking.php?post_id=<?= $post['rooms_id']; ?>" class="btn btn-warning" role="button">Buchen</a><br><br>
            </p>
    </footer>
    
    <?php endif; ?>
</article>

<article>
    <?php if(!is_logged_in()): ?>
        <header>
            <p class="alert alert-danger">Um ein Room zu buchen, müssen Sie eingellogt werden.</p>
            <p>
                <a href="register.php" class="btn btn-warning" role="button">Registrieren</a>
                <a href="login.php" class="btn btn-warning" role="button">Login</a><br><br>
            </p>
        </header>
    <?php endif ?>
</article>

<?php get_footer_no_fixed_bottom(); ?>