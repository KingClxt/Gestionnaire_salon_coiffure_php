<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:../acceuil.php");
}
require '../connextion_db/cnt.php';
$success = null;
$erreur = null;
$titre_principe="enregistrement";
$titre = "Choisir disponibilité";
if(isset($_POST['coiffeur'])){
    $coiffeur = $_POST['coiffeur'];
    $coiffures = $_POST['coiffure'];
    foreach ($coiffures as $coiffure){
        if($coiffure !== '#'){
            $requete1 = "SELECT * FROM coiffeur_disponibilité WHERE id_dispo=? AND login_coiffeur=?";
            $prepare1 = $cnx->prepare($requete1);
            $execute1 = $prepare1->execute([$coiffure, $coiffeur]);
            $nb_ligne = $prepare1->rowCount();
            if($nb_ligne == 0){
                $requete = "INSERT INTO coiffeur_disponibilité (id_dispo, login_coiffeur) VALUES (?,?)";
                $prepare = $cnx->prepare($requete);
                $execute = $prepare->execute([$coiffure, $coiffeur]);
                $success = true;
            }
            else{
                $erreur = true;
            }
        }
    }
}


$requete2 = "SELECT * FROM disponibilité";
$prepare2 = $cnx->prepare($requete2);
$execute2 = $prepare2->execute();
$disponibilites = $prepare2->fetchAll(PDO::FETCH_ASSOC);

require '../header_footer/header.php';
?>

<div class="container w-75 mx-auto" style="margin-top: 10%">
    <div class="d-flex my-4 align-items-center justify-content-between">
        <h1 class="">Choisir une disponibilité</h1>
        <a href="gest_coiffeur_dispo.php" class="btn btn-primary">Liste disponibilité</a>
    </div>
    <form method="post">
    <?php if($success): ?>
        <div class="alert alert-success">
            Choix disponibilité effectuer avec success
        </div>
    <?php endif ?>
        <div>
            <label for="" class="form-label fw-bold">Coiffeur:</label>
            <select name="coiffeur" id="coiffeur" class="form-select">
                <option value="<?php echo $_SESSION['user']['login_user'] ?>"><?= $_SESSION['user']['login_user'] ?></option>
            </select>
        </div>
        <div>
            <label for="" class="form-label fw-bold">Disponibilité:</label>
            <div class="cont-select">
                <select name="coiffure[]" class="coiffures form-select my-2">
                    <option value="#">---</option>
                    <?php foreach ($disponibilites as $disponibilite): ?>
                        <?php echo "<option value='{$disponibilite['id_dispo']}'>{$disponibilite['jour']}-{$disponibilite['heure']}</option>" ?>
                    <?php endforeach;  ?>
                </select>
            </div>
            <input type="submit" value="Ajouter une nouvelle disponibilité" class="w-100 btn btn-primary">
            <input type="reset" value="Annuler" class="w-100 my-2 btn btn-danger">
        </div>
    </form>
</div>


<script src="../js/jquery-3.7.1.min.js"></script>
<script>

    $(document).ready(function(){
        $(document).ready(function(){
            $('.cont-select').on('change', 'select:last', function (){
                if($(this).val() !== '#'){
                    let newSelect = $('<select name="coiffure[]" class="coiffures form-select my-2"><option value="#">---</option></select>');
                    // Ajouter les options depuis une variable JavaScript
                    let options = <?php echo json_encode($disponibilites); ?>;
                    options.forEach(function(coiffure){
                        newSelect.append(`<option value="${coiffure.id_dispo}">${coiffure.jour}-${coiffure.heure}</option>`);
                    });

                    $('.cont-select').append(newSelect);
                }
            });
        });






    })

</script>
<?php require '../header_footer/footer.php'; ?>


