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
    public function deleteReservation($idReservation){
        $bdd = new Bdd();
        $database=$bdd->getBdd();
        $req = $database->prepare("DELETE FROM reservation WHERE id_reservation = :id_reservation");
        $req->execute(array(
            "id_reservation"=>$idReservation
        ));
        return $idReservation;
    }
    public function nvReservation(Reservation $reservation) {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare('INSERT INTO reservation (ref_utilisateur, ref_vol, date_reservation) VALUES (:ref_user, :ref_seance, :date_reservation)');
        $req->execute([
            'ref_user' => $reservation->getRefUser(),
            'ref_seance' => $reservation->getRefSeance(),
            'date_reservation'=>date('Y-m-d')
        ]);
        return $reservation;
    }
}