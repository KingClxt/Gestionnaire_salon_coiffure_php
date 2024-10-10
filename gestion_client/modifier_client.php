<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:../acceuil.php");
}
require '../connextion_db/cnt.php';
$titre = "Modifier client";
$titre_principe="enregistrement";
$success=null;
if(isset($_POST['login'])){
    $login = $_POST['login'];
    $nom = $_POST['nom'];
    $mot_pass = $_POST['mdp1'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['tel'];
    $datenaiss = $_POST['datenaiss'];
    $requete = "UPDATE client SET login_client=?, mot_pass_client=?, nom_client=?, prenom_client=?, email_client=?, telephone_client=?, datenaiss_client=? WHERE login_client = ?";
    $prepare = $cnx->prepare($requete);
    $execute = $prepare->execute([$login, $mot_pass, $nom, $prenom, $email, $telephone, $datenaiss, $_GET['login_client']]);
    if($prepare->rowCount()>0){
        $success = true;
    }

}
    $requete = "SELECT * FROM client WHERE login_client = ?";
    $prepare = $cnx->prepare($requete);
    $execute = $prepare->execute([$_GET['login_client']]);
    $affichage = $prepare->fetch(PDO::FETCH_ASSOC);


require '../header_footer/header.php';
?>
<div class="container my-3">
    <h1 class="text-uppercase my-4 text-center">Ajouter Client</h1>
    <?php if($success): ?>
        <div class="alert alert-success w-75 mx-auto" role="alert">
            Modification du client effectuer avec success
        </div>
    <?php endif; ?>

    <form method="post" class="w-75 mx-auto">
        <div class="row">
            <div class="col-12 col-lg-6">
                <label for="login" class="form-label fw-semibold">Login</label>
                <input type="text" name="login" id="login" class="form-control" value="<?php echo $affichage['login_client'] ?>" required>
            </div>
            <div class="col-12 col-lg-6">
                <label for="nom" class="form-label fw-semibold">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $affichage['nom_client'] ?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <label for="prenom" class="form-label fw-semibold">Prenom</label>
                <input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo $affichage['prenom_client'] ?>" required>
            </div>
            <div class="col-12 col-lg-6">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo $affichage['email_client'] ?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <label for="tel" class="form-label fw-semibold">Téléphone</label>
                <input type="tel" name="tel" id="tel" class="form-control" value="<?php echo $affichage['telephone_client'] ?>" required>
            </div>
            <div class="col-12 col-lg-6">
                <label for="datenaiss" class="form-label fw-semibold">Date de naissance</label>
                <input type="date" name="datenaiss" id="datenaiss" class="form-control" value="<?php echo $affichage['datenaiss_client'] ?>" required>
            </div>
        </div>
        <div>
            <label for="mdp1" class="form-label fw-semibold">Ancien mot de passe</label>
            <input type="password" id="mdp" class="form-control" value="<?php echo $affichage['mot_pass_client'] ?>" required>
        </div>
        <div>
            <label for="mdp1" class="form-label fw-semibold">Nouveau mot de passe</label>
            <input type="password" name="mdp1" id="mdp" class="form-control" " required>
        </div>

            <input type="submit" value="Modifier" class="btn btn-primary w-100 my-2"><input type="reset" value="Annuler" class="w-100 btn btn-danger">
    </form>
</div>


<?php require '../header_footer/footer.php' ?>

