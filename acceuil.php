<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location: authentification/connexion.php');
}
require 'connextion_db/cnt.php';
$requete = "SELECT * FROM client";
$prepare = $cnx->prepare($requete);
$prepare->execute();
$nb_client = $prepare->rowCount();
$requete = "SELECT * FROM coiffeur";
$prepare = $cnx->prepare($requete);
$prepare->execute();
$nb_coiffeur = $prepare->rowCount();
$requete = "SELECT * FROM commande_coiffure";
$prepare = $cnx->prepare($requete);
$prepare->execute();
$nb_commande_coiffure = $prepare->rowCount();
$requete = "SELECT * FROM caissière";
$prepare = $cnx->prepare($requete);
$prepare->execute();
$nb_caissière = $prepare->rowCount();
$requete = "SELECT * FROM administrateur";
$prepare = $cnx->prepare($requete);
$prepare->execute();
$nb_admin = $prepare->rowCount();
$requete = "SELECT * FROM rendez_vous";
$prepare = $cnx->prepare($requete);
$prepare->execute();
$nb_rendez_vous = $prepare->rowCount();

$requete = "SELECT * FROM rendez_vous LIMIT 2";
$prepare_2_rdv = $cnx->prepare($requete);
$prepare_2_rdv->execute();
$rdv = $prepare_2_rdv->fetch(PDO::FETCH_ASSOC);

$titre_principe="acceuil"
?>
<!doctype html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acceuil</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
    <link rel="stylesheet" href="css/sb-admin-2.css">
    <link rel="stylesheet" href="css/siedbarr.css">
    <link rel="stylesheet" href="css/calendrier.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <style>
        .calendar_content div{
            padding: 10px 0;
        }
        .calendar_header{
            padding: 0;
            margin: 5px 0;
        }
        .calendar_weekdays div{
            padding: 5px 0;
        }
    </style>
</head>
<body>
<main class="d-flex flex-nowrap">
    <!--  Siedbar  -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-air-freshener"></i>
            </div>
            <div class="sidebar-brand-text mx-1">Abidjan_Fashion</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <li class="nav-item <?php if(isset($titre_principe) && $titre_principe == "acceuil") echo 'active'?>">
            <a class="nav-link" href="index.php">
                <i class="fas fa-home"></i>
                <span>Dashboard</span></a>
        </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <?php if(isset($_SESSION['user']) && $_SESSION['user']['type_user'] == "administrateur"): ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Parametre</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="administration/gest_admin.php">Administration</a>
                        <a class="collapse-item" href="gestion_disponibiliter/gest_dispo.php">Disponibilité</a>
                        <a class="collapse-item" href="gestion_coiffure/gest_coiffure.php">Coiffure</a>
                    </div>
                </div>
            </li>
        <?php endif; ?>

        <!-- Nav Item - Utilities Collapse Menu -->
        <?php if(isset($_SESSION['user']) && $_SESSION['user']['type_user'] !== "client"): ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-save"></i>
                    <span>Enregistrement</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <?php if(isset($_SESSION['user']) && ($_SESSION['user']['type_user']=="administrateur" || $_SESSION['user']['type_user']=="caissière" )): ?>
                            <a class="collapse-item" href="gestion_client/gest_client.php">Gestion clients</a>
                            <a class="collapse-item" href="gestion_coiffeur/gest_coiffeur.php">Gestion coiffeurs</a>
                        <?php endif; ?>
                        <?php if(isset($_SESSION['user']) && $_SESSION['user']['type_user'] == "administrateur"): ?>
                            <a class="collapse-item" href="gestion_caiss/gest_caiss.php">Gestion caissière</a>
                        <?php endif; ?>
                        <?php if(isset($_SESSION['user']) && $_SESSION['user']['type_user'] == "coiffeur"): ?>
                            <a class="collapse-item" href="gestion_coiffeur_coiffure/gest_coiffeur_coiffure.php">Gestion coiffure_coiffeur</a>
                            <a class="collapse-item" href="gestion_coiffeur_dispo/gest_coiffeur_dispo.php">Gestion coiffeur_dispo</a>
                        <?php endif; ?>
                    </div>
                </div>
            </li>
        <?php endif; ?>
        <?php if(isset($_SESSION['user']) && ($_SESSION['user']['type_user'] == "administrateur" || $_SESSION['user']['type_user'] == "client")): ?>
            <li class="nav-item">
                <a class="nav-link" href="rendez_vous/liste_rendez_vous.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Rendez-vous</span></a>
            </li>
        <?php endif; ?>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-pager"></i>
                <span>A propos</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link" href="authentification/deconnexion.php">
                <i class="fas fa-power-off"></i>
                <span>Deconnexion</span></a>
        </li>

