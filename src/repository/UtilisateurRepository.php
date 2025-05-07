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
    public function connexion(Utilisateur $utilisateur) {
        $bdd = new bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare('SELECT * FROM utilisateur WHERE email = :email');
        $req->execute(array(
            'email' => $utilisateur->getEmail()
        ));
        $donnees = $req->fetch();
        if ($donnees) {
            $utilisateur->setMdp($donnees['mdp']);
            $utilisateur->setRole($donnees["role"]);
            $utilisateur->setEmail($donnees["email"]);
            $utilisateur->setIdUtilisateur($donnees['id_utilisateur']);
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
    public function listeUser(){
        $listeUser = [];
        $bdd = new bdd();
        $database = $bdd ->getBdd();
        $req = $database->prepare('SELECT * FROM utilisateur');
        $req->execute();
        $listeUsersBdd = $req->fetchAll();
        foreach($listeUsersBdd as $listeUserBdd){
            $listeUser[] = new Utilisateur([
                'idUser' => $listeUserBdd['id_utilisateur'],
                'nom' => $listeUserBdd['nom'],
                'prenom' => $listeUserBdd['prenom'],
                'email' => $listeUserBdd['email'],
                'mdp' => $listeUserBdd['mdp'],
                'role' => $listeUserBdd['role'],
            ]);
        }
        return $listeUser;
    }
    public function profilUser($idutilisateur){
        $bdd = new bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare('SELECT * FROM user WHERE id_user = :id');
        $req->execute(['id' => $idutilisateur]);
        $data = $req->fetch();

        if ($data) {
            return new Utilisateur([
                'idUser' => $data['id_user'],
                'nom' => $data['nom'],
                'prenom' => $data['prenom'],
                'email' => $data['email'],
                'mdp' => $data['mdp'],
                'role' => $data['role'],
            ]);
        }

        return null;
    }

    public function modifUser(Utilisateur $utilisateur){
        $bdd = new bdd();
        $database=$bdd->getBdd();
        $req = $database->prepare("UPDATE utilisateur SET role = :role WHERE id_utilisateur = :id_utilisateur");
        $req->execute(array(
            "role"=>$utilisateur->getRole(),
            "id_user"=> $utilisateur->getIdUser()
        ));
        return $utilisateur;
    }

    public function deleteUser(Utilisateur $utilisateur){
        $bdd = new bdd();
        $database=$bdd->getBdd();
        $req = $database->prepare("DELETE FROM user WHERE id_utilisateur = :id_utilisateur");
        $req->execute(array(
            "id_utilisateur"=>$utilisateur->getIdUtilisateur()
        ));
        return $utilisateur;
    }
}