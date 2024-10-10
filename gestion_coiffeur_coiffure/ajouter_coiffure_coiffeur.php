<?php

session_start();
if(!isset($_SESSION['user'])){
    header("location:../acceuil.php");
}
require '../connextion_db/cnt.php';
$titre = "Ajout specialité";
$titre_principe="enregistrement";
$success=null;
$erreur = null;
if(isset($_POST['coiffure']) && !empty($_POST['coiffeur'])){
    $coiffures = array_unique($_POST['coiffure']);//SUPPRIMER LES DOUBLURE DE COIFFURE
    $coiffeur = $_POST['coiffeur'];
    foreach ($coiffures as $coiffure){
//       ON FAIT UNE SELECTION POUR VOIR SI LA LIGNE EXISTE DEJA
        $prepare_existence_ligne = $cnx->prepare("SELECT * FROM commande_coiffure WHERE id_coiffure = ? AND login_coiffeur = ?");
        $execute_existence_ligne = $prepare_existence_ligne->execute([$coiffure, $coiffeur]);
        $nb_ligne = $prepare_existence_ligne->rowCount();
//        SI LE NOMBRE DE LIGNE AFFECTER EST 0 ON FAIT L'INSERTION
        if($nb_ligne == 0){
            $requte = "INSERT INTO commande_coiffure (id_coiffure, login_coiffeur) VALUES (?,?)";
            $prepare = $cnx->prepare($requte);
            $execute = $prepare->execute([$coiffure, $coiffeur]);
            $success = true;
        }
        else{
            $erreur = true;
        }
    }
}
//RECUPERATION DE TOUTE LES COIFFURES
$requete_recup_coiffure = "SELECT * FROM coiffure";
$prepare_coiffure = $cnx->prepare($requete_recup_coiffure);
$execute_coiffure = $prepare_coiffure->execute();
$coiffures= $prepare_coiffure->fetchAll(PDO::FETCH_ASSOC);
require '../header_footer/header.php';
?>
<div class="container w-75 mx-auto" style="margin-top: 8%">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="text-uppercase my-4 text-center">Ajouter une Specialisation</h1>
        <div>
            <a href="gest_coiffeur_coiffure.php" class="btn btn-primary">Liste des specialité</a>
        </div>
    </div>
    <?php if($success): ?>
        <div class="alert alert-success" role="alert">
            Ajout de la specialité effectuer avec success
        </div>
    <?php endif; ?>
    <?php if($erreur): ?>
        <div class="alert alert-danger" role="alert">
            Specialité déja existante
        </div>
    <?php endif; ?>
    <div class="d-flex justify-content-center">
        <input type="text" name="nom" id="nom_coiffeur" value="<?= ($_SESSION['user']['type_user']=='coiffeur')?$_SESSION['user']['login_user']:'' ?>" class="form-control me-1" placeholder="Entrer le login d'un coiffeur">
        <button class="btn btn-primary" id="btn-research">Rechercher</button>
    </div>
    <div class="cont-affichage my-4">
        Login du coiffeur: <br>
        Nom du coiffeur: <br>
        Prenom du coiffeur: <br>
        Email:
    </div>
    <div class="d-flex justify-content-end my-2 me-1" class="nbr-coif">
        <input type="text" name="" id="nbr_coiffure" class="form-control w-25 " placeholder="Entrer le nombre de coiffure">
    </div>
    <p id="info"></p>
    <form method="post">
        <input type="hidden" name="coiffeur" id="coiffeur_form">
        <div id="cont_select">
            <select name="coiffure[]" disabled class="form-select select-coiffure"">
                <?php
                foreach ($coiffures as $coiffure){
                        echo "<option value='{$coiffure['id_coiffure']}'>{$coiffure['nom_coiffure']}</option>";
                    }
                ?>
            </select>
        </div>
        <button class="btn w-100 my-2 btn-primary validation-btn" disabled>Ajouter</button>
    </form>
</div>

<script src="../js/jquery-3.7.1.min.js"></script>
<script>
    $('#nbr_coiffure').hide();
    function searchCoiffeur(nom_coiffeur){
        if(nom_coiffeur==''){
            $('.cont-affichage').html("Vous n'avez pas encore entrer de login")
        }
        $.ajax({
            type:'GET',
            url:'ajax_research_coiffeur.php?nom_coiffeur='+nom_coiffeur,
            dataType:'json',
            success:function(response){
                if(response.status){
                    $('.cont-affichage').html(`
                        Login du coiffeur:${response.data.login_coiffeur} <br>
                        Nom du coiffeur: ${response.data.nom_coiffeur} <br>
                        Prenom du coiffeur: ${response.data.prenom_coiffeur} <br>
                        Email: ${response.data.email_coiffeur}
                    `);
                    $('#coiffeur_form').val(response.data.login_coiffeur);
                    $('.select-coiffure').prop('disabled', false);
                    $('#nbr_coiffure').show();
                    $('.validation-btn').prop('disabled', false);
                }
                else{
                    $('#coiffeur_form').val('');
                    $('.validation-btn').prop('disabled', true);
                    $('.select-coiffure').prop('disabled', true)
                    $('.cont-affichage').html(response.data);
                    $('#nbr_coiffure').hide();
                }
            }
        });
    }
    if($('#nom_coiffeur').val() !== ''){
        searchCoiffeur($('#nom_coiffeur').val())
    }
    $('#btn-research').click(function (){
        searchCoiffeur($('#nom_coiffeur').val());
    });

    $('#nbr_coiffure').on('input', function(){
        $('#cont_select').html('')
        var nbr = parseInt($(this).val());
        if(!nbr ){
            $('#info').html("Veuillez entrer une bonne valeur");
        }
        else{
            for(i=1;i<=nbr;i++){
                $('#cont_select').append(`
                    <select name="coiffure[]" class="form-select select-coiffure my-3">
                        <?php
                foreach ($coiffures as $coiffure){
                    echo "<option value='{$coiffure['id_coiffure']}'>{$coiffure['nom_coiffure']}</option>";
                }
                ?>
                    </select>
                `)
            }
        }
    })
</script>
<?php require '../header_footer/footer.php' ?>