<!--         Sidebar Toggler (Sidebar)-->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
    </ul>


    <!--  Siedbar  -->
        <div class="cont-dashboard d-flex w-100 px-2">
            <div class="cont-left" style="width: 70%;">
                <h1 class="titre ms-3 text-uppercase my-1">Dashboard</h1>
                <div class="d-flex flex-column justify-content-center" style="height: 90%">
                <div class="cont-bvn d-flex justify-content-between">
                    <div class="cont-titre text-white d-flex flex-column justify-content-end ps-4">
                        <h2 class="titre text-uppercase text-white">
                            Bienvenue <?php echo $_SESSION['user']['login_user'] ?>
                        </h2>
                        <p class="fw-semibold">Nous somme dans une joie intense de vous voire connectée</p>
                    </div>
                    <div class="cont-img d-flex justify-content-center">
                        <img src="img/undraw_celebration_re_kc9k.svg" alt="">
                    </div>
                </div>
                <?php if($_SESSION['user']['type_user'] == "administrateur"): ?>
                <div class="cont-info-user px-1">
                    <div class="cont-info">
                        <div class="info">
                            <p>
                            20
                            </p>
                            <p>
                            CLIENTS
                            </p>
                        </div>
                        <div class="info">
                            <p>
                            10
                            </p>
                            <p>
                            COIFFEURS
                            </p>
                        </div>
                        <div class="info">
                            <p>
                                25
                            </p>
                            <p>
                            CAISSIERES
                            </p>
                        </div>
                        <div class="info">
                            <p>
                            25
                            </p>
                            <p>
                            SPECIALITÉES
                            </p>
                        </div>
                        <div class="info">
                            <p>
                            25
                            </p>
                            <p>
                            ADMINISTRATEURS
                            </p>
                        </div>
                        <div class="info">
                            <p>
                            25
                            </p>
                            <p>
                            RENDEZ-VOUS
                            </p>
                        </div>
                    </div>
                </div>
<!--                -->
                <div class="cont-rdv-rec px-2">
                    <h2 class="fw-bold my-3 text-uppercase">Les rendez-vous recent</h2>
                    <table class="table table-bordered">
                        <tr class="table-dark">
                            <th>Login coiffeur</th>
                            <th>Login client</th>
                            <th>Login caissière</th>
                            <th>Date de rendez-vous</th>
                        </tr>
                        <?php do{ ?>
                        <tr>
                            <td><?php echo $rdv['login_coiffeur'] ?></td>
                            <td><?php echo $rdv['login_client'] ?></td>
                            <td><?php echo $rdv['login_caissière'] ?></td>
                            <td><?php echo $rdv['date_rdv'] ?></td>
                        </tr>
                        <?php }while ($rdv = $prepare_2_rdv->fetch(PDO::FETCH_ASSOC)) ?>
                    </table>
                </div>
                <?php else: ?>

                    <div class="annonce px-5 mt-5 d-flex ">
                        <div class="cont-left" style="width: 70%;">
                            <h2 class="fw-bold text-uppercase">Annonce du moment</h2>
                            <p>Il a reduction de 50% sur toute les coiffures pendans une semaine</p>
                        </div>
                        <div class="cont-right" style="width: 30%;">
                            <img src="img/undraw_happy_announcement_re_tsm0.svg" alt="">
                        </div>
                    </div>
                <?php endif; ?>
                </div>
            </div>
            <div class="cont-right " style="width: 30%;">
                <div class="my-profil rounded-5 bg-white pb-4">
                    <div class="header-profil d-flex h-100 justify-content-between align-items-center fw-bold text-white py-2 w-100 rounded-5">
                        <p class="my-0 ms-2">Mon profile</p>
                        <a href="" class="m-0 d-flex justify-content-center "><img src="img/edit.png" alt="" style="width: 40%;"></a>
                    </div>
                    <div class="cont-profil d-flex mt-1  align-items-center px-4 py-1">
                        <div class="cont-img">
                            <img src="img/user.png" alt="" class="w-75">
                        </div>
                        <div class="info-user fw-bold">
                            <?php echo $_SESSION['user']['login_user'] ?>
                        </div>
                    </div>
                    <hr class="w-75 my-2 mx-auto">
                    <div class="info-profile px-4">
                        <strong class="me-1 text-primary">Nom:</strong><?php echo $_SESSION['user']['nom'] ?><br>
                        <strong class="me-1 text-primary">Prenom:</strong><?php echo $_SESSION['user']['prenom'] ?><br>
                        <strong class="me-1 text-primary">Email:</strong><?php echo $_SESSION['user']['email'] ?><br>
                        <strong class="me-1 text-primary">Date de naissance:</strong><?php echo $_SESSION['user']['datenaiss'] ?>
                        <br>
                        <strong class="me-1 text-primary">Numero de téléphone:</strong><?php echo $_SESSION['user']['datenaiss'] ?>
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-center" >
                    <div class="calendar calendar-first m-0" style="width: 100%" id="calendar_first" >
                        <div class="calendar_header">
                            <button class="switch-month switch-left"> <i class="fa fa-chevron-left"></i></button>
                            <h2></h2>
                            <button class="switch-month switch-right"> <i class="fa fa-chevron-right"></i></button>
                        </div>
                        <div class="calendar_weekdays" ></div>
                        <div class="calendar_content" ></div>
                    </div>
                </div>

            </div>
        </div>
</main>
<script src="js/jquery-3.7.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
<script src='js/siedbar.js'></script>
<script src='js/calendrier.js'></script>
<script src='js/popper.js'></script>
</body>
</html>
