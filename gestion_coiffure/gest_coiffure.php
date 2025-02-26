<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:../acceuil.php");
}
$titre = "Gestion coiffure";
$titre_principe="parametre";
include '../connextion_db/cnt.php';
$requete = "SELECT * FROM coiffure";
$prepare = $cnx->prepare($requete);
$execute = $prepare->execute();
$affichage_coiffure = $prepare->fetch(PDO::FETCH_ASSOC);
$nb = $prepare->rowCount();
$comptage = 1;
require '../header_footer/header.php';
?>
<div class="container px-5">
    <div class="cont-info">
        <div class="info text-uppercase">
            Nombre totale de coiffures: <?php echo $nb ?>
        </div>
    </div>
    <div class="d-flex my-4 align-items-center justify-content-between">
        <h1 class="">COIFFURES</h1>
        <a href="ajouter_coiffure.php" class="btn d-flex justify-content-between align-items-center btn-primary">Ajouter Coiffure <img style="width: 30px; margin-left: 10px" src="../img/coupe-de-cheveux.png" alt=""></a>
    </div>
<table class="table "  id="myTable">
        <thead>
        <tr class="table-dark">
            <th>Numero</th>
            <th>Numéro coiffure</th>
            <th>Nom coiffure</th>
            <th>prix</th>
            <th>Action</th>
        </tr>
        </thead>

        <!--    verifie nous avons des clients enregistrer-->
        <tbody>

        <?php if($prepare->rowCount()>0): ?>
            <?php do{ ?>
                <tr>
                    <td><?php echo $comptage ?></td>
                    <td><?php echo $affichage_coiffure['id_coiffure'] ?></td>
                    <td><?php echo $affichage_coiffure['nom_coiffure'] ?></td>
                    <td><?php echo $affichage_coiffure['prix_coiffure'] ?></td>
                    <td>
                        <a href="modifier_coiffure.php?id_coiffure=<?php echo $affichage_coiffure['id_coiffure'] ?>"><img style="width: 15%" src="../img/modifier-le-fichier.png" alt=""></a>
                        <a href="" data-bs-toggle="modal" data-bs-target="#supprimemodale<?php echo $comptage ?>"><img style="width: 15%" src="../img/supprimer.png" alt=""></a>
                        <div class="modal" id="supprimemodale<?php echo $comptage ?>" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Suppression d'une coiffure</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Voulez vous vraiment supprimer la coiffure <?php echo $affichage_coiffure['id_coiffure'] ?> ?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                        <a href="supprimer.php?id_coiffure=<?php echo $affichage_coiffure['id_coiffure'] ?>" type="button" class="btn btn-danger">Supprimer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php $comptage++ ?>
            <?php }while($affichage_coiffure = $prepare->fetch(PDO::FETCH_ASSOC)) ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>


<?php require '../header_footer/footer.php' ?>

