<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:../acceuil.php");
}
require '../connextion_db/cnt.php';
$success = null;
$titre = "Modifier ma disponibilité";
$titre_principe="enregistrement";
if(isset($_POST['coiffeur'])){
    $coiffeur = $_POST['coiffeur'];
    $coiffure = $_POST['coiffure'];
    if($coiffure !== '#'){
            $requete = "UPDATE coiffeur_disponibilité SET id_dispo=?, login_coiffeur=? WHERE id_dispo = ? AND login_coiffeur = ?";
            $prepare = $cnx->prepare($requete);
            $execute = $prepare->execute([$coiffure, $coiffeur, $_GET['id_dispo'], $_GET['login_coiffeur']]);
            header('location: modifier_coiffeur_dispo.php?login_coiffeur='.$coiffeur.'&id_dispo='.$coiffure);

    }
}

$requete = "SELECT * FROM coiffeur";
$prepare = $cnx->prepare($requete);
$execute = $prepare->execute();
$coiffeurs = $prepare->fetch(PDO::FETCH_ASSOC);

$requete2 = "SELECT * FROM disponibilité";
$prepare2 = $cnx->prepare($requete2);
$execute2 = $prepare2->execute();
$coiffures = $prepare2->fetchAll(PDO::FETCH_ASSOC);

$requete_recupe = "SELECT * FROM coiffeur_disponibilité WHERE login_coiffeur = ? AND id_dispo = ?";
$prepare_recupe = $cnx->prepare($requete_recupe);
$execute_recupe = $prepare_recupe->execute([$_GET['login_coiffeur'], $_GET['id_dispo']]);
$coiffeur_dispo = $prepare_recupe->fetch(PDO::FETCH_ASSOC);
require '../header_footer/header.php';
?>

<div class="container mx-auto w-75" style="margin-top: 10%">
    <div class="d-flex my-4 align-items-center justify-content-between">
        <h1 class="">Modifier la disponibilité</h1>
        <a href="gest_coiffeur_dispo.php" class="btn btn-primary">Liste disponibilité</a>
    </div>
    <form method="post">
    <?php if($success): ?>
        <div class="alert alert-success">
            Modification de la disponibilité effectuer avec success
        </div>
    <?php endif ?>
        <div>
            <label for="" class="form-label fw-bold">Coiffeur:</label>
            <select name="coiffeur" id="coiffeur" class="form-select">
                <?php do{ ?>

                    <?php
                        $select = '';
                        if($coiffeur_dispo['login_coiffeur'] == $coiffeurs['login_coiffeur']){
                            $select = 'selected';
                        }
                        echo "<option value='{$coiffeurs['login_coiffeur']}' $select>{$coiffeurs['login_coiffeur']}</option>" ;
                    ?>
                <?php }while($coiffeurs = $prepare->fetch(PDO::FETCH_ASSOC)) ?>
            </select>
        </div>
        <div>
            <label for="" class="form-label fw-bold">Disponibilité:</label>
            <div class="cont-select">
                <select name="coiffure" class="coiffures form-select my-2">
                    <?php foreach ($coiffures as $coiffure): ?>
                        <?php
                            $select = '';
                            if($coiffeur_dispo['id_dispo'] == $coiffure['id_dispo']){
                                $select = 'selected';
                            }
                            echo "<option value='{$coiffure['id_dispo']}' $select>{$coiffure['jour']}-{$coiffure['heure']}</option>"
                        ?>
                    <?php endforeach;  ?>
                </select>
            </div>
            <input type="submit" value="Ajouter une nouvelle disponibilité" class="btn btn-primary">
            <input type="reset" value="Annuler" class="btn btn-danger">
        </div>
    </form>
</div>

<?php require '../header_footer/footer.php'; ?>


