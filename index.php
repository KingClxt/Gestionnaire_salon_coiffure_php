<?php
session_start();
if(isset($_SESSION['user'])){
    header('location: acceuil.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/aos.css">
</head>
<body>
<div class="modale-site">
    <p>Bienvenue sur ABIDJAN FASHION</p>
    <a id="btn-close" class="close-btn">&Cross;</a>
</div>
<header class="header-site">
    <div class="bg-site"></div>
    <nav class="navbar navbar-expand-md nav-site">
        <div class="container-fluid">
            <a class="navbar-brand titre-site fw-bold text-white">
                ABIDJAN FASHION
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse col-head" id="navbarNavDropdown">
                <ul class="navbar-nav d-flex ms-auto">
                    <li class=""><a href="" class="nav-link fw-bold text-white">Acceuil</a></li>
                    <li class=""><a href="" class="nav-link fw-bold text-white">A propos</a></li>
                    <li class=""><a href="authentification/connexion.php" class="nav-link fw-bold text-white">Se connecter</a></li>
                    <li class=""><a href="authentification/inscription.php" class="nav-link fw-bold text-white">S'inscrire</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="cont-header">
        <div class="flex-left">
                <span>
                    --Abidjan Fashion
                </span>
            <h1>
                Salon de beauté pour homme et femme
            </h1>
            <p>Respect - Rapidité - Efficacité</p>
            <div class="cont-btn-header">
                <button onclick="window.location.href='acceuil.php'" class="">Vous connecter</button>
            </div>
        </div>
    </div>

</header>
<div class="container-fluid">
    <div class="nous-comprenons row">
        <div class="cont-nous-left col-12 col-md-6 d-none d-md-flex">





            <img src="img/Spa Day.jpeg" alt=""  class="img-fluid"  data-aos="fade-down" data-aos-duration="1000">
            <img src="img/Girls get a haircut at home.jpeg" alt="" class="img-fluid"  data-aos="fade-up" data-aos-duration="1000">
        </div>

        <div class="cont-nous-right col-12 col-md-6"  data-aos="fade-left" data-aos-duration="1500">
            <span>Chez Nous</span>
            <div class="titre">
                <h2>Nous Comprenons votre Style</h2>
            </div>
            <div class="text">
                Au Salon de Coiffure Abidjan_Fashion, nous croyons que votre style est une expression unique de votre personnalité. C'est pourquoi notre équipe dévouée de stylistes professionnels s'engage à comprendre vos besoins et vos préférences afin de créer la coiffure parfaite qui vous mettra en valeur et vous fera vous sentir confiant.
            </div>
        </div>
    </div>
</div>
<div class="nos-realisation">
    <span data-aos="fade-right" data-aos-duration="800">Nos Realisations</span>
    <div class="titre" data-aos="fade-left" data-aos-duration="800">
        Explorer nos réalisation
    </div>
    <div class="text">
        Nous sommes fiers de partager quelques-unes de nos créations les plus inspirantes avec vous. Notre équipe de stylistes talentueux travaille avec passion et dévouement pour offrir des résultats exceptionnels à chaque client.
    </div>
    <div class="container-fluid">
        <div class="cont-realisation text-center">
            <div class="realisation1 realisation" data-aos="fade-down" data-aos-duration="1500">
                <p>
                    NATTE LONGUE
                </p>
                <div class="bg-realisation"></div>
            </div>
            <div class="realisation2 realisation" data-aos="fade-up" data-aos-duration="1500">
                <p>
                    COIFFURE ENFANT
                </p>
                <div class="bg-realisation"></div>
            </div>
            <div class="realisation3 realisation" data-aos="fade-down" data-aos-duration="1500">
                <p>
                    COIFFURE HOMME
                </p>
                <div class="bg-realisation"></div>
            </div>
            <div class="realisation4 realisation" data-aos="fade-up" data-aos-duration="1500">
                <p>
                    TAPER
                </p>
                <div class="bg-realisation"></div>
            </div>
        </div>
    </div>
</div>
<div class="nos-coiffeurs">
    <span data-aos="fade-left" data-aos-duration="800">Nos Coiffeurs</span>
    <div class="titre" data-aos="fade-right" data-aos-duration="800">
        NOS MEILLEURS COIFFEURS
    </div>
    <div class="cont-coiffeurs">
        <div class="coiffeur">
            <div class="cont-img">
                <img src="img/jpeg(5)" alt="">
            </div>
            <div class="nom">KOUADIO ALEX</div>
            <div class="bio">
                kOUADIO ALEX est l'un de nos meilleur coiffeurs qui est specialiste dans les coiffure africaine pour homme et femme
            </div>
        </div>
        <div class="coiffeur">
            <div class="cont-img">
                <img src="img/@herportrait.jpeg" alt="">
            </div>
            <div class="nom">KOUHAO MARIE</div>
            <div class="bio">
                KOUHAO MARIE est notre superstat polyvalente, quelque soit la coiffure que vous desirez elle seras la pour vous aidés
            </div>
        </div>
        <div class="coiffeur">
            <div class="cont-img">
                <img src="img/Ensaio corporativo cabeleireira.jpeg" alt="">
            </div>
            <div class="nom">KONE AWA</div>
            <div class="bio">
                KONE AWA est la specialiste des coiffure pour dame, elle a reussi a décrocher le prix de la meilleur coiffeuse de civ 2023
            </div>
        </div>
    </div>
</div>
<div class="nos-services">
    <span data-aos="fade-right" data-aos-duration="800">Nos Services</span>
    <div class="titre" data-aos="fade-left" data-aos-duration="800">
        Explorer nos Services
    </div>
    <div class="text">
        Nous sommes déterminés à offrir une gamme complète de services de coiffure pour répondre à tous vos besoins en matière de style et de beauté. Notre équipe de professionnels expérimentés est là pour vous offrir une expérience de coiffure de première classe.
    </div>
    <div class="container-fluid">
        <div class="cont-realisation text-center">
            <div class="service1 realisation text-uppercase" data-aos="fade-down" data-aos-duration="1500">

                <p>
                    Coloration des cheveux
                </p>
                <div class="bg-service"></div>
            </div>
            <div class="service2 realisation text-uppercase" data-aos="fade-up" data-aos-duration="1500">
                <p>
                    Permanente
                </p>
                <div class="bg-service"></div>
            </div>
            <div class="service3 realisation text-uppercase" data-aos="fade-down" data-aos-duration="1500">
                <p>
                    Lissage
                </p>
                <div class="bg-service"></div>
            </div>
            <div class="service4 realisation text-uppercase" data-aos="fade-up" data-aos-duration="1500">
                <p>
                    Traitement capillaire
                </p>
                <div class="bg-service"></div>
            </div>
        </div>
    </div>
</div>
<div class="nous-contacter">
    <div class="cont-left">
        <img src="img/service-clients.png" alt="">
    </div>
    <div class="cont-right">
        <div class="titre">
            Nous Contactez
        </div>
        <div class="form">
            <form action="" class="row form-contact">
                <div class="col-12 col-md-6">
                    <label for="">Nom</label>
                    <input type="text" class="nom" placeholder="Entrez votre nom">
                </div>
                <div class="col-12 col-md-6">
                    <label for="">Prenom</label>
                    <input type="text" class="prenom" placeholder="Entrez votre prenom"  id="">
                </div>
                <div class="col-12">
                    <label for="">Email</label>
                    <input type="text" class="email" placeholder="Entrez votre email">
                </div>
                <div class="col-12">
                    <button class="ms-1 mt-1 btn btn-primary w-100">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="temoins">
    <span data-aos="fade-left" data-aos-duration="800">Temoins</span>
    <div class="titre" data-aos="fade-right" data-aos-duration="800">Quelque Temoins</div>
    <div class="cont-temoins">
        <div class="temoin">
            <div class="date">
                15/12/2024
            </div>
            <div class="text">
                J'ai été agréablement surprise par l'accueil chaleureux et le professionnalisme de l'équipe du salon. J'ai opté pour une coupe et une coloration
            </div>
            <hr >
            <div class="photo-temoin">
                <div class="cont-photo">
                    <img src="img/p5.jpeg" alt="">
                </div>
                <p>Alex Konan</p>
            </div>

        </div>
        <div class="temoin">
            <div class="date">
                04/01/2024
            </div>
            <div class="text">
                Cela fait plusieurs années que je suis client de ce salon et je ne suis jamais déçu ! Les coiffeurs sont à l'écoute, les conseils sont toujours judicieux
            </div>
            <hr>
            <div class="photo-temoin">
                <div class="cont-photo">
                    <img src="img/p6.jpeg" alt="">
                </div>
                <p>Jeanne Soro</p>
            </div>

        </div>
        <div class="temoin">
            <div class="date">
                05/05/2024
            </div>
            <div class="text">
                Première fois dans ce salon et certainement pas la dernière ! J'ai été impressionnée par le savoir-faire et la créativité du coiffeur
            </div>
            <hr>
            <div class="photo-temoin">
                <div class="cont-photo">
                    <img src="img/profil1.jpeg" alt="">
                </div>
                <p>Stephanie Henrry</p>
            </div>

        </div>
    </div>
</div>
<div class="footer-site text-white bg-dark"data-bs-theme="dark">
    <div class="container"  data-bs-theme="dark">
        <footer class="py-5">
            <h2 class="titre-footer">ABIDJAN FASHION</h2>
            <div class="row">
                <div class="col-6 col-md-2 mb-3">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Acceuil</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">A propos</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Reseau sociaux</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary"><img class="me-1" src="img/facebook(1).png" alt="">Facebook</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary"><img src="img/instagram.png" alt="" class="me-1">Instragram</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary"><img src="img/linkedin.png" alt="" class="me-1">Linkedin</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary"><img src="img/twitter.png" alt="" class="me-1">Twitter</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary"><img src="img/social.png" alt="" class="me-1">Snapchat</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Finacement</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Signé un partenarias avec nous</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Financé notre entreprise</a></li>
                    </ul>
                </div>

                <div class="col-md-5 offset-md-1 mb-3">
                    <form>
                        <h5>Nous Contactez</h5>
                        <p>Entrer votre email pour nous envoyer un message</p>
                        <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                            <label for="newsletter1" class="visually-hidden">Email address</label>
                            <input id="newsletter1" type="text" class="form-control" placeholder="Adress Email...">
                            <button class="btn btn-primary" type="button">Valider</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                <p>© 2024 Company, Inc. Tous droits réservés.</p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
                    <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
                    <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
                </ul>
            </div>
        </footer>
    </div>
</div>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.7.1.min.js"></script>
<script src="js/app.js"></script>
<script src="js/aos.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>