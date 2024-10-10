<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:../acceuil.php");
}
require '../connextion_db/cnt.php';
$titre = "Modifier specialiter";
$titre_principe="enregistrement";
$success = null;
if(isset($_GET['success']) && $_GET['success']=='ok'){
    $success = 'ok';
}
else if(isset($_GET['success']) && $_GET['success']=='existe'){
    $success = 'existe';
}
if(isset($_POST['coiffure'])){
    $coiffure = $_POST['coiffure'];
    $coiffeur = $_POST['coiffeur'];
//  ON FAIT UNE SELECTION POUR VOIR SI LA LIGNE EXISTE DEJA
    $prepare_existence_ligne = $cnx->prepare("SELECT * FROM commande_coiffure WHERE id_coiffure = ? AND login_coiffeur = ?");
    $execute_existence_ligne = $prepare_existence_ligne->execute([$coiffure, $coiffeur]);
    $nb_ligne = $prepare_existence_ligne->rowCount();
    if($nb_ligne == 0){
        $requete = "UPDATE commande_coiffure SET id_coiffure = ?, login_coiffeur = ? WHERE id_coiffure = ? AND login_coiffeur = ?";
        $prepare = $cnx->prepare($requete);
        $execute = $prepare->execute([$coiffure, $coiffeur, $_GET['id_coiffure'], $_GET['login_coiffeur']]);
        header("location: modifier_coiffure_coiffeur.php?login_coiffeur=$coiffeur&id_coiffure=$coiffure&success=ok");
    }else{
        header("location: modifier_coiffure_coiffeur.php?login_coiffeur=$coiffeur&id_coiffure=$coiffure&success=existe");
    }
}
//RECUPERATION DE TOUTE LES COIFFURES
$requete_recup_coiffure = "SELECT * FROM coiffure";
$prepare_coiffure = $cnx->prepare($requete_recup_coiffure);
$execute_coiffure = $prepare_coiffure->execute();
$coiffures= $prepare_coiffure->fetchAll(PDO::FETCH_ASSOC);
//RECUPERATION DES DONNEES
$requete_recupe = "SELECT * FROM commande_coiffure WHERE id_coiffure = ? AND login_coiffeur = ?";
$prepare_recupe = $cnx->prepare($requete_recupe);
$execute_recupe = $prepare_recupe->execute([$_GET['id_coiffure'], $_GET['login_coiffeur']]);
$coiffeur_coiffure = $prepare_recupe->fetch(PDO::FETCH_ASSOC);
require '../header_footer/header.php';
?>
<div class="container">
    <h1 class="text-uppercase my-4 text-center">Modifier la Specialisation</h1>
    <?php if($success == 'ok'): ?>
        <div class="alert alert-success" role="alert">
            Modification de la specialisation effectuer avec success
        </div>
        <?php elseif ($success == 'existe'): ?>
        <div class="alert alert-warning">
            Ce coiffeur est déja specialiser dans cette coiffure
        </div>
    <?php endif; ?>
    <form method="post">
        <div>
            <label for="" class="form-label fw-bold">Login coiffeur</label>
            <input type="text" name="coiffeur" readonly id="coiffeur_form" class="form-control" value="<?php echo $coiffeur_coiffure['login_coiffeur'] ?>">
        </div>
        <div>
            <label for="" class="form-label fw-bold">Nom coiffure</label>
            <div id="cont_select">
                <select name="coiffure" class="form-select select-coiffure"">
                <?php
                foreach ($coiffures as $coiffure){
                    $select = '';
                    if($coiffeur_coiffure['id_coiffure'] == $coiffure['id_coiffure']){
                        $select = 'selected';
                    }
                    echo "<option value='{$coiffure['id_coiffure']}' $select>{$coiffure['nom_coiffure']}</option>";
                }
                ?>
                </select>
            </div>
        </div>
        <button class="btn btn-primary validation-btn my-1 w-100" >Modifier</button>
    </form>
</div>
<?php require '../header_footer/footer.php' ?>
