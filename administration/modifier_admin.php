<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:../acceuil.php");
}
require '../connextion_db/cnt.php';
$titre = "Modifier administrateur";
$titre_principe="parametre";
$success=null;
if(isset($_POST['login'])){
    $login = $_POST['login'];
    $nom = $_POST['nom'];
    $mot_pass = $_POST['mdp1'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['tel'];
    $datenaiss = $_POST['datenaiss'];
    $requete = "UPDATE administrateur SET login_admin=?, mot_pass_admin=?, nom_admin=?, prenom_admin=?, email_admin=?, telephone_admin=?, datenaiss_admin=? WHERE login_admin = ?";
    $prepare = $cnx->prepare($requete);
    $execute = $prepare->execute([$login, $mot_pass, $nom, $prenom, $email, $telephone, $datenaiss, $_GET['login_admin']]);
    if($prepare->rowCount()>0){
        $success = true;
    }

}
$requete = "SELECT * FROM administrateur WHERE login_admin = ?";
$prepare = $cnx->prepare($requete);
$execute = $prepare->execute([$_GET['login_admin']]);
$affichage = $prepare->fetch(PDO::FETCH_ASSOC);


require '../header_footer/header.php';
?>
<div class="container my-3 w-75 mx-auto my-3">
    <div class="d-flex  my-4 align-items-center justify-content-between">
        <h1 class="">MODIFIER ADMINISTRATEUR</h1>
        <a href="gest_admin.php" class="btn d-flex justify-content-between align-items-center btn-primary">Liste Administrateur </a>
    </div>
    <?php if($success): ?>
        <div class="alert alert-success w-75 mx-auto" role="alert">
            Modification du coiffeur effectuer avec success
        </div>
    <?php endif; ?>

    <form method="post">
        <div class="row">
            <div class="col-12 col-lg-6">
                <label for="login" class="form-label fw-semibold">Login</label>
                <input type="text" name="login" id="login" class="form-control" value="<?php echo $affichage['login_admin'] ?>" required>
            </div>
            <div class="col-12 col-lg-6">
                <label for="nom" class="form-label fw-semibold">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $affichage['nom_admin'] ?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <label for="prenom" class="form-label fw-semibold">Prenom</label>
                <input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo $affichage['prenom_admin'] ?>" required>
            </div>
            <div class="col-12 col-lg-6">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo $affichage['email_admin'] ?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <label for="tel" class="form-label fw-semibold">Téléphone</label>
                <input type="tel" name="tel" id="tel" class="form-control" value="<?php echo $affichage['telephone_admin'] ?>" required>
            </div>
            <div class="col-12 col-lg-6">
                <label for="datenaiss" class="form-label fw-semibold">Date de naissance</label>
                <input type="date" name="datenaiss" id="datenaiss" class="form-control" value="<?php echo $affichage['datenaiss_admin'] ?>" required>
            </div>
        </div>
        <div>
            <label for="mdp1" class="form-label fw-semibold">Ancien mot de passe</label>
            <input type="password" id="mdp" class="form-control" value="<?php echo $affichage['mot_pass_admin'] ?>" required>
        </div>
        <div>
            <label for="mdp1" class="form-label fw-semibold">Nouveau mot de passe</label>
            <input type="password" name="mdp1" id="mdp" class="form-control" " required>
        </div>

        <input type="submit" value="Ajouter" class="btn btn-primary w-100 my-2"><input type="reset" value="Annuler" class="w-100 btn btn-danger">
    </form>
</div>


<?php require '../header_footer/footer.php' ?>

