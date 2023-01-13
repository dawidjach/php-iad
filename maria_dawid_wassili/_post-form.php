<a class="btn btn-warning btn-sm" href="costs_checker.php" target="_blank">Kosten prüfen!</a><br><br>

<!-- Formular zur Erstellung als auch Bearbeitung eines Blog-Artikels -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="mb-3">

        <!-- Ausgabe der Blog-Kategorien -->
        <select name="bkngs_rooms_id_ref" id="" class="form-select" required>
            <optgroup label="Booking-Übersicht">             
                <?php 
                    $sql='SELECT * FROM `tbl_rooms`;';
                    $stmt=$db->query($sql);
                    while($row=$stmt->fetch()):
                        $selected = '';
                        if($row['rooms_id']===$bkng_rooms_id_ref)$selected='selected';
                    ?>
                    <option <?= $selected; ?>value="<?= $row['rooms_id']; ?>"><?= $row['rooms_typ']; ?>
                    </option>
                    <?php endwhile; ?>
            </optgroup>
        </select>
    </div>

    <div class="mb-3">
        <label for="bkngs_num_persons" class="form-label">Anzahl Personen</label>
        <input type="number" name="bkngs_num_persons" id="bkngs_num_persons" class="form-control" value="<?= htmlspecialchars($bkng_num_persons); ?>" max="5" required>
    </div>
    
    <div class="mb-3">
        <label for="bkngs_arr_day" class="form-label">Anreise</label>
        <input type="date" name="bkngs_arr_day" id="bkngs_arr_day" class="form-control" value="<?= htmlspecialchars($bkng_arr_day); ?>" max="5" required>
    </div>

    <div class="mb-3">
        <label for="bkngs_dep_day" class="form-label">Abreise</label>
        <input type="date" name="bkngs_dep_day" id="bkngs_dep_day" class="form-control" value="<?= htmlspecialchars($bkng_dep_day); ?>" max="5" required>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="rooms_price_breakfast" value="<?= htmlspecialchars($room_price_breakfast); ?>">
        <label for="rooms_price_breakfast" class="form-check-label">
            Frühstück
        </label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="rooms_price_halfboard" value="<?= htmlspecialchars($room_price_halfboard); ?>">
        <label for="rooms_price_halfboard" class="form-check-label">
            Halbpension
        </label>
    </div>
<br><br>
    <!-- Falls vorhanden, Artikel-ID versteckt übermitteln (notwendig bei Bearbeitung) -->
    <input type="hidden" name="bkngs_id" value="<?= $bkng_id; ?>">



    <!-- Abbruch einer Bearbeitung führt zum Artikel, Abbruch einer Neuerstellung zur Startseite -->
    <a href="<?= isset($bkngs_id) ? 'post.php?post_id=' . $bkngs_id : 'index.php'; ?>" class="btn btn-outline-danger">Abbrechen</a>
    <button type="submit" class="btn btn-warning" onClick="clearform();">Veröffentlichen</button>

</form>

<?php 
    $room_price_overnight='SELECT `rooms_price_overnight` FROM `tbl_rooms`';
    $room_price_breakfast='SELECT `rooms_price_breakfast` FROM `tbl_rooms`';
    $room_price_halfboard='SELECT `rooms_price_halfboard` FROM `tbl_rooms`';

    $bkng_id=$_POST['bkngs_id'] ?? '';
    $bkng_num_persons=$_POST['bkngs_num_persons'] ?? '';
    $bkng_rooms_id_ref=$_POST['bkngs_rooms_id_ref'] ?? '';
    $bkng_arr_day=$_POST['bkngs_arr_day'] ?? '';
    $bkng_dep_day=$_POST['bkngs_dep_day'] ?? '';
    $users_id=$_SESSION['user']['user_id'];


    if(isset($_POST['costs'])) {
        echo $_POST["<?= htmlspecialchars($bkng_num_persons); ?>"];
    }

?>