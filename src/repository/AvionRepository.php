<?php

class AvionRepository
{
    public function recupererAvion(){
        $avions = [];
        $bdd = new bdd();
        $database = $bdd->getBdd();

        $req = $database->prepare('
        SELECT a.*, m.modele as nom_modele, m.marque 
        FROM avion a
        LEFT JOIN modele m ON a.ref_modele = m.id_modele
        ORDER BY a.nom
    ');
        $req->execute();

        foreach($req->fetchAll(PDO::FETCH_ASSOC) as $row){
            $avions[] = new Avion([
                'idAvion' => $row['id_avion'],
                'nom' => $row['nom'],
                'modele' => $row['nom_modele'],
                'marque' => $row['marque']
            ]);
        }
        return $avions;
    }

    public function creerAvion($nom, $ref_modele) {
        $bdd = new bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare("
            INSERT INTO avion (nom, ref_modele) 
            VALUES (:nom, :ref_modele)
        ");
        $req->execute(array(
            'nom' => $nom,
            'ref_modele' => $ref_modele
        ));
    }
    public function deleteAvion($idAvion){
        $bdd = new bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare("DELETE FROM avion WHERE id_avion = :id_avion");
        $req->execute(array(
            "id_avion" => $idAvion
        ));
    }

}