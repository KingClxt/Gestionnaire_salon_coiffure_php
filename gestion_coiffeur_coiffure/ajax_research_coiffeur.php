<?php
require '../connextion_db/cnt.php';
if(!empty($_GET['nom_coiffeur'])){
    $requete = "SELECT * FROM coiffeur WHERE login_coiffeur = ?";
    $prepare = $cnx->prepare($requete);
    $execute = $prepare->execute([$_GET['nom_coiffeur']]);
    $resultat = $prepare->fetch(PDO::FETCH_ASSOC);
    if($prepare->rowCount()>0){
        $response = [
            'status'=>true,
            'data'=>$resultat
        ];
    }
    else{
        $response = [
            'status'=>false,
            'data'=>"Pas de coiffeur trouver"
        ];
    }
    echo json_encode($response);
}
