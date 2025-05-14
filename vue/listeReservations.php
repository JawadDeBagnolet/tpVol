<!DOCTYPE html>
<html lang="en">


<body>
<a class="navbar-brand" href="indexADMIN.php"> index Admin </a>
<?php
session_start();
if (!$_SESSION['connexionAdmin']) {
    header('location: ../index.php?parametre=fakeAdmin');
}

require_once "../src/bdd/Bdd.php";
require_once "../src/modele/Reservation.php";
require_once "../src/repository/ReservationRepository.php";


require_once 'PopUp.php';
if(isset($_GET['parametre'])){
    if($_GET['parametre']=="update"){
        $pop = new PopUp();
        $pop->showPopup("L'update a bien été faite");
    }
    if($_GET['parametre']=="ajoutReussi"){
        $pop = new PopUp();
        $pop->showPopup("L'ajout a bien été fait");
    }
    if($_GET['parametre']=="suppression"){
        $pop = new PopUp();
        $pop->showPopup("Suppression reussie");
    }
    if($_GET['parametre']=="erreur"){
        $pop = new PopUp();
        $pop->showPopup("Erreur");
    }
}

$reservation=new ReservationRepository();
$listeReservation=$reservation->recupererReservations(); ?>

<header class="masthead">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                <h1>CINEMAX ADMIN - Liste des Reservations</h1>
                <br>
                <table border="2">
                    <tr>
                        <td>Id Reservation</td>
                        <td>Id Seance</td>
                        <td>Réservé par :</td>
                        <td>Titre</td>
                        <td>Date Seance</td>
                        <td>Heure Debut Seance</td>
                        <td>Heure Fin Seance</td>
                        <td>Date de la réservation</td>


                    </tr>

                    <?php
                    foreach ($listeReservation as $listeReservations): ?>
                        <tr>
                            <td><?=$listeReservations['idReservation']?></td>
                            <td><?=$listeReservations['refSeance']?></td>
                            <td><?=$listeReservations['email']?></td>
                            <td><?=$listeReservations['titreFilm']?></td>
                            <td><?=$listeReservations['dateSeance']?></td>
                            <td><?=$listeReservations['heureDebut']?></td>
                            <td><?=$listeReservations['heureFin']?></td>
                            <td><?=$listeReservations['dateReservation']?></td>

                        </tr>
                    <?php endforeach; ?>
                </table>
                <br>
                <h2> Inserer l'ID de le la reservation a modifier / supprimer : </h2>

                <form action="../src/traitement/gestionReservation.php" method="post">
                    <label >Reservation :</label>
                    <select name="idSaisieReservation" required>
                        <?php
                        foreach ($listeReservation as $listeReservations): ?>
                            <option value="<?= ($listeReservations['idReservation']) ?>"><?= ($listeReservations['idReservation']) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <button name="button" value="suppr" class="btn btn-primary" style="margin-top: 10px;" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</header>
</body>
</html>