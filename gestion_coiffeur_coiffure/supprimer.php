<?php
require '../connextion_db/cnt.php';
if(isset($_GET['id_coiffure'], $_GET['login_coiffeur'])){
    $requete = "DELETE FROM commande_coiffure WHERE id_coiffure = ? AND login_coiffeur = ?";
    $prepare = $cnx->prepare($requete);
    $prepare->execute([$_GET['id_coiffure'],$_GET['login_coiffeur']]);
    header("location:gest_coiffeur_coiffure.php");
}
