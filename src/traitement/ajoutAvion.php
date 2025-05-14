<?php
require_once "../bdd/bdd.php";
require_once "../modele/Avion.php";
require_once "../repository/AvionRepository.php";
require_once "../repository/ModeleRepository.php";

session_start();
if (!isset($_SESSION['connexionAdmin']) || !$_SESSION['connexionAdmin']) {
    header('location: ../index.php?parametre=fakeAdmin');
}

if (!empty($_POST["nom"]) && !empty($_POST["ref_modele"])) {

    $avionRepository = new AvionRepository();
    $modeleRepository = new ModeleRepository();

    $avion = new Avion([
        "nom" => $_POST['nom'],
        "ref_modele" => $_POST['ref_modele']
    ]);

    $verif=$avionRepository->verifDoublonEmail();
    if ($verif) {
        header("Location: ../../vue/inscription.php?parametre=doublon");
    }else{
        $avion = $avionRepository->creerAvion();
        header("Location: ../../vue/indexADMIN.php?parametre=avionCree");
    }

}else{
    echo "e";
}