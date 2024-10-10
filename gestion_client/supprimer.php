<?php
require '../connextion_db/cnt.php';
if(isset($_GET['login_client'])){
    $requete = "DELETE FROM client WHERE login_client = ?";
    $prepare = $cnx->prepare($requete);
    $prepare->execute([$_GET['login_client']]);
    header("location:gest_client.php");
}
