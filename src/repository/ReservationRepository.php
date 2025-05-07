<?php

class ReservationRepository{
    public function recupererReservations(){
        $reservations = [];
        $bdd = new bdd();
        $database = $bdd->getBdd();

        $req = $database->prepare(
            'SELECT r.id_reservation, r.ref_vol, r.prix_billet, r.date_reservation,
                   u.email,
                   v.ville_depart, v.ville_arrivee, v.date_depart, v.heure_depart
            FROM reservation AS r
            INNER JOIN utilisateur AS u ON r.ref_utilisateur = u.id_utilisateur
            INNER JOIN vol AS v ON r.ref_vol = v.id_vol
    ');

        $req->execute();
        $reservationsBdd = $req->fetchAll();

        foreach ($reservationsBdd as $reservationBdd) {
            $reservations[] = [
                'idReservation' => $reservationBdd['id_reservation'],
                'refVol' => $reservationBdd['ref_vol'],
                'prixBillet' => $reservationBdd['prix_billet'],
                'dateReservation' => $reservationBdd['date_reservation'],
                'email' => $reservationBdd['email'],
                'villeDepart' => $reservationBdd['ville_depart'],
                'villeArrivee' => $reservationBdd['ville_arrivee'],
                'dateDepart' => $reservationBdd['date_depart'],
                'heureDepart' => $reservationBdd['heure_depart'],
            ];
        }

        return $reservations;
    }
}