<?php
session_start();
$erreur = null;
if(isset($_SESSION['user'])){
    header('location:../index.php');
}
require '../connextion_db/cnt.php';

if(isset($_POST['login'])){
    $login = $_POST['login'];
    $motpasse = md5($_POST['motpasse2']);
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $datenaiss = $_POST['datenaiss'];

//    ON FAIT UNE VERIFICATION POUR VOIR SI L'UTILISATEUR EXISTE DEJA

    $requete_test_user = "SELECT * FROM client WHERE login_client = ?";
    $prepare_test_user = $cnx->prepare($requete_test_user);
    $prepare_test_user->execute([$login]);
    $nb_user = $prepare_test_user->rowCount();
//    SI L'UTILISATEUR N'EXISTE PAS ON PEUT L'AJOUTE SINON ON ENVOIE UN MESSAGE D'ERREUR
    if($nb_user === 0){
        $requete = "INSERT INTO client (login_client, mot_pass_client, nom_client, prenom_client, email_client, telephone_client, datenaiss_client) VALUES (?,?,?,?,?,?,?)";
        $prepare = $cnx->prepare($requete);
        $execute = $prepare->execute([$login, $motpasse, $nom, $prenom, $email,$tel,$datenaiss]);
        header('location: connexion.php');
    }
    else{
        $erreur = true;
    }
}

require '../header_footer/header_autentification.php';
?>
<!---->

<main class="container-fluid">
    <div class="row row-cont">
        <div class="col-6 d-none d-lg-flex cont-left justify-content-center align-items-center flex-column">
            <span>Abidjan Fashion</span>
            <h2 class="text-uppercase titre-left text-center">Bienvenue parmis nous</h2>
            <p class="text-center fw-semibold">
                Nous sommes ravis de vous recevoir ! Incrivez-vous et plongez dans votre expérience unique avec nous. Votre présence illumine notre plateforme !
            </p>
            <div class="bg-left"></div>
        </div>
        <div class="col-12 col-lg-6 d-flex justify-content-center flex-column">
            <h1 class="text-center my-2 titre-right">INSCRIPTION</h1>
            <form method="post" class="form-connexion">
                <div class="container-fluid">
                    <?php if($erreur): ?>
                        <div class="alert alert-danger">
                            Ce nom d'utilisateur existe déja
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-12 col-lg-6 cont-inp">
                            <img class="ms-2" src="../img/person(1).png" alt="">
                            <input type="text" name="login" id="" placeholder="Login d'utilisateur">
                        </div>
                        <div class="col-12  col-lg-6 cont-inp">
                            <img class="ms-2" src="../img/person(1).png" alt="">
                            <input type="text" name="nom" id="" placeholder="Nom d'utilisateur">
                        </div>
                        <div class="col-12 col-lg-6 cont-inp">
                            <img class="ms-2" src="../img/person(1).png" alt="">
                            <input type="text" name="prenom" id="" placeholder="Prenom d'utilisateur">
                        </div>
                        <div class="col-12 col-lg-6 cont-inp">
                            <img class="ms-2" src="../img/mail.png" alt="">
                            <input type="email" name="email" id="" placeholder="Email d'utilisateur">
                        </div>
                        <div class="col-12 cont-inp ">
                            <img src="../img/telephone-handle-silhouette.png" alt="">
                            <input type="tel" name="tel" id="" placeholder="Tel d'utilisateur">
                        </div>
                        <div class="col-12 cont-inp ">
                            <img src="../img/calendar.png"">
                            <input type="date" name="datenaiss" id="" style="color: #6d6d6d">
                        </div>
                        <div class="col-12 cont-inp ">
                            <img src="../img/lock(1).png" alt="">
                            <input type="password" name="motpasse2" id="motpasse1" placeholder="Mot de passe">
                        </div>
                        <div class="col-12 cont-inp">
                            <img src="../img/lock(1).png" alt="">
                            <input type="password" name="motpass2e" id="motpasse2" placeholder="Confirmer le mot de passe">
                        </div>
                        <div class="col-6 text-mdp fw-bold my-1"><a href="connexion.php" class="link-dark text-decoration-none">J'ai un compte</a></div>
                        <div class="col-6 text-mdp text-end fw-bold my-1"><a href="../index.php" class="link-dark text-decoration-none">Retouner a l'acceuil</a></div>
                        <div class="col-12">
                            <button class="btn-connexion btn-validation disabled-btn" disabled>Inscription</button>
                        </div>
                        <div class="col-12 d-flex justify-content-between mt-2 align-items-center">
                            <div class="ligne"></div>
                            <div class="reseaux">
                                <a href="">
                                    <img src="../img/facebook(1).png" alt="">
                                </a>
                                <a href="">
                                    <img src="../img/twitter.png" alt="">
                                </a>
                                <a href="">
                                    <img src="../img/instagram.png" alt="">
                                </a>
                            </div>
                            <div class="ligne"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
<script src="../js/jquery-3.7.1.min.js"></script>
<script src="../js/confirme_mdp.js"></script>


<?php require '../header_footer/footer_autentification.php'; ?>

