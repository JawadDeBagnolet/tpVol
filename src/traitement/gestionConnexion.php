<?php
require_once '../modele/Utilisateur.php';
require_once"../repository/UtilisateurRepository.php";
require_once "../bdd/bdd.php";
session_start();
if (empty($_POST['emailCo']) || empty($_POST['mdpCo'])) {

    header("Location: ../../vue/connexion.php?parametre=infoManquante");
}
else{
    var_dump($_POST);
    $user = new Utilisateur([
        'email' => $_POST["emailCo"]
    ]);
    $userRepository = new UtilisateurRepository();
    $user = $userRepository->connexion($user);
    if(!empty($user->getIdUtilisateur())){
        if(password_verify($_POST['mdpCo'],
            $user->getMdp())){
            $_SESSION['id_user'] = $user->getIdUtilisateur();
            $_SESSION['email'] = $user->getEmail();
            if($user->getRole() == "admin"){
                $_SESSION["connexion"] = true;
                $_SESSION["connexionAdmin"] = true;
                header("Location: ../../index.php");
            }else{
                $_SESSION["connexion"] = true;
                header("Location: ../../index.php");
            }
        }
        else{

            header("Location: ../../vue/connexion.php?parametre=emailmdpInvalide");
        }

    }else{

        header("Location: ../../vue/connexion.php?parametre=emailmdpInvalide");
    }
}
