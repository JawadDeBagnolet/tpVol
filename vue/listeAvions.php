<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Gestion des Avions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="indexADMIN.php">Index Admin</a>
    </div>
</nav>

<div class="container mt-5">
    <?php
    session_start();
    if (!isset($_SESSION['connexionAdmin'])) {
        header('location: ../index.php?parametre=fakeAdmin');
        exit();
    }

    require_once "../src/bdd/bdd.php";
    require_once "../src/modele/Avion.php";
    require_once "../src/repository/AvionRepository.php";
    require_once 'PopUp.php';

    // Gestion des messages popup
    if(isset($_GET['parametre'])){
        $messages = [
            "update" => "L'update a bien été faite",
            "ajoutReussi" => "L'ajout a bien été fait",
            "suppression" => "Suppression réussie",
            "erreur" => "Une erreur est survenue"
        ];

        if(array_key_exists($_GET['parametre'], $messages)) {
            $pop = new PopUp();
            $pop->showPopup($messages[$_GET['parametre']]);
        }
    }

    $avionRepository = new AvionRepository();
    $listeAvions = $avionRepository->recupererAvion();
    ?>

    <h1 class="text-center mb-4">Gestion des Avions</h1>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Modèle</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($listeAvions as $avion): ?>
                <tr>
                    <td><?= htmlspecialchars($avion->getIdAvion()) ?></td>
                    <td><?= htmlspecialchars($avion->getNom()) ?></td>
                    <td><?= htmlspecialchars($avion->getRefModele()) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <h2>Sélectionner un avion à modifier/supprimer :</h2>
        <form action="../src/traitement/gestionAvion.php" method="post" class="mb-4">
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="idAvion" class="col-form-label">Avion :</label>
                </div>
                <div class="col-auto">
                    <select name="idAvion" id="idAvion" class="form-select" required>
                        <?php foreach ($listeAvions as $avion): ?>
                            <option value="<?= $avion->getIdAvion() ?>">
                                <?= htmlspecialchars($avion->getNom() . ' (ID: ' . $avion->getIdAvion() . ')') ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" name="action" value="supprimer" class="btn btn-danger">Supprimer</button>
                    <button type="submit" name="action" value="modifier" class="btn btn-primary">Modifier</button>
                </div>
            </div>
        </form>

        <a href="nouvelAvionAdmin.php" class="btn btn-success">Enregistrer un nouvel avion</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>