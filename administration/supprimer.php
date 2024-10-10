<?php

require '../connextion_db/cnt.php';
if (isset($_GET['login_admin'])) {
    $requete = "DELETE FROM administrateur WHERE login_admin = ?";
    $prepare = $cnx->prepare($requete);
    $prepare->execute([$_GET['login_admin']]);
    header("location:gest_admin.php");
}
