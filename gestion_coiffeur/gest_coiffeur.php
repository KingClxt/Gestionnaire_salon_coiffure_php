<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:../acceuil.php");
}
$titre = "Gestion coiffeurs";
$titre_principe="enregistrement";
include '../connextion_db/cnt.php';
$requete = "SELECT * FROM coiffeur";
$prepare = $cnx->prepare($requete);
$execute = $prepare->execute();
$affichage_coiffeur = $prepare->fetch(PDO::FETCH_ASSOC);
$nb = $prepare->rowCount();
$comptage =
require '../header_footer/header.php';
?>
<div class="container px-4">
    <div class="cont-info">
        <div class="info text-uppercase">
            Nombre totale de coiffeurs: <?php echo $nb ?>
        </div>
    </div>
    <div class="d-flex my-4 align-items-center justify-content-between">
        <h1 class="">COIFFEURS</h1>
        <a href="ajouter_coiffeur.php" class="btn d-flex justify-content-between align-items-center btn-primary">Ajouter Coiffeur <img style="width: 30px; margin-left: 10px" src="../img/ajouter-un-utilisateur.png" alt=""></a>
    </div>
    <table class="table table-striped" id="myTable">
        <thead>
            <tr class="table-dark">
                <th>Numero</th>
                <th>login coiffeur</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Numero tel</th>
                <th>Date de naiss</th>
                <th>Action</th>
            </tr>
        </thead>
        <!--    verifie nous avons des clients enregistrer-->
        <tbody>
            <?php if($prepare->rowCount()>0): ?>
                <?php do{ ?>
                    <tr>
                        <td><?php echo $comptage ?></td>
                        <td><?php echo $affichage_coiffeur['login_coiffeur'] ?></td>
                        <td><?php echo $affichage_coiffeur['nom_coiffeur'] ?></td>
                        <td><?php echo $affichage_coiffeur['prenom_coiffeur'] ?></td>
                        <td><?php echo $affichage_coiffeur['email_coiffeur'] ?></td>
                        <td><?php echo $affichage_coiffeur['telephone_coiffeur'] ?></td>
                        <td><?php echo $affichage_coiffeur['datenaiss_coiffeur'] ?></td>
                        <td>
                            <a href="modifier_coiffeur.php?login_coiffeur=<?php echo $affichage_coiffeur['login_coiffeur'] ?>"><img style="width: 40px" src="../img/modifier-le-fichier.png" alt=""></a>
                            <?php if($_SESSION['user']['type_user'] == 'administrateur'): ?>
                                <a href="" data-bs-toggle="modal" data-bs-target="#supprimemodale<?php echo $comptage ?>"><img style="width: 40px" src="../img/supprimer.png" alt=""></a>
                            <?php endif; ?>
                            <div class="modal" id="supprimemodale<?php echo $comptage ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Suppression d'un client</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Voulez vous vraiment supprimer le coiffeur <?php echo $affichage_coiffeur['nom_coiffeur'] ?> ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <a href="supprimer.php?login_coiffeur=<?php echo $affichage_coiffeur['login_coiffeur'] ?>" type="button" class="btn btn-danger">Supprimer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php $comptage++ ?>
                <?php }while($affichage_coiffeur = $prepare->fetch(PDO::FETCH_ASSOC)) ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>


<?php require '../header_footer/footer.php' ?>

