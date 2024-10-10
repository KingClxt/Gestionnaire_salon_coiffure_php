<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:../acceuil.php");
}
require '../connextion_db/cnt.php';
$titre = "Ajouter client";
$titre_principe="enregistrement";
$success=null;
$erreur = null;
if(isset($_POST['login'])){

    $login = $_POST['login'];
    $nom = $_POST['nom'];
    $mot_pass = md5($_POST['mdp2']);
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['tel'];
    $datenaiss = $_POST['datenaiss'];
    $requete_verif = "SELECT * FROM client WHERE login_client = ?";
    $prepare_verif = $cnx->prepare($requete_verif);
    $execute_verif = $prepare_verif->execute([$login]);
    $nb = $prepare_verif->rowCount();
    if($nb==0){
        $requete = "INSERT INTO client (login_client, mot_pass_client, nom_client, prenom_client, email_client, telephone_client, datenaiss_client) VALUES (?,?,?,?,?,?,?)";
        $prepare = $cnx->prepare($requete);
        $execute = $prepare->execute([$login, $mot_pass, $nom, $prenom, $email, $telephone, $datenaiss]);
        $success = true;
    }
    else{
        $erreur = true;
    }

}


require '../header_footer/header.php';
?>
<div class="container my-3 w-75 mx-auto">
    <h1 class="text-uppercase my-4 text-center">Ajouter Client</h1>
    <?php if($success): ?>
        <div class="alert alert-success" role="alert">
            Ajout du client effectuer avec success
        </div>
    <?php endif; ?>
<?php if($success): ?>
        <div class="alert alert-danger" role="alert">
            Client déjà existant
        </div>
    <?php endif; ?>

    <form method="post">
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

