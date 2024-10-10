<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:../acceuil.php");
}
$titre = 'Ajouter disponibilité';
$titre_principe="parametre";
require '../connextion_db/cnt.php';
$success = null;
$erreur = null;
if(isset($_POST['jour'])){
    $jour = $_POST['jour'];
    $heure = $_POST['heure'];
    $prepare_existence_ligne = $cnx->prepare("SELECT * FROM disponibilité WHERE jour = ? AND heure = ?");
    $execute_existence_ligne = $prepare_existence_ligne->execute([$jour, $heure]);
    $nb_ligne = $prepare_existence_ligne->rowCount();
    //SI LE NOMBRE DE LIGNE AFFECTER EST 0 ON FAIT L'INSERTION
    if($nb_ligne == 0){
        $requete = "INSERT INTO disponibilité (jour, heure) VALUES (?, ?) ";
        $prepare = $cnx->prepare($requete);
        $execute = $prepare->execute([$jour,$heure]);
        $success = true;
    }
    else{
        $erreur = true;
    }
}
require '../header_footer/header.php';
?>

<div class="container w-75 mx-auto">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="text-uppercase my-4 text-center">Ajouter une Disponibilité</h1>
        <a href="gest_dispo.php" class="btn btn-primary">Liste dispo</a>
    </div>
    <?php if($success): ?>
        <div class="alert alert-success" role="alert">
            Ajout de la disponibilité effectuer avec success
        </div>
    <?php endif; ?>
<?php if($erreur): ?>
        <div class="alert alert-danger" role="alert">
            Disponibilité déjà existante
        </div>
    <?php endif; ?>

    <form method="POST">
        <div class="my-3">
            <label for="" class="form-label fw-bold">Jour:</label>
            <select name="jour" id="" class="form-select">
                <option value="Lundi">Lundi</option>
                <option value="Mardi">Mardi</option>
                <option value="Mercredi">Mercredi</option>
                <option value="Jeudi">Jeudi</option>
                <option value="Vendredi">Vendredi</option>
                <option value="Samedi">Samedi</option>
            </select>
        </div>
        <div>
            <label for="" class="form-label fw-bold">Heure:</label>
            <select name="heure" id="" class="form-select">
                <option value="08h">08H</option>
                <option value="09h">09H</option>
                <option value="10h">10H</option>
                <option value="11h">11H</option>
                <option value="14h">14H</option>
                <option value="15h">15h</option>
                <option value="16h">16h</option>
                <option value="17h">17h</option>
                <option value="18h">18h</option>
            </select>
        </div>
        <button class="w-100 btn btn-primary my-2">Ajouter</button>

    </form>




</div>

<?php require '../header_footer/footer.php'; ?>

