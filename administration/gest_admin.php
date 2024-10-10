<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:../acceuil.php");
}
$titre = "Gestion Administrateur";
$titre_principe="parametre";
include '../connextion_db/cnt.php';
$requete = "SELECT * FROM administrateur";
$prepare = $cnx->prepare($requete);
$execute = $prepare->execute();
$affichage_admin = $prepare->fetch(PDO::FETCH_ASSOC);
$nb = $prepare->rowCount();
$comptage = 1;
require '../header_footer/header.php';
?>
<div class="container px-5">
    <div class="cont-info">
        <div class="info text-uppercase">
            Nombre totale d'administrateur: <?php echo $nb ?>
        </div>
    </div>
    <div class="d-flex my-4 align-items-center justify-content-between">
        <h1 class="">ADMINISTRATEURS</h1>
        <a href="ajouter_admin.php" class="btn d-flex justify-content-between align-items-center btn-primary">Ajouter Administrateur <img style="width: 30px; margin-left: 10px" src="../img/ajouter-un-utilisateur.png" alt=""></a>
    </div>
    <table class="table table-striped" id="myTable">
        <thead>
        <tr class="table-dark">
            <th>Numero</th>
            <th>login admin</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Numero tel</th>
            <th>Date de naiss</th>
            <th>Action</th>
        </tr>
        </thead>
        <!--    verifie nous avons des administrateur enregistrer-->
        <tbody>
        <?php if($prepare->rowCount()>0): ?>
            <?php do{ ?>
                <tr>
                    <td><?php echo $comptage ?></td>
                    <td><?php echo $affichage_admin['login_admin'] ?></td>
                    <td><?php echo $affichage_admin['nom_admin'] ?></td>
                    <td><?php echo $affichage_admin['prenom_admin'] ?></td>
                    <td><?php echo $affichage_admin['email_admin'] ?></td>
                    <td><?php echo $affichage_admin['telephone_admin'] ?></td>
                    <td><?php echo $affichage_admin['datenaiss_admin'] ?></td>
                    <td>
                        <a href="modifier_admin.php?login_admin=<?php echo $affichage_admin['login_admin'] ?>"><img style="width: 40px" src="../img/modifier-le-fichier.png" alt=""></a>
                        <a href="" data-bs-toggle="modal" data-bs-target="#supprimemodale<?php echo $comptage ?>"><img style="width: 40px" src="../img/supprimer.png" alt=""></a>
                        <div class="modal" id="supprimemodale<?php echo $comptage ?>" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Suppression d'un administrateur</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Voulez vous vraiment supprimer cet administrateur ?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                        <a href="supprimer.php?login_admin=<?php echo $affichage_admin['login_admin'] ?>" type="button" class="btn btn-danger">Supprimer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php $comptage++ ?>
            <?php }while($affichage_admin = $prepare->fetch(PDO::FETCH_ASSOC)) ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>


<?php require '../header_footer/footer.php' ?>

