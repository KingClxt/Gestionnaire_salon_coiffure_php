<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:../acceuil.php");
}
$titre = "Mes specialiter";
$titre_principe="enregistrement";
include '../connextion_db/cnt.php';
$user = $_SESSION['user']['type_user'];
if($user == "administrateur"){
$requete = "SELECT * FROM coiffeur cfeur 
JOIN commande_coiffure cmd_coif ON cfeur.login_coiffeur = cmd_coif.login_coiffeur
JOIN coiffure cfur ON cmd_coif.id_coiffure = cfur.id_coiffure
";
$prepare = $cnx->prepare($requete);
$execute = $prepare->execute();
}
else{
$requete = "SELECT * FROM coiffeur cfeur 
JOIN commande_coiffure cmd_coif ON cfeur.login_coiffeur = cmd_coif.login_coiffeur
JOIN coiffure cfur ON cmd_coif.id_coiffure = cfur.id_coiffure WHERE cfeur.login_coiffeur = ?
";
$prepare = $cnx->prepare($requete);
$execute = $prepare->execute([$_SESSION['user']['login_user']]);
}
$affichage_specialiter = $prepare->fetch(PDO::FETCH_ASSOC);
$nb = $prepare->rowCount();
$comptage = 1;
require '../header_footer/header.php';
?>
<div class="container px-5">
    <div class="cont-info">
        <div class="info text-uppercase">
            Nombre totale de specialité: <?php echo $nb ?>
        </div>
    </div>
    <div class="d-flex my-4 align-items-center justify-content-between">
        <h1 class="">
            <?php echo ($_SESSION['user']['type_user'] == "coiffeur")?'MES SPECIALITER':'SPECIALITER DES COIFFEURS' ?>
        </h1>
        <a href="ajouter_coiffure_coiffeur.php" class="btn d-flex justify-content-between align-items-center btn-primary">Ajouter une specialiter</a>
    </div>
    <table class="table table-striped" id="myTable">
        <thead>
            <tr class="table-dark">
                <th>Numero</th>
                <th>login coiffeur</th>
                <th>nom du coiffeur</th>
                <th>nom de la coiffure</th>
                <th>Prix coiffure</th>
                <th>Action</th>
            </tr>
        </thead>
        <!--    verifie nous avons des clients enregistrer-->
        <tbody>
            <?php if($prepare->rowCount()>0): ?>
                <?php do{ ?>
                    <tr>
                        <td><?php echo $comptage ?></td>
                        <td><?php echo $affichage_specialiter['login_coiffeur'] ?></td>
                        <td><?php echo $affichage_specialiter['nom_coiffeur'] ?></td>
                        <td><?php echo $affichage_specialiter['nom_coiffure'] ?></td>
                        <td><?php echo $affichage_specialiter['prix_coiffure'] ?></td>
                        <td>
                            <a href="modifier_coiffure_coiffeur.php?login_coiffeur=<?php echo $affichage_specialiter['login_coiffeur'] ?>&id_coiffure=<?php echo $affichage_specialiter['id_coiffure'] ?>"><img style="width: 15%" src="../img/modifier-le-fichier.png" alt=""></a>
                            <a href="" data-bs-toggle="modal" data-bs-target="#supprimemodale<?php echo $comptage ?>"><img style="width: 15%" src="../img/supprimer.png" alt=""></a>
                            <div class="modal" id="supprimemodale<?php echo $comptage ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Suppression d'une specialiter</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Voulez vous vraiment supprimer cette specialiter ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <a href="supprimer.php?login_coiffeur=<?php echo $affichage_specialiter['login_coiffeur'] ?>&id_coiffure=<?php echo $affichage_specialiter['id_coiffure'] ?>" type="button" class="btn btn-danger">Supprimer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php $comptage++ ?>
                <?php }while($affichage_specialiter = $prepare->fetch(PDO::FETCH_ASSOC)) ?>
            <?php endif ?>
        </tbody>
    </table>
</div>


<?php require '../header_footer/footer.php' ?>

