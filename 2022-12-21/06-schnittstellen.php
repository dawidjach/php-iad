<?php 
    interface iFahrbar {
        function rollen();
        function reifenwechsel();
    }

    interface iSchwimmfaehig {
        function anlegen();
        function kentern();
    }

    class AmphiCar implements iFahrbar, iSchwimmfaehig {
        /* Methoden, die aufgrund iFahrbar implementiert werden müssen */
        function rollen() {echo 'Es rollt<br>';}
        function reifenwechsel() {echo 'Es werden Reifen gewechselt<br>';}

        /* Methoden, die aufgrund iSchwimmfaehig implementiert werden müssen */
        function anlegen() {echo 'Es legt an<br>';}
        function kentern() {echo 'Es kentert<br>';}

        /* eigene Methode */
        function bewegen() {echo 'Es bewegt sich (doch)<br>';}
    }

    $VwTyp166 = new AmphiCar();
    $VwTyp166 -> rollen();
    $VwTyp166 -> reifenwechsel();
    $VwTyp166 -> anlegen();
    $VwTyp166 -> kentern();
    $VwTyp166 -> bewegen();


?>