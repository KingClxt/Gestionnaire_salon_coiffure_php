<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:../acceuil.php");
}
require '../connextion_db/cnt.php';
$titre = "Gestion disponibilité";
$titre_principe="parametre";
$requete = "SELECT * FROM disponibilité ORDER BY heure ASC";
$prepare = $cnx->prepare($requete);
$execute = $prepare->execute();
$dispos = $prepare->fetchAll(PDO::FETCH_ASSOC);
$comptage = 1;
$lundi = [];$mardi = [];$mercredi = [];$jeudi = [];$vendredi = [];$samedi = [];
foreach ($dispos as $dispo){
    if($dispo['jour'] == 'Lundi'){
        array_push($lundi, $dispo);
    }
    elseif($dispo['jour'] == 'Mardi'){
        array_push($mardi, $dispo);
    }
    elseif($dispo['jour'] == 'Mercredi'){
        array_push($mercredi, $dispo);
    }
    elseif($dispo['jour'] == 'Jeudi'){
        array_push($jeudi, $dispo);
    }
    elseif($dispo['jour'] == 'Vendredi'){
        array_push($vendredi, $dispo);
    }
    elseif($dispo['jour'] == 'Samedi'){
        array_push($samedi, $dispo);
    }
}
    $jours = [
            ["Lundi",$lundi],
            ['Mardi',$mardi],
            ["Mercredi",$mercredi],
            ["Jeudi",$jeudi],
            ["Vendredi",$vendredi],
            ["Samedi",$samedi]
    ];
require '../header_footer/header.php';
?>
<div class="container">
    <div class="d-flex my-4 align-items-center justify-content-between">
        <h1 class="">DISPONIBILITE</h1>
        <a href="ajouter_dispo.php" class="btn btn-primary">Ajouter disponibilité</a>
    </div>
    <table class="table my-4">
        <tr class="table-dark">
            <th>Jour</th>
            <th >Heure</th>
        </tr>
        <?php foreach ($jours as $jour): ?>
            <tr>
                <td class="fw-bold text-uppercase"><?php echo $jour[0] ?></td>
                <td>

                    <table class="table table-bordered">
                        <?php if(count($jour[1])>0): ?>
                            <?php foreach ($jour[1] as $heure): ?>
                            <tr>
                                <td class="table-dark d-flex justify-content-between align-items-center">
                                    <?php echo $heure['heure']; ?>
                                    <a  href="supprimer.php?id_dispo=<?php echo $heure['id_dispo'] ?>" ><img class="w-50 d-block mx-auto" src="../img/supprimer.png" alt=""></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                                pas d'heure renseigner
                            <?php endif; ?>
                    </table>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>


<?php require '../header_footer/footer.php' ?>

