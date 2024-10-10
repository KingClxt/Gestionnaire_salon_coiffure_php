<?php
$titre = "Connexion";
session_start();
if(isset($_SESSION['user'])){
    header('location:../index.php');
}
require '../connextion_db/cnt.php';
$error = null;
if(isset($_POST['login'])){
    $login = $_POST['login'];
    $motpasse = md5($_POST['motpasse']);
    $type = $_POST['type'];
    switch ($type){
        case 'client':
            $requete = "SELECT * FROM client WHERE login_client = ? AND mot_pass_client = ?";
            $prepare = $cnx->prepare($requete);
            $execute = $prepare->execute([$login, $motpasse]);
            if($prepare->rowCount()>0){
                $utilisateur = $prepare->fetch(PDO::FETCH_ASSOC);
                $_SESSION['user'] = [
                    "login_user" => $utilisateur['login_client'],
                    "nom" => $utilisateur['nom_client'],
                    "prenom" => $utilisateur['prenom_client'],
                    "email" => $utilisateur['email_client'],
                    "telephone" => $utilisateur['telephone_client'],
                    "datenaiss" => $utilisateur['datenaiss_client'],
                    "type_user" => $type
                ];
                header('location:../index.php');
            }
            else{
                $error = true;
            }
            break;
        case 'coiffeur':
            $requete = "SELECT * FROM coiffeur WHERE login_coiffeur=? AND mot_pass_coiffeur = ?";
            $prepare = $cnx->prepare($requete);
            $execute = $prepare->execute([$login, $motpasse]);
            if($prepare->rowCount()>0){
                $utilisateur = $prepare->fetch(PDO::FETCH_ASSOC);
                $_SESSION['user'] = [
                    "login_user" => $utilisateur['login_coiffeur'],
                    "nom" => $utilisateur['nom_coiffeur'],
                    "prenom" => $utilisateur['prenom_coiffeur'],
                    "email" => $utilisateur['email_coiffeur'],
                    "telephone" => $utilisateur['telephone_coiffeur'],
                    "datenaiss" => $utilisateur['datenaiss_coiffeur'],
                    "type_user" => $type
                ];
                header('location:../index.php');
            }
            else{
                $error = true;
            }
            break;
        case 'caissière':
            $requete = "SELECT * FROM caissière WHERE login_caissière = ? AND mot_pass_caissière = ?";
            $prepare = $cnx->prepare($requete);
            $execute = $prepare->execute([$login, $motpasse]);
            if($prepare->rowCount()>0){
                $utilisateur = $prepare->fetch(PDO::FETCH_ASSOC);
                $_SESSION['user'] = [
                    "login_user" => $utilisateur['login_caissière'],
                    "nom" => $utilisateur['nom_caissière'],
                    "prenom" => $utilisateur['prenom_caissière'],
                    "email" => $utilisateur['email_caissière'],
                    "telephone" => $utilisateur['telephone_caissière'],
                    "datenaiss" => $utilisateur['datenaiss_caissière'],
                    "type_user" => $type
                ];
                header('location:../index.php');
            }
            else{
                $error = true;
            }
            break;
        case 'administrateur':
            $requete = "SELECT * FROM administrateur WHERE login_admin = ? AND mot_pass_admin = ?";
            $prepare = $cnx->prepare($requete);
            $execute = $prepare->execute([$login, $motpasse]);
            if($prepare->rowCount()>0){
                $utilisateur = $prepare->fetch(PDO::FETCH_ASSOC);
                $_SESSION['user'] = [
                    "login_user" => $utilisateur['login_admin'],
                    "nom" => $utilisateur['nom_admin'],
                    "prenom" => $utilisateur['prenom_admin'],
                    "email" => $utilisateur['email_admin'],
                    "telephone" => $utilisateur['telephone_admin'],
                    "datenaiss" => $utilisateur['datenaiss_admin'],
                    "type_user" => $type
                ];
                header('location:../index.php');
            }
            else{
                $error = true;
            }
            break;
        default:
            break;
    }

}
require '../header_footer/header_autentification.php'
?>
<!----------------------------------------------------------------------->
<main class="container-fluid cont-gen">

    <div class="row row-cont">
        <div class="col-6 d-none d-lg-flex cont-left justify-content-center align-items-center flex-column">
            <span>Abidjan Fashion</span>
            <h2 class="text-uppercase titre-left text-center">Bon retour parmis nous</h2>
            <p class="text-center fw-semibold">
                Nous sommes ravis de vous revoir ! Connectez-vous et plongez dans votre expérience unique avec nous. Votre présence illumine notre plateforme !
            </p>
            <div class="bg-left"></div>
        </div>
        <div class="col-12 col-lg-6 d-flex justify-content-center flex-column">
            <div class="acceuil">
                <a href="../index.php" class="btn-acceuil">Acceuil</a>
            </div>
            <h1 class="text-center mb-3 titre-right">CONNEXION</h1>
            <form method="post" class="form-connexion">
                <div class="container">
            <?php if($error): ?>
                <div class="alert alert-danger">
                    Login et/ou mot de passe incorrecte
                </div>
            <?php endif; ?>
                    <div class="row">
                        <div class="col-12 cont-inp">
                            <img src="../img/person(1).png" alt="">
                            <input type="text" name="login" placeholder="Login d'utilisateur">
                        </div>
                        <div class="col-12 cont-inp mb-1">
                            <img src="../img/lock(1).png" alt="">
                            <input type="password" name="motpasse" placeholder="Mot de passe">
                        </div>
                        <div class="col-12 cont-inp ">
                            <img src="../img/man.png" alt="">
                            <select name="type" id="">
                                <option value="client">Client</option>
                                <option value="coiffeur">Coiffeur</option>
                                <option value="caissière">Caissière</option>
                                <option value="administrateur">Administrateur</option>
                            </select>
                        </div>
                        <div class="col-6 text-mdp fw-bold my-4"><a href="inscription.php" class="link-dark text-decoration-none">Vous n'avez pas un compte?</a></div>
                        <div class="col-6 text-mdp text-end fw-bold my-4"><a href=""></a>Mot de passe oublié ?</div>
                        <div class="col-12">
                            <button class="btn-connexion">Connexion</button>
                        </div>
                        <div class="col-12 text-center my-1">ou avec</div>
                        <div class="col-12 d-flex justify-content-between mt-4 align-items-center">
                            <div class="ligne"></div>
                            <div class="reseaux">
                                <a href="https://facebook.com">
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
<?php require '../header_footer/footer_autentification.php' ?>