<?php
require_once "../bdd/bdd.php";
require_once "../modele/Utilisateur.php";
require_once "../repository/UtilisateurRepository.php";
$idUser = $_POST['idSaisie'];
var_dump($_POST);
if (isset($_POST['button'])){
    if($_POST['button'] == "admin" || $_POST['button'] == "user"){
        if($_POST['button'] == "admin"){
            $role= "admin";
        }
        elseif($_POST['button'] === "user"){
            $role="user";
        }
        $user=new Utilisateur([
                "idUser"=>$idUser,
                "role"=>$role
            ]
        );
        $userRepo=new UtilisateurRepository();
        $test = $userRepo->modifUser($user);
        if($test){
            header("Location:../../vue/listeUsers.php?parametre=modificationReussie");
        }
        else{
            header("Location:../../vue/listeUsers.php?parametre=erreur");
        }
    }
    elseif($_POST['button']=='suppr'){
        $user=new Utilisateur([
                "idUser"=>$idUser
            ]
        );
        $userRepo=new UtilisateurRepository();
        $test = $userRepo->deleteUser($user);
        if($test){
            header("Location:../../vue/listeUsers.php?parametre=suppressionReussie");
        }
        else{
            header("Location:../../vue/listeUsers.php?parametre=erreur");
        }
    }
}


?>
<!DOCTYPE html>
<html lang="fr">