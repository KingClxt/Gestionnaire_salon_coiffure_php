<?php

require '../connextion_db/cnt.php';
if (isset($_GET['login_coiffeur'])) {
    $requete = "DELETE FROM coiffeur WHERE login_coiffeur = ?";
    $prepare = $cnx->prepare($requete);
    $prepare->execute([$_GET['login_coiffeur']]);
    header("location:gest_coiffeur.php");
}
