<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:../acceuil.php");
}
require '../connextion_db/cnt.php';
$titre = "Ajouter coiffure";
$titre_principe="parametre";
$success=null;
if(isset($_POST['nom'])){
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $requete = "INSERT INTO coiffure (nom_coiffure, prix_coiffure) VALUES (?,?)";
    $prepare = $cnx->prepare($requete);
    $execute = $prepare->execute([$nom, $prix]);
    if($prepare->rowCount()>0){
        $success = true;
    }

}
require '../header_footer/header.php';
?>
<div class="container my-3 w-75 mx-auto">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="text-uppercase my-4 text-center">Ajouter coiffure</h1>
        <div>
            <a href="gest_coiffure.php" class="btn btn-primary">Liste des coiffures</a>
        </div>
    </div>
    <?php if($success): ?>
        <div class="alert alert-success" role="alert">
            Ajout de la coiffure effectuer avec success
        </div>
    <?php endif; ?>

    <form method="post">
        <label for="nom" class="form-label fw-semibold">Nom de la coiffure</label>
        <input type="text" name="nom" id="nom" class="form-control" required>
        <label for="prix" class="form-label fw-semibold">Prix</label>
        <input type="text" name="prix" id="prix" class="form-control" required>
        <input type="submit" value="Ajouter" class="btn btn-primary w-100 my-2"><input type="reset" value="Annuler" class="w-100 btn btn-danger">
    </form>
</div>


<?php require '../header_footer/footer.php' ?>

