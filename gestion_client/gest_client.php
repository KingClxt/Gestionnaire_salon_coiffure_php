<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:../acceuil.php");
}
$titre = "Gestion clients";
$titre_principe="enregistrement";
include '../connextion_db/cnt.php';
$requete = "SELECT * FROM client";
$prepare = $cnx->prepare($requete);
$execute = $prepare->execute();
$affichage_clients = $prepare->fetch(PDO::FETCH_ASSOC);
$nb = $prepare->rowCount();
$comptage = 1;
require '../header_footer/header.php';
?>
<div class="container px-4">
    <div class="cont-info">
        <div class="info text-uppercase">
          Nombre totale de clients: <?php echo $nb ?>
        </div>
    </div>
    <div class="d-flex my-4 align-items-center justify-content-between">
        <h1 class="">CLIENTS</h1>
        <a href="ajouter_client.php" class="btn d-flex justify-content-between align-items-center btn-primary">Ajouter Client <img style="width: 30px; margin-left: 10px" src="../img/ajouter-un-utilisateur.png" alt=""></a>
    </div>
    <table class="table table-striped" id="myTable">
        <thead>
            <tr class="table-dark">
                <th>Num</th>
                <th>login client</th>
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
                        <td><?php echo $affichage_clients['login_client'] ?></td>
                        <td><?php echo $affichage_clients['nom_client'] ?></td>
                        <td><?php echo $affichage_clients['prenom_client'] ?></td>
                        <td><?php echo $affichage_clients['email_client'] ?></td>
                        <td><?php echo $affichage_clients['telephone_client'] ?></td>
                        <td><?php echo $affichage_clients['datenaiss_client'] ?></td>
                        <td>
                            <a href="modifier_client.php?login_client=<?php echo $affichage_clients['login_client'] ?>"><img class="w-25 ms-2" src="../img/modifier-le-fichier.png" alt=""></a>

                            <a href="" data-bs-toggle="modal" data-bs-target="#supprimemodale<?php echo $comptage ?>"><img class="w-25 " src="../img/supprimer.png" alt=""></a>
                            <div class="modal" id="supprimemodale<?php echo $comptage ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Suppression d'un client</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Voulez vous vraiment supprimer le client <?php echo $affichage_clients['nom_client'] ?> ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <a href="supprimer.php?login_client=<?php echo $affichage_clients['login_client'] ?>" type="button" class="btn btn-danger">Supprimer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php $comptage++ ?>
                <?php }while($affichage_clients = $prepare->fetch(PDO::FETCH_ASSOC)) ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>


<?php require '../header_footer/footer.php' ?>

