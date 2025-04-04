<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Agency - Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../assets/css/styles.css" rel="stylesheet" />
</head>
<body id="page-top">
<?php
require_once 'PopUp.php';
if(isset($_GET['parametre'])){
    if($_GET['parametre']=="mdp"){
        $pop = new PopUp();
        $pop->showPopup("Les mots de passes ne correspondent pas");
    }
    else if($_GET['parametre']=="champsVides"){
        $pop = new PopUp();
        $pop->showPopup("Veuillez remplir tout les champs");
    }    else if($_GET['parametre']=="doublon"){
        $pop = new PopUp();
        $pop->showPopup("Email déjà existant");
    }
}
?>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="../index.php"><img src="../assets/assets/img/navbar-logo.svg" alt="..." /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
    </div>
</nav>
<!-- Masthead-->
<header class="masthead">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                <form action="../src/traitement/gestionInscription.php" method="post">
                    <div class="titreInscription">
                        <h3><u style="font-family: 'Helvetica Neue'"><strong>INSCRIPTION</strong></u></h3>
                    </div>

                    <div class="input-group mb-3" style="margin-top: 10px">
                        <span class="input-group-text">👤</span>
                        <div class="form-floating">
                            <input name="nom" type="text" class="form-control" id="floatingInputGroup1" placeholder="Nom">
                            <label for="floatingInputGroup1">Nom</label>
                        </div>
                    </div>
                    <div class="input-group mb-3" style="margin-top: 10px;">
                        <span class="input-group-text">👤</span>
                        <div class="form-floating">
                            <input name="prenom" type="text" class="form-control" id="floatingInputGroup2" placeholder="Prénom">
                            <label for="floatingInputGroup1">Prénom</label>
                        </div>
                    </div>
                    <div class="input-group mb-3" style="margin-top: 10px">
                        <span class="input-group-text">🏙️</span>
                        <div class="form-floating">
                            <input name="ville" type="text" class="form-control" id="floatingInputGroup1" placeholder="Ville">
                            <label for="floatingInputGroup1">Ville</label>
                        </div>
                    </div>
                    <div class="input-group mb-3" style="margin-top: 10px">
                        <span class="input-group-text">📅</span>
                        <div class="form-floating">
                            <input name="date_naissance" type="date" class="form-control" id="floatingInputGroup1" placeholder="Date de naissance">
                            <label for="floatingInputGroup1">Date de naissance</label>
                        </div>
                    </div>
                    <div class="input-group mb-3" style="margin-top: 10px;">
                        <span class="input-group-text">📧</span>
                        <div class="form-floating">
                            <input name="email" type="text" class="form-control" id="floatingInputGroup2" placeholder="E-mail" style="width: 100%;" size="30">
                            <label for="floatingInputGroup1">E-mail</label>
                        </div>
                    </div>
                    <div class="input-group mb-3" style="margin-top: 10px;">
                        <span class="input-group-text">🔒</span>
                        <div class="form-floating">
                            <input name="mdp" type="password" class="form-control" id="floatingInputGroup2" placeholder="Mot de Passe" style="width: 100%;" size="30">
                            <label for="floatingInputGroup1">Mot de passe</label>
                        </div>
                    </div>
                    <div class="input-group mb-3" style="margin-top: 10px;">
                        <span class="input-group-text">🔒</span>
                        <div class="form-floating">
                            <input name="mdpC" type="password" class="form-control" id="floatingInputGroup2" placeholder="Confirmation" style="width: 100%;" size="30">
                            <label for="floatingInputGroup1">Confirmation mot de passe</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit" style="margin-top: 10px;">S'Inscrire</button>
                    </div>
                </form>
                <div class="lienConnexion" style="margin-top: 10px;">
                    Vous avez déjà un compte ? Je souhaite <a href="connexion.php" class="header-button">Me connecter</a> !
                </div>
            </div>
        </div>
    </div>
</header>

<footer class="footer py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2023</div>
            <div class="col-lg-4 my-3 my-lg-0">
                <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
            </div>
        </div>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>