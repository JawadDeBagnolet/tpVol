<?php
require_once "../bdd/Bdd.php";
require_once"../modele/User.php";
require_once"../repository/UserRepository.php";

if (!empty($_POST["email"]) &&
    !empty($_POST["nom"]) &&
    !empty($_POST["prenom"]) &&
    !empty($_POST["mdp"]) &&
    !empty($_POST["mdpC"])) {


    if(($_POST["mdp"]==$_POST["mdpC"])) {
        $hashpassword = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
        session_start();

        $userRepository = new UserRepository();
        $nbUser=$userRepository->nombreUtilisateur();
        if($nbUser==0) {
            $role="admin";
        }else{
            $role="user";
        }
        $user = new User([
            "email" => $_POST["email"],
            "nom" => $_POST["nom"],
            "prenom" => $_POST["prenom"],
            "mdp" => $hashpassword,
            "role"=> $role
        ]);
        $verif=$userRepository->verifDoublonEmail($user);
        if ($verif) {
            header("Location: ../../vue/inscription.php?parametre=doublon");
        }else{
            $user = $userRepository->inscription($user);

            $_SESSION["email"] = $_POST["email"];
            $_SESSION["mdp"] = $_POST["mdp"];
            $_SESSION["role"] = $role;
            $_SESSION["nom"] = $_POST["nom"];
            $_SESSION["prenom"] = $_POST["prenom"];

            var_dump($user);
            if ($user->getRole() == "user") {;
                header("Location: ../../index.php");
            }

            header("Location: ../../index.php?parametre=inscrit");
        }

    } else {
        header("Location: ../../vue/inscription.php?parametre=mdp");
    }

}

else{
    header("Location: ../../vue/inscription.php?parametre=champsVides");
}
