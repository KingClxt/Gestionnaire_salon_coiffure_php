<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:../acceuil.php");
}
$titre = "Gestion caissière";
$titre_principe="enregistrement";
require '../connextion_db/cnt.php';
$requete = "SELECT * FROM caissière";
$prepare = $cnx->prepare($requete);
$execute = $prepare->execute();
$affichage_caissière = $prepare->fetch(PDO::FETCH_ASSOC);
$nb = $prepare->rowCount();
$comptage = 1;
require '../header_footer/header.php';
?>
<div  class="container px-4">
    <div class="cont-info">
        <div class="info text-uppercase">
            Nombre totale de caissières: <?php echo $nb ?>
        </div>
    </div>
    <div class="d-flex my-4 align-items-center justify-content-between">
        <h1 class="">CAISSIERES</h1>
        <a href="ajouter_caiss.php" class="btn d-flex justify-content-between align-items-center btn-primary">Ajouter Caissière <img style="width: 30px; margin-left: 10px" src="../img/ajouter-un-utilisateur.png" alt=""></a>
    </div>
    <table class="table table-striped w-100" id="myTable">
        <thead>
            <tr class="table-dark">
                <th>Numero</th>
                <th>login caissière</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Num tel</th>
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
                        <td><?php echo $affichage_caissière['login_caissière'] ?></td>
                        <td><?php echo $affichage_caissière['nom_caissière'] ?></td>
                        <td><?php echo $affichage_caissière['prenom_caissière'] ?></td>
                        <td><?php echo $affichage_caissière['email_caissière'] ?></td>
                        <td><?php echo $affichage_caissière['telephone_caissière'] ?></td>
                        <td><?php echo $affichage_caissière['datenaiss_caissière'] ?></td>
                        <td>
                            <a href="modifier_caiss.php?login_caissière=<?php echo $affichage_caissière['login_caissière'] ?>"><img class="w-25 ms-2" src="../img/modifier-le-fichier.png" alt=""></a>
                            <a href="" data-bs-toggle="modal" data-bs-target="#supprimemodale<?php echo $comptage ?>"><img class="w-25 " src="../img/supprimer.png" alt=""></a>
                            <div class="modal" id="supprimemodale<?php echo $comptage ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Suppression d'une caissière</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Voulez vous vraiment supprimer la caissière ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <a href="supprimer.php?login_caissière=<?php echo $affichage_caissière['login_caissière'] ?>" type="button" class="btn btn-danger">Supprimer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <?php $comptage++ ?>
                <?php }while($affichage_caissière = $prepare->fetch(PDO::FETCH_ASSOC)) ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>


<?php require '../header_footer/footer.php' ?>

