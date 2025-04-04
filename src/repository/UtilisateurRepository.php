<?php

class UtilisateurRepository{
    public function inscription(Utilisateur $utilisateur){
        $bdd=new bdd();
        $database=$bdd->getBdd();
        $req = $database->prepare("INSERT INTO utilisateur(nom,prenom,date_naissance,ville,email,mdp,role) values(:nom,:prenom,:date_naissance,:ville,:email,:mdp,:role) ");
        var_dump($utilisateur->getDateNaissance());
        $req->execute(array(
            "nom" => $utilisateur->getNom(),
            "prenom" => $utilisateur->getPrenom(),
            "date_naissance"=> $utilisateur->getDateNaissance(),
            "ville"=> $utilisateur->getVille(),
            "email" => $utilisateur->getEmail(),
            "mdp" => $utilisateur->getMdp(),
            "role" => $utilisateur->getRole()
        ));
        return $utilisateur;
    }
    public function connexion(Utilisateur $utilisateur){
        $bdd=new bdd();
        $database=$bdd->getBdd();
        $req = $database->prepare('SELECT * FROM utilisateur WHERE email = :email');
        $req->execute(array(
            'email' => $utilisateur->getEmail()
        ));
        $utilisateur = $req->fetch();
        if($utilisateur){
            $utilisateur->setMdp($utilisateur['mdp']);
            $utilisateur->setRole($utilisateur["role"]);
            $utilisateur->setEmail($utilisateur["email"]);
            $utilisateur->setIdUtilisateur($utilisateur['id_utilisateur']);
        }
        return $utilisateur;
    }
    public function suppression(Utilisateur $utilisateur){
        $bdd = new bdd();
        $database=$bdd->getBdd();
        $req = $database->prepare("DELETE FROM utilisateur WHERE id_utilisateur = :id_utilisateur");
        $req->execute(array(
            "id_utilisateur"=>$utilisateur->getIdUtilisateur()
        ));
        return $utilisateur;
    }
    public function verifDoublonEmail(Utilisateur $utilisateur)
    {
        $bdd = new bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare('SELECT email FROM utilisateur WHERE email=:email');
        $req->execute(array(
            "email"=>$utilisateur->getEmail()
        ));
        $result = $req->fetch();
        var_dump($result);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
    public function nombreUtilisateur(){
        $bdd = new bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare('SELECT COUNT(id_utilisateur) FROM utilisateur');
        $req->execute();
        $result = $req->fetch();
        return $result[0];
    }
}