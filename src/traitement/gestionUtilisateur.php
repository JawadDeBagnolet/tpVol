<?php
require_once "../bdd/bdd.php";
require_once "../modele/Utilisateur.php";
require_once "../repository/UtilisateurRepository.php";
$idUser = $_POST['button'];
var_dump($_POST);
if (isset($_POST['button'])){
    if($_POST['button'] == "admin" || $_POST['button'] == "user"){
        if($_POST['button'] == "admin"){
            $role= "admin";
        }
        elseif($_POST['button'] === "user"){
            $role="user";
        }
        elseif ($_POST['button'] === "pilote"){
            $role="pilote";
        }
        $user=new Utilisateur([
                "idUser"=>$idUser,
                "role"=>$role
            ]
        );
        $userRepo=new UtilisateurRepository();
        $test = $userRepo->modifUser($user);
        if($test){
            header("Location:../../vue/listeUtilisateur.php?parametre=modificationReussie");
        }
        else{
            header("Location:../../vue/listeUtilisateur.php?parametre=erreur");
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
            header("Location:../../vue/listeUtilisateur.php?parametre=suppressionReussie");
        }
        else{
            header("Location:../../vue/listeUtilisateur.php?parametre=erreur");
        }
    }
}else{
    echo "else";
}


?>
<!DOCTYPE html>
<html lang="fr">