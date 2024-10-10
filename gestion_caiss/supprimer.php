<?php

require '../connextion_db/cnt.php';
if (isset($_GET['login_caissière'])) {
    $requete = "DELETE FROM caissière WHERE login_caissière = ?";
    $prepare = $cnx->prepare($requete);
    $prepare->execute([$_GET['login_caissière']]);
    header("location:gest_caiss.php");
}
