<?php
require_once "../bdd/bdd.php";
require_once "../repository/ReservationRepository.php";
require_once "../modele/Reservation.php";

$reservationRepository = new ReservationRepository();
if(isset($_GET["idReservation"])){
    $reservationRepository->deleteReservation($_GET["idReservation"]);
    header('Location: ../../vue/historiqueReservation.php');
}
elseif(isset($_POST["idSaisieReservation"])){
    $reservationRepository->deleteReservation($_POST["idSaisieReservation"]);
    header('Location: ../../vue/listeReservations.php');
}
session_start();
$reservation = new Reservation([
    'refUser' => $_SESSION['id_user'],
    'refSeance' => $_POST['idSeanceReserve'],
]);
$reservationRepository->nvReservation($reservation);
$reservationRepository->reserverUnePlace($reservation);
header('Location: ../../index.php?parametre=reservationReussie');