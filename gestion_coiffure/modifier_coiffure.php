<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:../acceuil.php");
}
require '../connextion_db/cnt.php';
$titre = "Modifier coiffure";
$titre_principe="parametre";
$success=null;
if(isset($_POST['nom'])){
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $requete = "UPDATE coiffure SET nom_coiffure=?, prix_coiffure=? WHERE id_coiffure = ?";
    $prepare = $cnx->prepare($requete);
    $execute = $prepare->execute([$nom, $prix, $_GET['id_coiffure']]);
    if($prepare->rowCount()>0){
        $success = true;
    }

}
$requete = "SELECT * FROM coiffure WHERE id_coiffure = ?";
$prepare = $cnx->prepare($requete);
$execute = $prepare->execute([$_GET['id_coiffure']]);
$affichage = $prepare->fetch(PDO::FETCH_ASSOC);
require '../header_footer/header.php';
?>
<div class="container my-5 w-75 mx-auto">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="text-uppercase my-4 text-center">Modifier coiffure</h1>
        <div>
            <a href="gest_coiffure.php" class="btn btn-primary">Liste des coiffures</a>
        </div>
    </div>
    <?php if($success): ?>
        <div class="alert alert-success" role="alert">
            Modification de la coiffure effectuer avec success
        </div>
    <?php endif; ?>

    <form method="post">
        <div>
            <label for="nom" class="form-label fw-semibold">Nom de la coiffure</label>
            <input type="text" name="nom" id="nom" value="<?php echo $affichage['nom_coiffure']?>" class="form-control" required>
        </div>
        <div>
            <label for="prix" class="form-label fw-semibold">Prix</label>
            <input type="text" name="prix" id="prix" value="<?php echo $affichage['prix_coiffure']?>" class="form-control" required>
        </div>
        <input type="submit" value="Modifier" class="btn btn-primary w-100 my-2"><input type="reset" value="Annuler" class="w-100 btn btn-danger">
    </form>
</div>


<?php require '../header_footer/footer.php' ?>

