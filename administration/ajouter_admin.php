<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:../acceuil.php");
}
require '../connextion_db/cnt.php';
$titre = "Ajouter administrateur";
$titre_principe="parametre";
$success=null;
if(isset($_POST['login'])){

    $login = $_POST['login'];
    $nom = $_POST['nom'];
    $mot_pass = md5($_POST['mdp2']);
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['tel'];
    $datenaiss = $_POST['datenaiss'];
    $requete = "INSERT INTO administrateur (login_admin, mot_pass_admin, nom_admin, prenom_admin, email_admin, telephone_admin, datenaiss_admin) VALUES (?,?,?,?,?,?,?)";
    $prepare = $cnx->prepare($requete);
    $execute = $prepare->execute([$login, $mot_pass, $nom, $prenom, $email, $telephone, $datenaiss]);
    if($prepare->rowCount()>0){
        $success = true;
    }

}


require '../header_footer/header.php';
?>
<div class="container my-3 w-75 mx-auto">
    <div class="d-flex  my-4 align-items-center justify-content-between">
        <h1 class="">AJOUTER ADMINISTRATEUR</h1>
        <a href="gest_admin.php" class="btn d-flex justify-content-between align-items-center btn-primary">Liste Administrateur </a>
    </div>
    <?php if($success): ?>
        <div class="alert alert-success" role="alert">
            Ajout de l'administrateur effectuer avec success
        </div>
    <?php endif; ?>

    <form method="post" class="">
        <div class="row">
            <div class="col-12 col-lg-6">
                <label for="login" class="form-label fw-semibold">Login</label>
                <input type="text" name="login" id="login" class="form-control" required>
            </div>
            <div class="col-12 col-lg-6">
                <label for="nom" class="form-label fw-semibold">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <label for="prenom" class="form-label fw-semibold">Prenom</label>
                <input type="text" name="prenom" id="prenom" class="form-control" required>
            </div>
            <div class="col-12 col-lg-6">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <label for="tel" class="form-label fw-semibold">Téléphone</label>
                <input type="tel" name="tel" id="tel" class="form-control" required>
            </div>
            <div class="col-12 col-lg-6">
                <label for="datenaiss" class="form-label fw-semibold">Date de naissance</label>
                <input type="date" name="datenaiss" id="datenaiss" class="form-control" required>
            </div>
        </div>
        <div>
            <label for="motpasse1" class="form-label fw-semibold">Mot de passe</label>
            <input type="password" name="mdp1" id="motpasse1" class="form-control" required>
        </div>
        <div>
            <label for="motpasse2" class="form-label fw-semibold">Confirmer le mot de passe</label>
            <input type="password" name="mdp2" id="motpasse2" class="form-control" required>
        </div>
        <p id="info"></p>
        <input type="submit" value="Ajouter" disabled class="btn btn-primary w-100 my-2 btn-validation"><input type="reset" value="Annuler" class="w-100 btn btn-danger">
    </form>
</div>

<script src="../js/jquery-3.7.1.min.js"></script>
<script src="../js/confirme_mdp.js"></script>
<?php require '../header_footer/footer.php' ?>

