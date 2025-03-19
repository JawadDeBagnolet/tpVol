<?php

class AvionRepository{
    public function recupererAvion(){
        $avion = [];
        $bdd= new bdd();
        $database = $bdd ->getBdd();
        $req = $database->prepare('SELECT * FROM avion ORDER BY type');
        $req->execute();
        $avionBdd = $req->fetchAll();
        foreach($avionBdd as $avionBdd){
            $avion[] = new Avion([
                'idAvion' => $avionBdd['id_avion'],
                'type' => $avionBdd['type'],
            ]);
        }
        return $avion;
    }

    public function deleteAvion($idAvion){
        $bdd = new bdd();
        $database=$bdd->getBdd();
        $req = $database->prepare("DELETE FROM avion WHERE id_avion = :id_avion");
        $req->execute(array(
            "id_avion"=>$idAvion
        ));
    }

}