<?php
require '../connextion_db/cnt.php';
if(isset($_GET['id_coiffure'])){
    $requete = "DELETE FROM coiffure WHERE id_coiffure = ?";
    $prepare = $cnx->prepare($requete);
    $prepare->execute([$_GET['id_coiffure']]);
    header("location:gest_coiffure.php");
}
