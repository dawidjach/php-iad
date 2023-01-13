<?php
session_start();
require_once( '_init.php' );
$database = 'blog';
require_once( '../includes/pdo-connect.inc.php' );

$page_title = 'Blog - Artikeldetails';
$page_header = '';

// Sicherheit, falls diese Datei ohne Get-Parameter aufgerufen wird
if(empty($_GET)) {
    header('Location: 04-index.php');
}

$post_id=$_GET['post_id'];

$sql='SELECT * 
    FROM `tbl_posts` 
    JOIN `tbl_categories` 
    ON `posts_categ_id_ref`=`categ_id` 
    JOIN `tbl_users`
    ON `posts_users_id_ref`=`users_id`
    WHERE `posts_id`=?';

$stmt=$db->prepare($sql);
$stmt->execute([$post_id]);

// if http://localhost/php/2023-01-04/05-post.php?post_id= größer als Anzahl der Artikeln (hier 4: php, html, css, javascript) :
if($stmt->rowCount() !== 1) {       // falls nicht oder zu viel gefunden, Meldung
    include '_header.php';
    echo '<p class="alert alert-danger">Kein Artikel gefunden!</p>';
    get_footer();
    exit;
}

$post=$stmt->fetch();

// Artikel als header-title:
$post_title=$post['posts_header'];
$page_header = $post_title;

include_once '_header.php';
?>

<article>
    <header>
        <p>
            <!-- Kopfbereich des Artikels mit Erstellungs- und Änderungsdatum, Autor und Kategorie -->
            <?= formatDatetime ($post['posts_created_at']); ?>   <br>
            <?= formatDatetime ($post['posts_updated_at']); ?>   <br>
            <?= $post['users_name']; ?> <br>    <!-- eingeloggter User -->
            <?= $post['categ_name']; ?>
        </p>
    </header>

    <main>
        <figure>
            <img class="figure-img img-fluid" src="<?= $post['posts_img']; ?>" alt="<?= $post['posts_img_alt']; ?>">
        </figure>
        <p>
            <?= nl2br($post['posts_body']); ?>
        </p>
    </main>

    <?php if(is_logged_in()): ?>
        <footer>
            <p>          
                <a href="06-post-edit.php?post_id=<?= $post['posts_id']; ?>" class="btn btn-warning" role="button">Artikel bearbeiten</a>
                <a href="07-post-create.php" class="btn btn-warning" role="button">neuer Artikel</a>
            </p>
        </footer>
    <?php endif; ?>
</article>
