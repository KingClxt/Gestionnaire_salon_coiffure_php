<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:../acceuil.php");
}
require '../connextion_db/cnt.php';
$titre = "Mes disponibilité";
$titre_principe="enregistrement";
$login_user = $_SESSION['user']['login_user'];
$requete = "SELECT * FROM coiffeur 
JOIN coiffeur_disponibilité ON coiffeur.login_coiffeur = coiffeur_disponibilité.login_coiffeur
JOIN disponibilité ON coiffeur_disponibilité.id_dispo = disponibilité.id_dispo
WHERE coiffeur.login_coiffeur = ?
";
$prepare = $cnx->prepare($requete);
$execute = $prepare->execute([$login_user]);
$coiffeur_dispo = $prepare->fetch(PDO::FETCH_ASSOC);
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
    <h1 class="">MES DISPONIBILITER</h1>
    <a href="ajouter_coiffeur_dispo.php" class="btn d-flex justify-content-between align-items-center btn-primary">Choisir une disponibilité</a>
</div>

<table class="table table-striped" id="myTable">
    <thead>
        <tr class="table-dark">
            <th>Numero</th>
            <th>Login Coiffeur</th>
            <th>Jour</th>
            <th>Heure</th>
            <th>Suppimer</th>
        </tr>
    </thead>
    <tbody>
        <?php if($coiffeur_dispo): ?>
            <?php do{ ?>
                <tr>
                    <td><?php echo $comptage ?></td>
                    <td><?php echo $coiffeur_dispo['login_coiffeur'] ?></td>
                    <td><?php echo $coiffeur_dispo['jour'] ?></td>
                    <td><?php echo $coiffeur_dispo['heure'] ?></td>
                    <td>
                        <a href="modifier_coiffeur_dispo.php?login_coiffeur=<?php echo $coiffeur_dispo['login_coiffeur'] ?>&id_dispo=<?php echo $coiffeur_dispo['id_dispo'] ?>"><img style="width: 10%" src="../img/modifier-le-fichier.png" alt=""></a>
                        <a href="" data-bs-toggle="modal" data-bs-target="#supprimemodale<?php echo $comptage ?>"><img style="width: 10%"  src="../img/supprimer.png" alt=""></a>
                        <div class="modal" id="supprimemodale<?php echo $comptage ?>" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Suppression d'une disponibilité</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Voulez vous vraiment supprimer cette disponibilité</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                        <a href="supprimer.php?login_coiffeur=<?php echo $coiffeur_dispo['login_coiffeur'] ?>&id_dispo=<?php echo $coiffeur_dispo['id_dispo'] ?>" type="button" class="btn btn-danger">Supprimer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php $comptage++ ?>
            <?php }while ($coiffeur_dispo = $prepare->fetch(PDO::FETCH_ASSOC)) ?>
        <?php endif; ?>
    </tbody>
</table>
</div>

<?php require '../header_footer/footer.php'; ?>